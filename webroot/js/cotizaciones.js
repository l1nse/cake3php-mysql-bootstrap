$(document).ready(function() {

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


	var table = $('.data-table-index').DataTable( {
	    "bLengthChange": false,
	    "bFilter": true,
	    "pagingType": "numbers",
	    "order": [[ 1, "desc" ]],
	    "pageLength": 10,
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
          var url = siteurl+"cotizaciones/list_versiones";
          $.ajax({
            url: url,
            dataType: "json",
            method: "POST",
            data: { folio: id_table }
          }).done(function(json) {
            if(json.result){
              row.child(json.html).show();
            }
          });

          tr.addClass('shown');
      }
  });

		$("#btn_step_1").click(function(event) {
			var cod_aux = $("#cod_aux").val();
			if(cod_aux==''){
				mostrarAlerta('Debe seleccionar el cliente a cotizar', 'error');
			}else{
				$("#form_add").attr('action', siteurl+'cotizaciones/add2').submit();
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
	$("#nom_aux").val(NomAux);
	$("#form_add").submit();

}
