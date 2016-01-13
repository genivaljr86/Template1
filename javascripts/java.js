jQuery(document).ready(function ($) {
	//Ajustando Alinhamento de Heading do VC
	$(".retirar-alinhamento").attr({style: ''});
	$(".retirar-alinhamento").find(".uvc-heading, .align-icon").attr({style: ''});

	$("#content #conteudo #downloads .ult_tab_li.current a").attr({style: ''});

	//Comportamento do Menu
	function menu(tipo){
		if (tipo == 1) {
			$(".menu-item-has-children > a").click(function(event) {
				$(".menu-item-has-children > a").not(this).closest('li').removeClass('show');
				$(this).closest('li').toggleClass('show');
				return false;
			});
		} else{
			$(".menu-item-has-children > a").click(function(event) {
				$(".menu-item-has-children > a").not(this).parent().find('.sub-menu').hide('slow');
				$(this).parent().find('.sub-menu').toggle('slow');
				//var x = $(".menu-item-has-children > a").parent().not(this).find('.sub-menu');
				//var y = $(this).parent().find('.sub-menu');
				//console.log(y);
				return false;
			});
		}
	}
	menu(2);
	//Controle do Menu Mobile
	$("a.toggle-lateral").click(function(event) {
		$("#conteudo").show();
		$("#content > aside").toggleClass('hidden-xs');
	});
	$("a.toggle-mobile").click(function(event) {
		$("#conteudo").hide();
		$("#content > aside").toggleClass('hidden-xs');
	});
	//Validando pesquisa
	$("#pesquisa button, #pesquisa404 button").click(function(event) {
		var valor = $("#pesquisa input, ").val();
		if(valor===""){
			return false;
		}
	});

	//Caret no Menu
	$(".menu-item-has-children > a").each(function(index, el) {
		$(this).after(" <span class='caret'></span>");
	});
	//Footer Fixo
	function footer_fixo(){
		$.fn.overflown=function(){var e=this[0];return e.scrollHeight>e.clientHeight||e.scrollWidth>e.clientWidth;};
		if(!$("#conteudo").overflown()){
			$("#conteudo > footer").addClass('fixo');
			//console.log("OVER! 1")
		}
		$(window).resize(function(event) {
			if(!$("#conteudo").overflown()){
				$("#conteudo > footer").addClass('fixo');
				//console.log("OVER! 2")
			}else{
				$("#conteudo > footer").removeClass('fixo');
				//console.log("NO OVER!")
			}
		});
	}
	if($(".orcamento_wrapper").length === 0){
		footer_fixo();
		console.log("Sem GF");
	}
	
	//Scroll Portifolio
	$(".scrollMais").click(function(event) {
		$("#conteudo").scrollTo("#mais", 1500);
		return false;
	});

	//Icone + Portifolio
	$(".portifolio-itens .ult-modal-input-wrapper").each(function(index, el) {
		$(this).append('<div class="overl"><span>+</span></div>');
	});
	$(".portifolio-itens .ult-modal-input-wrapper .overl").click(function(event) {
		//console.log("Vc clicou?");
		$(this).parent(".ult-modal-input-wrapper").find("img").trigger('click');
	});

	/*
	$(".portifolio-itens .ult-modal-input-wrapper").each(function(index, el) {
		$(this).click(function(event) {
			$(this).find("img").trigger('click');
		});
	});
	$(".portifolio-itens .ult-modal-input-wrapper").eq(0).click(function(event) {
		$(this).find("img").trigger('click');
	});*/
	
	//Orçamento
	$(".orcamento_wrapper .gf_step").after('<div style="clear:both"></div>');

	//

	//Filtro das Datas e Fixar Footer
	jQuery(document).bind('gform_post_render', function (){
		if($( "#input_3_22" ).val() === ""){
			$( "#field_3_22" ).hide();
		}
		if($( "#input_3_21" ).length > 0){
			$( "#input_3_21" ).datepicker("option", "onSelect", 
				function () {
					var newDate = $(this).datepicker('getDate');
					$('#input_3_22').datepicker("option", "minDate",  newDate);
					$( "#field_3_22" ).show();
					//console.log("Mudou");
		        }
		    );
			$( "#input_3_21, #input_3_22" ).datepicker("option", "minDate", "0" );
		}
	     
	});
	//Centralizando a Equipe
	/*if($(".equipe .mask").length > 0){
		$(".equipe .mask").each(function(index, el) {
			var equipe_txt = $(this).html();
			$(this).html(" ");
			$(this).html('<div class="centro"></div>');
			$(this).find(" .centro").html(equipe_txt);
		});
	}*/

	//Ajuste Data de Nascimento
	if($( "#input_1_4, #input_4_4" ).length > 0){
		$( "#input_1_4, #input_4_4" ).datepicker('destroy');
		$( "#input_1_4, #input_4_4" ).datepicker({maxDate: "-16Y",minDate: "-100Y"});
		console.log("Restrigido");
	}
	
	$('[data-toggle="tooltip"]').tooltip();
	console.log("Tooltip");
});

jQuery(window).load(function() {
	if(jQuery(".cabecalho-igual").length >0){
  		equalheight('.cabecalho-igual .wpb_column');
	}
});


jQuery(window).resize(function(){
 	if(jQuery(".cabecalho-igual").length >0){
  		equalheight('.cabecalho-igual .wpb_column');
	}
});