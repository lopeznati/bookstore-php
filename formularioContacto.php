<?php
	include_once "menu-lateral.php";
	date_default_timezone_set('America/Argentina/Buenos_Aires');

?>

		<div class="container-fluid margen">
			<div class="row margen">
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main margen">
					<h1 class="page-header">Contacto</h1>
					<?php
						if(isset($_POST['email']))
						{
							$nombre = "Nombre: " . $_POST['nombre'] . "\n";
							$apellido = "Apellido: " . $_POST['apellido'] . "\n";
							$mail = "E-Mail: " . $_POST['email'] . "\n";
							$consulta = "Consulta: " . $_POST['consulta'] . "\n\n";

							$asunto="Consulta de usuario";
							$cuerpo="
									<html>
										<head>
											<title>Consulta</title>
										</head>
										<body>
											<h1>Consulta<h1>
											<p>Detalles de la consulta:</p>
											<p>".$nombre."</p>
											<p>".$apellido."</p>
											<p>".$mail." </p>
											<p>".$consulta." </p>
										</body>
									</html>";
							$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
							$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
							$mail_sitio =  "nati6029@gmail.com";

							if (mail($mail_sitio, $asunto, $cuerpo, $cabeceras) )
							{
								echo "<script language='javascript'>
								swal({   title: 'Consulta enviada',   text: 'Muchas gracias por su visita',   timer: 2000,   showConfirmButton: false });

									  //alert('Consulta enviada con éxito, muchas gracias.');
									  window.location.href = 'http://bookstore-php.esy.es/';
									  </script>";
							}
							else
							{
								echo "<script language='javascript'>
									//  alert('Falló envio.');
									swal('Falló el envio.', '', 'warning');
									  </script>";
							}
						}
					?>
					<form id="formContacto" action="" method="post">
						<table class="table table-striped">
							<tr>
								<td>Nombre:</td>
								<td><input type="text" id="nombre" name="nombre" required></td>
							</tr>
							<tr>
								<td>Apellido:</td>
								<td><input type="text" id="apellido" name="apellido" required></td>
							</tr>

							<tr>
								<td>E-Mail:</td>
								<td><input type="email" name="email" required></td>
							</tr>
							<tr>
								<td>Consulta:</td>
								<td><textarea rows="8" cols="50" name="consulta" required></textarea></td>
							</tr>
							<tr>
							<tr>
								<td>
									<input type="submit" class="btn btn-primary" value="Enviar">
									<input type="button" class="btn btn-primary" value="Cancelar" onClick="location.href='index.php'">
									<input type="reset" class="btn btn-primary" value="Borrar">
									
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="dist/sweetalert.min.js"></script>
<script>

	$(document).ready(function(){
		$("#formContacto").submit(function(event){

			var error=false;

			if($("#apellido").val().length >15){
				//alert("El numero de tarjeta debe tener 16 caracteres");
				event.preventDefault()
				$("#apellido").focus();
				error=true;
				swal("", "La cantidad de caracteres ingresados en el campo apellido supera el permitido.", "warning");

			}

			if($("#nombre").val().length >10){
				//alert("El numero de tarjeta debe tener 16 caracteres");
				event.preventDefault()
				$("#nombre").focus();
				error=true;
				swal("", "La cantidad de caracteres ingresados en el campo nombre supera el permitido.", "warning");

			}


			if(error==false){
				swal({   title: "Consulta enviada",   text: "Muchas gracias por su consulta",   timer: 5000,   showConfirmButton: false });
			}


		})
	});
</script>

