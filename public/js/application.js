function FiltrarClientes(idTag){
	var elems = document.getElementsByClassName('accordion-group');
	for (var i=0, m=elems.length; i<m; i++) {
	    if (elems[i].id && elems[i].id.indexOf("div_"+idTag) != -1) {
	        elems[i].style.display = 'block';
	    }else{
	    	elems[i].style.display = 'none';
	    }
	}
}

function filtrarStatus(filtroStatus, idTabela){
	var totalLinhas = 0;
	var i;
	var linhasTabela = document.getElementById(idTabela).getElementsByTagName("tr");
	if(filtroStatus == ""){
		for(i = 1; i < linhasTabela.length; i++){
			linhasTabela[i].style.display = '';
			totalLinhas++;
		}
	}else{
		for(i = 1; i < linhasTabela.length; i++){
			linha = linhasTabela[i];
			if(filtroStatus != linha.getElementsByTagName("output")[0].name){
				linha.style.display = 'none';
			}else{
				linha.style.display = '';
				totalLinhas++;
			}
		}
	}
	document.getElementById(idTabela+"_info").innerHTML = "Resultados: 1 de "+totalLinhas+", Total: "+totalLinhas;
}

function handlepaste(el, e) {
	document.getElementById("formDefeito:inplance_display").click();
	alert(e.clipboardData.getData('text/plain'));
    document.getElementById("formDefeito:campoAplicacao").value=e.clipboardData.getData('text/plain');
  
    e.preventDefault();
}

function verificar(event){
	var ctrl = event.ctrlKey;
	
	if(ctrl){
		var tecla = event.keyCode;
		//acao ctrl C
//		if (ctrl && tecla==67) {
//		}
		
		//acao ctrl V
		if (ctrl && tecla==86) {
			
//			campoLinkApp = document.getElementById("formDefeito:campoAplicacao");
			telaListaDefeitos = document.getElementById("formDefeitos:listaDefeitos");
			if(telaListaDefeitos){
				document.getElementById("novoDefeitoCopy").click();
			}
//			if(campoLinkApp){
//				document.getElementById("salvarDefeito").click();
//			}else if(telaListaDefeitos){
//				document.getElementById("novoDefeitoCopy").click();
//			}
		}
	}
	event.keyCode = 0; 
	event.returnValue = false;
}

function OnEnter(evt, idComponent)
{
    var key_code = evt.keyCode  ? evt.keyCode  :
                       evt.charCode ? evt.charCode :
                       evt.which    ? evt.which    : void 0;
 
    if (key_code == 13)
    {
    	document.getElementById(idComponent).click();
        return false;
    }
}

function OnEnter(evt){
	var key_code = evt.keyCode  ? evt.keyCode  :
		evt.charCode ? evt.charCode :
			evt.which    ? evt.which    : void 0;


	if (key_code == 13)
	{
		return false;
	}
}

function abreModalCopiaDefeito(){
	document.getElementById("linkModalCopiaDefeito").click();
}

function abreModalMoverDefeito(){
	document.getElementById("linkModalMoverDefeito").click();
}

function abreModalRelatorioDefeitosHotNeus(){
	document.getElementById("linkModalDefeitosHotNeus").click();
	geraTabelaHotNeusModal();
}

function abreModalRelatorioDefeitosTestLink(){
	document.getElementById("linkModalDefeitosTestLink").click();
	geraTabelaTestLinkModal();
}

function abreModalOcorrenciasDefeitos(){
	document.getElementById("linkModalOcorrenciaDefeito").click();
}

function desabilitaBotao(idbotao){
	document.getElementById(idbotao).disabled = true;
}

function habilitaBotao(idbotao){
	document.getElementById(idbotao).disabled = false;
}

function startAjaxStatus(){
	document.getElementById("divAjaxStatus").style.display = 'block';
}

function stopAjaxStatus(){
	document.getElementById("divAjaxStatus").style.display = 'none';
}

function startAjaxStatusInicio(){
	document.getElementById("divAjaxStatusInicio").style.display = 'block';
}

function stopAjaxStatusInicio(){
	document.getElementById("divAjaxStatusInicio").style.display = 'none';
}

