$(document).ready(function() {
 
  //validador de rut
  /*$('#rut').Rut({
    on_error: function(){ 
        //alert('Rut incorrecto'); 
        mostrarAlerta('Rut incorrecto.',"remove");
        $('#rut').val('');
    }

  });*/

  $('#rut').Rut({
    on_error: function(){ 
        mostrarAlerta('Rut incorrecto.',"remove");
        $('#rut').val('');
    },
    format_on: 'keyup'
  });

  //guardar contacto
  $("#btn_guardar_contacto").click(function(event) {
    //console.log('hola');
    var validator = $( "#form_contacto" ).validate();
    validator.form();

    //valido si el formulario esta ok
    if(!validator.valid()){
      //console.log('entro');
      mostrarAlerta('Rellene los campos obligatorios.',"remove"); 
    }else{
      var url = siteurl+"contactos/add_ajax";
      var entidade_id = $("#entidade_id").val();
      var name        = $("#name").val();
      var email       = $("#email").val();
      var telefono    = $("#telefono").val();
      var cargo       = $("#cargo").val();
      var descripcion = $("#descripcion").val();
      var nacionalidad = $("#nacionalidad").val();

      // campo active 0 = pendiente , 1 = activado , 2 = desactivado
      $.ajax({
        url: url,
        dataType: "json",
        method: "POST",
        data: {entidade_id : entidade_id, name: name, email : email, telefono: telefono, cargo: cargo, descripcion: descripcion, nacionalidad: nacionalidad, active: '0'}
      }).done(function(json) {
        if(json.result){
          //$("#sub-sistema-id").html(json.html);
          //$("#myModal").modal("hide");
          window.location = window.location;
          //mostrarAlerta('Se agrego contacto correctamente!.',"ok"); 
        }
      });
    }
  });
  //editar contacto
  $("#btn_editar_contacto").click(function(event) {
    //console.log('hola');
    var validator = $( "#form_contacto_edit" ).validate();
    validator.form();

    //valido si el formulario esta ok
    if(!validator.valid()){
      //console.log('entro');
      mostrarAlerta('Rellene los campos obligatorios.',"remove"); 
    }else{
      var url = siteurl+"contactos/edit_ajax";

      var id_contacto = $("#id_contacto").val();
      var entidade_id = $("#entidade_id2").val();
      var name        = $("#name2").val();
      var email       = $("#email2").val();
      var telefono    = $("#telefono2").val();
      var cargo       = $("#cargo2").val();
      var descripcion = $("#descripcion2").val();
      var nacionalidad = $("#nacionalidad2").val();

      $.ajax({
        url: url,
        dataType: "json",
        method: "POST",
        data: {id: id_contacto ,entidade_id : entidade_id, name: name, email : email, telefono: telefono, cargo: cargo, descripcion: descripcion, nacionalidad: nacionalidad, active: '0'}
      }).done(function(json) {
        if(json.result){
          //$("#sub-sistema-id").html(json.html);
          /*$("#modalEdit").modal("hide");
          mostrarAlerta('Se agrego contacto correctamente!.',"ok"); */
          window.location = window.location;
        }
      });
    }
  });

  $("#btn_delete_contacto").click(function(event) {
    var id_contacto = $("#id_contacto3").val();
    var entidade_id = $("#entidade_id3").val();
    var url = siteurl+"contactos/edit_ajax";
       $.ajax({
        url: url,
        dataType: "json",
        method: "POST",
        data: {id: id_contacto ,entidade_id : entidade_id, active: '2'}
      }).done(function(json) {
        if(json.result){
          //$("#sub-sistema-id").html(json.html);
          /*$("#modalEdit").modal("hide");
          mostrarAlerta('Se agrego contacto correctamente!.',"ok"); */
          window.location = window.location;
        }
      });
  });
  
  var table = $('.data-table-index').DataTable( {
    "bLengthChange": false,
    "bFilter": true,
    "pagingType": "numbers",
    "pageLength": 20,
    //"dom": '<"top"ip><"toolbar">rt<"bottom"ip><"clear">',
    "language": {
      "processing":    "Procesando...",
      "lengthMenu":    "Mostrar _MENU_ tickets",
      "zeroRecords":   "No se encontraron resultados",
      "emptyTable":    "Ningún dato disponible en esta tabla",
      "info":          "Mostrando tickets del _START_ al _END_ de un total de _TOTAL_ tickets",
      "infoEmpty":     "Mostrando tickets del 0 al 0 de un total de 0 tickets",
      "infoFiltered":  "(filtrado de un total de _MAX_ tickets)",
      "sSearch"     : "Buscar",
    }
  });

  $('.data-table-index tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = table.row( tr );
      var id_table = $(this).attr("id");

      if ( row.child.isShown() ) {
        $(this).find('i').removeClass('glyphicon-menu-up').addClass('glyphicon-menu-down');
          row.child.hide();
          tr.removeClass('shown');
      }
      else {
          $(this).find('i').removeClass('glyphicon-menu-down').addClass('glyphicon-menu-up');
          row.child('<center><button class="btn btn-primary"><i class="fa fa-circle-o-notch fa-spin"></i> Cargando...</center></button>').show();
          var url = siteurl+"contactos/ajax_list";
          $.ajax({
            url: url,
            dataType: "json",
            method: "POST",
            data: { entidade_id: id_table }
          }).done(function(json) {
            if(json.result){
              row.child(json.html).show();
            }
          });

          tr.addClass('shown');
      }
  });

});

function modalContacto(id, name){
  $("#entidade_id").val(id);
  $("#myModalLabel").html('Agregar contacto a: <b>'+name+'</b>');
  $("#myModal").modal("show");

}

function editModal(id, name, entidade_id){
  $("#entidade_id2").val(entidade_id);
  console.log(entidade_id);
  $("#labelModalEdit").html('Editar contacto: <b>'+name+'</b>');
  $("#modalEdit").modal("show");
  var url = siteurl+"contactos/view_ajax";
  $.ajax({
      url: url,
      dataType: "json",
      method: "POST",
      data: { id: id }
    }).done(function(json) {
      if(json.result){
        
        //console.log(json.html['name']);
        $("#id_contacto").val(json.html['id']);
        $("#name2").val(json.html['name']);
        $("#email2").val(json.html['email']);
        $("#telefono2").val(json.html['telefono']);
        $("#cargo2").val(json.html['cargo']);
        $("#descripcion2").val(json.html['descripcion']);
        $("#nacionalidad2").val(json.html['nacionalidad']);
      }
    });
}

function delModal(id, entidade_id){
  $("#id_contacto3").val(id);
  $("#entidade_id3").val(entidade_id);
 
  $("#modalDelete").modal("show");
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