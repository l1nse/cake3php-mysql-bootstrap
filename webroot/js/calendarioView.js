 $(document).ready(function() {

 	$("#btn_guardar").click(function(event) {
 		$("#myModal").modal('show');
 	});

    $("#btn_cancelar").click(function(event) {
    $("#myCancel").modal('show');
  });




 	$("#btn_guardar_reunion").click(function(event) {
    	//console.log('hola');
    	var observacion = $("#concretar").val();
    	var idcalendario = $("#idcalendario").val()

		
		var url = siteurl+"Calendarios/concretar";

		$.ajax({
        url: url,
        dataType: "json",
        method: "POST",
        data: {observacion : observacion, idcalendario:idcalendario}
      }).done(function(json) {
      	//console.log("estyoy en el doneº");	
        if(json.result){
				
          //$("#sub-sistema-id").html(json.html);
          //$("#myModal").modal("hide");
          console.log("estyoy en el result");
          //window.location = window.location;
          window.location.replace( siteurl+"Calendarios/view/"+idcalendario);
          //mostrarAlerta('Se agrego contacto correctamente!.',"ok"); 
        }
      });

    //valido si el formulario esta ok
    
  });

  $("#btn_cancelar_reunion").click(function(event) {
      //console.log('hola');
      var observacion = $("#cancelar").val();
      var idcalendario = $("#idcalendario").val()

      console.log(observacion);
       
    var url = siteurl+"Calendarios/anular";

    $.ajax({
        url: url,
        dataType: "json",
        method: "POST",
        data: {observacion : observacion, idcalendario:idcalendario}
      }).done(function(json) {
        console.log("estyoy en el doneº");  
        if(json.result){
          
          //$("#sub-sistema-id").html(json.html);
          //$("#myModal").modal("hide");
          console.log("estyoy en el result");
          //window.location = window.location;
          window.location.replace( siteurl+"Calendarios/view/"+idcalendario);
          //mostrarAlerta('Se agrego contacto correctamente!.',"ok"); 
        }
      });

    
  });

 


})

 