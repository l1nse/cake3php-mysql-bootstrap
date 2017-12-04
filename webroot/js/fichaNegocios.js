$(document).ready(function() {

	actualizarTabla();
	//actualizarFicha();
	//afecta();
	//ficha_total_clp();
	//ficha_total_usd();
	verCLP();	
	//utilidad_bruto();
	//ficha_total_clp()


	var fp = $('#forma_pago').val();
	if(fp == 4 || fp == 5)
	{
		//agregar_cargo();
		//agregar_cargo_usd();	
		//ficha_total_clp();
		//ficha_total_usd();
		//utilidad_bruto();
		//ficha_total_clp()
	}
	
	
	$("#btn_aprobar").click(function(event) {
		var id_ficha = $('#ficha_id').val();		
		$('#id_ficha2').val(id_ficha);			

		$("#labelmodalaprobar").html('<h3> Aprobar ficha nº '+ id_ficha+'</h3>');
		$("#labelbodyaprobar").html('<h3> Esta seguro de aprobar la ficha nº'+id_ficha+'</h3>');
		
		$("#modalAprobarFicha").modal('show');
		$('#id_ficha2').val(id_ficha);
	});

	$('#btn_aprobar2').click(function(event) {
		var id_ficha = $('#ficha_id').val();
		var comentario = $('#comentarios').val();
		//console.log(id_ficha);

		var url = siteurl+"ficha-negocios/enviar-aprobar";

		$.ajax({
		url: url,
		dataType: "json",
		method: "POST",
		data: {id_ficha : id_ficha, comentario : comentario}
		}).done(function(json){		
			if(json.result){
				$("#modalAprobarFicha").modal('hide');
				window.location.href = siteurl+"ficha-negocios/index"		      	
			}
		}) 
		
	});

	$('#btn_control').click(function(event) {
		//console.log("btncontrol")
		var id_ficha = $('#ficha_id').val();			
		$('#id_ficha2').val(id_ficha);			
		$("#labelmodalaprobar").html('<h3> Aprobar ficha nº '+ id_ficha+'</h3>');
		$("#labelbodyaprobar").html('<h3> Esta seguro de enviar la ficha a control</h3>');
		
		$("#modalAprobarFicha").modal('show');
		$('#id_ficha2').val(id_ficha);

	});

	$('#btn_control2').click(function(event) {
		var id_ficha = $('#ficha_id').val();
		var comentario = $('#comentarios').val();
		console.log(id_ficha);

		var url = siteurl+"ficha-negocios/enviarControl";

		$.ajax({
		url: url,
		dataType: "json",
		method: "POST",
		data: {id_ficha : id_ficha, comentario : comentario}
		}).done(function(json){		
			if(json.result){
				$("#modalAprobarFicha").modal('hide');
				window.location.href = siteurl+"ficha-negocios/index"		      	
			}
		}) 
		
	});

	$('#btn_contabilidad').click(function(event) {
		//console.log("btncontrol")
		var id_ficha = $('#ficha_id').val();			
		$('#id_ficha2').val(id_ficha);			
		$("#labelmodalaprobar").html('<h3> Aprobar ficha nº '+ id_ficha+'</h3>');
		$("#labelbodyaprobar").html('<h3> Esta seguro de enviar la ficha a contabilidad</h3>');
		
		$("#modalAprobarFicha").modal('show');
		$('#id_ficha2').val(id_ficha);

	});

		$('#btn_contabilidad2 ').click(function(event) {
		var id_ficha = $('#ficha_id').val();
		var comentario = $('#comentarios').val();
		console.log(id_ficha);

		var url = siteurl+"ficha-negocios/enviarContabilidad";

		$.ajax({
		url: url,
		dataType: "json",
		method: "POST",
		data: {id_ficha : id_ficha, comentario : comentario}
		}).done(function(json){		
			if(json.result){
				$("#modalAprobarFicha").modal('hide');
				window.location.href = siteurl+"ficha-negocios/index"		      	
			}
		}) 
		
	});

	$('#btn_rechazar').click(function(event) {
		
		var id_ficha = $('#ficha_id').val();			
		console.log("idficha = "+ id_ficha);
		$('#id_ficha2').val(id_ficha);			
		
		$("#labelmodalrechazar").html('<h3> rechazar ficha nº '+ id_ficha+'</h3>');
		$("#labelbodyrechazar").html('<h3> Esta seguro de rechazar la ficha'+id_ficha+' </h3>');
		
		$("#modalRechazarFicha").modal('show');
		

	});

	$('#btn_rechazar_ficha2').click(function(event) {

		var id_ficha = $('#ficha_id').val();
		var comentario = $('#observacionrechazo').val();
		console.log(id_ficha);

		var url = siteurl+"ficha-negocios/rechazarFicha";

		$.ajax({
		url: url,
		dataType: "json",
		method: "POST",
		data: {id_ficha : id_ficha, comentario : comentario}
		}).done(function(json){		
			if(json.result){
				$("#modalAprobarFicha").modal('hide');
				window.location.href = siteurl+"ficha-negocios/index"		      	
			}
		}) 
		
	});


 	$("#btn_proveedor").click(function(event) {
 		verservicioclp();
 		$("#tipo_servicio").select2().val('').trigger('change');
		$("#condicion_pago").select2().val('').trigger('change');
		$("#proveedore_id").select2().val('').trigger('change');
		$("#valor_neto_usd").val('');
		$("#valor_neto").val('');
		$("#valor_neto_land_clp").val('');
		$("#valor_neto_land_usd").val('');
		$("#forma_pago").select2().val('').trigger('change');
		$("#iva_land_usd").val('');
		$("#comag_procentaje").val('');
		$("#comag_pesos").val('');
		$("#comag_usd").val('');
		$("#iva_porcentaje").val('19%');
		$("#iva_pesos").val('');
		$("#iva_usd").val('');
		$("#over_porcentaje").val('');
		$("#over_pesos").val('');
		$("#over_usd").val('');
		$("#amex_porcentaje").val('');
		$("#amex_pesos").val('');
		$("#amex_usd").val('');
		$("#boleta_honorario_porcentaje").val('10%');
		$("#boleta_honorario_pesos").val('');
		$("#boleta_honorario_usd").val('');
		$("#neto_comag_pesos").val('');
		$("#neto_comag_usd").val('');
		$("#tax_clp").val('');
		$("#tax_usd").val('');
		$('#total_clp').val('');
		$('#total_usd').val('');
		$('#total_contabilidad_pesos').val('');
		$('#total_contabilidad_usd').val('');
		$("#ficha_id").val('');
		$("#iva_land_pesos").val('');
		$("#iva_land_tipo").select2().val('').trigger('change');
 		$("#myProveedor").modal('show'); 		

 		
 	});

 	

 	$("input[name=menu]").change(function(event) {
		var menu  = $(this).val();
		console.log("Menu principal " + menu);
		if(menu == 1)
		{
			verCLP();	
			
		}
		if(menu == 2)
		{
			verUSD();	
			
		}
		
 	});

 	$("input[name=menuservicio]").change(function(event) {
		var menu = $(this).val();
		console.log("menuservicio = " + menu);
		if(menu == 1)
		{
			verservicioclp();	
			valor_neto();
			iva_pesos();			 		
		 	neto_comag();
		 	total_contabilidad_pesos();
		}
		if(menu == 2)
		{
			verserviciousd();	
			iva_pesos();			 		
		 	neto_comag();
		 	total_contabilidad_usd();
		}
		
 	});

 	$("input[name=menuutilidad]").change(function(event) {
		var menu = $(this).val();
		console.log("menu utilidad : "+menu);
		if(menu == 1)
		{
			//verutilidadclp();	
		}
		if(menu == 2)
		{
			//verutilidadusd();	
		}
		
 	});

	

 	
	
 	 $("#tipo_de_venta_land").change(function(event) {
 	 	
		//afecta();
		//ficha_total_clp();
		//ficha_total_usd();
		//utilidad_bruto()
		

 	 });

	 $("#cliente_ficha_id").change(function(event) {

	// console.log("estoy en el js ");
		var cliente_id = $('#contacto_cliente_id').val();
		var cliente_ficha_id   = $("#cliente_ficha_id").val();		
		var ficha_id = $('#ficha_id').val();

		//console.log(cliente_ficha_id);
		var url = siteurl+"ficha-negocios/load_contactos";

		$.ajax({
		url: url,
		dataType: "json",
		method: "POST",
		data: {cliente_id : cliente_id , cliente_ficha_id : cliente_ficha_id, ficha_id : ficha_id}
		}).done(function(json){


		if(json.result){
		   //console.log(json.contacto_email);
		
		    $("#contacto_cliente_id").html(json.html).select2().val();
		    $("#cliente_rut").val(json.rs_rut);
		    $("#cliente_direccion").val(json.rs_direccion);
		    $("#giro").val(json.rs_giro);
		    $("#fono_contacto").val(json.contacto_fono);
		    $("#email_contacto").val(json.contacto_email);    
		    

		} // fin if(json.result)

	})// fin .done(function(json)



	}).trigger('change');// fin function

	  $("#forma_pago").change(function(event) {

	// console.log("estoy en el js ");
		
		var forma_pago = $('#forma_pago').val();
				
		
		
		if( forma_pago == '4' || forma_pago == '5')
		{
				
			//agregar_cargo();
			//agregar_cargo_usd();
			//ficha_total_clp();
			//ficha_total_usd();
			//utilidad_bruto()

		}else
		{
			$('#cargo_tarifa_clp').val('')
			$('#cargo_tarifa_usd').val('')
			//ficha_total_clp();
			//ficha_total_usd();
			//utilidad_bruto()
		}

	}).trigger('change');// fin function



	 $("#contacto_cliente_id").change(function(event) {

	    //console.log("estoy en el js ");
		var contacto_id = $('#contacto_cliente_id').val();
		//var cliente_ficha_id   = $("#cliente_ficha_id").val();

		//console.log(contacto_id);
		var url = siteurl+"ficha-negocios/load_cobranza";
		

		$.ajax({
		url: url,
		dataType: "json",
		method: "POST",
		data: {contacto_id : contacto_id }
		}).done(function(json){


		if(json.result){
		
		//(console.log(json.contacto_fono);
		
		$("#fono_contacto").val(json.contacto_fono);
		$("#email_contacto").val(json.contacto_email);

		} 

	})


	}).trigger('change');// fin function


 	 	
 	//fin eventos ficha

 	//evento modal agregar y editar proveedor
 	$("#condicion_pago").change(function(event) {

 		
 			contraboleta();
 			total_clp();
			total_usd();
			//total_contabilidad_pesos();
			//total_contabilidad_usd();
			//utilidad_bruto();
			//ficha_total_clp()

 		
 	});

 	$("#condicion_pago2").change(function(event) {

 		
 			//contraboleta2();
 			//total_clp2();
			//total_usd2();
			//total_contabilidad_pesos2();
			//total_contabilidad_usd2();
			//utilidad_bruto();
			//ficha_total_clp()
 		
 	});

	$("#iva_land_tipo").change(function(event) {

 			iva_land();
 			total_clp();
 			total_contabilidad_pesos();
			total_usd();			
			total_contabilidad_usd();

			//utilidad_bruto();
			//ficha_total_clp()
 		
 	});	

 	$("#iva_land_tipo2").change(function(event) {

 			//iva_land2();
 			//total_clp2();
			//total_usd2();
			//total_contabilidad_pesos2();
			//total_contabilidad_usd2();
			//utilidad_bruto();
			//ficha_total_clp()
 		
 	});

	$("#tipo_servicio2").change(function(event) {
		
		var servicio = $("#tipo_servicio2").val();
		
		
			if(servicio == "1")
			{	
				//console.log(servicio);			
				

				$('#valor_neto_land_clp2').attr('disabled' , true);	
				$("#valor_neto_land_clp2").val('');
				$('#valor_neto_land_usd2').attr('disabled' , true);
				$("#valor_neto_land_usd2").val('');

				$('#iva_land_pesos2').attr('disabled' , true);
				$("#iva_land_pesos2").val('');

				$('#iva_land_usd2').attr('disabled' , true);
				$("#iva_land_usd2").val('');


				$('#iva_land_tipo2').attr('disabled' , true);
				$("#iva_land_tipo2").select2().val('').trigger('change');


				$("#valor_neto2").attr('disabled', false);			
				$("#valor_neto_usd2").attr('disabled', false);		
				$("#tax_clp2").attr('disabled', false);			
				$("#tax_usd2").attr('disabled', false);
				$("#over_porcentaje2").attr('disabled', false);			


				$('#total_clp2').val('')
				// total_clp();
				// utilidad_bruto();
				// ficha_total_clp()
				// $('#total_usd2').val('')
				// total_usd();
				// utilidad_bruto();
				// ficha_total_clp()

				$('#total_contabilidad_pesos2').val('')
				// total_contabilidad_pesos2();
				$('#total_contabilidad_usd2').val('')
				// total_contabilidad_usd2();

				// comag_procentaje2();
				// amex_porcentaje2();
				// contraboleta2();

				

				
			}

			if(servicio == "2" || servicio == "3")
			{
				//console.log(servicio);				

				$("#valor_neto2").attr('disabled', true);			
				$("#valor_neto2").val('');		

				$('#valor_neto_usd2').attr('disabled' , true);
				$("#valor_neto_usd2").val('');

				$('#tax_clp2').attr('disabled' , true);
				$("#tax_clp2").val('');

				$('#tax_usd2').attr('disabled' , true);
				$("#tax_usd2").val('');

				$('#over_porcentaje2').attr('disabled' , true);
				$("#over_porcentaje2").val('');

				$('#over_pesos2').attr('disabled' , true);
				$("#over_pesos2").val('');

				$('#over_usd2').attr('disabled' , true);
				$("#over_usd2").val('');

				$("#valor_neto_land_clp2").attr('disabled' , false);
				$("#valor_neto_land_usd2").attr('disabled' , false);
				$("#iva_land_pesos2").attr('disabled');
				$("#iva_land_usd2").attr('disabled' , false);
				$("#iva_land_tipo2").attr('disabled' , false);	
				$('#amex_porcentaje2').attr('disabled' , false);
				

				$('#total_clp2').val('')
				// total_clp();
				// utilidad_bruto();
				// ficha_total_clp()
				$('#total_usd2').val('')
				// total_usd();
				// utilidad_bruto();
				// ficha_total_clp()
				

				$('#total_contabilidad_pesos2').val('')
				// total_contabilidad_pesos();
				$('#total_contabilidad_usd2').val('')
				// total_contabilidad_usd();

				// comag_procentaje();
				// comag_procentaje2()
				// amex_porcentaje();
				// contraboleta();
				
			}
		
	});
	

	$("#tipo_servicio").change(function(event) {
		
		$("#tipo_servicio").attr('required' , true);
		var servicio = $("#tipo_servicio").val();
		
			
			if(servicio == "1")
			{	
				//console.log(servicio);			


				$('#valor_neto_land_clp').attr('disabled' , true);	
				$("#valor_neto_land_clp").val('');
				$('#valor_neto_land_usd').attr('disabled' , true);
				$("#valor_neto_land_usd").val('');

				$('#iva_land_pesos').attr('disabled' , true);
				$("#iva_land_pesos").val('');

				$('#iva_land_usd').attr('disabled' , true);
				$("#iva_land_usd").val('');


				$('#iva_land_tipo').attr('disabled' , true);
				$("#iva_land_tipo").select2().val('').trigger('change');

				$("#valor_neto").attr('disabled', false);			
				$("#valor_neto_usd").attr('disabled', false);		
				$("#tax_clp").attr('disabled', false);			
				$("#tax_usd").attr('disabled', false);
				$("#over_porcentaje").attr('disabled', false);			


				$('#total_clp').val('')
				// total_clp();
				// utilidad_bruto();
				// ficha_total_clp()
				$('#total_usd').val('')
				//total_usd();
				// utilidad_bruto();
				// ficha_total_clp()

				$('#total_contabilidad_pesos').val('')
				// total_contabilidad_pesos();
				$('#total_contabilidad_usd').val('')
				// total_contabilidad_usd();

				//comag_procentaje2()
				//amex_porcentaje();
				//contraboleta()
				comag_procentaje();
				

				
			}

			if(servicio == "2" || servicio == "3")
			{
				//console.log(servicio);				

				$("#valor_neto").attr('disabled', true);			
				$("#valor_neto").val('');		

				$('#valor_neto_usd').attr('disabled' , true);
				$("#valor_neto_usd").val('');

				$('#tax_clp').attr('disabled' , true);
				$("#tax_clp").val('');

				$('#tax_usd').attr('disabled' , true);
				$("#tax_usd").val('');

				$('#over_porcentaje').attr('disabled' , true);
				$("#over_porcentaje").val('');

				$('#over_pesos').attr('disabled' , true);
				$("#over_pesos").val('');

				$('#over_usd').attr('disabled' , true);
				$("#over_usd").val('');

				$("#valor_neto_land_clp").attr('disabled' , false);
				$("#valor_neto_land_usd").attr('disabled' , false);
				$("#iva_land_pesos").attr('disabled');
				$("#iva_land_usd").attr('disabled' , false);
				$("#iva_land_tipo").attr('disabled' , false);	
				$('#amex_porcentaje').attr('disabled' , false);
				

				$('#total_clp').val('')
				//total_clp();
				//utilidad_bruto();
				//ficha_total_clp()
				$('#total_usd').val('')
				//total_usd();
				//utilidad_bruto();
				//ficha_total_clp()
				

				$('#total_contabilidad_pesos').val('')
				//total_contabilidad_pesos();
				$('#total_contabilidad_usd').val('')
				//total_contabilidad_usd();

				//comag_procentaje();
				//comag_procentaje2()
				//amex_porcentaje();
				//contraboleta();

				comag_procentaje();
				
				
			}

	});

	//Fin eventos modal


	$("#btn_agregar_servicio").click(function(event)  {

		//console.log('en el boton'); 
		var tipo_servicio =  $("#tipo_servicio").val();
		var condicion_pago = $("#condicion_pago").val();
		var proveedore_id = $("#proveedore_id").val();
		var valor_neto_usd = $("#valor_neto_usd").val();
		var valor_neto = $("#valor_neto").val();
		var valor_neto_land_clp = $("#valor_neto_land_clp").val();
		var valor_neto_land_usd = $("#valor_neto_land_usd").val();
		var forma_pago = $("#forma_pago").val();
		var iva_land_usd = $("#iva_land_usd").val();
		var comag_procentaje = $("#comag_procentaje").val();
		var comag_pesos = $("#comag_pesos").val();
		var comag_usd = $("#comag_usd").val();
		var iva_porcentaje = $("#iva_porcentaje").val();
		var iva_pesos = $("#iva_pesos").val();
		var iva_usd = $("#iva_usd").val();
		var over_porcentaje = $("#over_porcentaje").val();
		var over_pesos = $("#over_pesos").val();
		var over_usd = $("#over_usd").val();
		var amex_porcentaje = $("#amex_porcentaje").val();
		var amex_pesos = $("#amex_pesos").val()
		var amex_usd = $("#amex_usd").val()
		var boleta_honorario_porcentaje = $("#boleta_honorario_porcentaje").val()
		var boleta_honorario_pesos = $("#boleta_honorario_clp").val()
		var boleta_honorario_usd = $("#boleta_honorario_usd").val()
		var neto_comag_pesos = $("#neto_comag_pesos").val()
		var neto_comag_usd = $("#neto_comag_usd").val()
		var tax_clp = $("#tax_clp").val()
		var tax_usd = $("#tax_usd").val()
		var total_clp = $('#total_clp').val()
		var total_usd = $('#total_usd').val()
		var total_contabilidad_pesos = $('#total_contabilidad_pesos').val()
		var total_contabilidad_usd = $('#total_contabilidad_usd').val()
		var ficha_id = $("#id_ficha").val()
		var iva_land_pesos = $("#iva_land_pesos").val()
		var iva_land_tipo = $("#iva_land_tipo").val()

		

		if(tipo_servicio==''){
			mostrarAlerta('Debe seleccionar un tipo de servicio!', 'error');
			return false;
		}


		if(proveedore_id==''){
			mostrarAlerta('Debe seleccionar el proveedor!', 'error');
			return false;
		}

		if(condicion_pago==''){
			mostrarAlerta('Debe seleccionar una condicion de pago!', 'error');
			return false;
		}

		if(tipo_servicio == 1)
		{

			if(valor_neto == '')
			{
				mostrarAlerta('Debe ingresar un valor neto!', 'error');
				return false;	
			}

			if(valor_neto_usd ==  '')
			{
				mostrarAlerta('Debe ingresar un valor neto!', 'error');
				return false;	
			}

			if(tax_clp ==  '')
			{
				mostrarAlerta('Debe ingresar un valor tax!', 'error');
				return false;	
			}

			if(tax_usd ==  '')
			{
				mostrarAlerta('Debe ingresar un valor tax!', 'error');
				return false;	
			}
			
		}
		if(tipo_servicio == 2 || tipo_servicio == 3 )
		{
			if(valor_neto_land_clp ==  '')
			{
				mostrarAlerta('Debe ingresar un valor neto land!', 'error');
				return false;	
			}
			if(valor_neto_land_usd ==  '')
			{
				mostrarAlerta('Debe ingresar un valor neto land!', 'error');
				return false;	
			}
			if(iva_land_tipo ==  '')
			{
				mostrarAlerta('Debe seleccionar un tipo iva land!', 'error');
				return false;	
			}
		}

		var url = siteurl+"ficha-negocios/addServicio";

		$.ajax({
        url: url,
        dataType: "json",
        method: "POST",
        data: {tipo_servicio : tipo_servicio , condicion_pago : condicion_pago , proveedore_id : proveedore_id , valor_neto_usd , valor_neto_usd
        ,  valor_neto : valor_neto , valor_neto_land_clp : valor_neto_land_clp , valor_neto_land_usd : valor_neto_land_usd , forma_pago : forma_pago ,
        iva_land_usd : iva_land_usd , comag_procentaje : comag_procentaje , comag_pesos : comag_pesos , comag_usd : comag_usd , over_porcentaje : over_porcentaje,
 		over_pesos : over_pesos , over_usd : over_usd , amex_porcentaje : amex_porcentaje , amex_pesos : amex_pesos , amex_usd : amex_usd , 
 		boleta_honorario_porcentaje : boleta_honorario_porcentaje , boleta_honorario_pesos : boleta_honorario_pesos , boleta_honorario_usd : boleta_honorario_usd,
 		neto_comag_pesos : neto_comag_pesos , neto_comag_usd : neto_comag_usd ,  tax_usd : tax_usd , tax_clp : tax_clp, ficha_id : ficha_id , 
 		total_contabilidad_pesos : total_contabilidad_pesos, total_contabilidad_usd : total_contabilidad_usd , total_usd : total_usd , total_clp : total_clp
 		, iva_land_pesos : iva_land_pesos , iva_land_tipo : iva_land_tipo , iva_porcentaje : iva_porcentaje , iva_pesos : iva_pesos , iva_usd : iva_usd}

      }).done(function(json) {
      	//console.log("estyoy en el doneº");	
        if(json.result){			
          $("#myProveedor").modal("hide");
          actualizarTabla();
          console.log("Servicio agregado");


          //valor_bruto_tkt();
          //console.log("paso valor bruto");
          //actualizarTabla();
          //console.log("acualizar Ficha")	
          //actualizarFicha();
          //afecta();
          //console.log("ficha total clp");
          //ficha_total_clp();

          //ficha_total_usd();
          //utilidad_bruto();
          //ficha_total_clp()
          //actualizarTabla();
		  //utilidad_bruto();
		  //ficha_total_clp()
		  //valor_bruto_tkt();
		  //actualizarFicha();

	      
          //window.location = window.location;
          
        }
      });
	});

	$("#btn_guardar_servicio").click(function(event)  {

			//console.log('en el boton2'); 
			
			var id_servicio2 =  $("#id_servicio2").val();
			//console.log(id_servicio2)
			var tipo_servicio =  $("#tipo_servicio2").val();
			var condicion_pago = $("#condicion_pago2").val();
			var proveedore_id = $("#proveedore_id2").val();
			var valor_neto_usd = $("#valor_neto_usd2").val();
			var valor_neto = $("#valor_neto2").val();
			var valor_neto_land_clp = $("#valor_neto_land_clp2").val();
			var valor_neto_land_usd = $("#valor_neto_land_usd2").val();
			var forma_pago = $("#forma_pago2").val();
			var iva_land_usd = $("#iva_land_usd2").val();
			var comag_procentaje = $("#comag_procentaje2").val();
			var comag_pesos = $("#comag_pesos2").val();
			var comag_usd = $("#comag_usd2").val();
			var iva_porcentaje = $("#iva_porcentaje2").val();
			var iva_pesos = $("#iva_pesos2").val();
			var iva_usd = $("#iva_usd2").val();
			var over_porcentaje = $("#over_porcentaje2").val();
			var over_pesos = $("#over_pesos2").val();
			var over_usd = $("#over_usd2").val();
			var amex_porcentaje = $("#amex_porcentaje2").val();
			var amex_pesos = $("#amex_pesos2").val()
			var amex_usd = $("#amex_usd2").val()
			var boleta_honorario_porcentaje = $("#boleta_honorario_porcentaje2").val()
			var boleta_honorario_pesos = $("#boleta_honorario_pesos2").val()
			var boleta_honorario_usd = $("#boleta_honorario_usd2").val()
			var neto_comag_pesos = $("#neto_comag_pesos2").val()
			var neto_comag_usd = $("#neto_comag_usd2").val()
			var tax_clp = $("#tax_clp2").val()
			var tax_usd = $("#tax_usd2").val()
			var total_clp = $('#total_clp2').val()
			var total_usd = $('#total_usd2').val()
			var total_contabilidad_pesos = $('#total_contabilidad_pesos2').val()
			var total_contabilidad_usd = $('#total_contabilidad_usd2').val()
			var ficha_id = $("#ficha_id2").val()
			var iva_land_pesos = $("#iva_land_pesos2").val()
			var iva_land_tipo = $("#iva_land_tipo2").val()

			var url = siteurl+"ficha-negocios/guardar-servicio";

			if(tipo_servicio==''){
				mostrarAlerta('Debe seleccionar un tipo de servicio!', 'error');
				return false;
			}


			if(proveedore_id==''){
				mostrarAlerta('Debe seleccionar el proveedor!', 'error');
				return false;
			}

			if(condicion_pago==''){
				mostrarAlerta('Debe seleccionar una condicion de pago!', 'error');
				return false;
			}

			if(tipo_servicio == 1)
			{

				if(valor_neto == '')
				{
					mostrarAlerta('Debe ingresar un valor neto!', 'error');
					return false;	
				}

				if(valor_neto_usd ==  '')
				{
					mostrarAlerta('Debe ingresar un valor neto!', 'error');
					return false;	
				}

				if(tax_clp ==  '')
				{
					mostrarAlerta('Debe ingresar un valor tax!', 'error');
					return false;	
				}

				if(tax_usd ==  '')
				{
					mostrarAlerta('Debe ingresar un valor tax!', 'error');
					return false;	
				}
				
			}
			if(tipo_servicio == 2 || tipo_servicio == 3 )
			{
				if(valor_neto_land_clp ==  '')
				{
					mostrarAlerta('Debe ingresar un valor neto land!', 'error');
					return false;	
				}
				if(valor_neto_land_usd ==  '')
				{
					mostrarAlerta('Debe ingresar un valor neto land!', 'error');
					return false;	
				}
				if(iva_land_tipo ==  '')
				{
					mostrarAlerta('Debe seleccionar un tipo iva land!', 'error');
					return false;	
				}
			}


			$.ajax({
	        url: url,
	        dataType: "json",
	        method: "POST",
	        data: {tipo_servicio : tipo_servicio , condicion_pago : condicion_pago , proveedore_id : proveedore_id , valor_neto_usd , valor_neto_usd
	        ,  valor_neto : valor_neto , valor_neto_land_clp : valor_neto_land_clp , valor_neto_land_usd : valor_neto_land_usd , forma_pago : forma_pago ,
	        iva_land_usd : iva_land_usd , comag_procentaje : comag_procentaje , comag_pesos : comag_pesos , comag_usd : comag_usd , over_porcentaje : over_porcentaje,
	 		over_pesos : over_pesos , over_usd : over_usd , amex_porcentaje : amex_porcentaje , amex_pesos : amex_pesos , amex_usd : amex_usd , 
	 		boleta_honorario_porcentaje : boleta_honorario_porcentaje , boleta_honorario_pesos : boleta_honorario_pesos , boleta_honorario_usd : boleta_honorario_usd,
	 		neto_comag_pesos : neto_comag_pesos , neto_comag_usd : neto_comag_usd ,  tax_usd : tax_usd , tax_clp : tax_clp, ficha_id : ficha_id , 
	 		total_contabilidad_pesos : total_contabilidad_pesos, total_contabilidad_usd : total_contabilidad_usd , total_usd : total_usd , total_clp : total_clp
	 		, iva_land_pesos : iva_land_pesos , iva_land_tipo : iva_land_tipo , iva_porcentaje : iva_porcentaje , iva_pesos : iva_pesos , iva_usd : iva_usd ,id_servicio2 : id_servicio2}

	      }).done(function(json) {
	      	//console.log("estyoy en el doneº");	
	        if(json.result){			
	          $("#myProveedor").modal("hide");
	          $("#modalEditProveedor").modal("hide");
	          //actualizarTabla();
	          //actualizarFicha();
	          //afecta();
	          //ficha_total_clp();
          	  //ficha_total_usd();
          	  //utilidad_bruto();
          	  //ficha_total_clp()
          	  //valor_bruto_tkt();

	         // console.log("estyoy en el result");
	          //window.location = window.location;
	          //llamar funcion acualizar tabla
	          
	        }
	      });
		});


});

