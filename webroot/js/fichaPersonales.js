$(document).ready(function() {



    $("#user_id").change(function(event) {
    
       var usuario_id = $(this).val();
       //alert(usuario_id);

       var url = siteurl+"ficha-personales/load_user";
       //console.log("evento js")

      	$.ajax({
        url: url,
        dataType: "json",
        method: "POST",
        data: {usuario_id : usuario_id}

       }).done(function(json) {
         if(json.result){
           $("#email").val(json.email);
           $("#nombre").val(json.name); 
           $("#fecha_nacimiento").val(json.fecha)
           
           if(json.apellido1==''){
            $("#apellido1").attr('disabled', false);
            $("#apellido1").val('');
           }else{
            $("#apellido1").val(json.apellido1);
            $("#apellido1").attr('disabled', false);
           }
           if(json.apellido2==''){
            $("#apellido2").attr('disabled', false);
            $("#apellido2").val('');
           }else{
            $("#apellido2").val(json.apellido2);
            $("#apellido2").attr('disabled', false);
           }
           
         }
       });
  });

  $("#empresa_id").change(function(event) {

    // console.log("estoy en el js ");
     var empresa_id = $(this).val();
     var area_id    = $("#area_hidden").val();


    var url = siteurl+"ficha-personales/load_empresa";
     //console.log(url); 
      //console.log(area_id);

       $.ajax({
        url: url,
        dataType: "json",
        method: "POST",
        data: {empresa_id : empresa_id, area_id : area_id}
      }).done(function(json){
        

        if(json.result){
            //console.log("devuelta la js");    
            $("#area_id").html(json.html).select2().val(area_id);
        } // fin if(json.result)

      })// fin .done(function(json)

   
    }).trigger('change');// fin function



  $("#area_id").change(function(event) {
    //console.log("Evento change area activado")
    //var area_hidden = $("#area_hidden").val();
    var area_id     = $("#area_id").val();
    var area_id     = area_id!='' ? area_id : $("#area_hidden").val();
    var cargo_id    = $("#cargo_hidden").val();
    //var area_hd = $("#area_hidden").val();
    //console.log(area_id);

    var url = siteurl+"ficha-personales/load_cargo";

    //console.log(area_id);

    $.ajax({
        url: url,
        dataType: "json",
        method: "POST",
        data: {area_id : area_id, cargo_id: cargo_id}
      }).done(function(json){

        if(json.result){
            //console.log("devuelta la js");    
            $("#cargo_id").html(json.html).select2().val(cargo_id);

        } // fin if(json.result)


    }) //fin done(function(json))

  }).trigger('change');//fin func tion

  
  


});