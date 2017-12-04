
$(document).ready(function() {
  $("#btn_guardar").click(function(event) {
    
    var url = siteurl+"configuraciones/comprobar"
    var urlair  = $("#parametroAIR").val();
    var parametroBD  = $("#parametroBD").val();
    
    if( urlair == '' || parametroBD == '' ) 
    {
      alert("Debe llenar todos los campos"); 
    }else
    {
      $.ajax({
        url: url,
        dataType: "json",
        method: "POST",
        data: {urlair : urlair , parametroBD : parametroBD}        
      }).done(function(json) {
        if(json.result){
          
          window.location.replace(window.location);
          
          }
      });
    }
      
    //console.log(parametroBD);  

     

      
    });

});