function valor_neto()
 {

 	var servicio = $("#tipo_servicio").val();
 	var valor_neto = $("#valor_neto").val();
 	var precio_dolar = $("#precio_dolar").val();

 	if(valor_neto != '')
 	{
 		var valor_dolar = (parseFloat(valor_neto)/parseFloat(precio_dolar));
 			valor_dolar = valor_dolar.toFixed(2);

 		if(!isNaN(valor_dolar))
	 	{
	 		console.log("valor dolar :"+valor_dolar);
	 		$("#valor_neto_usd").val(valor_dolar);
			comag_procentaje(); 	
			over_porcentaje();
			amex_porcentaje();
		 	contraboleta();
		 	total_clp();
		 	total_contabilidad_pesos();
		 	//comag_procentaje2()
		 	
		 	//neto_comag()	
		 	
	 	}
	 }else
	 {
	 		$("#valor_neto_usd").val('');	 		
		 	comag_procentaje();
		 	over_porcentaje();
		 	amex_porcentaje();
		 	contraboleta();
		 	total_clp();
		 	//comag_procentaje2()
		 	//over_porcentaje()
		 	//neto_comag()	
		 	//amex_porcentaje()
		 	//contraboleta()
		 	
	 }

	 
		 	if(servicio == 1)
		 	{
		 		//total_clp();
		 		//utilidad_bruto();
		 		//ficha_total_clp()

		 	}
	//total_contabilidad_pesos();	 	
	//total_contabilidad_usd() 	
 } 

function valor_neto2()
 {

 	var servicio = $("#tipo_servicio2").val();
 	var valor_neto = $("#valor_neto2").val();
 	var precio_dolar = $("#precio_dolar2").val();


 	var valor_dolar = (parseFloat(valor_neto)/parseFloat(precio_dolar));
 	valor_dolar = valor_dolar.toFixed(2);

 	if(valor_neto != '')
 	{
 		if(!isNaN(valor_dolar))
	 	{
	 		$("#valor_neto_usd2").val(valor_dolar);
		 	//comag_procentaje2();
		 	//over_porcentaje2()
		 	//neto_comag2()	
		 	//amex_porcentaje2()
		 	//contraboleta2()
	 	}
	 }else
	 {
	 		$("#valor_neto_usd2").val('');
		 	//comag_procentaje2();
		 	//over_porcentaje2()
		 	//neto_comag2()	
		 	//amex_porcentaje2()
		 	//contraboleta2()
		 	
	 }

	 var servicio = $("#tipo_servicio2").val();
		 	if(servicio == 1)
		 	{
		 		total_clp2();
		 	}
	total_contabilidad_pesos2();	 	
	total_contabilidad_usd2() 	
 } 


function valor_neto_usd(){
 	var valor_neto_usd = $("#valor_neto_usd").val();
 	var precio_dolar = $("#precio_dolar").val();

 	var valor_neto = (parseFloat(valor_neto_usd)*parseFloat(precio_dolar));
 	valor_neto = valor_neto.toFixed(2);

 	if(valor_neto_usd != '')
 	{
 		 	if(!isNaN(valor_neto))
 		 	{
 		 		$("#valor_neto").val(valor_neto);
 		 		
 		 		neto_comag();
 			 	comag_procentaje();
 			 	over_porcentaje();
 			 	amex_porcentaje();
 			 	total_usd();
 			 	total_contabilidad_usd();
 			 	
 			 	//comag_procentaje2()
 			 	//over_porcentaje()
 			 	//neto_comag()
 			 	//amex_porcentaje()
 			 	//contraboleta()
 		 	}	
 	}else
 	{
 			$("#valor_neto").val('');
 			 	comag_procentaje();
 			 	neto_comag();
 			 	over_porcentaje();
 			 	amex_porcentaje();
 			 	total_usd();
 			 	total_contabilidad_usd();
 			 	
 			 	//comag_procentaje2()
 			 	//over_porcentaje()
 			 	
 			 	//amex_porcentaje()
 			 	//contraboleta()
 	}
 	
 	var servicio = $("#tipo_servicio").val();
		 	if(servicio == 1)
		 	{
		 		//total_usd();
		 	}
	//total_contabilidad_usd()
	//total_contabilidad_pesos();	 	
 }
