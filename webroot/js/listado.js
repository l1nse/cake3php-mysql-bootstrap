$(document).ready(function() {
	
});

function buscarListado(){
	var user_asignado_id = $("#user_asignado_id").val();
	window.location = siteurl+'tickets/listado/'+user_asignado_id; 
}

function buscarReunion(){
	var user_asignado_id = $("#user_asignado_id").val();
	window.location = siteurl+'calendarios/view2/'+user_asignado_id; 	
}

