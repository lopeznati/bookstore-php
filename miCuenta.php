<?php
ob_start();
?>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript"  src="js/libro.js"></script>
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="assets/css/style-responsive.css" rel="stylesheet">
	<script src="https://use.fontawesome.com/7fa1cd24b5.js"></script>

	<link href="styles.css" rel="stylesheet">
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
<div class="container">
    <div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Ficha Personal</h3>
					</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?php echo $clienteMod['foto'];?>" class="img-circle img-responsive"> </div>
									</div>
										<div class=" col-md-9 col-lg-9 ">
											<form id="form1" action="" method="post">
												<table class="table table-user-information">
													<input type="hidden" name="idcliente" value="<?php echo $clienteMod['id'];?>">
													<input type="hidden" name="Modificado" value="1">
													<tbody>
														<tr>
															<td>Nombre:</td>
															<td><input type="text" name="nombre" value="<?php echo $clienteMod['nombre'];?>" required></td>
														</tr>
														<tr>
															<td>Apellido:</td>
															<td><input type="text" name="apellido" value="<?php echo $clienteMod['apellido'];?>" required></td>
														</tr>
														<tr>
															<td>Contraseña:</td>
															<td><input type="text" name="clave" value="<?php echo $clienteMod['clave'];?>" required></td>
														</tr>
															 <tr>
																	 <tr>
															<td>Domicilio:</td>
															<td><input type="text" name="domicilio" value="<?php echo $clienteMod['domicilio'];?>" required></td>
														</tr>
															<tr>
															<td>Teléfono:</td>
															<td><input type="text" name="telefono" value="<?php echo $clienteMod['telefono'];?>" required></td>
														</tr>
														<tr>
															<td>Email:</td>
															<td><input type="email" name="mail" value="<?php echo $clienteMod['mail'];?>" required></td>
														</tr>
														<tr>
															<td>Localidad:</td>
															<td>
																<select name="localidad_id">
																<?php
																	while($c=mysql_fetch_array($localidades)){
																		if($c['id']==$clienteMod['id_localidad']){
																			$sel='selected';
																			}else $sel='';
																			echo "<option ".$sel." value='".$c['id']."'>".$c['nombre']."</option>";
																		} ?>
																</select>
														 </td>
														</tr>
													</tbody>	
													<td>
														<input type="submit" class="btn btn-fresh text-uppercase" value="Guardar">
													</td>
												</table>
											</form>
											<form action="" method="post" enctype="multipart/form-data">
											<table class="table table-user-information">
												<tbody>
													<tr>
														<input type="hidden" name="idcliente" value="<?php echo $clienteMod['id'];?>">
														<input type="hidden" name="Modificado" value="1">
														<td class='celdafoto'>Imagen:</td>
														<td><input type="file" name="foto" accept="image/*"></td>
													</tr>
													<tr>
														<td><input type="submit" class="btn btn-sunny text-uppercase" value="Cambiar"></td>
													</tr>

														<td colspan="2"><a style="color: #2b669a" href='#' onClick='eliminar("<?php echo $idModificar;?>")'>Eliminar Cuenta</a></td>
													<tr>

</tr>
												</tbody>
											</table>
										</form>


									   <script type="text/javascript">
										$("#fecha").datepicker({format:'dd/mm/yyyy',language:'es'});
									   </script>
									   <?php
								       ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

		<form class="elim" action="" method="get">
			<input class="idelim" type="hidden" name="idelim" value="">
		</form>
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
	    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>

	     <script src="dist/sweetalert.min.js"></script>


	    <script>

	    $(document).ready(function(){

		$("#form1").submit(function(event){
					swal("Datos guardado", "", "success");

					//$('#form1').submit();



		});
    });

	    function  eliminar(id){
            swal({
            title: "Desea eliminar su cuenta?",
            text: "",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si, eliminarlo!",
            closeOnConfirm: false
        }, function () {
            swal("Eliminado!", "La cuenta ha sido eliminada.", "success");
              var url='eliCliente.php';
            $('.elim').attr('action',url);
            $('.idelim').attr('value',id);
            $('.elim').submit();

        });
        }
		</script>


	  </body>
	</html>

	<?php
	}
	?>
<?php
	ob_end_flush();
?>
