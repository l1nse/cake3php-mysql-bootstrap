$(document).ready(function() {
	

	$("#btn_aprobar").click(function(event) {
		aprobarFicha2();
	});

	$("#btn_control").click(function(event) {
		aprobarControl2();
	});

	$("#btn_contabilidad").click(function(event) {
		aprobarContabilidad2();
	});

	$("#btn_rechazar_ficha").click(function(event) {
		//console.log("rechazarFicha2")
		rechazarFicha2();
	});
	

	$("input[name=menu]").change(function(event) {
		var menu = $(this).val();
		//console.log(menu);
		if(menu == 1)
		{
			verCLP();	
		}
		if(menu == 2)
		{
			verUSD();	
		}
		
 	});

 	id = $('#ficha_id').val();
 	 
});


function verUtilidad(id) 
{
	verCLP();	
	$("#total_comag_clp").val('');
      	$("#total_fee_clp").val('');
      	$("#diferencia_clp").val('');
      	$("#total_cobro_tc_clp").val('');
		$("#total_descuento_clp").val('');
		$("#cargo_tc_clp").val('');
		$("#cargo_remesa_clp").val('');
		$("#utilidad_clp").val('');
		$("#total_fee_usd").val('');
      	$("#diferencia_usd").val('');
      	$("#total_cobro_tc_usd").val('');
		$("#total_descuento_usd").val('');
		$("#cargo_tc_usd").val('');
		$("#cargo_remesa_usd").val('');
		$("#utilidad_usd").val('');

	console.log(id);
 	var url = siteurl+"ficha-negocios/load-utilidad";
 	var id_ficha = id;

	$("#modalVerutilidad").modal("show");
	$("#labelModalEdit").html('<h3> Utilidades ficha : '+id+'</h3>');

	 $.ajax({
      url: url,
      dataType: "json",
      method: "POST",
      data: { id_ficha: id_ficha },      
    }).done(function(json) {    	
      if(json.result){
      	console.log("resul utilidad")

      	$("#total_comag_clp").val(json.total_comag_clp);
      	$("#total_fee_clp").val(json.total_fee_clp);
      	$("#diferencia_clp").val(json.diferencia_clp);
      	$("#total_cobro_tc_clp").val(json.cobro_tc_clp);
		$("#total_descuento_clp").val(json.descuento_clp);
		$("#cargo_tc_clp").val(json.cargo_tc_clp);
		$("#cargo_remesa_clp").val(json.cargo_remesa_clp);
		$("#utilidad_clp").val(json.utilidad_final_clp);

		$("#total_comag_usd").val(json.total_comag_usd);
      	$("#total_fee_usd").val(json.total_fee_usd);
      	$("#diferencia_usd").val(json.diferencia_usd);
      	$("#total_cobro_tc_usd").val(json.cobro_tc_usd);
		$("#total_descuento_usd").val(json.descuento_usd);
		$("#cargo_tc_usd").val(json.cargo_tc_usd);
		$("#cargo_remesa_usd").val(json.cargo_remesa_usd);
		$("#utilidad_usd").val(json.utilidad_final_usd);

      }

	});
	

}

function aprobarFicha(id)
{
	//console.log("aprobarficha1")
	var id_ficha = id;
	$('#modalControlFicha').modal('show');
	$('#id_ficha2').val(id);
}


function aprobarFicha2()
{
	//console.log("aprobarficha2");
	var id_ficha = $("#id_ficha2").val()
	var comentario = $("#observacionaprobar").val();
	console.log(comentario);
	
	var url = siteurl+"ficha-negocios/enviar-control";

	$.ajax({
      url: url,
      dataType: "json",
      method: "POST",
      data: { id_ficha: id_ficha, comentario : comentario },      
    }).done(function(json) {    	
      if(json.result){
      	window.location.href = siteurl+"ficha-negocios/aprobarficha"

      }

	});
}

function aprobarControl(id)
{
	//console.log("aprobarcontro1")
	var id_ficha = id;
	$('#modalControlFicha').modal('show');
	$('#id_ficha2').val(id);

}