function valor_neto_usd2(){
 	var valor_neto_usd = $("#valor_neto_usd2").val();
 	var precio_dolar = $("#precio_dolar2").val();

 	var valor_neto = (parseFloat(valor_neto_usd)*parseFloat(precio_dolar));
 	valor_neto = valor_neto.toFixed(2);

 	if(valor_neto_usd != '')
 	{
 		 	if(!isNaN(valor_neto))
 		 	{
 		 		$("#valor_neto2").val(valor_neto);
 			 	//comag_procentaje2();
 			 	//over_porcentaje2()
 			 	//neto_comag2()
 			 	//amex_porcentaje2()
 			 	//contraboleta2()
 		 	}	
 	}else
 	{
 			$("#valor_neto2").val('');
 			 	//comag_procentaje2();
 			 	//over_porcentaje2()
 			 	//neto_comag2()
 			 	//amex_porcentaje2()
 			 	//contraboleta2()
 	}
 	
 	var servicio = $("#tipo_servicio2").val();
		 	if(servicio == 1)
		 	{
		 		//total_usd2();
		 	}
	//total_contabilidad_usd2()
	//total_contabilidad_pesos2();	 	
 }


function valor_neto_land_clp(){

 	var servicio = $("#tipo_servicio").val();
 	var valor_neto_land_clp = $("#valor_neto_land_clp").val();
 	var precio_dolar = $("#precio_dolar").val();


 	var valor_neto_land_usd = (parseFloat(valor_neto_land_clp)/parseFloat(precio_dolar));
 	valor_neto_land_usd = valor_neto_land_usd.toFixed(2);
 	

 	if(valor_neto_land_clp != '')
 	{
 		if(!isNaN(valor_neto_land_usd))
	 	{
	 		//console.log('con algo')
	 		$("#valor_neto_land_usd").val(valor_neto_land_usd);
		 	comag_procentaje();		 	
		 	iva_land();
		 	contraboleta();
		 	amex_porcentaje();		 	
		 	total_clp();
		 	total_contabilidad_pesos();
		 	//comag_procentaje2()
		 	//neto_comag()	
		 	
		 	
		  	
		 	
	 	}
	 }else
	 {
	 	//console.log('vacio')
	 		$("#valor_neto_land_clp").val('');
		 	comag_procentaje();		
		 	iva_land();
		 	contraboleta();
		 	amex_porcentaje();
		 	total_clp();
		 	total_contabilidad_pesos();
		 	//comag_procentaje2() 	
		 	//neto_comag()	
		 	//iva_land()
		 	
		 	
		 	
	 }

	 var servicio = $("#tipo_servicio").val();
		 	if(servicio == 2 || 3)
		 	{
		 		//total_clp();
		 		//utilidad_bruto();
		 		//ficha_total_clp()
		 		//total_usd()
		 	}

		 	
	//total_contabilidad_pesos();	 	
	//total_contabilidad_usd() 	
 } 
function valor_neto_land_clp2(){

 	var servicio = $("#tipo_servicio2").val();
 	var valor_neto_land_clp = $("#valor_neto_land_clp2").val();
 	var precio_dolar = $("#precio_dolar2").val();


 	var valor_neto_land_usd = (parseFloat(valor_neto_land_clp)/parseFloat(precio_dolar));
 	valor_neto_land_usd = valor_neto_land_usd.toFixed(2);

 	//console.log(precio_dolar); 

 	if(valor_neto_land_clp != '')
 	{
 		if(!isNaN(valor_neto_land_usd))
	 	{
	 		$("#valor_neto_land_usd2").val(valor_neto_land_usd);
		 	//comag_procentaje2();		 	
		 	//neto_comag2()	
		 	//iva_land2()
		 	//amex_porcentaje2()
		 	//contraboleta2()
		 	
	 	}
	 }else
	 {
	 		$("#valor_neto_land_usd2").val('');
		 	//comag_procentaje2();		 	
		 	//neto_comag2()	
		 	//iva_land2()
		 	//amex_porcentaje2()
		 	//contraboleta2()
		 	
	 }

	 var servicio = $("#tipo_servicio2").val();
		 	if(servicio == 2 || 3)
		 	{
		 		//total_clp2();
		 		//total_usd2()
		 	}

		 	
	//total_contabilidad_pesos2();	 	
	//total_contabilidad_usd2() 	
 } 

function valor_neto_land_usd(){
 	var valor_neto_land_usd = $("#valor_neto_land_usd").val();
 	var precio_dolar = $("#precio_dolar").val();

 	var valor_neto_land_clp = (parseFloat(valor_neto_land_usd)*parseFloat(precio_dolar));
 	valor_neto_land_clp = valor_neto_land_clp.toFixed(2);

 	if(valor_neto_land_usd != '')
 	{
 		 	if(!isNaN(valor_neto_land_clp))
 		 	{
 		 		$("#valor_neto_land_clp").val(valor_neto_land_clp);
 		 		iva_land(); 		 		
 			 	comag_procentaje();
 			 	over_porcentaje()
 			 	amex_porcentaje();
 			 	contraboleta();
 			 	neto_comag();
 			 	total_usd();
 			 	total_contabilidad_usd(); 			 	 			 	
 			 	
 			 	
 			 	
 		 	}	
 	}else
 	{
 			$("#valor_neto_land_clp").val('');
 			 	iva_land();
 			 	comag_procentaje();
 			 	over_porcentaje()
 			 	amex_porcentaje();
 			 	contraboleta();
 			 	neto_comag();
 			 	total_usd();
 			 	total_contabilidad_usd(); 			 	 			 	

 	}
 	
 	var servicio = $("#tipo_servicio").val();
		 	if(servicio == 2 || servicio == 3)
		 	{
		 		//total_clp();
		 		//total_usd();
		 	}
		 	
	//total_contabilidad_usd()
	//total_contabilidad_pesos();	 	
 }
function valor_neto_land_usd2(){

 	var valor_neto_land_usd = $("#valor_neto_land_usd2").val();
 	var precio_dolar = $("#precio_dolar2").val();

 	var valor_neto_land_clp = (parseFloat(valor_neto_land_usd)*parseFloat(precio_dolar));
 	valor_neto_land_clp = valor_neto_land_clp.toFixed(2);

 	if(valor_neto_land_usd != '')
 	{
 		 	if(!isNaN(valor_neto_land_clp))
 		 	{
 		 		$("#valor_neto_land_clp2").val(valor_neto_land_clp);
 			 	//comag_procentaje2();
 			 	//over_porcentaje2()
 			 	//neto_comag2()
 			 	//iva_land2()
 			 	//amex_porcentaje2();
 			 	//contraboleta2()
 			 	
 		 	}	
 	}else
 	{
 			$("#valor_neto_land_clp2").val('');
 			 	//comag_procentaje2();
 			 	//over_porcentaje2()
 			 	//neto_comag2()
 			 	//iva_land2()
 			 	//amex_porcentaje2();
 			 	//contraboleta2()

 	}
 	
 	var servicio = $("#tipo_servicio2").val();
		 	if(servicio == 2 || servicio == 3)
		 	{
		 		//total_clp2();
		 		//total_usd2();
		 	}
		 	
	//total_contabilidad_usd2()
	//total_contabilidad_pesos2();	 	
 }

function iva_land(){
 	var iva_land_tipo = $('#iva_land_tipo').val();

 	if(iva_land_tipo != '')
 	{
 		if(iva_land_tipo == 1)
 		{
 			var valor_neto_land_clp = $('#valor_neto_land_clp').val();

	 		if(valor_neto_land_clp != '')
	 		{
	 			var iva_land_pesos = parseFloat(valor_neto_land_clp) * 0.19;
	 			iva_land_pesos = iva_land_pesos.toFixed(2);
	 			
	 			if(!isNaN(iva_land_pesos))
	 			{
	 				//console.log(iva_land_pesos)
	 				$('#iva_land_pesos').val(iva_land_pesos);	
	 			}
	 		}else
	 		{
	 			$('#iva_land_pesos').val('');		
	 		}


	 		var valor_neto_land_usd = $('#valor_neto_land_usd').val();

	 		if(valor_neto_land_usd != '')
	 		{
	 			var iva_land_usd = parseFloat(valor_neto_land_usd) * 0.19;
	 			iva_land_usd = iva_land_usd.toFixed(2);

	 			if(!isNaN(iva_land_usd))
	 			{
	 				$('#iva_land_usd').val(iva_land_usd);	
	 			}else
	 			{
	 				$('#iva_land_usd').val('');	
	 			}
	 		}else
	 		{
	 				$('#iva_land_usd').val('');	
	 		}
	
 		}else
 		{
 			$('#iva_land_usd').val('');	
 			$('#iva_land_pesos').val('');		
 		}
 	}
 } 
function iva_land2(){
 	var iva_land_tipo = $('#iva_land_tipo2').val();

 	if(iva_land_tipo != '')
 	{
 		if(iva_land_tipo == 1)
 		{
 			var valor_neto_land_clp = $('#valor_neto_land_clp2').val();

	 		if(valor_neto_land_clp != '')
	 		{
	 			var iva_land_pesos = parseFloat(valor_neto_land_clp) * 0.19;
	 			iva_land_pesos = iva_land_pesos.toFixed(2);
	 			
	 			if(!isNaN(iva_land_pesos))
	 			{
	 				//console.log(iva_land_pesos)
	 				$('#iva_land_pesos2').val(iva_land_pesos);	
	 			}
	 		}else
	 		{
	 			$('#iva_land_pesos2').val('');		
	 		}


	 		var valor_neto_land_usd = $('#valor_neto_land_usd2').val();

	 		if(valor_neto_land_usd != '')
	 		{
	 			var iva_land_usd = parseFloat(valor_neto_land_usd) * 0.19;
	 			iva_land_usd = iva_land_usd.toFixed(2);

	 			if(!isNaN(iva_land_usd))
	 			{
	 				$('#iva_land_usd2').val(iva_land_usd);	
	 			}else
	 			{
	 				$('#iva_land_usd2').val('');	
	 			}
	 		}else
	 		{
	 				$('#iva_land_usd2').val('');	
	 		}
	
 		}else
 		{
 			$('#iva_land_usd2').val('');	
 			$('#iva_land_pesos2').val('');		
 		}
 	}
 } 

function comag_procentaje()
{

 	var comag_procentaje = $("#comag_procentaje").val();

 	if(comag_procentaje!='')
 	{
 		

	 	var servicio = $("#tipo_servicio").val();
	 	if(servicio == 1)
	 	{	


		 	var valor_neto = $("#valor_neto").val();
		 	var valor_neto_usd = $("#valor_neto_usd").val();

	 		var comag_pesos  = (parseFloat(valor_neto) * (parseFloat(comag_procentaje)/100));	 	
		 	comag_pesos = comag_pesos.toFixed(2);

			var comag_usd  = (parseFloat(valor_neto_usd) * (parseFloat(comag_procentaje)/100));	 	
		 	comag_usd = comag_usd.toFixed(2);	

		 	console.log("comag usd :" + comag_usd)

		 	
		 		if(valor_neto != '')
			 	{
			 		console.log("valor_neto con algo")
			 		

			 		if(!isNaN(valor_neto))
			 		{
			 			$("#comag_pesos").val(comag_pesos);	
				 		iva_pesos();			 		
				 		neto_comag();	
				 		total_clp();
				 		

			 		}else
			 		{
			 			console.log("no tiene nada");
				 		$("#comag_pesos").val('');	
				 		
				 		//console.log("valor netro = ''  ");
				 		iva_pesos();
				 		neto_comag();
				 		total_clp();
				 		
				 		//neto_comag2();		
			 		}
			 		

			 		
				 	
			 	}else
			 	{
			 		console.log("valor_neto vacio");
			 		$("#comag_pesos").val('');	
			 		
			 		//console.log("valor netro = ''  ");
			 		iva_pesos();
			 		neto_comag();
			 		total_clp();
			 		//neto_comag2();
			 	}


			 if(valor_neto_land_usd != '')
		 	{
		 		if(!isNaN(comag_usd))
			 	{
			 		$("#comag_usd").val(comag_usd);	
			 		iva_usd();
			 		neto_comag();
			 		total_usd();
			 		
			 	}else
			 	{
			 		$("#comag_usd").val('');	
			 		iva_usd();
			 		neto_comag();
			 		total_usd();
			 	}	
		 	}else
		 	{
		 		$("#comag_usd").val('');	
		 		iva_usd();
		 		neto_comag();
		 		total_usd();
		 		
		 	}
		 	
	 	}

	 	if(servicio == 2 || servicio == 3)
	 	{

		 	var valor_neto_land_clp = $("#valor_neto_land_clp").val();
		 	var valor_neto_land_usd = $("#valor_neto_land_usd").val();

	 		var comag_pesos  = (parseFloat(valor_neto_land_clp)* (parseFloat(comag_procentaje)/100));	 	
		 	comag_pesos = comag_pesos.toFixed(2);

			var comag_usd  = (parseFloat(valor_neto_land_usd)* (parseFloat(comag_procentaje)/100));	 	
		 	comag_usd = comag_usd.toFixed(2);	


		 		
	 		if(valor_neto_land_clp != '')
		 	{
		 		//console.log("neto_land != '' ");
		 		$("#comag_pesos").val(comag_pesos);	
		 		iva_pesos();			 		
		 		neto_comag();
		 		total_clp();

		 		
		 	}else
		 	{
		 		//console.log("neto_land == '' ");
		 		$("#comag_pesos").val('');	
				iva_pesos();			 		
		 		neto_comag();	
		 		total_clp();		 		
		 					 		
		 	}

			 	
		 	if(valor_neto_land_usd != '')
		 	{
		 		if(!isNaN(comag_usd))
			 	{
			 		$("#comag_usd").val(comag_usd);	
			 		iva_usd();
			 		neto_comag();
			 		total_usd();

			 	}else
			 	{
			 		$("#comag_usd").val('');	
			 		iva_usd();
			 		neto_comag();
			 		total_usd();
			 	}	
		 	}else
		 	{
		 		$("#comag_usd").val('');	
		 		iva_usd();
			 	neto_comag();
			 	total_usd();
		 	}

		 	
		 }

 	}else
 	{
 		
 		$("#comag_pesos").val('');	
 		$("#comag_usd").val('');	
		iva_pesos();			 		
		neto_comag();			
		total_clp();	
 		//total_usd();
		//total_clp();
		//iva_pesos();
		//neto_comag()
		//neto_comag2();

 		

 	}
 	//total_usd();
	//total_clp();
	//iva_pesos();
	//neto_comag()	
	//neto_comag2();

}

function comag_procentaje2(){
	var comag_procentaje = $("#comag_procentaje2").val();
 		
 		
 	if(comag_procentaje!=''){
 		

	 	var servicio = $("#tipo_servicio2").val();
	 	if(servicio == 1)
	 	{	

		 	var valor_neto = $("#valor_neto2").val();
		 	var valor_neto_usd = $("#valor_neto_usd2").val();

	 		var comag_pesos  = (parseFloat(valor_neto)* (parseFloat(comag_procentaje)/100));	 	
		 	comag_pesos = comag_pesos.toFixed(2);

			var comag_usd  = (parseFloat(valor_neto_usd)* (parseFloat(comag_procentaje)/100));	 	
		 	comag_usd = comag_usd.toFixed(2);	

		 	

		 	
		 	if(comag_procentaje != '')
		 	{
		 		if(valor_neto != '')
			 	{
			 		if (!isNaN(comag_pesos) ) {
			 		$("#comag_pesos2").val(comag_pesos);	
			 		//iva_pesos2();
			 		//neto_comag2()
				 	}else
				 	{
				 		$("#comag_pesos2").val('');	
				 	}	
			 	}else
			 	{
			 		$("#comag_pesos2").val('');	
			 		//iva_pesos2();
			 		//neto_comag2()
			 	}

			 	
			 	if(valor_neto_usd != '')
			 	{
			 		if(!isNaN(comag_usd))
				 	{
				 		$("#comag_usd2").val(comag_usd);	
				 		//iva_usd2()
				 		//neto_comag2()
				 	}else
				 	{
				 		$("#comag_usd2").val('');	
				 	}	
			 	}else
			 	{
			 		$("#comag_usd2").val('');	
			 		//iva_usd2()
			 		//neto_comag2()	
			 	}

		 	}else
		 	{
		 		$("#comag_usd2").val('');	
			 		//iva_usd2()
			 		

		 		$("#comag_pesos2").val('');	
		 		//iva_pesos2();
		 		

		 	}	
		 //total_clp2();
		 //total_usd2();	

	 	}

	 	if(servicio == 2 || servicio == 3)
	 	{

		 	var valor_neto_land_clp = $("#valor_neto_land_clp2").val();
		 	var valor_neto_land_usd = $("#valor_neto_land_usd2").val();

	 		var comag_pesos  = (parseFloat(valor_neto_land_clp)* (parseFloat(comag_procentaje)/100));	 	
		 	comag_pesos = comag_pesos.toFixed(2);

			var comag_usd  = (parseFloat(valor_neto_land_usd)* (parseFloat(comag_procentaje)/100));	 	
		 	comag_usd = comag_usd.toFixed(2);	

		 	if(comag_procentaje != '')
		 	{
		 		if(valor_neto_land_clp != '')
			 	{
			 		if (!isNaN(comag_pesos) ) {
			 		$("#comag_pesos2").val(comag_pesos);	
			 		//iva_pesos2();
			 		//neto_comag2()
				 	}else
				 	{
				 		$("#comag_pesos2").val('');	
				 	}	
			 	}else
			 	{
			 		$("#comag_pesos2").val('');	
			 		//iva_pesos2();
			 		//neto_comag2()
			 	}

			 	
			 	if(valor_neto_land_usd != '')
			 	{
			 		if(!isNaN(comag_usd))
				 	{
				 		$("#comag_usd2").val(comag_usd);	
				 		//iva_usd2()
				 		//neto_comag2()
				 	}else
				 	{
				 		$("#comag_usd2").val('');	
				 	}	
			 	}else
			 	{
			 		$("#comag_usd2").val('');	
			 		//iva_usd2()
			 		//neto_comag2()	
			 	}

		 	}else
		 	{
		 		$("#comag_usd").val('');	
			 		//iva_usd2()
			 		

		 		$("#comag_pesos").val('');	
		 		//iva_pesos2();
		 		
		 	}

		 	//total_usd2();
		 	//total_clp2();
	 	}

	 	

 	}else
 	{

 		$("#comag_usd2").val('');	
 		$("#comag_pesos2").val('');	
 		//total_usd2();
		//total_clp2();
 	}
 		
 //neto_comag2();
 }

