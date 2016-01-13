<?php 

//SCRIPTS E STYLES
if( !is_admin()){
  wp_deregister_script('jquery');
  wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"), false, '1.11.3', true);

  wp_enqueue_script('jquery');//jQuery

  wp_enqueue_script(//Colunas com Alturas Iguais 
    'equal-height',
    get_template_directory_uri() . '/assets/equal-height/equal-heights.js',
    array( 'jquery' ),
    '1.0.0',
    true
  );
	/*Scroll Animado*/ 
	wp_enqueue_script(
		'scrollTo',
		get_template_directory_uri() . '/assets/scrollTo/jquery.scrollTo.min.js',
		array( 'jquery' ),
		'2.1.3',
		true
	);
}
/*
function sr_dash_redirect() {
  if( is_admin() && !current_user_can('administrator') && !DOING_AJAX) {
    wp_redirect( home_url() );
  }
}
add_action('init', 'sr_dash_redirect' );
*/

/*
add_action('wp_footer', 'wp_enqueue_scripts', 5);
remove_action('wp_head', 'wp_enqueue_scripts', 1);
remove_action("wp_head", "wp_print_scripts");
add_action("wp_footer", "wp_print_scripts", 5);
remove_action("wp_head", "wp_print_head_scripts", 9);
add_action("wp_footer", "wp_print_head_scripts", 5);*/

//HACKS GERAIS
/*Remove Alertas*/
add_action('admin_head', 'my_custom_fonts');
function my_custom_fonts() {
	echo '<style>
	.updated.vc_license-activation-notice, .bsf-update-nag {
		display:none;
	} 
</style>';
}

//SIDEBARS E MENUS
/*Sidebars*/
if ( function_exists('register_sidebar') ) {
	register_sidebar(
		array(
			'name' => 'sidebar',
			'before_widget' => '<div>',
			'after_widget' => '</div>',
			'before_title' => '',
			'after_title' => '',
			)
		);
}
/*Menus*/
function register_my_menus() {
	register_nav_menus(
		array(
			'top-menu' => __( 'Top Menu' ),
			'footer-menu' => __( 'Footer Menu' ),
			'sidebar-menu' => __( 'Sidebar Menu' )
			)
		);
}
add_action( 'init', 'register_my_menus' );


//FUNÇÕES NATIVAS DO WP

/*Ativando Shortcodes nos Widgets*/
add_filter('widget_text', 'do_shortcode');

/*Ativando Thumbnails*/
add_theme_support( 'post-thumbnails' );

/*Redefinindo o tamanho do resumo (excerpt)*/
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function custom_excerpt_length( $length ) {
	return 10;
}
/*Limpar tags do VC no HEAD*/
add_action('init', 'myoverride', 100);
function myoverride() {
		//remove_action('wp_head', array(visual_composer(), 'addMetaData'));
}

//PESQUISA
function ebi_pesquisa_relevante(){
	$subject = 'abc sdfs. def ghi; this is an.email@addre.ss! asdasdasd? abc xyz';
	$result = preg_split('/(?<=[.?!;:])\s+/', $subject, -1, PREG_SPLIT_NO_EMPTY);
	print_r($result);

}

//GRAVITY FORMS
/*Trocando a imagem de loading*/
add_filter( 'gform_ajax_spinner_url', 'spinner_url', 10, 2 ); 
function spinner_url( $image_src, $form ) {
	$url = get_bloginfo("template_directory" );
	return $url."/images/ebi-loader.gif";
}


//Nova Validação
function validaCPF($cpf = null) {

    // Verifica se um número foi informado
	if(empty($cpf)) {
		return false;
	}

    // Elimina possivel mascara
	$cpf = ereg_replace('[^0-9]', '', $cpf);
	$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

    // Verifica se o numero de digitos informados é igual a 11 
	if (strlen($cpf) != 11) {
		return false;
	}
    // Verifica se nenhuma das sequências invalidas abaixo 
    // foi digitada. Caso afirmativo, retorna falso
	else if ($cpf == '00000000000' || 
		$cpf == '11111111111' || 
		$cpf == '22222222222' || 
		$cpf == '33333333333' || 
		$cpf == '44444444444' || 
		$cpf == '55555555555' || 
		$cpf == '66666666666' || 
		$cpf == '77777777777' || 
		$cpf == '88888888888' || 
		$cpf == '99999999999') {
		return false;
     // Calcula os digitos verificadores para verificar se o
     // CPF é válido
	} else {   

		for ($t = 9; $t < 11; $t++) {

			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $cpf{$c} * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($cpf{$c} != $d) {
				return false;
			}
		}

		return true;
	}
}

add_filter( 'gform_validation', 'custom_validation_CPF' );

function custom_validation_CPF( $validation_result ){
	// 2 - Get the form object from the validation result
	$form = $validation_result['form'];
    // 3 - Get the current page being validated
	$current_page = rgpost( 'gform_source_page_number_' . $form['id'] ) ? rgpost( 'gform_source_page_number_' . $form['id'] ) : 1;

    // 4 - Loop through the form fields
	foreach( $form['fields'] as &$field ) {
        // 5 - If the field does not have our designated CSS class, skip it
		if ( strpos( $field->cssClass, 'validate-cpf' ) === false ) {
			continue;
		}
        // 6 - Get the field's page number
		$field_page = $field->pageNumber;

        // 7 - Check if the field is hidden by GF conditional logic
		$is_hidden = RGFormsModel::is_field_hidden( $form, $field, array() );

        // 8 - If the field is not on the current page OR if the field is hidden, skip it
		if ( $field_page != $current_page || $is_hidden ) {
			continue;
		}

        // 9 - Get the submitted value from the $_POST
		$field_value = rgpost( "input_{$field['id']}" );

        // 10 - Make a call to your validation function to validate the value
		$is_valid = validaCPF( $field_value );

        // 11 - If the field is valid we don't need to do anything, skip it
		if ( $is_valid ) {
			continue;
		}

        // 12 - The field field validation, so first we'll need to fail the validation for the entire form
		$validation_result['is_valid'] = false;

        // 13 - Next we'll mark the specific field that failed and add a custom validation message
		$field->failed_validation = true;
		$field->validation_message = 'O CPF inserido não é válido.';
	}

    // 14 - Assign our modified $form object back to the validation result
	$validation_result['form'] = $form;

    // 15 - Return the validation result
	return $validation_result;
}