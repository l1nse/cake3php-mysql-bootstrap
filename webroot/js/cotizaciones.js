$(document).ready(function() {

	//$(".divcotizacion").hide();

	$("#btn_modal_entidade").click(function(event) {

		$("#modalCliente").modal("show");
		/*var rut = $('#rut').val();

		if(rut==''){
			mostrarAlerta('Favor debe ingresar un rut correcto!',"remove");
			return false;
		}else{
			var url = siteurl+"cotizaciones/list_auxiliar";

			$.ajax({
		        url: url,
		        dataType: "json",
		        method: "POST",
		        data: {rut : rut}
		      }).done(function(json) {
		        if(json.result){
		          //$("#sub-sistema-id").html(json.html);
		          //$("#myModal").modal("hide");
		          window.location = window.location;
		          //mostrarAlerta('Se agrego contacto correctamente!.',"ok"); 
		        }
		      });
		}*/
	});

	$("#btn_buscar_entidade").click(function(event) {

		$("#divResultado").html('<center><img src="'+siteurl+'img/load.gif" alt="Cargando"></center>');
		var nombre = $("#nombre").val();

		if(nombre==''){
			$("#divResultado").html('');
			return false;
		}else{
			var url = siteurl+"cotizaciones/list_auxiliar";

			$.ajax({
				url: url,
				dataType: "json",
				method: "POST",
				data: {nombre : nombre}
			}).done(function(json) {
				if(json.result){
				  $("#divResultado").html(json.html);
				}else{
					$("#divResultado").html('<div class="alert alert-warning" role="alert"><center><b>'+json.debug+'</b></center></div>');
				}
			});
		}
	});

	$("#btn_add_pasajero").click(function(event) {

		$("#divPasajeros").html('<center><img src="'+siteurl+'img/load.gif" alt="Cargando"></center>');
		var nombre_pasajero = $("#nombre_pasajero").val();

		if(nombre_pasajero==''){
			$("#divPasajeros").html('');
			return false;
		}else{
			var url = siteurl+"cotizaciones/list_pasajeros";

			$.ajax({
				url: url,
				dataType: "json",
				method: "POST",
				data: {nombre_pasajero : nombre_pasajero}
			}).done(function(json) {
				if(json.result){
					$("#nombre_pasajero").val('');
					$("#divPasajeros").html(json.html);
				}else{
					$("#divPasajeros").html('<div class="alert alert-warning" role="alert"><center><b>'+json.debug+'</b></center></div>');
				}
			});
		}
	});

	$("#btn_add_item").click(function(event) {
		$("#divItems").html('<center><img src="'+siteurl+'img/load.gif" alt="Cargando"></center>');
		var tipo_item 		= $("#tipo_item").val();
		var tipo_cambio 	= $("#tipo_cambio").val();
		var valor 			= $("#valor").val();
		var descripcion	 	= $("#descripcion").val();

		var validator = $( "#form_item" ).validate();
    	validator.form();

	    //valido si el formulario esta ok
	    if(!validator.valid()){
	      //console.log('entro');
	      mostrarAlerta('Rellene los campos obligatorios.',"remove"); 
	    }else{
	    	event.preventDefault();
    		tinyMCE.triggerSave();
			var url = siteurl+"cotizaciones/add_items";

			$.ajax({
				url: url,
				dataType: "json",
				method: "POST",
				data: {tipo_item : tipo_item, tipo_cambio: tipo_cambio, valor: valor, descripcion: descripcion}
			}).done(function(json) {
				if(json.result){
					$("#valor").val('');
					$("#divItems").html(json.html);
				}else{
					$("#divItems").html('<div class="alert alert-warning" role="alert"><center><b>'+json.debug+'</b></center></div>');
				}
			});
		}
	});

});


function mostrarAlerta(texto,tipo){
  if (tipo=="ok") {
    var capa = '<div><i class="check glyphicon glyphicon-ok"> </i> '+texto+' </div>';
    $( "#flashMessage" ).html(capa).addClass('message success').removeClass('fade error');
  } else {
    var capa = '<div><i class="remove glyphicon glyphicon-remove"> </i> '+texto+' </div>';
    $( "#flashMessage" ).html(capa).addClass('message error').removeClass('fade success');
  }
  $('#flashMessage').fadeIn('slow');
  retrasoAlerta();
}

function cargarCliente(CodAux, RutAux, NomAux){
	$("#cod_aux").val(CodAux);
	$("#rut_aux").val(RutAux);
	$("#nombre_aux").val(NomAux);

	$("#modalCliente").modal("hide");
	$("#divResultado").html('');
	$("#nombre").val('');
	$(".divcotizacion").show();
}

function delPasajero(id){
	$("#divPasajeros").html('<center><img src="'+siteurl+'img/load.gif" alt="Cargando"></center>');

	var url = siteurl+"cotizaciones/del_pasajeros";

	$.ajax({
		url: url,
		dataType: "json",
		method: "POST",
		data: {id : id}
	}).done(function(json) {
		if(json.result){
		  $("#divPasajeros").html(json.html);
		}else{
			$("#divPasajeros").html('<div class="alert alert-warning" role="alert"><center><b>'+json.debug+'</b></center></div>');
		}
	});
}

function delItem(id){
	$("#divItems").html('<center><img src="'+siteurl+'img/load.gif" alt="Cargando"></center>');

	var url = siteurl+"cotizaciones/del_items";

	$.ajax({
		url: url,
		dataType: "json",
		method: "POST",
		data: {id : id}
	}).done(function(json) {
		if(json.result){
		  $("#divItems").html(json.html);
		}else{
			$("#divItems").html('<div class="alert alert-warning" role="alert"><center><b>'+json.debug+'</b></center></div>');
		}
	});
}