function iva_pesos(){
 	
 	var comag_pesos = $('#comag_pesos').val();
 	
 	var iva_pesos = parseFloat(comag_pesos) * 0.19;
 	iva_pesos = iva_pesos.toFixed(2);

 	if(comag_pesos != '')
 	{
 		//console.log("iva pesos !=  0")
 		if(!isNaN(iva_pesos))
	 	{
	 		$('#iva_pesos').val(iva_pesos);
	 	}	
 	}else
 	{
 		//console.log("iva pesos ==  0 ")
 			$('#iva_pesos').val('');
 	}
 	

 }
function iva_pesos2(){
 	
 	var comag_pesos = $('#comag_pesos2').val();
 	
 	var iva_pesos = parseFloat(comag_pesos) * 0.19;
 	iva_pesos = iva_pesos.toFixed(2);

 	if(comag_pesos != '')
 	{
 		if(!isNaN(iva_pesos))
	 	{
	 		$('#iva_pesos2').val(iva_pesos);
	 	}	
 	}else
 	{
 			$('#iva_pesos2').val('');
 	}
 	

 }

function iva_usd(){
 	
 	var comag_usd = $('#comag_usd').val();

 	var iva_usd = parseFloat(comag_usd) * 0.19;
 	iva_usd = iva_usd.toFixed(2);

 	console.log(comag_usd);

 	if(comag_usd != '')
 	{
 		if(!isNaN(iva_usd))
	 	{
	 		$('#iva_usd').val(iva_usd);
	 	}else
	 	{
	 			$('#iva_usd').val('');		
	 	}

 	}else
 	{
 			$('#iva_usd').val('');
 	}
 	

 }
function iva_usd2(){
 	
 	var comag_usd = $('#comag_usd2').val();

 	var iva_usd = parseFloat(comag_usd) * 0.19;
 	iva_usd = iva_usd.toFixed(2);

 	if(comag_usd != '')
 	{
 		if(!isNaN(iva_usd))
	 	{
	 		$('#iva_usd2').val(iva_usd);
	 	}	
 	}else
 	{
 			$('#iva_usd2').val('');
 	}
 	

 }
 
function amex_porcentaje(){ 	
 	var valor_neto = $('#valor_neto').val();
 	if(valor_neto == '')
 	{
 		valor_neto = 0;
 	}

 	var valor_neto_land_clp = $('#valor_neto_land_clp').val();
 	if(valor_neto_land_clp == '')
 	{
 		valor_neto_land_clp = 0;
 	}

 	var iva_land_pesos = $('#iva_land_pesos').val();
 	if(iva_land_pesos == '')
 	{
 		iva_land_pesos = 0;
 	}

 	var tax_clp = $('#tax_clp').val();
 	if(tax_clp == '')
 	{
 		tax_clp = 0;
 	}

 	var amex_porcentaje = $('#amex_porcentaje').val();

 	var proveedore_id = $('#proveedore_id').val();
 	

 	var sumaclp = parseFloat(valor_neto) + parseFloat(valor_neto_land_clp) + parseFloat(iva_land_pesos) + parseFloat(tax_clp);
 		sumaclp = sumaclp * (parseFloat(amex_porcentaje)/100);
 	amex_pesos = sumaclp.toFixed(2);
 	//console.log(amex_pesos);
 	

 	if(!isNaN(amex_pesos))
 	{
 		$('#amex_pesos').val(amex_pesos);
 		total_clp();

 	}else
 	{
 		$('#amex_pesos').val('');
 		total_clp();
 	}

 	var valor_neto_usd = $('#valor_neto_usd').val();
 	if(valor_neto_usd == '')
 	{
 		valor_neto_usd = 0;

 	}

 	var valor_neto_land_usd = $('#valor_neto_land_usd').val();
 	if(valor_neto_land_usd == '')
 	{
 		valor_neto_land_usd = 0;
 	}

 	var iva_land_usd = $('#iva_land_usd').val();
 	if(iva_land_usd == '')
 	{
 		iva_land_usd = 0;
 	}

 	var tax_usd = $('#tax_clp').val();
 	if(tax_usd == '')
 	{
 		tax_usd = 0;
 	}

 	var sumausd = parseFloat(valor_neto_usd) + parseFloat(valor_neto_land_usd) + parseFloat(iva_land_usd) + parseFloat(tax_usd);
 		sumausd = sumausd * (parseFloat(amex_porcentaje)/100);
 	amex_usd = sumausd.toFixed(2);
 	//console.log(amex_pesos);
 	

 	if(!isNaN(amex_usd))
 	{
 		$('#amex_usd').val(amex_usd);
 		total_usd();
 	}else
 	{
 	
 		$('#amex_usd').val('');
 		total_usd();
 	}




 }
function amex_porcentaje2(){ 	

 	var valor_neto = $('#valor_neto2').val();

 	if(valor_neto == '')
 	{
 		valor_neto = 0;
 	}

 	var valor_neto_land_clp = $('#valor_neto_land_clp2').val(); 	
 	if(valor_neto_land_clp == '')
 	{
 		valor_neto_land_clp = 0;
 	}

 	var iva_land_pesos = $('#iva_land_pesos2').val();
 	if(iva_land_pesos == '')
 	{
 		iva_land_pesos = 0;
 	}

 	var tax_clp = $('#tax_clp2').val();
 	if(tax_clp == '')
 	{
 		tax_clp = 0;
 	}

 	var amex_porcentaje = $('#amex_porcentaje2').val();

 	var proveedore_id = $('#proveedore_id2').val();
 	

 	var sumaclp = parseFloat(valor_neto) + parseFloat(valor_neto_land_clp) + parseFloat(iva_land_pesos) + parseFloat(tax_clp);
 		sumaclp = sumaclp * (parseFloat(amex_porcentaje)/100);
 	amex_pesos = sumaclp.toFixed(2);

 	//console.log(tax_clp ); 
 	//console.log(amex_pesos);
 	

 	if(!isNaN(amex_pesos))
 	{
 		$('#amex_pesos2').val(amex_pesos);
 		//total_clp2();

 	}else
 	{
 		$('#amex_pesos2').val('');
 		//total_clp2();
 	}

 	var valor_neto_usd = $('#valor_neto_usd2').val();
 	if(valor_neto_usd == '')
 	{
 		valor_neto_usd = 0;

 	}

 	var valor_neto_land_usd = $('#valor_neto_land_usd2').val();
 	if(valor_neto_land_usd == '')
 	{
 		valor_neto_land_usd = 0;
 	}

 	var iva_land_usd = $('#iva_land_usd2').val();
 	if(iva_land_usd == '')
 	{
 		iva_land_usd = 0;
 	}

 	var tax_usd = $('#tax_clp2').val();
 	if(tax_usd == '')
 	{
 		tax_usd = 0;
 	}

 	var sumausd = parseFloat(valor_neto_usd) + parseFloat(valor_neto_land_usd) + parseFloat(iva_land_usd) + parseFloat(tax_usd);
 		sumausd = sumausd * (parseFloat(amex_porcentaje)/100);
 	amex_usd = sumausd.toFixed(2);
 	//console.log(amex_pesos);
 	

 	if(!isNaN(amex_usd))
 	{
 		$('#amex_usd2').val(amex_usd);
 		//total_usd2();
 	}else
 	{
 	
 		$('#amex_usd2').val('');
 		//total_usd2();
 	}




 }
 
function over_porcentaje(){

	var over_porcentaje = $('#over_porcentaje').val();

 	if(over_porcentaje!=''){
 		//console.log("over con algo")
 		var valor_neto = $("#valor_neto").val();
		var valor_neto_usd = $("#valor_neto_usd").val();
	 	
	 	//neto_comag();

	 	var over_pesos  = (parseFloat(valor_neto)* (parseFloat(over_porcentaje) / 100));	 	
	 	over_pesos = over_pesos.toFixed(2);

		var over_usd  = (parseFloat(valor_neto_usd)* (parseFloat(over_porcentaje)/100));	 	
	 	over_usd = over_usd.toFixed(2);	 	

	 	

	 	if (!isNaN(over_pesos) ) {
	 		$("#over_pesos").val(over_pesos);	
	 		neto_comag();
	 		total_clp();
	 		
	 		
	 	}else
	 	{
	 		$("#over_pesos").val('');	
	 		neto_comag();
	 		total_clp();

	 	}

	 	if(!isNaN(over_usd))
	 	{
	 		$("#over_usd").val(over_usd);
	 		neto_comag();
	 		total_usd();
	 		
	 	}else
	 	{
	 		$("#over_usd").val('');	
	 		neto_comag();
	 		total_usd();
	 	}
	 	
 	}else
 	{
 		//console.log("over vacioo")
 		$("#over_pesos").val('');	
	 	neto_comag();
	 	total_clp();

	 	$("#over_usd").val('');	
	 	total_usd();
 	}

 	var servicio = $("#tipo_servicio").val();
		 	if(servicio == 1)
		 	{
		 		//total_clp();
		 		//total_usd();
		 	} 	
 	
 }
function over_porcentaje2(){

 	if(over_porcentaje!=''){
 		var valor_neto = $("#valor_neto2").val();
		var valor_neto_usd = $("#valor_neto_usd2").val();
	 	var over_porcentaje = $('#over_porcentaje2').val();
	 	//neto_comag2();

	 	var over_pesos  = (parseFloat(valor_neto)* (parseFloat(over_porcentaje) / 100));	 	
	 	over_pesos = over_pesos.toFixed(2);

		var over_usd  = (parseFloat(valor_neto_usd)* (parseFloat(over_porcentaje)/100));	 	
	 	over_usd = over_usd.toFixed(2);	 	

	 	

	 	if (!isNaN(over_pesos) ) {
	 		$("#over_pesos2").val(over_pesos);	
	 		//neto_comag2()
	 		
	 	}else
	 	{
	 		$("#over_pesos2").val('');	
	 	}

	 	if(!isNaN(over_usd))
	 	{
	 		$("#over_usd2").val(over_usd);
	 		//neto_comag2()	
	 		
	 	}else
	 	{
	 		$("#over_usd2").val('');	
	 	}
	 	
 	}
 	var servicio = $("#tipo_servicio2").val();
		 	if(servicio == 1)
		 	{
		 		total_clp2();
		 		total_usd2();
		 	} 	
 	
 }


function neto_comag()
 {
	var comag_pesos =$('#comag_pesos').val();
	var over_pesos =$('#over_pesos').val();

	var comag_usd =$('#comag_usd').val();
	var over_usd =$('#over_usd').val();

	var comag_procentaje = $('#comag_procentaje').val();
	var over_porcentaje  = $('#over_porcentaje').val();

	if(comag_procentaje == '')
	{
		comag_usd = 0;
		comag_pesos = 0;
	}

	if(over_porcentaje == '')
	{
		over_pesos = 0;
		over_usd = 0;
	}


	var neto_comag_pesos = parseFloat(comag_pesos) + parseFloat(over_pesos);
	neto_comag_pesos = neto_comag_pesos.toFixed(2);	 	

	if(!isNaN(neto_comag_pesos))
	{
		$("#neto_comag_pesos").val(neto_comag_pesos);	
	}else
	{
		$("#neto_comag_pesos").val('');	
	}
	
	var neto_comag_usd2 = parseFloat(comag_usd) + parseFloat(over_usd);
	neto_comag_usd2 = neto_comag_usd2.toFixed(2);	 

	
	if(!isNaN(neto_comag_usd2))
	{
		$("#neto_comag_usd").val(neto_comag_usd2);	
	}else
	{
		$("#neto_comag_usd").val('');	
	}
	
	
 }


function neto_comag2()
 {
	var comag_pesos =$('#comag_pesos2').val();
	var over_pesos =$('#over_pesos2').val();

	var comag_usd =$('#comag_usd2').val();
	var over_usd =$('#over_usd2').val();


	var comag_procentaje = $('#comag_procentaje2').val();
	var over_porcentaje  = $('#over_porcentaje2').val();
	//console.log("comag % :" + comag_procentaje);

	if(comag_procentaje == '')
	{
		comag_usd = 0;
		comag_pesos = 0;
	}

	if(over_porcentaje == '')
	{
		over_pesos = 0;
		over_usd = 0;
	}

	var neto_comag_pesos = parseFloat(comag_pesos) + parseFloat(over_pesos);
	//console.log(comag_pesos)
	neto_comag_pesos = neto_comag_pesos.toFixed(2);	 	
		
	if(!isNaN(neto_comag_pesos))
	{

		$("#neto_comag_pesos2").val(neto_comag_pesos);	
	}else
	{

		$("#neto_comag_pesos2").val('');	
	}
	
	var neto_comag_usd = parseFloat(comag_usd) + parseFloat(over_usd);
	neto_comag_usd = neto_comag_usd.toFixed(2);	 


	if(!isNaN(neto_comag_usd))
	{
		$("#neto_comag_usd2").val(neto_comag_usd);	
	}else
	{
		$("#neto_comag_usd2").val('');	
	}
	
 }

function tax_usd(){
 	var tax_clp = $("#tax_clp").val()
 	var precio_dolar = $("#precio_dolar").val();

 	var tax_usd = (parseFloat(tax_clp)/parseFloat(precio_dolar));
 	tax_usd = tax_usd.toFixed(2);

 	if(tax_clp != '')
 	{
	 	if(!isNaN(tax_usd))
	 	{
	 		$("#tax_usd").val(tax_usd); 	
	 		total_clp();
	 		total_contabilidad_pesos();
	 	}
	 }else
	 {
	 		$("#tax_usd").val(''); 	
	 		total_clp();
	 		total_contabilidad_pesos();
	 }

	 var servicio = $("#tipo_servicio").val();
	 if(servicio == 1)
		 	{
		 		//total_clp();
				//total_usd();


		 	}
		//total_contabilidad_pesos();
		//total_contabilidad_usd();


 	
 } 
function tax_usd2(){
 	var tax_clp = $("#tax_clp2").val()
 	var precio_dolar = $("#precio_dolar2").val();

 	var tax_usd = (parseFloat(tax_clp)/parseFloat(precio_dolar));
 	tax_usd = tax_usd.toFixed(2);

 	if(tax_clp != '')
 	{
	 	if(!isNaN(tax_usd))
	 	{
	 		$("#tax_usd2").val(tax_usd); 	

	 	}
	 }else
	 {
	 		$("#tax_usd2").val(''); 	
	 }

	 var servicio = $("#tipo_servicio2").val();
	 if(servicio == 1)
		 	{
		 		//total_clp2();
				//total_usd2();


		 	}
		//total_contabilidad_pesos2();
		//total_contabilidad_usd2();
 	
 } 



function tax_clp(){

 	var tax_usd = $("#tax_usd").val();
 	var precio_dolar = $("#precio_dolar").val(); 	
 	

 	var tax_clp = (parseFloat(tax_usd) * parseFloat(precio_dolar));
 	tax_clp = tax_clp.toFixed(2);
 	
 	

 	if(tax_usd != ''){
 		if(!isNaN(tax_clp))
	 	{
	 		$("#tax_clp").val(tax_clp);	
	 		total_usd();
	 		total_contabilidad_usd();
	 		

	 	}	
 	}else
 	{
 		$("#tax_clp").val(''); 	
 		total_usd();
 		total_contabilidad_usd();
 	}
 	var servicio = $("#tipo_servicio").val();
 	if(servicio == 1)
 	{
 		//total_usd();
 		//total_clp();
 		
 	}

 	//total_contabilidad_usd();
 	//total_contabilidad_pesos()
 }
