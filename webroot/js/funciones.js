$(document).ready(function() {
	
	var table = $('.data-table').DataTable( {
	    "bLengthChange": false,
	    "bFilter": true,
	    "pagingType": "numbers",
	    "order": [[ 0, "desc" ]],
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

	$('.datetime').datetimepicker({
		locale: 'es',
		format: "DD/MM/YYYY",
	});
	$('.datetimeMin').datetimepicker({
		locale: 'es',
		format: "DD/MM/YYYY",
		minDate: new Date()
	});
	$('.datetimeMax').datetimepicker({
		locale: 'es',
		format: "DD/MM/YYYY",
		maxDate: new Date()
	});

	$('.time').datetimepicker({
		locale: 'es',
		format: "H:m",
		stepping: 15
	});

	$('[data-toggle="tooltip"]').tooltip();

	var valid = $.validator.setDefaults({
		ignore: 'input[type=hidden]',
		rules:
        {
            foo: { required: true },
            bar: { required: true }
        },
	    highlight: function(element) {
	        $(element).closest('.form-group').addClass('has-error');
	        console.log(element);
	        ///$(element).find($('.select2-selection--single')).css('border', '1px solid #a94442');

	    },

	   /* highlight: function (element) {
            var elem = $(element);
            if (elem.hasClass("select2-offscreen")) {
                $("#s2id_" + elem.attr("id") + " ul").addClass('has-error');
            } else {
                elem.addClass('has-error');
            }
        },
        unhighlight: function (element, errorClass, validClass) {
            var elem = $(element);
            if (elem.hasClass("select2-offscreen")) {
                $("#s2id_" + elem.attr("id") + " ul").removeClass(errorClass);
            } else {
                elem.removeClass(errorClass);
            }
        },*/
	    unhighlight: function(element) {
	        $(element).closest('.form-group').removeClass('has-error');
	        //$(element).find($('.select2-selection--single')).css('border', '1px solid #aaa');
	    },
	    errorElement: 'span',
	    errorClass: 'help-block',
	    errorPlacement: function(error, element) {
	        if(element.parent('.input-group').length) {
	            error.insertAfter(element.parent());
	        } else {
	            error.insertAfter(element);
	        }
	    }
	});

	$.validator.messages.required = '';

	/*$.extend(jQuery.validator.messages, {
	    email: "por favor ingrese un email valido."
	});*/


	$('.phone').keyup(function (){
	    this.value = (this.value + '').replace(/[^0-9+]/g, '');
	  });

	$('.numeric').keyup(function (){
	    this.value = (this.value + '').replace(/[^0-9]/g, '');
	  });

	$(".decimal").keyup(function (){
	    this.value = (this.value + '').replace(/[^0-9.]/g, '');
	  });

	$('.correo').change(function (){
	    var textemail = $(this).val();
	    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
	    if (regex.test(textemail.trim())){
	    	
	    }else{
	    	$(this).val('');
	    	$.validator.messages.required = '';
	    	mostrarAlerta('Debe ingresar un email correcto.',"remove"); 
	    }
	  });

	$('select').select2({
		"language": {
	       "noResults": function(){
	           return "No fue posible encontrar su busqueda!";
	       }
	   },
	   placeholder:'Seleccione...' 
	});

	$('.rut').Rut({
	    on_error: function(){ 
	    	$('#rut').val('');
	        mostrarAlerta('Rut incorrecto.',"remove");
	    },
	    format_on: 'keyup'
	  });

	/*$('.textarea_add').load(function() {
		tinymce.init({
			selector: 'textarea',
			theme: 'modern',
			width: "100%",
			height: "100%",
			plugins: [
			  'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
			  'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
			  'save table contextmenu directionality emoticons template paste textcolor'
			],
			content_css: 'css/content.css',
			toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
		});
	});*/

	tinymce.init({
	    selector: '.textarea_add',
	    theme: 'modern',
	    width: "100%",
	    height: "100%",
	    plugins: [
	      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
	      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
	      'save table contextmenu directionality emoticons template paste textcolor'
	    ],
	    content_css: 'css/content.css',
	    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
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