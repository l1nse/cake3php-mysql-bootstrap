$(document).ready(function() {
  
  
  /*$("#btn_guardar").click(function(event) {
    var comentarios = $("#comentarios").val();
    var ticket_id = $("#ticket_id").val();

    $(this).attr("disabled", true);

    if(comentarios!=''){
      event.preventDefault();
      $("#frm_gestion").submit();
    }else{
      $(this).attr("disabled", false);
    }
  });*/
  

  $("#btn_guardar").click(function(event) {
    console.log("entre en el boton");
    /* Act on the event */
    event.preventDefault();
    tinyMCE.triggerSave();
    
    var validator = $( "#frm_gestion" ).validate();
    validator.form();
    console.log("vamos a validar");

    //valido si el formulario esta ok
    if(validator.valid()){
      console.log("es valido");
      $( "#frm_gestion" ).submit(); 
      
    }else
    {
      console.log("no es valido");
    }
  });

  //cerrar ticket


  $("#btn_cerrar").click(function(event) {
  	var comentarios = $("#comentarios").val();
  	var ticket_id = $("#ticket_id").val();

    $(this).attr("disabled", true);

  	if(comentarios!=''){
  		event.preventDefault();
  		$("#frm_gestion").attr('action', siteurl+'tickets/cerrar/'+ticket_id+'/3').submit();
  	}else{
      $(this).attr("disabled", false);
    }
  });

  //anular ticket
  $("#btn_anular").click(function(event) {
  	var comentarios = $("#comentarios").val();
  	var ticket_id = $("#ticket_id").val();
    
    $(this).attr("disabled", true);

  	if(comentarios!=''){
  		event.preventDefault();
  		$("#frm_gestion").attr('action', siteurl+'tickets/anular_ticket/'+ticket_id+'/0').submit();
  	}else{
      $(this).attr("disabled", false);
    }
  });

  //rechazar ticket
  $("#btn_rechazar").click(function(event) {
    var comentarios = $("#comentarios").val();
    var ticket_id = $("#ticket_id").val();

    $(this).attr("disabled", true);

    if(comentarios!=''){
      event.preventDefault();
      $("#frm_gestion").attr('action', siteurl+'tickets/anular_ticket/'+ticket_id+'/5').submit();
    }else{
      $(this).attr("disabled", false);
    }
  });

  //aprobar ticket
  $("#btn_aprobar").click(function(event) {
    var comentarios = $("#comentarios").val();
    var ticket_id = $("#ticket_id").val();

    $(this).attr("disabled", true);

    if(comentarios!=''){
      event.preventDefault();
      $("#frm_gestion").attr('action', siteurl+'tickets/anular_ticket/'+ticket_id+'/6').submit();
    }else{
      $(this).attr("disabled", false);
    }
  });
  
  $("#sub-sistema-id").html('');

  $("#sistema-id").change(function(event) {
    //alert('hola');
      var sistema_id = $(this).val();

      var url = siteurl+"tickets/load_sub_sistema";
      var sub_sistema_id_hd = $("#sub_sistema_id_hd").val();
      //alert(sub_sistema_id_hd);

      $.ajax({
        url: url,
        dataType: "json",
        method: "POST",
        data: {sistema_id : sistema_id, sub_sistema_id_hd: sub_sistema_id_hd}
      }).done(function(json) {
        if(json.result){
          $("#sub-sistema-id").html(json.html);
        }
      });
  }).trigger('change');

  $("#sub-sistema-id").change(function(event) {
    var sub_sistema_id = $(this).val();
    if(sub_sistema_id=='18'){
      $("#user_asignado_id").select2().val(31).trigger('change');
    }else{
      $("#user_asignado_id").select2().val('').trigger('change');
    }
  });

  

});