function tax_clp2(){

 	var tax_usd = $("#tax_usd2").val();
 	var precio_dolar = $("#precio_dolar2").val(); 	
 	

 	var tax_clp = (parseFloat(tax_usd) * parseFloat(precio_dolar));
 	tax_clp = tax_clp.toFixed(2);
 	
 	

 	if(tax_usd != ''){
 		if(!isNaN(tax_clp))
	 	{
	 		$("#tax_clp2").val(tax_clp);	

	 	}	
 	}else
 	{
 		$("#tax_clp2").val(''); 	
 	}
 	var servicio = $("#tipo_servicio2").val();
 	if(servicio == 1)
 	{
 		//tax clp
 		//total_usd2();
 		//total_clp2();
 		
 	}
 	//total_contabilidad_pesos2();
 	//total_contabilidad_usd2();
 }

function total_clp(){

 	var servicio = $("#tipo_servicio").val();

 	if(servicio == 1)
 	{
 		$('#total_clp').val(''); 

 		var valor_neto = $("#valor_neto").val();
	 	if(valor_neto == '')
	 	{
	 		valor_neto = 0;
	 	}
	 	//console.log('valor neto :'+valor_neto);

	 	var tax_clp = $("#tax_clp").val();
	 	if(tax_clp == '')
	 	{
	 		tax_clp = 0;
	 	}
	 	//console.log('tax_clp :'+tax_clp);

	 	var amex_pesos = $("#amex_pesos").val();
	 	if(amex_pesos == '')
	 	{
	 		amex_pesos = 0;
	 	}
	 	//console.log('amex_pesos :'+amex_pesos);

	 	var neto_comag_pesos = $("#neto_comag_pesos").val();
	 	if(neto_comag_pesos == '')
	 	{
	 		neto_comag_pesos = 0;
	 	}
	 	//console.log('neto_comag_pesos :'+neto_comag_pesos);

	 	var iva_pesos = $('#iva_pesos').val();
	 	if(iva_pesos == '')
	 	{
	 		iva_pesos = 0;
	 	}
	 	//console.log('iva_pesos :'+iva_pesos);

	 	var boleta_honorario_pesos = $('#boleta_honorario_clp').val();	 	
	 	if(boleta_honorario_pesos == '')
	 	{
	 		boleta_honorario_pesos = 0;
	 	}
	 	//console.log('boleta_honorario_pesos :'+boleta_honorario_pesos);

	 	var suma = parseFloat(valor_neto) + parseFloat(tax_clp) + parseFloat(amex_pesos);
	 	var resta = parseFloat(neto_comag_pesos) + parseFloat(iva_pesos) + parseFloat(boleta_honorario_pesos);
	 	var total_clp = suma - resta;
	 	total_clp = total_clp.toFixed(2);

	 	$('#total_clp').val(total_clp); 
 	}

 	if(servicio == 2 || servicio == 3)
 	{
 		$('#total_clp').val(''); 

 		var valor_neto_land_clp = $('#valor_neto_land_clp').val();
 		if(valor_neto_land_clp == '')
 		{
 			valor_neto_land_clp = 0;
 		}

 		var iva_land_pesos = $('#iva_land_pesos').val();
 		if(iva_land_pesos == '')
 		{
 			iva_land_pesos = 0;
 		}

 		var amex_pesos = $("#amex_pesos").val();
	 	if(amex_pesos == '')
	 	{
	 		amex_pesos = 0;
	 	}

	 	var neto_comag_pesos = $("#neto_comag_pesos").val();
	 	if(neto_comag_pesos == '')
	 	{
	 		neto_comag_pesos = 0;
	 	}
	 	var iva_pesos = $('#iva_pesos').val();
	 	if(iva_pesos == '')
	 	{
	 		iva_pesos = 0;
	 	}
	 	var boleta_honorario_pesos = $('#boleta_honorario_clp').val();
	 	if(boleta_honorario_pesos == '')
	 	{
	 		boleta_honorario_pesos = 0;
	 	}

	 	var suma = parseFloat(valor_neto_land_clp) + parseFloat(iva_land_pesos) + parseFloat(amex_pesos);
	 	var resta = parseFloat(neto_comag_pesos) + parseFloat(iva_pesos) + parseFloat(boleta_honorario_pesos);
	 	var total_clp = suma - resta;
	 	total_clp = total_clp.toFixed(2);

	 	$('#total_clp').val(total_clp); 
	 	//utilidad_bruto();
	 	//ficha_total_clp();
	 	//actualizarFicha();
 	}
 	
 }

function total_clp2(){

 	var servicio = $("#tipo_servicio2").val();

 	if(servicio == 1)
 	{
 		$('#total_clp2').val(''); 
 		var valor_neto = $("#valor_neto2").val();
	 	if(valor_neto == '')
	 	{
	 		valor_neto = 0;
	 	}
	 	var tax_clp = $("#tax_clp2").val();
	 	if(tax_clp == '')
	 	{
	 		tax_clp = 0;
	 	}
	 	var amex_pesos = $("#amex_pesos2").val();
	 	if(amex_pesos == '')
	 	{
	 		amex_pesos = 0;
	 	}

	 	var neto_comag_pesos = $("#neto_comag_pesos2").val();
	 	if(neto_comag_pesos == '')
	 	{
	 		neto_comag_pesos = 0;
	 	}
	 	var iva_pesos = $('#iva_pesos2').val();
	 	if(iva_pesos == '')
	 	{
	 		iva_pesos = 0;
	 	}
	 	var boleta_honorario_pesos = $('#boleta_honorario_pesos2').val();
	 	if(boleta_honorario_pesos == '')
	 	{
	 		boleta_honorario_pesos = 0;
	 	}
	 	var comag_procentaje2 = $('#comag_procentaje2').val();
	 	if(comag_procentaje2 == '')
	 	{
	 		comag_procentaje2 = 0;
	 	}

	 	var suma = parseFloat(valor_neto) + parseFloat(tax_clp) + parseFloat(amex_pesos);
	 	var resta = parseFloat(neto_comag_pesos) + parseFloat(iva_pesos) + parseFloat(boleta_honorario_pesos);
	 	var total_clp = suma - resta;
	 	total_clp = total_clp.toFixed(2);

	 	$('#total_clp2').val(total_clp); 
 	}

 	if(servicio == 2 || servicio == 3)
 	{
 		$('#total_clp2').val(''); 

 		//var valor_neto_land_clp = $('#valor_neto_land_clp2').val();
 		if(valor_neto_land_clp == '')
 		{
 			valor_neto_land_clp = 0;
 		}

 		//var iva_land_pesos = $('#iva_land_pesos2').val();
 		if(iva_land_pesos == '')
 		{
 			iva_land_pesos = 0;
 		}

 		//var amex_pesos = $("#amex_pesos2").val();
	 	if(amex_pesos == '')
	 	{
	 		amex_pesos = 0;
	 	}

	 	//var neto_comag_pesos = $("#neto_comag_pesos2").val();
	 	if(neto_comag_pesos == '')
	 	{
	 		neto_comag_pesos = 0;
	 	}
	 	//var iva_pesos = $('#iva_pesos2').val();
	 	if(iva_pesos == '')
	 	{
	 		iva_pesos = 0;
	 	}
	 	//var boleta_honorario_pesos = $('#boleta_honorario_pesos2').val();
	 	if(boleta_honorario_pesos == '')
	 	{
	 		boleta_honorario_pesos = 0;
	 	}

	 	var suma = parseFloat(valor_neto_land_clp) + parseFloat(iva_land_pesos) + parseFloat(amex_pesos);
	 	var resta = parseFloat(neto_comag_pesos) + parseFloat(iva_pesos) + parseFloat(boleta_honorario_pesos);
	 	var total_clp = suma - resta;
	 	total_clp = total_clp.toFixed(2);

	 	$('#total_clp2').val(total_clp); 
	 	//utilidad_bruto();
	 	//ficha_total_clp()

 	}
 	
 }

function total_usd(){

 	var servicio = $("#tipo_servicio").val();

 	if(servicio == 1)
 	{
 		var valor_neto_usd = $("#valor_neto_usd").val();
	 	if(valor_neto_usd == '')
	 	{
	 		valor_neto_usd = 0;
	 	}
	 	//console.log('valor neto :'+valor_neto_usd);

	 	var tax_usd = $("#tax_usd").val();
	 	if(tax_usd == '')
	 	{
	 		tax_usd = 0;
	 	}
	 	//console.log('valor tax_usd :'+tax_usd);

	 	var amex_usd = $("#amex_usd").val();
	 	if(amex_usd == '')
	 	{
	 		amex_usd = 0;
	 	}
		//console.log('valor amex_usd :'+amex_usd);


	 	var neto_comag_usd = $("#neto_comag_usd").val();
	 	if(neto_comag_usd == '')
	 	{
	 		neto_comag_usd = 0;
	 	}
	 	//console.log('valor neto_comag_usd :'+neto_comag_usd);

	 	var iva_usd = $('#iva_usd').val();
	 	if(iva_usd == '')
	 	{
	 		iva_usd = 0;
	 	}
	 	//console.log('valor iva_usd :'+iva_usd);

	 	var boleta_honorario_usd = $('#boleta_honorario_usd').val();
	 	if(boleta_honorario_usd == '')
	 	{
	 		boleta_honorario_usd = 0;
	 	}
	 	//console.log('valor boleta_honorario_usd :'+boleta_honorario_usd);

	 	var suma = parseFloat(valor_neto_usd) + parseFloat(tax_usd) + parseFloat(amex_usd);
	 	var resta = parseFloat(neto_comag_usd) + parseFloat(iva_usd) + parseFloat(boleta_honorario_usd);
	 	var total_usd = suma - resta;
	 	total_usd = total_usd.toFixed(2);
	 	
	 	$('#total_usd').val(total_usd); 	
 	}
 	if(servicio == 2 || servicio == 3)
 	{
 		$('#total_usd').val(''); 

 		var valor_neto_land_usd = $('#valor_neto_land_usd').val();
 		if(valor_neto_land_usd == '')
 		{
 			valor_neto_land_usd = 0;
 		}

 		var iva_land_usd = $('#iva_land_usd').val();
 		if(iva_land_usd == '')
 		{
 			iva_land_usd = 0;
 		}

 		var amex_usd = $("#amex_usd").val();
	 	if(amex_usd == '')
	 	{
	 		amex_usd = 0;
	 	}

	 	var neto_comag_usd = $("#neto_comag_usd").val();
	 	if(neto_comag_usd == '')
	 	{
	 		neto_comag_usd = 0;
	 	}
	 	var iva_usd = $('#iva_usd').val();
	 	if(iva_usd == '')
	 	{
	 		iva_usd = 0;
	 	}
	 	var boleta_honorario_usd = $('#boleta_honorario_usd').val();
	 	if(boleta_honorario_usd == '')
	 	{
	 		boleta_honorario_usd = 0;
	 	}

	 	var suma = parseFloat(valor_neto_land_usd) + parseFloat(iva_land_usd) + parseFloat(amex_usd);
	 	var resta = parseFloat(neto_comag_usd) + parseFloat(iva_usd) + parseFloat(boleta_honorario_usd);
	 	var total_usd = suma - resta;
	 	total_usd = total_usd.toFixed(2);
	 	

	 	$('#total_usd').val(total_usd); 
	 }

 	
 	
 }
function total_usd2(){

 	var servicio = $("#tipo_servicio2").val();

 	if(servicio == 1)
 	{
 		var valor_neto_usd = $("#valor_neto_usd2").val();
	 	if(valor_neto_usd == '')
	 	{
	 		valor_neto_usd = 0;
	 	}
	 	var tax_usd = $("#tax_usd2").val();
	 	if(tax_usd == '')
	 	{
	 		tax_usd = 0;
	 	}
	 	var amex_usd = $("#amex_usd2").val();
	 	if(amex_usd == '')
	 	{
	 		amex_usd = 0;
	 	}

	 	var neto_comag_usd = $("#neto_comag_usd2").val();
	 	if(neto_comag_usd == '')
	 	{
	 		neto_comag_usd = 0;
	 	}
	 	var iva_usd = $('#iva_usd2').val();
	 	if(iva_usd == '')
	 	{
	 		iva_usd = 0;
	 	}
	 	var boleta_honorario_usd = $('#boleta_honorario_usd2').val();
	 	if(boleta_honorario_usd == '')
	 	{
	 		boleta_honorario_usd = 0;
	 	}

	 	var suma = parseFloat(valor_neto_usd) + parseFloat(tax_usd) + parseFloat(amex_usd);
	 	var resta = parseFloat(neto_comag_usd) + parseFloat(iva_usd) + parseFloat(boleta_honorario_usd);
	 	var total_usd = suma - resta;
	 	total_usd = total_usd.toFixed(2);
	 	
	 	$('#total_usd2').val(total_usd); 	
 	}
 	if(servicio == 2 || servicio == 3)
 	{
 		$('#total_usd2').val(''); 

 		var valor_neto_land_usd = $('#valor_neto_land_usd2').val();
 		if(valor_neto_land_usd == '')
 		{
 			valor_neto_land_usd = 0;
 		}

 		var iva_land_usd = $('#iva_land_usd2').val();
 		if(iva_land_usd == '')
 		{
 			iva_land_usd = 0;
 		}

 		var amex_usd = $("#amex_usd2").val();
	 	if(amex_usd == '')
	 	{
	 		amex_usd = 0;
	 	}

	 	var neto_comag_usd = $("#neto_comag_usd2").val();
	 	if(neto_comag_usd == '')
	 	{
	 		neto_comag_usd = 0;
	 	}
	 	var iva_usd = $('#iva_usd2').val();
	 	if(iva_usd == '')
	 	{
	 		iva_usd = 0;
	 	}
	 	var boleta_honorario_usd = $('#boleta_honorario_usd2').val();
	 	if(boleta_honorario_usd == '')
	 	{
	 		boleta_honorario_usd = 0;
	 	}

	 	var suma = parseFloat(valor_neto_land_usd) + parseFloat(iva_land_usd) + parseFloat(amex_usd);
	 	var resta = parseFloat(neto_comag_usd) + parseFloat(iva_usd) + parseFloat(boleta_honorario_usd);
	 	var total_usd = suma - resta;
	 	total_usd = total_usd.toFixed(2);
	 	

	 	$('#total_usd2').val(total_usd); 
	 }

 	
 	
 }

function total_contabilidad_pesos()
 {
 	$('#total_contabilidad_pesos').val('');
 	var valor_neto = $("#valor_neto").val();
 	var tax_clp = $("#tax_clp").val();
 	var valor_neto_land_clp = $("#valor_neto_land_clp").val();
 	var iva_land_pesos = $("#iva_land_pesos").val();
 	

 	if(valor_neto == '')
 	{
 		valor_neto = 0;
 	}

 	if(tax_clp == '')
 	{
 		tax_clp = 0;
 	}
 	if(valor_neto_land_clp == '')
 	{
 		valor_neto_land_clp = 0;
 	}
 	if(iva_land_pesos == '')
 	{
 		iva_land_pesos = 0;
 	}

 	var total_contabilidad_pesos = parseFloat(valor_neto) +  parseFloat(tax_clp) +  parseFloat(valor_neto_land_clp) +  parseFloat(iva_land_pesos);
 	total_contabilidad_pesos = total_contabilidad_pesos.toFixed(2);

	
	$('#total_contabilidad_pesos').val(total_contabilidad_pesos);
	
 	
 
 }
function total_contabilidad_pesos2()
 {
 	$('#total_contabilidad_pesos2').val('');
 	var valor_neto = $("#valor_neto2").val();
 	var tax_clp = $("#tax_clp2").val();
 	var valor_neto_land_clp = $("#valor_neto_land_clp2").val();
 	var iva_land_pesos = $("#iva_land_pesos2").val();
 	

 	if(valor_neto == '')
 	{
 		valor_neto = 0;
 	}

 	if(tax_clp == '')
 	{
 		tax_clp = 0;
 	}
 	if(valor_neto_land_clp == '')
 	{
 		valor_neto_land_clp = 0;
 	}
 	if(iva_land_pesos == '')
 	{
 		iva_land_pesos = 0;
 	}

 	var total_contabilidad_pesos = parseFloat(valor_neto) +  parseFloat(tax_clp) +  parseFloat(valor_neto_land_clp) +  parseFloat(iva_land_pesos);
 	total_contabilidad_pesos = total_contabilidad_pesos.toFixed(2);

	
	$('#total_contabilidad_pesos2').val(total_contabilidad_pesos);
	
 	
 
 }

function total_contabilidad_usd()
 {
 	$('#total_contabilidad_usd').val('');
 	var valor_neto_usd = $("#valor_neto_usd").val();
 	var tax_usd = $("#tax_usd").val();
 	var valor_neto_land_usd = $("#valor_neto_land_usd").val();
 	var iva_land_usd = $("#iva_land_usd").val();
 	

 	if(valor_neto_usd == '')
 	{
 		valor_neto_usd = 0;
 	}

 	if(tax_usd == '')
 	{
 		tax_usd = 0;
 	}
 	if(valor_neto_land_usd == '')
 	{
 		valor_neto_land_usd = 0;
 	}
 	if(iva_land_usd == '')
 	{
 		iva_land_usd = 0;
 	}

 	var total_contabilidad_usd = parseFloat(valor_neto_usd) +  parseFloat(tax_usd) +  parseFloat(valor_neto_land_usd) +  parseFloat(iva_land_usd);
 	total_contabilidad_usd = total_contabilidad_usd.toFixed(2);

	
	$('#total_contabilidad_usd').val(total_contabilidad_usd);
 
 }