function preencheCampoSpinner(){
	document.getElementById("spinner3").value = document.getElementById("formDefeitos:campoVersaoDocumento").value;
}
function preencheCampoVersaoDocumento(){
	document.getElementById("formDefeitos:campoVersaoDocumento").value = document.getElementById("spinner3").value;
}


if ("ontouchend" in document)
	document.write("<script src='#{request.contextPath}/js/jquery.mobile.custom.min.js'>"
					+ "<" + "/script>");


/**
 * Objeto usado para traduzir o plugin DataTable 
 * do jquery
 */
var languageDataTables = {
	"processing": "Aguarde...",
	"lengthMenu": " Mostrar:  _MENU_  resultado(s) encontrado(s) ",
	"zeroRecords": "Nenhum resultado encontrado.",
	"info": "Resultados: _START_ de _END_, Total: _TOTAL_ ",
	"infoEmpty": "Resultados: 0 de 0",
	"infoFiltered": "(filtrando _MAX_ objetos)",
	"infoPostFix": "",
	"search": "Consulta:&nbsp;&nbsp;",
	"url": "",
    "decimal": ",",
    "thousands": ".",
	"paginate": {
		"first":    "Primeiro",
		"previous": "Anterior",
		"next":     "Próximo",
		"last":     "Último"
	}
};

