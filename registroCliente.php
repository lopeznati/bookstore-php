<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/locales/bootstrap-datepicker.es.js"></script>

<?php 
include_once "./header.php";

if(!empty($_POST AND !empty($_POST['nombre']) AND !empty($_POST['apellido']) AND !empty($_POST['telefono']) AND !empty($_POST['domicilio']) AND !empty($_POST['mail']) AND !empty($_POST['usuario']) AND !empty($_POST['contraseña']) AND !empty($_POST['localidad_id']))){
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
	
	$agregarCliente="INSERT INTO clientes(id,usuario,clave,apellido, nombre,domicilio,telefono,mail,id_localidad,fecha,rol)  
	VALUES('','".$usuario."','".$contraseña."','".$apellido."','".$nombre."','".$domicilio."','".$telefono."','".$mail."','".$localidadid."', '".$fecha."','".$rol."')";
	$resultado=ConsultaSql($agregarCliente);

	
	
		
	
	
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
                  <td><input type="text" name="nombre"></td>
                </tr>
				
				<tr>
                  <td>apellido</td>
                  <td><input type="text" name="apellido"></td>
                </tr>
				
				<tr>
                  <td>Telefono</td>
                  <td><input type="text" name="telefono"></td>
                </tr>
				
				
				
				<tr>
                  <td>domicilio</td>
                  <td><input type="text" name="domicilio"></td>
                </tr>
				
				<tr>
                  <td>Fecha nacimiento</td>
                  <td><input id="fecha" type="text" name="fecha" class="btn panel-primary"></td>
                </tr>
				
				<tr>
                  <td>mail</td>
                  <td><input type="text" name="mail"></td>
                </tr>
				
				<tr>
                  <td>usuario</td>
                  <td><input type="text" name="usuario"></td>
                </tr>
				
				<tr>
                  <td>contraseña</td>
                  <td><input type="password" name="contraseña"></td>
                </tr>
				
				<tr>
                  <td>Localidad</td>
				  
                  <td>
					<select name="localidad_id">
						<option>Elegir Opcion</option>
						<?php
							while($c=mysql_fetch_array($localidades)){
								echo "<option value='".$c['id']."'>".$c['nombre']."</option>";
							}
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
		   
		   <script type="text/javascript">
			$("#fecha").datepicker({format:'dd/mm/yyyy',language:'es'});
		   </script>
		   <?php 
		   
	       ?>

             
               
                
		
      </div>
    </div>

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