function total_contabilidad_usd2()
 {
 	$('#total_contabilidad_usd2').val('');
 	var valor_neto_usd = $("#valor_neto_usd2").val();
 	var tax_usd = $("#tax_usd2").val();
 	var valor_neto_land_usd = $("#valor_neto_land_usd2").val();
 	var iva_land_usd = $("#iva_land_usd2").val();
 	

 	if(valor_neto_usd == '')
 	{
 		valor_neto_usd = 0;
 	}

 	if(tax_usd == '')
 	{
 		tax_usd = 0;
 	}
 	if(valor_neto_land_usd == '')
 	{
 		valor_neto_land_usd = 0;
 	}
 	if(iva_land_usd == '')
 	{
 		iva_land_usd = 0;
 	}

 	var total_contabilidad_usd = parseFloat(valor_neto_usd) +  parseFloat(tax_usd) +  parseFloat(valor_neto_land_usd) +  parseFloat(iva_land_usd);
 	total_contabilidad_usd = total_contabilidad_usd.toFixed(2);

	
	$('#total_contabilidad_usd2').val(total_contabilidad_usd);
 
 }

function contraboleta()
 	{		
 		var boleta_honorario_porcentaje = 0.10;
 		var servicio = $("#tipo_servicio").val();
 		var condicion_pago = $('#condicion_pago').val();


 		if(condicion_pago == 5)
 		{
 			if(servicio == 1)
	 		{	
	 			var valor_neto = $('#valor_neto').val()
	 			if(valor_neto == '')
	 			{
	 				valor_neto = 0;
	 			}
	 			var boleta_honorario_pesos = parseFloat(valor_neto) * boleta_honorario_porcentaje;
	 			boleta_honorario_pesos = boleta_honorario_pesos.toFixed(2);
	 			console.log(boleta_honorario_pesos); 
	 			if(!isNaN(boleta_honorario_pesos))
	 			{
	 				$('#boleta_honorario_clp').val(boleta_honorario_pesos);	
	 			}

	 			var valor_neto_usd = $('#valor_neto_usd').val()
	 			if(valor_neto_usd == '')
	 			{
	 				valor_neto_usd = 0;
	 			}
	 			var boleta_honorario_usd = parseFloat(valor_neto_usd) * boleta_honorario_porcentaje;
	 			boleta_honorario_usd = boleta_honorario_usd.toFixed(2);

	 			if(!isNaN(boleta_honorario_usd))
	 			{
	 				$('#boleta_honorario_usd').val(boleta_honorario_usd);	
	 			}			

	 		} 

	 		if(servicio == 2 || servicio == 3 )
	 		{	
	 			var valor_neto_land_clp = $('#valor_neto_land_clp').val()
	 			if(valor_neto_land_clp == '')
	 			{
	 				valor_neto_land_clp = 0;
	 			}
	 			var boleta_honorario_pesos = parseFloat(valor_neto_land_clp) * boleta_honorario_porcentaje;
	 			boleta_honorario_pesos = boleta_honorario_pesos.toFixed(2);


	 			if(!isNaN(boleta_honorario_pesos))
	 			{
	 				$('#boleta_honorario_clp').val(boleta_honorario_pesos);	
	 			}

	 			var valor_neto_land_usd = $('#valor_neto_land_usd').val()
	 			if(valor_neto_land_usd == '')
	 			{
	 				valor_neto_land_usd = 0;
	 			}
	 			var boleta_honorario_usd = parseFloat(valor_neto_land_usd) * boleta_honorario_porcentaje;
	 			boleta_honorario_usd = boleta_honorario_usd.toFixed(2);

	 			if(!isNaN(boleta_honorario_usd))
	 			{

	 				$('#boleta_honorario_usd').val(boleta_honorario_usd);	
	 			}

	 		}
 		}else
 		{
 				$('#boleta_honorario_clp').val('');	
 				$('#boleta_honorario_usd').val('');	
 		}
 		


 	}
function contraboleta2()
 	{
 		var boleta_honorario_porcentaje = 0.10;
 		var servicio = $("#tipo_servicio2").val();
 		var condicion_pago = $('#condicion_pago2').val();


 		if(condicion_pago == 5)
 		{
 			if(servicio == 1)
	 		{	
	 			var valor_neto = $('#valor_neto2').val()
	 			if(valor_neto == '')
	 			{
	 				valor_neto = 0;
	 			}
	 			var boleta_honorario_pesos = parseFloat(valor_neto) * boleta_honorario_porcentaje;
	 			boleta_honorario_pesos = boleta_honorario_pesos.toFixed(2);

	 			if(!isNaN(boleta_honorario_pesos))
	 			{
	 				$('#boleta_honorario_pesos2').val(boleta_honorario_pesos);	
	 			}

	 			var valor_neto_usd = $('#valor_neto_usd2').val()
	 			if(valor_neto_usd == '')
	 			{
	 				valor_neto_usd = 0;
	 			}
	 			var boleta_honorario_usd = parseFloat(valor_neto_usd) * boleta_honorario_porcentaje;
	 			boleta_honorario_usd = boleta_honorario_usd.toFixed(2);

	 			if(!isNaN(boleta_honorario_usd))
	 			{
	 				$('#boleta_honorario_usd2').val(boleta_honorario_usd);	
	 			}

	 		}

	 		if(servicio == 2 || servicio == 3 )
	 		{	
	 			var valor_neto_land_clp = $('#valor_neto_land_clp2').val()
	 			if(valor_neto_land_clp == '')
	 			{
	 				valor_neto_land_clp = 0;
	 			}
	 			var boleta_honorario_pesos = parseFloat(valor_neto_land_clp) * boleta_honorario_porcentaje;
	 			boleta_honorario_pesos = boleta_honorario_pesos.toFixed(2);


	 			if(!isNaN(boleta_honorario_pesos))
	 			{
	 				$('#boleta_honorario_pesos2').val(boleta_honorario_pesos);	
	 			}

	 			var valor_neto_land_usd = $('#valor_neto_land_usd2').val()
	 			if(valor_neto_land_usd == '')
	 			{
	 				valor_neto_land_usd = 0;
	 			}
	 			var boleta_honorario_usd = parseFloat(valor_neto_land_usd) * boleta_honorario_porcentaje;
	 			boleta_honorario_usd = boleta_honorario_usd.toFixed(2);

	 			if(!isNaN(boleta_honorario_usd))
	 			{

	 				$('#boleta_honorario_usd2').val(boleta_honorario_usd);	
	 			}

	 		}
 		}else
 		{
 				$('#boleta_honorario_pesos2').val('');	
 				$('#boleta_honorario_usd2').val('');	
 		}
 		


 	}




function modalEditProveedor(id){
  
  //console.log("asd")
  $("#id_servicio2").val(id);  
  $("#modalEditProveedor").modal("show");
  var url = siteurl+"ficha-negocios/edit-servicio";
  //console.log(id);
  $.ajax({
      url: url,
      dataType: "json",
      method: "POST",
      data: { id: id },      
    }).done(function(json) {
      if(json.result){
        //console.log('en el done');
        var tiposer = json.html['tipo_servicio']
        $("#tipo_servicio2").select2().val(tiposer).trigger('change');
        
        var proveedor = json.html['proveedore_id']
        $("#proveedore_id2").select2().val(proveedor).trigger('change');;

        var condicion = json.html['condicion_pago']
        $("#condicion_pago2").select2().val(condicion).trigger('change');

        var iva_land_tip = json.html['iva_land_tipo']
        $("#iva_land_tipo2").select2().val(iva_land_tip).trigger('change');
        
        console.log("BOLETA HONORARIO : "+	json.html['boleta_honorario_usd']);
        $("#valor_neto2").val(json.html['valor_neto']);        
        $("#valor_neto_usd2").val(json.html['valor_neto_usd']);
        $("#valor_neto_land_clp2").val(json.html['valor_neto_land']);
        $("#valor_neto_land_usd2").val(json.html['valor_neto_land_usd']);        
        $("#iva_land_pesos2").val(json.html['iva_land_pesos']);
        $("#iva_land_usd2").val(json.html['iva_land_usd']);
        $("#comag_procentaje2").val(json.html['comag_procentaje']);
        $("#comag_pesos2").val(json.html['comag_pesos']);
        $("#comag_usd2").val(json.html['comag_usd']);
        $("#iva_porcentaje2").val(19);
        $("#iva_pesos2").val(json.html['comag_iva_pesos']);
        $("#iva_usd2").val(json.html['comag_iva_usd']);
        $("#over_porcentaje2").val(json.html['over_porcentaje']);
        $("#over_pesos2").val(json.html['over_pesos']);
        $("#over_usd2").val(json.html['over_usd']);
        $("#amex_porcentaje2").val(json.html['amex_porcentaje']);
        $("#amex_pesos2").val(json.html['amex_pesos']);
        $("#amex_usd2").val(json.html['amex_usd']);
        $("#boleta_honorario_porcentaje2").val(json.html['boleta_honorario_porcentaje']);
        $("#boleta_honorario_pesos2").val(json.html['boleta_honorario_pesos']);
        $("#neto_comag_pesos2").val(json.html['neto_comag_pesos']);
        $("#total_clp2").val(json.html['total_pesos']);
        $("#total_contabilidad_pesos2").val(json.html['total_contabilidad_pesos']);
        $("#boleta_honorario_usd2").val(json.html['boleta_honorario_usd']);
        $("#valor_neto_land_usd2").val(json.html['valor_neto_land_usd']);
        $("#tax_clp2").val(json.html['tax']);        
        $("#tax_usd2").val(json.html['tax_usd']);        
        //console.log("se llenaron")
        //console.log(json.html['tax_clp2']);
        //neto_comag2();        
        //total_clp2();
        //total_contabilidad_pesos2();
        //total_usd2();
        //total_contabilidad_usd2();
        //iva_pesos2();
        //iva_usd2();
        //total_clp2();
        //total_usd2();


        verservicioclp();

      }
    });

 } 	



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

function actualizarTabla()
{
	
	var ficha_id = $("#ficha_id").val();
	if(ficha_id == '')
	{
		ficha_id = $("#id_ficha").val();
	}
	//console.log('hola -> ' +ficha_id);
	var url = siteurl+"ficha-negocios/list-servicios/";
	console.log('acualizar 3');		
	$.ajax({
        url: url,
        dataType: "json",
        method: "POST",
        data: {ficha_id: ficha_id}
        

      }).done(function(json) {
     console.log('acualizar 3');
        if(json.result){		
        console.log('acualizar 3');	
         	$("#divListaServicios").html(json.html);
         	//console.log("suma : "+ json.html);
         	$("#total_ficha_clp").val(json.suma_clp);
         	$("#total_ficha_usd").val(json.suma_usd);
         	//utilidad_bruto();
         	//ficha_total_clp()
        }
      });

      var fp = $('#forma_pago').val();
			if(fp == 4 || fp == 5)
			{
				//agregar_cargo();
				//agregar_cargo_usd();	
				//afecta();
				//ficha_total_clp()
			}
}

function valor_bruto_tkt()
{
	var ficha_id = $("#id_ficha").val();
	//console.log("ficha : "+ficha_id);
	var url = siteurl+"ficha-negocios/load-valor-bruto";
	//console.log("load valor bruto");
	$.ajax({
		url: url,
		dataType: 'json',
		method: "POST",		
		data: {ficha_id: ficha_id},
	})
	.done(function(json) {
		//console.log("success");
		if(json.result){			
         	$('#valor_bruto_tkt_clp').val(json.bruto_tkt_clp);
         	$('#valor_bruto_tkt_usd').val(json.bruto_tkt_usd);
         	$('#total_valor_tax_clp').val(json.tax_clp);
         	$('#total_valor_tax_usd').val(json.tax_usd);
         	$('#total_valor_neto_land').val(json.neto_land_clp);
         	$('#total_valor_neto_land_usd').val(json.neto_land_usd);        	
         	//actualizarFicha();
         	//agregar_cargo();
         	//agregar_cargo_usd();
         	//utilidad_bruto();
         	//ficha_total_clp()
        }
	})
	
}

function deleteServicio(id)
{

	var servicio_id = id;
	var url = siteurl+"ficha-negocios/deleteServicio/";
	
	$.ajax({
        url: url,
        dataType: "json",
        method: "POST",
        data: {servicio_id: servicio_id}
				

      }).done(function(json) {      	
        if(json.result){			
        	actualizarTabla();



         	//actualizarTabla();
         	//valor_bruto_tkt();
         	//utilidad_bruto();
         	//ficha_total_clp()
         	console.log('Servicio eliminado');
         	
        }
      });	
}

function actualizarFicha()
{

	var ficha_id = $("#ficha_id").val();
	console.log('hola -> ' +ficha_id);

	var url = siteurl+"ficha-negocios/load-ficha/";
	//console.log('acualizar 1');
	$.ajax({
        url: url,
        dataType: "json",
        method: "POST",
        data: {ficha_id: ficha_id}
				

      }).done(function(json) {      	
      	//console.log('acualizar ficha');		         	
        if(json.result){	
        	//console.log('acualizar ficha');		         	
         	//console.log(json.tax_clp);
         	
         	$("#valor_bruto_tkt_clp").val(json.neto_clp);
         	$("#valor_bruto_tkt_usd").val(json.neto_usd);
         	$("#total_valor_tax_clp").val(json.tax_clp);
			$("#total_valor_tax_usd").val(json.tax_usd);         	
			$("#total_valor_neto_land").val(json.valor_neto_land);         	
			$("#total_valor_neto_land_usd").val(json.valor_neto_land_usd);         	
			$("#total_iva_land_clp").val(json.iva_land_pesos);        		
			$("#total_iva_land_usd").val(json.iva_land_usd);      

			var fp = $('#forma_pago').val();
			if(fp == 4 || fp == 5)
			{
				//agregar_cargo();
				//agregar_cargo_usd();	
				//ficha_total_clp();
				//ficha_total_usd();
				//utilidad_bruto();
				//ficha_total_clp()
			}
			//afecta();
			//ficha_total_clp();
			//ficha_total_usd();
			//utilidad_bruto();
			//ficha_total_clp()
			//console.log(json);
			//console.log('TAX USD : '+json.tax_usd);
        }


      });
      
}



function fee_clp() 
{


		var fee = $('#fee_emisiom_clp').val();		
		if(fee != 0)
		{
			fee = parseFloat(fee);	
		}else
		{
			$('#iva_fee_clp').val('');	
			$('#fee_emisiom_usd').val('');
			$('#iva_fee_usd').val('');	
			//agregar_cargo();
			//agregar_cargo_usd();	
			//ficha_total_clp();
			//ficha_total_usd();
			//utilidad_bruto();
			//ficha_total_clp()
		}

		
		if(isNaN(fee) )
		{
			$('#iva_fee_clp').val('');	
			$('#fee_emisiom_usd').val('');
			$('#iva_fee_usd').val('');	
		}

		var dolar = $('#tipo_cambio').val();	
			dolar = parseFloat(dolar);
		
		var fee_iva =  fee * 0.19;
		fee_iva = fee_iva.toFixed(2);

		var fee_usd = fee / dolar;
		fee_usd = fee_usd.toFixed(2);

		fee_usd_iva2 = fee_usd * 0.19;
		fee_usd_iva2 = fee_usd_iva2.toFixed(2);

		if(fee != '')
		{
			if(!isNaN(fee_iva))	
			{
				$('#iva_fee_clp').val(fee_iva);	
			}
			if(!isNaN(fee_usd))
			{
				$('#fee_emisiom_usd').val(fee_usd);
			}
			if(!isNaN(fee_usd_iva2))
			{
				$('#iva_fee_usd').val(fee_usd_iva2);	
			}
		
			var fp = $('#forma_pago').val();
			if(fp == 4 || fp == 5)
			{
				//agregar_cargo();
				//agregar_cargo_usd();	
				//ficha_total_clp();
				//ficha_total_usd();
				//utilidad_bruto();
				//ficha_total_clp()

			}else
			{
				//ficha_total_clp();
				//ficha_total_usd();				
				//utilidad_bruto();
				//ficha_total_clp()
			}	
		}else
		{
			fee = 0;
			$('#iva_fee_clp').val('');	
			$('#fee_emisiom_usd').val('');
			$('#iva_fee_usd').val('');	
			//agregar_cargo();
			//agregar_cargo_usd();	
			//ficha_total_clp();
			//ficha_total_usd();
			//utilidad_bruto();
			//ficha_total_clp()

		}
		

}

	  function fee_usd() {

	
		var fee = $('#fee_emisiom_usd').val();	
		if(fee != 0)
		{
			fee = parseFloat(fee);	
		}
		var dolar = $('#tipo_cambio').val();	
			dolar = parseFloat(dolar);

		if(fee != '')
		{	
			if(isNaN(fee) )
			{
				$('#iva_fee_clp').val('');	
				$('#fee_emisiom_clp').val('');
				$('#iva_fee_usd').val('');	
			}
			
			
			var fee_iva_usd = fee * 0.19;
			fee_iva_usd = fee_iva_usd.toFixed(2);


			var fee_clp = fee * dolar;
			fee_clp = fee_clp.toFixed(2);
			

			fee_iva_clp = fee_clp * 0.19;
			fee_iva_clp = fee_iva_clp.toFixed(2);

			if(!isNaN(fee_iva_clp))
			{
				$('#iva_fee_clp').val(fee_iva_clp);	

			}
			if(!isNaN(fee_clp))
			{
				$('#fee_emisiom_clp').val(fee_clp);
			}
			if(!isNaN(fee_iva_usd))
			{
				$('#iva_fee_usd').val(fee_iva_usd);	
			}
			//agregar_cargo();
				//agregar_cargo_usd();	
				//ficha_total_clp();
				//ficha_total_usd();
				//utilidad_bruto();
				//ficha_total_clp()
		}else
		{
			fee = 0;
			$('#iva_fee_usd').val('');	
			$('#fee_emisiom_clp').val('');
			$('#iva_fee_clp').val('');	
			//agregar_cargo();
			//agregar_cargo_usd();	
			////ficha_total_clp();
			//ficha_total_usd();
			//utilidad_bruto();
			//ficha_total_clp()
		}
		
			
		
	};