function aprobarControl2()
{
	//console.log("controlficha2");
	var id_ficha = $("#id_ficha2").val()
	var comentario = $("#observacioncontrol").val();
	console.log(comentario);
	var url = siteurl+"ficha-negocios/enviar-contabilidad";


	$.ajax({
      url: url,
      dataType: "json",
      method: "POST",
      data: { id_ficha: id_ficha, comentario : comentario },      
    }).done(function(json) {    	
      if(json.result){
      	window.location.href = siteurl+"ficha-negocios/controlficha"

      }

	});
}

function aprobarContabilidad(id)
{
	//console.log("aprobarcontro1")
	var id_ficha = id;
	$('#modalContabilidadFicha').modal('show');
	$('#id_ficha2').val(id);

}

function aprobarContabilidad2()
{
	//console.log("controlficha2");
	var id_ficha = $("#id_ficha2").val()
	var comentario = $("#observacioncontabilidad").val();
	console.log(comentario);
	var url = siteurl+"ficha-negocios/enviar-facturacion";


	$.ajax({
      url: url,
      dataType: "json",
      method: "POST",
      data: { id_ficha: id_ficha, comentario : comentario },      
    }).done(function(json) {    	
      if(json.result){
      	window.location.href = siteurl+"ficha-negocios/contabilidadficha";

      }

	});
}

function rechazarFicha(id)
{
	//console.log("aprobarcontro1")
	var id_ficha = id;
	$('#modalRechazarFicha').modal('show');
	$('#id_ficha2').val(id);

}

function btn_rechazar_ficha2()
{
	//console.log("controlficha2");
	var id_ficha = $("#id_ficha2").val();
	var comentario = $("#observacionrechazo").val();
	console.log(comentario);
	var url = siteurl+"ficha-negocios/rechazar-ficha";


	$.ajax({
      url: url,
      dataType: "json",
      method: "POST",
      data: { id_ficha: id_ficha, comentario : comentario},      
    }).done(function(json) {    	
      if(json.result){
      	window.location.href = siteurl+"ficha-negocios/index";

      }

	});
}


function verCLP() 
{
	console.log('verCLP');

	$('#total_comag_clp').attr('type', 'input');
	document.getElementById("lbltotal_comag_clp").style.display = 'block'; 

	$('#total_fee_clp').attr('type', 'input');	
	document.getElementById("total_fee_clp").style.display = 'block'; 

	$('#diferencia_clp').attr('type', 'input');
	document.getElementById("lbltotal_diferencia_clp").style.display = 'block';

	$('#total_cobro_tc_clp').attr('type', 'input');
	document.getElementById("lbltotal_cobro_tc_clp").style.display = 'block';

	$('#total_descuento_clp').attr('type', 'input');
	document.getElementById("lbltotaldescuento_clp").style.display = 'block';

	$('#cargo_tc_clp').attr('type', 'input');
	document.getElementById("lblcargo_tc_clp").style.display = 'block';

	$('#cargo_remesa_clp').attr('type', 'input');
	document.getElementById("lblcargo_remesa_clp").style.display = 'block';

	$('#utilidad_clp').attr('type', 'input');
	document.getElementById("lblutilidad_clp").style.display = 'block';

	$('#cargo_remesa_clp').attr('type', 'input');
	document.getElementById("cargo_remesa_clp").style.display = 'block';

	$('#total_fee_clp').attr('type', 'input');
	document.getElementById("lbltotal_fee_clp").style.display = 'block';


	$('#total_comag_usd').attr('type', 'hidden');
	document.getElementById("lbltotal_comag_usd").style.display = 'none';

	$('#total_fee_usd').attr('type', 'hidden');
	document.getElementById("lbltotal_fee_usd").style.display = 'none';


	$('#diferencia_usd').attr('type', 'hidden');
	document.getElementById("lbltotal_diferencia_usd").style.display = 'none';

	$('#total_cobro_tc_usd').attr('type', 'hidden');
	document.getElementById("lbltotal_cobro_tc_usd").style.display = 'none';

	$('#total_descuento_usd').attr('type', 'hidden');
	document.getElementById("lbltotal_descuento_usd").style.display = 'none';

	$('#cargo_tc_usd').attr('type', 'hidden');
	document.getElementById("lblcargo_tc_usd").style.display = 'none';

	$('#utilidad_usd').attr('type', 'hidden');
	document.getElementById("lblutilidad_usd").style.display = 'none';

	$('#cargo_remesa_usd').attr('type', 'hidden');
	document.getElementById("lblcargo_remesa_usd").style.display = 'none';

	$('#rowcargo_tc_usd').attr('type', 'hidden');
	$('#rowutilidad_usd').attr('type', 'hidden');	
	$('#rowcargo_remesa_usd').attr('type', 'hidden');	
	$('#rowcargo_tc_usd').attr('type', 'hidden');
	$('#rowtotal_descuento_usd').attr('type', 'hidden');
	$('#rowtotal_cobro_tc_usd').attr('type', 'hidden');	
	$('#rowdiferencia_usd').attr('type', 'hidden');
	$('#rowtotal_fee_usd').attr('type', 'hidden');
	$('#rowtotal_comag_usd').attr('type', 'hidden');

	
}

