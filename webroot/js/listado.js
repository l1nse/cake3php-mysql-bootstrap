$(document).ready(function() {
	
});

function buscarListado(){
	var user_asignado_id = $("#user_asignado_id").val();
	window.location = siteurl+'tickets/listado/'+user_asignado_id; 
}