function agregar_cargo() {

	
	var bruto_tkt_clp = $("#valor_bruto_tkt_clp").val()
	if(bruto_tkt_clp == '')
	{
		bruto_tkt_clp = 0;
	}
	//console.log('bruto_tkt_clpl : '+bruto_tkt_clp);

	//console.log(bruto_tkt_clp);

	var tax_clp = $('#total_valor_tax_clp').val()
	if(tax_clp == '')
	{
		tax_clp = 0;
	}
	//console.log('tax_clp : '+tax_clp);

	var valor_neto_clp = $('#total_valor_neto_land').val()
	if(valor_neto_clp == '')
	{
		valor_neto_clp = 0;
	}
	//console.log('valor_neto_clp : '+valor_neto_clp);

	var iva_land_clp = $('#total_iva_land_clp').val()
	if(iva_land_clp == '')
	{
		iva_land_clp = 0;
	}
	//console.log('total_iva_land_clp : '+iva_land_clp);

	
	    
	var fee_clp2 = $('#fee_emisiom_clp').val();		
	if( fee_clp2 == ''  )
	{		
		fee_clp2 = 0;
	}
	//console.log('fee_clp : '+ fee_clp2);

	var iva_fee = $('#iva_fee_clp').val()
	if(iva_fee == '')
	{
		iva_fee = 0;
	}
	//console.log('iva_fee : '+iva_fee);
		
	var forma_pago = $('#forma_pago').val();
	//console.log(forma_pago); 

	if(forma_pago == 4 || forma_pago == 5)
	{
		var cargo = parseFloat(bruto_tkt_clp) + parseFloat(tax_clp) + parseFloat(iva_land_clp) + parseFloat(fee_clp2) + parseFloat(valor_neto_clp) + parseFloat(iva_fee) ;
		cargo = cargo * 0.05;
		cargo = cargo.toFixed(2);

		//console.log('Cargo : '+cargo);
		if(!isNaN(cargo))
		{
			$('#cargo_tarifa_clp').val(cargo);				
		}	
	}

	
	

}

function afecta()
{
	var afecta = $('#tipo_de_venta_land').val();

	if(afecta != 1)
	{
		$('#fee_emisiom_clp').attr('disabled' , true);	
		$('#fee_emisiom_clp').val('');
 		$('#fee_emisiom_usd').attr('disabled' , true);	
 		$('#fee_emisiom_usd').val('');
 		$('#iva_fee_usd').val('');
 		$('#iva_fee_clp').val('');
	}else
	{
		$('#fee_emisiom_clp').attr('disabled' , false);	
 		$('#fee_emisiom_usd').attr('disabled' , false);	



	}
	
 	
}

function agregar_cargo_usd() {

	
	var valor_bruto_tkt_usd = $("#valor_bruto_tkt_usd").val()
	if(valor_bruto_tkt_usd == '')
	{
		valor_bruto_tkt_usd = 0;
	}
	//console.log('valor_bruto_tkt_usd : '+valor_bruto_tkt_usd);

	//console.log(valor_bruto_tkt_usd);

	var tax_usd = $('#total_valor_tax_usd').val()
	if(tax_usd == '')
	{
		tax_usd = 0;
	}
	//console.log('tax_usd : '+tax_usd);

	var valor_neto_usd = $('#total_valor_neto_land_usd').val()
	if(valor_neto_usd == '')
	{
		valor_neto_usd = 0;
	}
	//console.log('valor_neto_usd : '+valor_neto_usd);

	var iva_land_usd = $('#total_iva_land_usd').val()
	if(iva_land_usd == '')
	{
		iva_land_usd = 0;
	}
	//console.log('total_iva_land_usd : '+iva_land_usd);

	
	    
	var fee_usd2 = $('#fee_emisiom_usd').val();		
	if( fee_usd2 == ''  )
	{		
		fee_usd2 = 0;
	}
	//console.log('fee_usd : '+ fee_usd2);

	var iva_fee_usd = $('#iva_fee_usd').val()
	if(iva_fee_usd == '')
	{
		iva_fee_usd = 0;
	}
	// console.log('iva_fee_usd : '+iva_fee_usd);
		
		

	var cargo2 = parseFloat(valor_bruto_tkt_usd) + parseFloat(tax_usd)  + parseFloat(fee_usd2) + parseFloat(valor_neto_usd) + parseFloat(iva_fee_usd) + parseFloat(iva_land_usd);
	
	cargo2 = cargo2.toFixed(2);

	// console.log('Cargo2 : '+cargo2);
	if(!isNaN(cargo2))
	{
		$('#cargo_tarifa_usd').val(cargo2);				
	}
}



function diferenciaTarifariaCLP()
{
	var dolar = $('#tipo_cambio').val();
	//console.log('dolar : '+dolar);
	var diferencia_tarifa_clp = $('#diferencia_tarifa_clp').val();
	//console.log('diferencia_tarifa_clp : '+diferencia_tarifa_clp);

	diferencia_tarifa_usd = parseFloat(diferencia_tarifa_clp) / parseFloat(dolar);
	diferencia_tarifa_usd = diferencia_tarifa_usd.toFixed(2);
	


	if(diferencia_tarifa_clp != '')
	{

		if(diferencia_tarifa_clp != 0)
		{

			if(!isNaN(diferencia_tarifa_usd))
			{

				$('#diferencia_tarifa_usd').val(diferencia_tarifa_usd);		
			}else
			{
				$('#diferencia_tarifa_usd').val('');		
			}
			
		}else
		{
			$('#diferencia_tarifa_usd').val('');			
		}
		
	}else
	{
		$('#diferencia_tarifa_usd').val('');	
	}	
	//ficha_total_clp();
	//ficha_total_usd();
	//utilidad_bruto();
	//ficha_total_clp()
}

function diferenciaTarifariaUSD()
{
	var dolar = $('#tipo_cambio').val();
	//console.log('dolar : '+dolar);
	var diferencia_tarifa_usd = $('#diferencia_tarifa_usd').val();
	//console.log('diferencia_tarifa_usd : '+diferencia_tarifa_usd);

	diferencia_tarifa_clp = parseFloat(diferencia_tarifa_usd) * parseFloat(dolar);
	diferencia_tarifa_clp = diferencia_tarifa_clp.toFixed(2);
	


	if(diferencia_tarifa_clp != '')
	{

		if(diferencia_tarifa_clp != 0)
		{

			if(!isNaN(diferencia_tarifa_clp))
			{

				$('#diferencia_tarifa_clp').val(diferencia_tarifa_clp);		

			}else
			{
				$('#diferencia_tarifa_clp').val('');		
			}
			
		}else
		{
			$('#diferencia_tarifa_clp').val('');			
		}
		
	}else
	{
		$('#diferencia_tarifa_clp').val('');	
	}
	//ficha_total_clp();
	//ficha_total_usd();

}

function descuentoCLP()
{
	var dolar = $('#tipo_cambio').val();
	//console.log('dolar : '+dolar);
	var descuento_clp = $('#descuento_clp').val();
	//console.log('diferencia_tarifa_clp : '+diferencia_tarifa_clp);

	descuento_usd = parseFloat(descuento_clp) / parseFloat(dolar);
	descuento_usd = descuento_usd.toFixed(2);
	


	if(descuento_usd != '')
	{

		if(descuento_usd != 0)
		{

			if(!isNaN(descuento_usd))
			{

				$('#descuento_usd').val(descuento_usd);		
			}else
			{
				$('#descuento_usd').val('');		
			}
			
		}else
		{
			$('#descuento_usd').val('');			
		}
		
	}else
	{
		$('#descuento_usd').val('');	
	}
	//ficha_total_clp();
	//ficha_total_usd();
	//utilidad_bruto();
	//ficha_total_clp()
}

function descuentoUSD()
{
	var dolar = $('#tipo_cambio').val();
	//console.log('dolar : '+dolar);
	var descuento_usd = $('#descuento_usd').val();
	//console.log('diferencia_tarifa_clp : '+diferencia_tarifa_clp);

	descuento_clp = parseFloat(descuento_usd) * parseFloat(dolar);
	descuento_clp = descuento_clp.toFixed(2);
	


	if(descuento_clp != '')
	{

		if(descuento_clp != 0)
		{

			if(!isNaN(descuento_clp))
			{

				$('#descuento_clp').val(descuento_clp);		
			}else
			{
				$('#descuento_clp').val('');		
			}
			
		}else
		{
			$('#descuento_clp').val('');			
		}
		
	}else
	{
		$('#descuento_clp').val('0');	
	}
	//ficha_total_clp();
	//ficha_total_usd();
	//utilidad_bruto();
	//ficha_total_clp()
}
	
function ficha_total_clp()	 {
	

	var valor_bruto_tkt_clp = $('#valor_bruto_tkt_clp').val();
	if(valor_bruto_tkt_clp == '')
	{
		valor_bruto_tkt_clp = 0;
	}
	//console.log (' valor_bruto_tkt_clp : '+valor_bruto_tkt_clp)
	var total_valor_tax_clp = $('#total_valor_tax_clp').val();
	if(total_valor_tax_clp == '')
	{
		total_valor_tax_clp = 0;
	}
	//console.log (' total_valor_tax_clp : '+total_valor_tax_clp)
	var total_valor_neto_land = $('#total_valor_neto_land').val();
	if(total_valor_neto_land == '')
	{
		total_valor_neto_land = 0;
	}
	//console.log (' total_valor_neto_land : '+total_valor_neto_land)
	var total_iva_land_clp = $('#total_iva_land_clp').val();	
	if(total_iva_land_clp == '')
	{
		total_iva_land_clp = 0;
	}
	//console.log (' total_iva_land_clp : '+total_iva_land_clp)
	var fee_emisiom_clp = $('#fee_emisiom_clp').val();
	if(fee_emisiom_clp == '')
	{
		fee_emisiom_clp = 0;
	}
	if(isNaN(fee_emisiom_clp) )
	{
		fee_emisiom_clp = 0;
	}
	//console.log (' fee_emisiom_clp : '+fee_emisiom_clp)
	var iva_fee_clp = $('#iva_fee_clp').val();
	if(iva_fee_clp == '')
	{
		iva_fee_clp = 0;
	}
	//console.log (' iva_fee_clp : '+iva_fee_clp)

	var cargo_tarifa_clp = $('#cargo_tarifa_clp').val();
	if(cargo_tarifa_clp == '')
	{
		cargo_tarifa_clp = 0;
	}
	//console.log (' cargo_tarifa_clp : '+cargo_tarifa_clp)

	var diferencia_tarifa_clp = $('#diferencia_tarifa_clp').val();
	if(diferencia_tarifa_clp == '')
	{
		diferencia_tarifa_clp = 0;
	}
	if(isNaN(diferencia_tarifa_clp))
	{
		diferencia_tarifa_clp = 0;
	}
	//console.log (' diferencia_tarifa_clp : '+diferencia_tarifa_clp)
	
	var descuento_clp = $('#descuento_clp').val();
	if(isNaN(descuento_clp))
	{
		descuento_clp = 0;
	}
	if(descuento_clp == '')
	{
		descuento_clp = 0;
	}else
	{
		if(descuento_clp < 0)
		{
			descuento_clp = parseFloat(descuento_clp * (-1));
		}
	}
	//console.log (' descuento_clp : '+ descuento_clp)

	var suma = (parseFloat(valor_bruto_tkt_clp) +  parseFloat(total_valor_tax_clp) + parseFloat(total_valor_neto_land)
				 + parseFloat(total_iva_land_clp) + parseFloat(fee_emisiom_clp) + parseFloat(iva_fee_clp)
				 + parseFloat(cargo_tarifa_clp) + parseFloat(cargo_tarifa_clp) + parseFloat(diferencia_tarifa_clp)  ) - parseFloat(descuento_clp);

	suma = suma.toFixed(2);

	//utilidad_bruto();
	

	//console.log (' suma : '+ suma)	;

	if(!isNaN(suma))
	{
		$('#total_total_clp').val(suma);	
	}else
	{
		$('#total_total_clp').val('');	
	}
}

function ficha_total_usd()	 {

	var valor_bruto_tkt_usd = $('#valor_bruto_tkt_usd').val();
	if(valor_bruto_tkt_usd == '')
	{
		valor_bruto_tkt_usd = 0;
	}
	//console.log ('valor_bruto_tkt_usd : '+valor_bruto_tkt_usd)

	var total_valor_tax_usd = $('#total_valor_tax_usd').val();
	if(total_valor_tax_usd == '')
	{
		total_valor_tax_usd = 0;
	}
	//console.log (' total_valor_tax_usd : '+total_valor_tax_usd)

	var total_valor_neto_land_usd = $('#total_valor_neto_land').val();
	if(total_valor_neto_land_usd == '')
	{
		total_valor_neto_land_usd = 0;
	}
	//console.log (' total_valor_neto_land_usd : '+total_valor_neto_land_usd)

	var total_iva_land_usd = $('#total_iva_land_usd').val();	
	if(total_iva_land_usd == '')
	{
		total_iva_land_usd = 0;
	}
	//console.log (' total_iva_land_usd : '+total_iva_land_usd)

	var fee_emisiom_usd = $('#fee_emisiom_usd').val();
	if(fee_emisiom_usd == '')
	{
		fee_emisiom_usd = 0;
	}
	if(isNaN(fee_emisiom_usd) )
	{
		fee_emisiom_usd = 0;
	}
	//console.log (' fee_emisiom_usd : '+fee_emisiom_usd)

	var iva_fee_usd = $('#iva_fee_clp').val();
	if(iva_fee_usd == '')
	{
		iva_fee_usd = 0;
	}
	//console.log (' iva_fee_clp : '+iva_fee_clp)

	var cargo_tarifa_usd = $('#cargo_tarifa_clp').val();
	if(cargo_tarifa_usd == '')
	{
		cargo_tarifa_usd = 0;
	}
	//console.log (' cargo_tarifa_usd : '+cargo_tarifa_usd)

	var diferencia_tarifa_usd = $('#diferencia_tarifa_usd').val();
	if(diferencia_tarifa_usd == '')
	{
		diferencia_tarifa_usd = 0;
	}
	if(isNaN(diferencia_tarifa_usd))
	{
		diferencia_tarifa_usd = 0;
	}
	//console.log (' diferencia_tarifa_usd : '+diferencia_tarifa_usd)
	
	var descuento_usd = $('#descuento_usd').val();
	if(isNaN(descuento_clp))
	{
		descuento_usd = 0;
	}
	if(descuento_usd == '')
	{
		descuento_usd = 0;
	}else
	{
		if(descuento_usd < 0)
		{
			descuento_usd = parseFloat(descuento_usd * (-1));
		}
	}
	//console.log (' descuento_clp : '+ descuento_clp)

	var suma = (parseFloat(valor_bruto_tkt_usd) +  parseFloat(total_valor_tax_usd) + parseFloat(total_valor_neto_land_usd)
				 + parseFloat(total_iva_land_usd) + parseFloat(fee_emisiom_usd) + parseFloat(iva_fee_usd)
				 + parseFloat(cargo_tarifa_usd) + parseFloat(cargo_tarifa_usd) + parseFloat(diferencia_tarifa_usd)  ) - parseFloat(descuento_usd);

	suma = suma.toFixed(2);
	//utilidad_bruto();
	//ficha_total_clp()

	//console.log (' suma : '+ suma)	
	if(!isNaN(suma))
	{
		$('#total_total_usd').val(suma);	
	}else
	{
		$('#total_total_usd').val('');	
	}
}