jQuery(document).ready(function(){
	
	
	$('#informativo').fadeOut(7000);
	
	/**
	 * Gerando todos os combos que tem essa classe
	 */
	gerandoCombosChosen();
	
	/**
	 * Gerando todos os spinners da aplicação
	 */
	gerandoAceSpinner();
	
	/**
	 * Aplicando os chosen aos modais assim que exibidos
	 */
	jQuery('.modal').on('show', function() {
		jQuery(this).find('.chzn-container').each(function() {
			jQuery(this).find('a:first-child').css('width', '200px');
			jQuery(this).find('.chzn-drop').css('width', '210px');
			jQuery(this).find('.chzn-search input').css('width', '200px');
		});
	});	
	
	jQuery('.btn-modal-log').on('click',function(e){
		jQuery('#formDefeito\\:campoLogErro').val(jQuery('#logErro').val());
		remoteCommandSalvarDoc();
		e.preventDefault();
	});
		
	/**
	 * 
	 */
	jQuery('#datatable-documento-em-andamento').dataTable({
		"language": languageDataTables,
		"columnDefs":[
		   {"visible": false, "targets": 2}
		],
		"order":[[2, 'asc']],
		"displayLength": 50,
		
		"drawCallback": function(settings){
			var api = this.api();
			var rows = api.rows({page: 'current'}).nodes();
			var last=null;
			
			api.column(2, {page: 'current'}).data().each(function(group,i){
				if(last!==group){
					jQuery(rows).eq(i).before(
						"<tr class='group'><td colspan='9'>"+ group +"</td></tr>"
					);
					last = group;
				}
			});
		}
	});
	
	geraTabelaDocumentosConcluidos();
	
	jQuery('#tabela-list-defeitos').dataTable({
		"language": languageDataTables,
		"columnDefs":[
		   		   {"visible": false, "targets": 2}
		   		],
		   		"order":[[2, 'asc']],
		   		"displayLength": 50,
		   		 paging: false
	});	
	
//	document.getElementById("tabela-list-defeitos_wrapper").children[0];
//	
//	var conteudoDivTabela = document.getElementById("tabela-list-defeitos_filter").innerHTML;
//	var conteudoDivStatus = document.getElementById("formConsultaStatus").innerHTML;
//	
//	var conteudoFinal = conteudoDivStatus + conteudoDivTabela;
//	
//	document.getElementById("tabela-list-defeitos_filter").innerHTML = conteudoFinal;
	
	
	
	
	
	jQuery('#tabela-consulta-defeito').dataTable({
		"language": languageDataTables,
		"columnDefs":[
		              {"visible": false, "targets": 2}
		              ],
		              "order":[[2, 'asc']],
		              "displayLength": 50
	});	
	
	/**
	 * Ativando o plugin ImgLiquidfill 
	 */
	imgLiquid();
	
	jQuery('#alertaInfo').on(ace.click_event, function(){
		jQuery.gritter.add({
			// (string | mandatory) the heading of the notification
			title: document.getElementById('titulo').value,
			// (string | mandatory) the text inside the notification
			text: document.getElementById('mensagem').value,
			class_name: 'gritter-success' + (' gritter-light')
		});

		return false;
	});
	
	jQuery('#alertaCenter').on(ace.click_event, function(){
		jQuery.gritter.add({
			// (string | mandatory) the heading of the notification
			title: document.getElementById('titulo').value,
			// (string | mandatory) the text inside the notification
			text: document.getElementById('mensagem').value,
			class_name: 'gritter-error gritter-center' + (' gritter-light')
		});

		return false;
	});
	
	
	jQuery('#alertaErro').on(ace.click_event, function(){
		jQuery.gritter.add({
			// (string | mandatory) the heading of the notification
			title: 'Erro',
			// (string | mandatory) the text inside the notification
			text: 'Erro Interno!',
			class_name: 'gritter-error' + ('')
		});

		return false;
	});

	jQuery('.open-in-tab').click(function(){
		var src = jQuery(this).attr(src);
		window.open(src, '_blank');
	});	
	
	
	var colorbox_params = {
		reposition:true,
		scalePhotos:true,
		scrolling:false,
		previous:'<i class="icon-arrow-left"></i>',
		next:'<i class="icon-arrow-right"></i>',
		close:'&times;',
		current:'{current} of {total}',
		maxWidth:'100%',
		maxHeight:'100%',
		onOpen:function(){
			document.body.style.overflow = 'hidden';
		},
		onClosed:function(){
			document.body.style.overflow = 'auto';
		},
		onComplete:function(){
			jQuery.colorbox.resize();
		}
	};

	jQuery('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
	jQuery("#cboxLoadingGraphic").append("<i class='icon-spinner orange'></i>");//let's add a custom loading icon	
	
	
});


$(function() {
	 $("#body").on("paste", function (e) {
	        e.preventDefault();

	        var text;
	        var clp = (e.originalEvent || e).clipboardData;
	        if (clp === undefined || clp === null) {
	            text = window.clipboardData.getData("text") || "";
	            if (text !== "") {
	                if (window.getSelection) {
	                    var newNode = document.createElement("span");
	                    newNode.innerHTML = text;
	                    window.getSelection().getRangeAt(0).insertNode(newNode);
	                } else {
	                    document.selection.createRange().pasteHTML(text);
	                }
	            }
	        } else {
	            text = clp.getData('text/plain') || "";
	            if (text !== "") {
	                document.execCommand('insertText', false, text);
	            }
	        }
	    });
});
$(function() {
	$("#body").on("prepaste", function (e) {
		e.preventDefault();
		alert('pre');
	});
});

$(function() {
	$('[data-rel="tooltip"]').tooltip({
		placement : tooltip_placement
	});
	function tooltip_placement(context, source) {
		var $source = $(source);
		var $parent = $source.closest('table');
		var off1 = $parent.offset();
		var w1 = $parent.width();

		var off2 = $source.offset();
		var w2 = $source.width();

		if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2))
			return 'right';
		return 'left';
	}
	
	$('[data-rel=tooltip]').tooltip({
		container : 'body'
	});
	
	
});

/**
 * Funções
 */
function abreModalDelete(){
	 document.getElementById('linkModalDelete').click();
}

function imgLiquid(){
	try{
		jQuery('.imgLiquidFill').imgLiquid();
	}catch(e){
		console.log(e);
	}
}
function gerandoAceSpinner(){
	
	jQuery('.js-ace-spinner').each(function(){
		
		var s = jQuery(this);
		var v = s.val();
		var p = s.parents('.ace-spinner:last');
		p.parent().append(s);
		p.remove();		
		s.ace_spinner({
			value : 0,
			min : 0,
			max : 200,
			step : 1,
			btn_up_class : 'btn-info',
			btn_down_class : 'btn-info'
		});
		console.log(v);
		s.spinner( "value", v );
		
	});
	
}
function geraTabelaDocumentosConcluidos(){
	jQuery('#tabela-documentos-fechados').dataTable({
		"language": languageDataTables,
		"columnDefs":[
		   {"visible": false, "targets": 2}
		],
		"order":[[2, 'asc']],
		"displayLength": 50,
		
		"drawCallback": function(settings){
			var api = this.api();
			var rows = api.rows({page: 'current'}).nodes();
			var last=null;
			
			api.column(2, {page: 'current'}).data().each(function(group,i){
				if(last!==group){
					jQuery(rows).eq(i).before(
						"<tr class='group'><td colspan='9'>"+ group +"</td></tr>"
					);
					last = group;
				}
			});
		}
	});	
}

