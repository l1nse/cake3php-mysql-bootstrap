var tiempo = 4000;

function ocultarAlerta(){
	$('#flashMessage').fadeOut('slow');
  }

function retrasoAlerta(){
	timer = setTimeout(ocultarAlerta, tiempo);
}
  
$(document).ready(function() {	
	if ($('#flashMessage').is(":visible")){
			
		retrasoAlerta();		 
		if ($( "#flashMessage" ).hasClass( "success" )){			
			var str = $( "#flashMessage" ).text();			
			var capa = '<div><i class="check glyphicon glyphicon-ok"> </i> '+str+' </div>';
			$( "#flashMessage" ).html(capa);
			
		}
		if ($( "#flashMessage" ).hasClass( "error" )){			
			var str = $( "#flashMessage" ).text();			
			var capa = '<div><i class="remove glyphicon glyphicon-remove"> </i> '+str+' </div>';
			$( "#flashMessage" ).html(capa);			
		}
		if ($( "#flashMessage" ).hasClass( "default" )){			
			var str = $( "#flashMessage" ).text();			
			var capa = '<div><i class="remove glyphicon glyphicon-info-sign"> </i> '+str+' </div>';
			$( "#flashMessage" ).html(capa);			
		}
			
	}
	
	$("#flashMessage").click(function() {		
	  $('#flashMessage').fadeOut('slow');
	});
	
	$( "#flashMessage" ).mouseover(function() {			
			clearTimeout(timer);
	});
	
	$( "#flashMessage" ).mouseout(function() {
	  retrasoAlerta();
	});
});