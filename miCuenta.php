<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/locales/bootstrap-datepicker.es.js"></script>


<?php
include_once "menu-lateral.php";



if(!isset($_SESSION['usuario_valido']) or $_SESSION['usuario_valido']!=TRUE ){
	header('Location: signin.php');
}else{
	//devuelvo libro a modificar
	$idModificar=$_SESSION['id_usuario'];
	$sql="select * from clientes where id=".$idModificar."";
	$resultado=ConsultaSql($sql);
	$clienteMod=mysql_fetch_array($resultado);

?>
	<!-- MENU -->
    <div class="container-fluid">
      <div class="row">
		<!-- Modificar libros -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header" >Mis datos personales</h1
		  <?php
			if(!empty($_POST) AND $_POST['Modificado']==1 AND !empty($_POST['idcliente']) AND !empty($_POST['nombre']) AND !empty($_POST['apellido']) AND !empty($_POST['clave']) AND !empty($_POST['domicilio']) AND !empty($_POST['telefono']) AND !empty($_POST['mail']) AND !empty($_POST['localidad_id'])){
			$id=trim($_POST['idcliente']);
			$nombre=trim($_POST['nombre']);
			$apellido=trim($_POST['apellido']);
			$clave=trim($_POST['clave']);

			$domicilio=trim($_POST['domicilio']);
			$telefono=trim($_POST['telefono']);
			$mail=trim($_POST['mail']);


			$localidadid=trim($_POST['localidad_id']);




			$modificarLibro="UPDATE clientes SET nombre='".$nombre."',apellido='".$apellido."',clave='".$clave."',domicilio='".$domicilio."',telefono='".$telefono."',mail='".$mail."',id_localidad='".$localidadid."'
								where id='".$id."'";


			$resultado=ConsultaSql($modificarLibro);

			header('Location: miCuenta.php');
			exit();
			}

			if(!empty($_FILES)){
			$id=trim($_POST['idcliente']);

			//definir nombre de la imagen

			$nombrefoto = "fotos/clientes/".date('Y-m-dHis')."_".rand(123,123123);
			if(preg_match("/png/i", $_FILES['foto']['type']) > 0){
				$ext = ".png";
			}
			if(preg_match("/jpg/i", $_FILES['foto']['type']) > 0){
				$ext = ".jpg";
			}
			if(preg_match("/jpeg/i", $_FILES['foto']['type']) > 0){
				$ext = ".jpeg";
			}

			if(preg_match("/gif/i", $_FILES['foto']['type']) > 0){
				$ext = ".gif";
			}

			//guardar la imagen a la carpeta foto
			move_uploaded_file($_FILES['foto']['tmp_name'], $nombrefoto.$ext);

			$modificarLibro="UPDATE clientes SET foto='".$nombrefoto.$ext."'
								where id='".$id."'";




			$resultado=ConsultaSql($modificarLibro);
			header('Location: miCuenta.php');
			exit();

			}


			$localidades=ConsultaSql('select * from localidades');

			?>



		  <form action="" method="post">
		  <table class="table table-striped">

                <input type="hidden" name="idcliente" value="<?php echo $clienteMod['id'];?>">
				<input type="hidden" name="Modificado" value="1">

				<tr >

                  <td class='celdafoto'><img class='foto' src="<?php echo $clienteMod['foto'];?>"/></td>
				  <td  > <span class='titulos'></span></br>
                </tr>
				<tr>
                  <td class='celdafoto'>Nombre</td>

                  <td><input type="text" name="nombre" value="<?php echo $clienteMod['nombre'];?>" required></td>
                </tr>

				<tr>
                  <td class='celdafoto'>Apellido</td>
                  <td><input type="text" name="apellido" value="<?php echo $clienteMod['apellido'];?>" required></td>
                </tr>





				<tr>
                  <td class='celdafoto'>Contraseña</td>
                  <td><input type="text" name="clave" value="<?php echo $clienteMod['clave'];?>" required></td>
                </tr>

				<tr>
                  <td class='celdafoto'>Domicilio</td>
                  <td><input type="text" name="domicilio" value="<?php echo $clienteMod['domicilio'];?>" required></td>
                </tr>

				<tr>
                  <td class='celdafoto'>Telefono</td>
                  <td><input type="text" name="telefono" value="<?php echo $clienteMod['telefono'];?>" required></td>
                </tr>




				<tr>
                  <td class='celdafoto'>e-Mail</td>
                  <td><input type="email" name="mail" value="<?php echo $clienteMod['mail'];?>" required></td>
                </tr>

				<tr>
                  <td class='celdafoto'>Localidad</td>

                  <td><select name="localidad_id">


						<?php
							while($c=mysql_fetch_array($localidades)){
								if($c['id']==$clienteMod['id_localidad']){
									$sel='selected';
								}else $sel='';
								echo "<option ".$sel." value='".$c['id']."'>".$c['nombre']."</option>";
							}
						?>
					</select>
				  </td>
                </tr>





				<tr>
                  <td></td>
                  <td><input type="submit" class="btn btn-primary" value="Guardar"></td>
                </tr>

           </table>

		   </form>

		   <form action="" method="post" enctype="multipart/form-data">
				<table class="table table-striped">
				<tr>
				<input type="hidden" name="idcliente" value="<?php echo $clienteMod['id'];?>">
				<input type="hidden" name="Modificado" value="1">
                  <td class='celdafoto'>Imagen</td>
                  <td><input type="file" name="foto" accept="image/*"><br /></td>
				  <td><input type="submit" class="btn btn-primary" value="Cambiar"></td>
                </tr>
				<tr>

				</tr>
				</table>
				</form>
			<a href='eliCliente.php?ideli="<?php echo $idModificar;?>"'>Eliminar Cuenta</a>

		   <script type="text/javascript">
			$("#fecha").datepicker({format:'dd/mm/yyyy',language:'es'});
		   </script>
		   <?php

	       ?>







        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


	<script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/locales/bootstrap-datepicker.es.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

<?php
}
?>