function geraTabelaTestLink(){
	try {
		jQuery('#datatable-resultado-test-link').dataTable({
			"language": languageDataTables,
			"columnDefs":[
	              {"visible": false, "targets": 2}],
	              "bPaginate": false,
	              "bFilter": false,
	              "bInfo": false,
	              "order":[[2, 'asc']],
	              "displayLength": 50,
	              
	              "drawCallback": function(settings){
	            	  var api = this.api();
	            	  var rows = api.rows({page: 'current'}).nodes();
	            	  var last=null;
	            	  
	            	  api.column(2, {page: 'current'}).data().each(function(group,i){
	            		  if(last!==group){
	            			  jQuery(rows).eq(i).before(
	            					  "<tr class='group'><td colspan='9'>"+ group +"</td></tr>"
	            			  );
	            			  last = group;
	            		  }
	            	  });
	              }
		});	
	} catch (e) {
	}
}

function geraTabelaTestLinkModal(){
	try {
		jQuery('#datatable-resultado-test-link-modal').dataTable({
			"language": languageDataTables,
			"columnDefs":[
			              {"visible": false, "targets": 2}],
			              "bFilter": false,
			              "bInfo": true,
			              "order":[[2, 'asc']],
			              "displayLength": 10,
			              
			              "drawCallback": function(settings){
			            	  var api = this.api();
			            	  var rows = api.rows({page: 'current'}).nodes();
			            	  var last=null;
			            	  
			            	  api.column(2, {page: 'current'}).data().each(function(group,i){
			            		  if(last!==group){
			            			  jQuery(rows).eq(i).before(
			            					  "<tr class='group'><td colspan='9'>"+ group +"</td></tr>"
			            			  );
			            			  last = group;
			            		  }
			            	  });
			              }
		});	
	} catch (e) {
	}
}
function geraTabelaHotNeusModal(){
	try {
		jQuery('#datatable-resultado-hot-neus-modal').dataTable({
			"language": languageDataTables,
	        "displayLength": 10,
	        "bFilter": false,
		});
	} catch (e) {
	}
}

function gerandoCombosChosen(){
	jQuery(".chzn-select").chosen();
}
function ajaxStatusOnComplete(){
	try{
		console.log('complete');
		imgLiquid();
		gerandoCombosChosen();
		gerandoAceSpinner();
	}catch(e){
		console.log(e);
	}
}

function ajaxStatusOnStart(){
	try{
		console.log('start');
	}catch(e){
		console.log(e);
	}	
}
function alerta(texto){
	jQuery('#modalAlerta').find('#content').text(texto);
	jQuery('#modalAlerta').modal('show');
}

$(function() {
	$.mask.definitions['~'] = '[+-]';
	$('.input-mask-date').mask('99/99/9999');

	$('.date-picker').datepicker().next().on(ace.click_event, function() {
		$(this).prev().focus();
	});
	$('#id-date-range-picker-1').daterangepicker().prev().on(ace.click_event,
			function() {
				$(this).next().focus();
			});

	$('#timepicker1').timepicker({
		minuteStep : 1,
		showSeconds : true,
		showMeridian : false
	});

	$('#colorpicker1').colorpicker();
	$('#simple-colorpicker-1').ace_colorpicker();

	$(".knob").knob();

	// we could just set the data-provide="tag" of the element inside HTML, but
	// IE8 fails!
	var tag_input = $('#form-field-tags');
	if (!(/msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase())))
		tag_input.tag({
			placeholder : tag_input.attr('placeholder')
		});
	else {
		// display a textarea for old IE, because it doesn't support this plugin
		// or another one I tried!
		tag_input.after(
				'<textarea id="' + tag_input.attr('id') + '" name="'
						+ tag_input.attr('name') + '" rows="3">'
						+ tag_input.val() + '</textarea>').remove();
		// $('#form-field-tags').autosize({append: "\n"});
	}
});