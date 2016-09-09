<?php 
	include_once "menu-lateral.php";
	date_default_timezone_set('America/Argentina/Buenos_Aires');

?>

<html>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<h1 class="page-header">Cóntacto</h1>
					<script src="lib/sweet-alert.min.js"></script>
					<link rel="stylesheet" type="text/css" href="lib/sweet-alert.css">
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
							$mail_sitio =  "mailencastellarin@gmail.com";

							if (mail($mail_sitio, $asunto, $cuerpo, $cabeceras) )
							{
								echo "<script language='javascript'>
									  alert('Mensaje enviado, muchas gracias.');
									  window.location.href = 'http://bookstore-php.esy.es/';
									  </script>";
							} 
							else 
							{
								echo "<script language='javascript'>
									  alert('Falló envio.');
									  </script>";
							}
						}
					?>
					<form id="formContacto" action="" method="post">
						<table class="table table-striped">
							<tr>
								<td>Nombre</td>
								<td><input type="text" name="nombre" required></td>
							</tr>
							<tr>
								<td>Apellido</td>
								<td><input type="text" name="apellido" required></td>
							</tr>	
	
							<tr>
								<td>E-Mail</td>
								<td><input type="email" name="email" required></td>
							</tr>
							<tr>
								<td>Consulta</td>
								<td><textarea rows="8" cols="50" name="consulta" required></textarea></td>
							</tr>
							<tr>
							<tr>
								<td>
									<input type="submit" class="btn btn-primary" value="Enviar">
									<input type="reset" class="btn btn-primary" value="Limpiar">
								</td>
							</tr>	
						</table>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>

