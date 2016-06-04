<!--Busqueda con Ajax -->
  <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
	
<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {    
		//Al escribir dentro del input con id="busqueda"
		$('#busqueda').keypress(function(){
			//Obtenemos el value del input
			var busqueda = $(this).val();        
			var dataString = 'busqueda='+busqueda;

			//Le pasamos el valor del input al ajax
			$.ajax({
				type: "POST",
				url: "autocomplete.php",
				data: dataString,
				success: function(data) {
					//Escribimos las sugerencias que nos manda la consulta
					$('#suggestions').fadeIn(1000).html(data);
					//Al hacer click en algua de las sugerencias
					$('#suggestions').on('click','.suggest-element', function(){
						//Obtenemos la id unica de la sugerencia pulsada
						var id = $(this).attr('id');
						//Editamos el valor del input con data de la sugerencia pulsada
						$('#busqueda').val($('#'+id).attr('data'));
						//Hacemos desaparecer el resto de sugerencias
						$('#suggestions').fadeOut(1000);
					});              
				}
			});
		});              
	});    
	
	
</script>

<form class="navbar-form navbar-right">
            <input type="text" id="busqueda" name="busqueda" class="form-control"  placeholder="Search...">
			<div id="suggestions"></div>
</form>