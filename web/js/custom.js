$(document).ready(function(){
	$("#fcotizaciones").submit(function( event){
		event.preventDefault();

			$.ajax({
				type: 'POST',
				url: '../php/send.php',
				data: $(this).serialize(),
				success: function(data){
					$("#respuesta").slideDown();
					$("#respuesta").html(data);
				}

			});

		return false;
	})
});