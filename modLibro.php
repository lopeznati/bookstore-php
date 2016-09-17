<?php
	include_once "menu-lateral.php";

	if($_SESSION['rol']!='admi' or !isset($_SESSION['usuario_valido']) or $_SESSION['usuario_valido']!=TRUE )
	{
		header('Location: signin.php');
	}
	else{
		//devuelvo libro a modificar
		$idModificar=$_REQUEST['idmodif'];
		$sql="select * from libros where id=".$idModificar."";
		$resultado=ConsultaSql($sql);
		$libroMod=mysql_fetch_array($resultado);
?>
	<!-- MENU -->
    <div class="container-fluid">
		<div class="row">
			<?php
				include_once "menu-lateral.php";
			?>
			<!-- Modificar libros -->
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<h1 class="page-header">Modificar Libro</h1>
				<?php
					if(!empty($_POST) AND isset($_POST['Modificado']) AND $_POST['Modificado']==1 AND !empty($_POST['isbn']) AND !empty($_POST['titulo']) AND !empty($_POST['descripcion']) AND !empty($_POST['autor']) AND !empty($_POST['nedicion']) AND !empty($_POST['cpaginas']) AND !empty($_POST['precio']) AND !empty($_POST['nexistencia']) AND !empty($_POST['categoria_id']) AND !empty($_POST['editorial_id']))
					{
						$id=trim($_POST['idlibro']);
						$isbn=trim($_POST['isbn']);
						$titulo=trim($_POST['titulo']);
						$descripcion=trim($_POST['descripcion']);
						$autor=trim($_POST['autor']);
						$nedicion=trim($_POST['nedicion']);
						$cpaginas=trim($_POST['cpaginas']);
						$precio=trim($_POST['precio']);
						$nexistencia=trim($_POST['nexistencia']);
						$categoriaid=trim($_POST['categoria_id']);
						$editorialid=trim($_POST['editorial_id']);

						$modificarLibro="UPDATE libros SET id='".$id."',ISBN='".$isbn."',titulo='".$titulo."',descripcion='".$descripcion."',autor='".$autor."',nroEdicion='".$nedicion."',cantPaginas='".$cpaginas."',precio='".$precio."',existencia='".$nexistencia."',id_categoria='".$categoriaid."',id_editorial='".$editorialid."' WHERE id='".$id."'";
						$resultado=ConsultaSql($modificarLibro);

						header('Location: nuevoLibro.php');
						exit();
					}

					if(isset($_POST['archivo']) AND $_POST['archivo']==1 AND !empty($_FILES))
					{
						//archivo
						$nombrearchivo = "pdf/".date('Y-m-dHis')."_".rand(123,123123);
						if(preg_match("/pdf/i", $_FILES['archivo']['type']) > 0)
							$ext2 = ".pdf";

						//guardar la imagen a la carpeta foto
						move_uploaded_file($_FILES['archivo']['tmp_name'], $nombrearchivo.$ext2);

						$modificarLibro="UPDATE libros SET archivo='".$nombrearchivo.$ext2."' WHERE id='".$_POST['idlibro']."'";
						$resultado=ConsultaSql($modificarLibro);
					}

					$editoriales=ConsultaSql('select * from editoriales');
					$categorias=ConsultaSql('select * from categorias');
				?>

				<form id="form1" action="" method="post">
					<table class="table table-striped">
						<input type="hidden" name="idlibro" value="<?php echo $libroMod['id'];?>">
						<input type="hidden" name="Modificado" value="1">
						<tr>
							<td>ISBN:</td>
							<td><input id="isbn" type="text"  name="isbn" value="<?php echo $libroMod['ISBN'];?>" required></td>
						</tr>
						<tr>
							<td>Titulo:</td>
							<td><input  type="text" id="titulo" name="titulo" value="<?php echo $libroMod['titulo'];?>" required></td>
						</tr>
						<tr>
							<td>Descripcion:</td>
							<td><textarea rows="8" cols="50" name="descripcion" required><?php echo $libroMod['descripcion'];?></textarea></td>
						</tr>
						<tr>
							<td>Autor:</td>
							<td><input type="text" id="autor" name="autor" value="<?php echo $libroMod['autor'];?>" required ></td>
						</tr>
						<tr>
							<td>Cantidad de Paginas:</td>
							<td><input id="cpaginas" type="text" name="cpaginas" value="<?php echo $libroMod['cantPaginas'];?>" required></td>
						</tr>
						<tr>
							<td>Numero Edicion:</td>
							<td><input id="nedicion" type="text" name="nedicion" value="<?php echo $libroMod['nroEdicion'];?>" required></td>
						</tr>
						<tr>
							<td>Precio:</td>
							<td><input id="precio" type="text" name="precio" value="<?php echo $libroMod['precio'];?>" required></td>
						</tr>
						<tr>
							<td>Existencia:</td>
							<td><input id="nexistencia" type="text" name="nexistencia" value="<?php echo $libroMod['existencia'];?>" required></td>
						</tr>
						<tr>
							<td>Editorial:</td>
							<td>
								<select id="editorial_id" name="editorial_id">
									<?php
										while($c=mysql_fetch_array($editoriales))
										{
											if($c['id']==$libroMod['id_editorial'])
												$sel='selected';
											else $sel='';
											echo "<option ".$sel." value='".$c['id']."'>".$c['nombre']."</option>";
										}
									?>
								</select>
							</td>
						</tr>
						<tr>
						<tr>
							<td>Categorias:</td>
							<td>
								<select id="categoria_id" name="categoria_id">
									<option>Elegir Opcion:</option>
										<?php
											while($c=mysql_fetch_array($categorias))
											{
												if($c['id']==$libroMod['id_categoria'])
													$sel='selected';
												else $sel='';
												echo "<option ".$sel." value='".$c['id']."'>".$c['descripcion']."</option>";
											}
										?>
								</select>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" id="guardar" class="btn btn-primary" value="Guardar"></td>
						</tr>
					</table>
				</form>
				<?php
				?>

				<form action="" method="post" enctype="multipart/form-data">
					<table class="table table-striped">
						<tr>
							<input type="hidden" name="idlibro" value="<?php echo $libroMod['id'];?>">
							<input type="hidden" name="archivo" value="1">
						</tr>
						<tr>
						</tr>
					</table>
				</form>

				<!-- Listado de Libros -->
				<h2 class="sub-header">Listado</h2>
				<?php
					$sqlLibros="SELECT l.*, e.nombre as editorial FROM libros l inner join editoriales e on l.id_editorial= e.id";
					$libros=ConsultaSql($sqlLibros);
				?>
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>ISBN</th>
								<th>Titulo</th>
								<th>Autor</th>
								<th>Cantidad de paginas</th>
								<th>Numero Edicion</th>
								<th>Precio</th>
								<th>Existencia</th>
								<th>Editorial</th>
								<th>Categoria</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php
								while($l=mysql_fetch_array($libros))
								{
									$sqlcategoria=ConsultaSql("select descripcion from categorias where id='".$l['id_categoria']."'");
									$categoria=mysql_fetch_array($sqlcategoria);
									echo "<tr>";
									echo "<td>".$l['id']."</td>";
									echo "<td>".$l['ISBN']."</td>";
									echo "<td>".$l['titulo']."</td>";
									echo "<td>".$l['autor']."</td>";
									echo "<td>".$l['nroEdicion']."</td>";
									echo "<td>".$l['cantPaginas']."</td>";
									echo "<td>".$l['precio']."</td>";
									echo "<td>".$l['existencia']."</td>";
									echo "<td>".$l['editorial']."</td>";

									if(mysql_num_rows($sqlcategoria)==1)
										echo "<td>".$categoria['descripcion']."</td>";
									else
										echo "<td></td>";
									echo "<td><a href='modLibro.php?idmodif=".$l['id']."'><IMG SRC='icon/modify.png' WIDTH=20 HEIGHT=20></a>
									<a href='#' onClick='eliminar(".$l['id'].")'> <IMG SRC='icon/gnome_edit_delete.png' WIDTH=30 HEIGHT=30>  </a></td>";

									echo "<tr>";
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


	<form class="elim" action="" method="get">
			<input class="idelim" type="hidden" name="idelim" value="">
	</form>

	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="dist/sweetalert.min.js"></script>
	<script>
		$(document).ready(function(){
		    //swal("Good job!", "You clicked the button!", "warning");
			$("#form1").submit(function(event){
					var error=false;

				var isbn=$("#isbn").val();
	  			isbn =parseInt(isbn);
	  			if(isNaN(isbn)){

	  				//alert("El campo ISBN ingresado debe ser un numero");
					error=true;
					//cancela el evento
	   				event.preventDefault();
	   			   swal("", "El campo ISBN ingresado debe ser un numero", "warning");
	  			}

				var cantidad=$("#cpaginas").val();
	  			cantidad =parseInt(cantidad);
	  			if(isNaN(cantidad)){
	  				swal("", "El campo Cantidad de Paginas ingresado debe ser un numero", "warning");
	  				//alert("El campo Cantidad de Paginas ingresado debe ser un numero");
					error=true;
					//cancela el evento
	   				event.preventDefault();
	  			}

	  			if($("#cpaginas").val().length >5){
                //alert("El numero de tarjeta debe tener 16 caracteres");
                event.preventDefault()
                $("#cpaginas").focus();
                error=true;
                swal("", "La cantidad de caracteres ingresados en el campo Cantidad de Paginas supera el permitido.", "warning");

            	}

	  			var nro_edicion=$("#nedicion").val();
	  			nro_edicion =parseInt(nro_edicion);
	  			if(isNaN(nro_edicion)){
	  				//alert("El campo Número de Edicion ingresado debe ser un numero");
	  				swal("", "El campo Número de Edicion ingresado debe ser un numero", "warning");

					error=true;
					//cancela el evento
					event.preventDefault();
	  			}

	  			if($("#nedicion").val().length >5){
                //alert("El numero de tarjeta debe tener 16 caracteres");
                event.preventDefault()
                $("#nedicion").focus();
                error=true;
                swal("", "La cantidad de caracteres ingresados en el campo  Número de Edicion supera el permitido.", "warning");

            	}

            	if($("#autor").val().length >15){
                //alert("El numero de tarjeta debe tener 16 caracteres");
                event.preventDefault()
                $("#nedicion").focus();
                error=true;
                swal("", "La cantidad de caracteres ingresados en el campo  Autor supera el permitido.", "warning");

            	}

            	if($("#titulo").val().length >15){
                //alert("El numero de tarjeta debe tener 16 caracteres");
                event.preventDefault()
                $("#nedicion").focus();
                error=true;
                swal("", "La cantidad de caracteres ingresados en el campo  titulo supera el permitido.", "warning");

            	}


	  			var precio=$("#precio").val();
	  			//precio =parseFloat(precio);
	  			if(isNaN(precio)){
	  				//alert("El campo Precio ingresado debe ser un numero o un decimal");
	  				swal("", "El campo Precio ingresado debe ser un numero o un decimal", "warning");

					error=true;
	  				//cancela el evento
	   				event.preventDefault();
	  			}




	  			if($("#precio").val().length >5){
                //alert("El numero de tarjeta debe tener 16 caracteres");
                event.preventDefault()
                $("#precio").focus();
                error=true;
                swal("", "La cantidad de caracteres ingresados en el campo Precio supera el permitido.", "warning");

            	}

	  			var existencia=$("#nexistencia").val();
	  			existencia =parseInt(existencia);
	  			if(isNaN(existencia)){
	  				//alert("El campo Existencia ingresado debe ser un numero");
	  				swal("", "El campo Existencia ingresado debe ser un numero", "warning");

					error=true;
	  				//cancela el evento
	   				event.preventDefault();
	  			}


	  			if($("#existencia").val().length >5){
                //alert("El numero de tarjeta debe tener 16 caracteres");
                event.preventDefault()
                $("#precio").focus();
                error=true;
                swal("", "La cantidad de caracteres ingresados en el campo Precio supera el permitido.", "warning");

            	}

				if (error==false){
					swal("Libro guardado", "", "success");

				}else{
				event.preventDefault();
				}
			});
		});


		function  eliminar(id){
            swal({
            title: "Desea eliminar al cliente?",
            text: "",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si, eliminarlo!",
            closeOnConfirm: false
        }, function () {
            swal("Eliminado!", "El libro ha sido eliminada.", "success");
              var url='eliLibro.php';
            $('.elim').attr('action',url);
            $('.idelim').attr('value',id);
            $('.elim').submit();

        });
        }

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
<?php
}
?>
