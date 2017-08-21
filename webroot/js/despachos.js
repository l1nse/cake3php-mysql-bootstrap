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
          $("#comuna-id").html('');
        }
      });
  }).trigger('change');

  $("#comuna-id").html('');

  $("#ciudade-id").change(function(event) {
    //alert('hola');
      var ciudade_id = $(this).val();
      var ciudade_id_hd = $("#ciudade_id_hd").val();

      var url = siteurl+"despachos/load_comunas";
      var comuna_id_hd = $("#comuna_id_hd").val();

      $.ajax({
        url: url,
        dataType: "json",
        method: "POST",
        data: {ciudade_id : ciudade_id, comuna_id_hd: comuna_id_hd, ciudade_id_hd: ciudade_id_hd}
      }).done(function(json) {
        if(json.result){
          $("#comuna-id").html(json.html);
        }
      });
  }).trigger('change');

  

});