function  utilidad_bruto()
{
	var total_clp = $('#total_total_clp').val();
	var total_proveedor_clp = $('#total_ficha_clp').val();

	utilidad_bruto_clp = parseFloat(total_clp) -parseFloat(total_proveedor_clp);
	utilidad_bruto_clp = utilidad_bruto_clp.toFixed(2);
	if(!isNaN(utilidad_bruto_clp))
	{
		$('#utilidad_bruto_clp').val(utilidad_bruto_clp);	
	}
	

	var total_usd = $('#total_total_usd').val();
	var total_proveedor_usd = $('#total_ficha_usd').val();

	utilidad_bruto_usd = parseFloat(total_usd) -parseFloat(total_proveedor_usd);
	utilidad_bruto_usd = utilidad_bruto_usd.toFixed(2);

	
	if(!isNaN(utilidad_bruto_clp))
	{		
		$('#utilidad_bruto_usd').val(utilidad_bruto_usd);
	}

}		
	




function verCLP()
{
	//Esconder
	$('#total_valor_tax_usd').attr('type', 'hidden');
	document.getElementById("lblvalor_tax_usd").style.display = 'none';

	$('#valor_bruto_tkt_usd').attr('type', 'hidden');
	document.getElementById("lblvalor_bruto_tkt_usd").style.display = 'none';

	$('#total_valor_neto_land_usd').attr('type', 'hidden');
	document.getElementById("lbltotal_valor_neto_land_usd").style.display = 'none';

	$('#total_iva_land_usd').attr('type', 'hidden');
	document.getElementById("lbltotal_iva_land_usd").style.display = 'none';

	$('#diferencia_tarifa_usd').attr('type', 'hidden');
	document.getElementById("lbldiferencia_tarifa_usd").style.display = 'none';

	$('#fee_emisiom_usd').attr('type', 'hidden');
	document.getElementById("lblfee_emisiom_usd").style.display = 'none';

	$('#iva_fee_usd').attr('type', 'hidden');
	document.getElementById("lbliva_fee_usd").style.display = 'none';

	$('#cargo_tarifa_usd').attr('type', 'hidden');
	document.getElementById("lblcargo_tarifa_usd").style.display = 'none';

	$('#descuento_usd').attr('type', 'hidden');
	document.getElementById("lbldescuento_usd").style.display = 'none';

	$('#total_total_usd').attr('type', 'hidden');
	document.getElementById("lbltotal_total_usd").style.display = 'none';


	document.getElementById("rowtotal_total_usd").style.display = 'none'; 
	document.getElementById("rowdescuento_usd").style.display = 'none';
	document.getElementById("rowcargo_tarifa_usd").style.display = 'none'; 
	document.getElementById("rowiva_fee_usd").style.display = 'none';
	document.getElementById("rowfee_emisiom_usd").style.display = 'none';
	document.getElementById("rowdiferencia_tarifa_usd").style.display = 'none';
	document.getElementById("rowtotal_iva_land_usd").style.display = 'none'; 
	document.getElementById("rowtotal_valor_neto_land_usd").style.display = 'none'; 
	document.getElementById("rowvalor_tax_usd").style.display = 'none'; 
	document.getElementById("rowvalor_bruto_tkt_usd").style.display = 'none'; 
	
	
	document.getElementById("rowutilidad_bruto_usd").style.display = 'none'; 


	//Mostrar
	$('#valor_bruto_tkt_clp').attr('type', 'input');
	document.getElementById("lblvalor_bruto_tkt_clp").style.display = 'block';

	$('#total_valor_tax_clp').attr('type', 'input');
	document.getElementById("lbltotal_valor_tax_clp").style.display = 'block';

	$('#total_valor_neto_land').attr('type', 'input');
	document.getElementById("lblvalor_neto_land").style.display = 'block';

	$('#total_iva_land_clp').attr('type', 'input');
	document.getElementById("lbltotal_iva_land_clp").style.display = 'block';

	$('#diferencia_tarifa_clp').attr('type', 'input');
	document.getElementById("lbldiferencia_tarifa_clp").style.display = 'block';

	$('#fee_emisiom_clp').attr('type', 'input');
	document.getElementById("lblfee_emisiom_clp").style.display = 'block';

	$('#iva_fee_clp').attr('type', 'input');
	document.getElementById("lbliva_fee_clp").style.display = 'block';

	$('#cargo_tarifa_clp').attr('type', 'input');
	document.getElementById("lblcargo_tarifa_clp").style.display = 'block';

	$('#descuento_clp').attr('type', 'input');
	document.getElementById("lbldescuento_clp").style.display = 'block';

	$('#total_total_clp').attr('type', 'input');
	document.getElementById("lbltotal_total_clp").style.display = 'block';


	document.getElementById("rowdescuento_clp").style.display = 'block';
	document.getElementById("rowtotal_total_clp").style.display = 'block';
	document.getElementById("rowcargo_tarifa_clp").style.display = 'block';
	document.getElementById("rowiva_fee_clp").style.display = 'block';
	document.getElementById("rowfee_emisiom_clp").style.display = 'block';
	document.getElementById("rowdiferencia_tarifa_clp").style.display = 'block';
	document.getElementById("rowtotal_iva_land_clp").style.display = 'block'; 
	document.getElementById("rowtotal_valor_neto_land_clp").style.display = 'block'; 
	document.getElementById("rowvalor_tax_clp").style.display = 'block'; 
	document.getElementById("rowvalor_bruto_tkt_clp").style.display = 'block'; 
	
	
	
	document.getElementById("rowutilidad_bruto_clp").style.display = 'block'; 



}
function verservicioclp()
{
	document.getElementById("rowvalor_neto_clp").style.display = 'block'; 
	document.getElementById("rowvalor_neto_clp2").style.display = 'block';
	document.getElementById("rowvalor_neto_usd").style.display = 'none'; 
	document.getElementById("rowvalor_neto_usd2").style.display = 'none';

	document.getElementById("rowvalor_neto_land_clp").style.display = 'block'; 
	document.getElementById("rowvalor_neto_land_clp2").style.display = 'block'; 
	document.getElementById("rowvalor_neto_land_usd").style.display = 'none'; 
	document.getElementById("rowvalor_neto_land_usd2").style.display = 'none';

	document.getElementById("rowiva_land_clp").style.display = 'block';
	document.getElementById("rowiva_land_clp2").style.display = 'block'; 
	document.getElementById("rowiva_land_usd").style.display = 'none';
	document.getElementById("rowiva_land_usd2").style.display = 'none';

	document.getElementById("rowiva_clp").style.display = 'block'; 
	document.getElementById("rowiva_clp2").style.display = 'block'; 	
	document.getElementById("rowiva_usd2").style.display = 'none';
	document.getElementById("rowiva_usd").style.display = 'none';

	document.getElementById("iva_pesos").style.display = 'block'; 
	document.getElementById("rowcomag_clp").style.display = 'block'; 
	document.getElementById("rowcomag_clp2").style.display = 'block'; 
	document.getElementById("rowcomag_usd").style.display = 'none'; 
	document.getElementById("rowcomag_usd2").style.display = 'none';

	document.getElementById("rowover_clp2").style.display = 'block'; 
	document.getElementById("rowover_clp").style.display = 'block'; 
	document.getElementById("rowover_usd").style.display = 'none'; 
	document.getElementById("rowover_usd2").style.display = 'none';

	document.getElementById("rowamex_usd").style.display = 'none';
	document.getElementById("rowamex_usd2").style.display = 'none'; 
	document.getElementById("rowamex_clp").style.display = 'block'; 
	document.getElementById("rowamex_clp2").style.display = 'block';


	document.getElementById("rowboleta_honorario_usd2").style.display = 'none'; 
	document.getElementById("rowboleta_honorario_clp2").style.display = 'block'; 
	document.getElementById("rowboleta_honorario_usd").style.display = 'none'; 
	document.getElementById("rowboleta_honorario_clp").style.display = 'block'; 
	

	document.getElementById("rowtax_clp2").style.display = 'block'; 
	document.getElementById("rowtax_clp").style.display = 'block'; 
	document.getElementById("rowtax_usd2").style.display = 'none'; 
	document.getElementById("rowtax_usd").style.display = 'none'; 

	document.getElementById("rowtotal_clp2").style.display = 'block'; 
	document.getElementById("rowtotal_clp").style.display = 'block'; 
	document.getElementById("rowtotal_usd").style.display = 'none'; 
	document.getElementById("rowtotal_usd2").style.display = 'none'; 

	document.getElementById("rowtotal_contabilidad_clp2").style.display = 'block'; 
	document.getElementById("rowtotal_contabilidad_clp").style.display = 'block'; 
	document.getElementById("rowtotal_contabilidad_usd").style.display = 'none'; 
	document.getElementById("rowtotal_contabilidad_usd2").style.display = 'none'; 

	document.getElementById("rowneto_comag_usd").style.display = 'none'; 
	document.getElementById("rowneto_comag_usd2").style.display = 'none'; 
	document.getElementById("rowneto_comag_clp").style.display = 'block'; 
	document.getElementById("rowneto_comag_clp2").style.display = 'block'; 
}

function verutilidadclp()
{
	

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
	//Esconder
	//console.log("esconder");
	$('#total_valor_tax_usd').attr('type', 'input');
	document.getElementById("lblvalor_tax_usd").style.display = 'block';

	$('#valor_bruto_tkt_usd').attr('type', 'input');
	document.getElementById("lblvalor_bruto_tkt_usd").style.display = 'block';

	$('#total_valor_neto_land_usd').attr('type', 'input');
	document.getElementById("lbltotal_valor_neto_land_usd").style.display = 'block';

	$('#total_iva_land_usd').attr('type', 'input');
	document.getElementById("lbltotal_iva_land_usd").style.display = 'block';

	$('#diferencia_tarifa_usd').attr('type', 'input');
	document.getElementById("lbldiferencia_tarifa_usd").style.display = 'block';

	$('#fee_emisiom_usd').attr('type', 'input');
	document.getElementById("lblfee_emisiom_usd").style.display = 'block';

	$('#iva_fee_usd').attr('type', 'input');
	document.getElementById("lbliva_fee_usd").style.display = 'block';

	$('#cargo_tarifa_usd').attr('type', 'input');
	document.getElementById("lblcargo_tarifa_usd").style.display = 'block';

	$('#descuento_usd').attr('type', 'input');
	document.getElementById("lbldescuento_usd").style.display = 'block';

	$('#total_total_usd').attr('type', 'input');
	document.getElementById("lbltotal_total_usd").style.display = 'block';


	document.getElementById("rowdescuento_clp").style.display = 'none';	
	document.getElementById("rowcargo_tarifa_clp").style.display = 'none';
	document.getElementById("rowtotal_total_clp").style.display = 'none';
	document.getElementById("rowiva_fee_clp").style.display = 'none';
	document.getElementById("rowfee_emisiom_clp").style.display = 'none';
	document.getElementById("rowdiferencia_tarifa_clp").style.display = 'none';
	document.getElementById("rowtotal_iva_land_clp").style.display = 'none'; 
	document.getElementById("rowtotal_valor_neto_land_clp").style.display = 'none'; 
	document.getElementById("rowvalor_tax_clp").style.display = 'none'; 
	document.getElementById("rowvalor_bruto_tkt_clp").style.display = 'none'; 	
	
	
	
	document.getElementById("rowutilidad_bruto_clp").style.display = 'none'; 

	//Mostrar
	$('#valor_bruto_tkt_clp').attr('type', 'hidden');
	document.getElementById("lblvalor_bruto_tkt_clp").style.display = 'none';

	$('#total_valor_tax_clp').attr('type', 'hidden');
	document.getElementById("lbltotal_valor_tax_clp").style.display = 'none';

	$('#total_valor_neto_land').attr('type', 'hidden');
	document.getElementById("lblvalor_neto_land").style.display = 'none';

	$('#total_iva_land_clp').attr('type', 'hidden');
	document.getElementById("lbltotal_iva_land_clp").style.display = 'none';

	$('#diferencia_tarifa_clp').attr('type', 'hidden');
	document.getElementById("lbldiferencia_tarifa_clp").style.display = 'none';

	$('#fee_emisiom_clp').attr('type', 'hidden');
	document.getElementById("lblfee_emisiom_clp").style.display = 'none';

	$('#iva_fee_clp').attr('type', 'hidden');
	document.getElementById("lbliva_fee_clp").style.display = 'none';

	$('#cargo_tarifa_clp').attr('type', 'hidden');
	document.getElementById("lblcargo_tarifa_clp").style.display = 'none';

	$('#descuento_clp').attr('type', 'hidden');
	document.getElementById("lbldescuento_clp").style.display = 'none';

	$('#total_total_clp').attr('type', 'hidden');
	document.getElementById("lbltotal_total_clp").style.display = 'none';

	document.getElementById("rowdescuento_usd").style.display = 'block';	
	document.getElementById("rowtotal_total_usd").style.display = 'block';
	document.getElementById("rowcargo_tarifa_usd").style.display = 'block';
	document.getElementById("rowiva_fee_usd").style.display = 'block';
	document.getElementById("rowfee_emisiom_usd").style.display = 'block';
    document.getElementById("rowdiferencia_tarifa_usd").style.display = 'block'; 
    document.getElementById("rowtotal_iva_land_usd").style.display = 'block'; 
    document.getElementById("rowtotal_valor_neto_land_usd").style.display = 'block'; 
    document.getElementById("rowvalor_tax_usd").style.display = 'block'; 
    document.getElementById("rowvalor_bruto_tkt_usd").style.display = 'block';     
 	
 	
 	document.getElementById("rowutilidad_bruto_usd").style.display = 'block'; 
}

function verserviciousd()
{
	document.getElementById("rowvalor_neto_clp").style.display = 'none'; 
	document.getElementById("rowvalor_neto_clp2").style.display = 'none';
	document.getElementById("rowvalor_neto_usd").style.display = 'block'; 
	document.getElementById("rowvalor_neto_usd2").style.display = 'block';

	document.getElementById("rowvalor_neto_land_clp").style.display = 'none'; 
	document.getElementById("rowvalor_neto_land_clp2").style.display = 'none'; 
	document.getElementById("rowvalor_neto_land_usd").style.display = 'block'; 
	document.getElementById("rowvalor_neto_land_usd2").style.display = 'block';

	document.getElementById("rowiva_land_clp").style.display = 'none';
	document.getElementById("rowiva_land_clp2").style.display = 'none'; 
	document.getElementById("rowiva_land_usd").style.display = 'block';
	document.getElementById("rowiva_land_usd2").style.display = 'block';

	document.getElementById("rowiva_clp").style.display = 'none'; 
	document.getElementById("rowiva_clp2").style.display = 'none'; 	
	document.getElementById("rowiva_usd2").style.display = 'block';
	document.getElementById("rowiva_usd").style.display = 'block';
	
	document.getElementById("rowcomag_clp").style.display = 'none'; 
	document.getElementById("rowcomag_clp2").style.display = 'none'; 
	document.getElementById("rowcomag_usd").style.display = 'block'; 
	document.getElementById("rowcomag_usd2").style.display = 'block';

	document.getElementById("rowover_clp2").style.display = 'none'; 
	document.getElementById("rowover_clp").style.display = 'none'; 
	document.getElementById("rowover_usd").style.display = 'block'; 
	document.getElementById("rowover_usd2").style.display = 'block';

	document.getElementById("rowamex_usd").style.display = 'block';
	document.getElementById("rowamex_usd2").style.display = 'block'; 
	document.getElementById("rowamex_clp").style.display = 'none'; 
	document.getElementById("rowamex_clp2").style.display = 'none';

	document.getElementById("rowboleta_honorario_usd2").style.display = 'block'; 
	document.getElementById("rowboleta_honorario_clp2").style.display = 'none'; 
	document.getElementById("rowboleta_honorario_clp").style.display = 'none'; 
	document.getElementById("rowboleta_honorario_usd").style.display = 'block'; 

	document.getElementById("rowtax_clp2").style.display = 'none'; 
	document.getElementById("rowtax_clp").style.display = 'none'; 
	document.getElementById("rowtax_usd2").style.display = 'block'; 
	document.getElementById("rowtax_usd").style.display = 'block'; 

	document.getElementById("rowtotal_clp2").style.display = 'none'; 
	document.getElementById("rowtotal_clp").style.display = 'none'; 
	document.getElementById("rowtotal_usd").style.display = 'block'; 
	document.getElementById("rowtotal_usd2").style.display = 'block'; 

	document.getElementById("rowtotal_contabilidad_clp2").style.display = 'none'; 
	document.getElementById("rowtotal_contabilidad_clp").style.display = 'none'; 
	document.getElementById("rowtotal_contabilidad_usd").style.display = 'block'; 
	document.getElementById("rowtotal_contabilidad_usd2").style.display = 'block'; 

	document.getElementById("rowneto_comag_clp").style.display = 'none'; 
	document.getElementById("rowneto_comag_clp2").style.display = 'none'; 
	document.getElementById("rowneto_comag_usd").style.display = 'block'; 	
 	document.getElementById("rowneto_comag_usd2").style.display = 'block'; 
}

function verutilidadusd()
{
	//console.log('verUSD');

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
}

function verUtilidad(id) 
{
	verutilidadclp();	
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

	//((console.log("verutilidadusd : "+id);
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

