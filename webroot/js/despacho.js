$(document).ready(function() {
 
  
  $("#ciudade-id").html('');

  $("#regione-id").change(function(event) {
    //alert('hola');
      var regione_id = $(this).val();

      var url = siteurl+"despachos/load_ciudades";
      var ciudade_id_hd = $("#ciudade_id_hd").val();

      $.ajax({
        url: url,
        dataType: "json",
        method: "POST",
        data: {regione_id : regione_id, ciudade_id_hd: ciudade_id_hd}
      }).done(function(json) {
        if(json.result){
          $("#ciudade-id").html(json.html);
        }
      });
  }).trigger('change');

  

});