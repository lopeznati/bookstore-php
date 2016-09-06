<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/locales/bootstrap-datepicker.es.js"></script>

<?php 
	include_once "./header.php";

	if(!empty($_POST) AND !empty($_POST['nombre']) AND !empty($_POST['apellido']) AND !empty($_POST['telefono']) AND !empty($_POST['domicilio']) AND !empty($_POST['mail']) AND !empty($_POST['usuario']) AND !empty($_POST['contraseña']) AND !empty($_POST['localidad_id'])){
		$nombre=trim($_POST['nombre']);
		$apellido=trim($_POST['apellido']);
		$telefono=trim($_POST['telefono']);
		$domicilio=trim($_POST['domicilio']);
		$mail=trim($_POST['mail']);
		$usuario=trim($_POST['usuario']);
		$contraseña=trim($_POST['contraseña']);
		$localidadid=trim($_POST['localidad_id']);
		$fecha=trim($_POST['fecha']);
		$rol='cli';
	
		$validar=ConsultaSql('select * from clientes where usuario="'.$usuario.'"');
		if(mysql_num_rows($validar)==1)
		{
			echo "</br><div style='text-align:center; color:blue;'>usuario ya usado</div>";
		}
		else
		{
			$agregarCliente="INSERT INTO clientes(id,usuario,clave,apellido, nombre,domicilio,telefono,mail,id_localidad,fecha,rol)  
			VALUES('','".$usuario."','".$contraseña."','".$apellido."','".$nombre."','".$domicilio."','".$telefono."','".$mail."','".$localidadid."', '".$fecha."','".$rol."')";
			$resultado=ConsultaSql($agregarCliente);

			$asunto="Registro a Bookstore-php";
			$cuerpo="
					<html>
						<head>
							<title>Registro</title>
						</head>
						<body>
							<h1>Bienvenido!!!<h1>
							<p>Datos de registro:</p>
							<p>Usuario: ".$usuario."</p>
							<p>mail: ".$mail." </p>
                            <p>ingresa: http://bookstore-php.esy.es/ </p>
						</body>
					</html>
					";
			$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			if (mail($mail, $asunto, $cuerpo, $cabeceras) )
			{
			?>    
				<div id="navbar" class="navbar-collapse collapse" style="background-color: #0080FF;>
					<div class="alert">
						<span class="closebtn" onclick="this.parentElement.style.display='none';"><a href="signin.php">X</a></span>
						<strong><center>Se ha registrado y enviado un email !</strong>
					</div>
				</div>
           <?php
		
			}
			else
			{
			?>    
				<div id="navbar" class="navbar-collapse collapse" style="background-color: #0080FF;>
					<div class="alert">
					<span class="closebtn" onclick="this.parentElement.style.display='none';"><a href="signin.php">X</a></span>
					<strong><center>Hubo un error !</strong>
					</div>
				</div>
           <?php
			}
		}
	}
	
	$localidades=ConsultaSql('select * from localidades');
	?>

    <div class="container-fluid">
		<div class="row">
			<div class="col-sm-9 ">
				<h1 class="page-header">Registro</h1>
				<form action="" method="post">
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
							<td>Telefono</td>
							<td><input type="text" name="telefono" required></td>
						</tr>
						<tr>
							<td>Domicilio</td>
							<td><input type="text" name="domicilio" required></td>
						</tr>
						<tr>
							<td>Fecha Nacimiento</td>
							<td><input id="fecha" type="text" name="fecha" class="btn panel-primary" required></td>
						</tr>	
						<tr>
							<td>E-Mail</td>
							<td><input type="email" name="mail" required></td>
						</tr>				
						<tr>
							<td>Usuario</td>
							<td><input type="text" name="usuario" required></td>
						</tr>
						<tr>
							<td>Contraseña</td>
							<td><input type="password" name="contraseña" required></td>
						</tr>
						<tr>
							<td>Localidad</td>
							<td>
								<select id="localidad_id" name="localidad_id">
									<option value="">Elegir Opcion</option>
									<?php
										while($c=mysql_fetch_array($localidades)){
										echo "<option value='".$c['id']."' >".$c['nombre']."</option>";}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" value="Guardar"></td>
							</tr>
					</table>
				</form>
			<?php 
		   
	       ?>
      </div>
    </div>

	<script type="text/javascript">
			$("#fecha").datepicker({format:'dd/mm/yyyy',language:'es'});
		   </script>
	 <script>
    $(document).ready(function(){

		$("form").submit(function(event){
				
  				var localidad=$("#localidad_id").val();
  				if(localidad === ''){
  					alert("El campo Localidad no puede quedar vacio, seleccione una opcion.");	  
					//cancela el evento
   					event.preventDefault();
  				}
		});
    });
    </script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>