function verUSD() 

{
	console.log('verUSD');

	$('#total_comag_usd').attr('type', 'input' );
	document.getElementById("lbltotal_comag_usd").style.display = 'block';

	$('#total_fee_usd').attr('type', 'input' );
	document.getElementById("lbltotal_fee_usd").style.display = 'block';

	$('#diferencia_usd').attr('type', 'input' );
	document.getElementById("lbltotal_diferencia_usd").style.display = 'block';

	$('#total_cobro_tc_usd').attr('type', 'input' );
	document.getElementById("lbltotal_cobro_tc_usd").style.display = 'block';

	$('#total_descuento_usd').attr('type', 'input' );
	document.getElementById("lbltotal_descuento_usd").style.display = 'block';

	$('#cargo_tc_usd').attr('type', 'input' );
	document.getElementById("lblcargo_tc_usd").style.display = 'block';

	$('#utilidad_usd').attr('type', 'input' );
	document.getElementById("lblutilidad_usd").style.display = 'block';

	$('#cargo_remesa_usd').attr('type', 'input' );
	document.getElementById("lblcargo_remesa_usd").style.display = 'block';



	$('#total_comag_clp').attr('type', 'hidden');
	document.getElementById("lbltotal_comag_clp").style.display = 'none'; 

	$('#total_fee_clp').attr('type', 'hidden');	
	document.getElementById("lbltotal_fee_clp").style.display = 'none'; 

	$('#diferencia_clp').attr('type', 'hidden');
	document.getElementById("lbltotal_diferencia_clp").style.display = 'none';

	$('#total_cobro_tc_clp').attr('type', 'hidden');
	document.getElementById("lbltotal_cobro_tc_clp").style.display = 'none';

	$('#total_descuento_clp').attr('type', 'hidden');
	document.getElementById("lbltotaldescuento_clp").style.display = 'none';

	$('#cargo_tc_clp').attr('type', 'hidden');
	document.getElementById("lblcargo_tc_clp").style.display = 'none';

	$('#cargo_remesa_clp').attr('type', 'hidden');
	document.getElementById("lblcargo_remesa_clp").style.display = 'none';

	$('#utilidad_clp').attr('type', 'hidden');
	document.getElementById("lblutilidad_clp").style.display = 'none';

	$('#cargo_remesa_clp').attr('type', 'hidden');
	document.getElementById("lblcargo_remesa_clp").style.display = 'none';



	$('#rowcargo_tc_clp').attr('type', 'hidden');
	$('#rowutilidad_clp').attr('type', 'hidden');	
	$('#rowcargo_remesa_clp').attr('type', 'hidden');	
	$('#rowcargo_tc_clp').attr('type', 'hidden');
	$('#rowtotal_descuento_clp').attr('type', 'hidden');
	$('#rowtotal_cobro_tc_clp').attr('type', 'hidden');	
	$('#rowdiferencia_clp').attr('type', 'hidden');
	$('#rowtotal_fee_clp').attr('type', 'hidden');
	$('#rowtotal_comag_clp').attr('type', 'hidden');

};