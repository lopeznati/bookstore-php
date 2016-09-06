﻿<?php 
	include_once "header.php";
	date_default_timezone_set('America/Argentina/Buenos_Aires');

	if(!isset($_SESSION['rol']) or $_SESSION['rol']!='admi' or !isset($_SESSION['usuario_valido']) or $_SESSION['usuario_valido']!=TRUE )
	{
		header('Location: signin.php');
	}
	else{
?>
		<script type="text/javascript" src="js/js_export/jquery.js"></script>
		<script type="text/javascript" src="js/js_export/jquery.tabletoCSV.js"></script>
		<script type="text/javascript" src="js/js_export/tableExport.js"></script>
		<script type="text/javascript" src="js/js_export/jquery.base64.js"></script>
		<script type="text/javascript" src="js/js_export/jspdf/libs/sprintf.js"></script>
		<script type="text/javascript" src="js/js_export/jspdf/jspdf.js"></script>
		<script type="text/javascript" src="js/js_export/jspdf/libs/base64.js"></script>
		
		<!-- scripts para exportar-->
		<script>
			$(function(){
				$("#CSV").click(function(){
					$("#tabla").tableToCSV();
				});
			});	
		</script>

		<script type="text/javascript">
			$(document).ready(function(e){
				$("#XLS").click(function(e){
					$("#tabla").tableExport({
						type:'excel',
						escape:'false'
					});
				});
			});
		</script> 

   <script type="text/javascript">
    $(document).ready(function(e){
    $("#XML").click(function(e){
    $("#tabla").tableExport({
    type:'xml',
    escape:'false'
    });
    });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function(e){
    $("#JSON").click(function(e){
    $("#tabla").tableExport({
    type:'json',
    escape:'false'
    });
    });
    });
    </script>

	<!-- MENU -->
    <div class="container-fluid">
		<div class="row">
			<?php 
				include_once "menu-lateral.php";
			?>
			<!-- Alta libros -->
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h1 class="page-header">Nuevo Libro</h1>
			<?php
				if(!empty($_POST) AND !empty($_FILES['foto']) AND !empty($_POST['isbn']) AND !empty($_POST['titulo']) AND !empty($_POST['descripcion'])AND !empty($_POST['autor']) AND !empty($_POST['nedicion']) AND !empty($_POST['cpaginas']) AND !empty($_POST['precio']) AND !empty($_POST['nexistencia']) AND !empty($_POST['categoria_id']) AND !empty($_POST['editorial_id']))
				{
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
			
					//definir nombre de la imagen
			
					$nombrefoto = "fotos/".date('Y-m-dHis')."_".rand(123,123123);
					if(preg_match("/png/i", $_FILES['foto']['type']) > 0)
						$ext = ".png";
					if(preg_match("/jpg/i", $_FILES['foto']['type']) > 0)
						$ext = ".jpg";
					if(preg_match("/jpeg/i", $_FILES['foto']['type']) > 0)
						$ext = ".jpeg";
					if(preg_match("/gif/i", $_FILES['foto']['type']) > 0)
						$ext = ".gif";
						
					//guardar la imagen a la carpeta foto
					move_uploaded_file($_FILES['foto']['tmp_name'], $nombrefoto.$ext);
	
					$agregarLibro="INSERT INTO libros(id,ISBN,titulo,descripcion,autor,nroEdicion,cantPaginas,precio,existencia,id_categoria, id_editorial, foto)  
								   VALUES('','".$isbn."','".$titulo."','".$descripcion."','".$autor."','".$nedicion."','".$cpaginas."','".$precio."','".$nexistencia."','".$categoriaid."','".$editorialid."', '".$nombrefoto.$ext."')";
					$resultado=ConsultaSql($agregarLibro);
				}
				
				$editoriales=ConsultaSql('select * from editoriales');
				$categorias=ConsultaSql('select * from categorias');
			?>
			<form id="form1" action="" method="post" enctype="multipart/form-data">
				<table class="table table-striped">
					<tr>
						<td>ISBN</td>
						<td><input type="text" id="isbn" name="isbn" required></td>
					</tr>
					<tr>
						<td>Titulo</td>
						<td><input type="text" name="titulo" required></td>
					</tr>
					<tr>
						<td>Descripcion</td>
						<td><textarea rows="8" cols="50" name="descripcion" required></textarea></td>
					</tr>
					<tr>
						<td>Autor</td>
						<td><input type="text" name="autor" required></td>
					</tr>
					<tr>
						<td>Cantidad de Paginas</td>
						<td><input type="text" id="cpaginas" name="cpaginas" required></td>
					</tr>
					<tr>
						<td>Numero Edicion</td>
						<td><input type="text" id="nedicion" name="nedicion" required></td>
					</tr>
					<tr>
						<td>Precio</td>
						<td><input type="text" id="precio" name="precio" required></td>
					</tr>
					<tr>
						<td>Existencia</td>
						<td><input type="text" id="nexistencia" name="nexistencia" required></td>
					</tr>
					<tr>
						<td>Editorial</td>
						<td>
							<select id="editorial_id" name="editorial_id">
								<option value="">Elegir Opcion</option>
									<?php
										while($c=mysql_fetch_array($editoriales)){
										echo "<option value='".$c['id']."'>".$c['nombre']."</option>";}
									?>
								</select>
						</td>
					</tr>
					<tr>
						<tr>
							<td>Categoria</td>
							<td>
								<select id="categoria_id" name="categoria_id">
									<option value="">Elegir Opcion</option>
										<?php
											while($c=mysql_fetch_array($categorias)){
											echo "<option value='".$c['id']."'>".$c['descripcion']."</option>";}
										?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Imagen</td>
							<td><input type="file" name="foto" accept="image/*"><br /></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" id="guardar" class="btn btn-primary" value="Guardar"></td>
						</tr>
					</table>
				</form>
				<?php 
				?>	
				<!-- Listado de Libros -->
				<h2 class="sub-header">Listado</h2>
				<?php 
					$sqlLibros="SELECT l.*, e.nombre as editorial FROM libros l inner join editoriales e on l.id_editorial= e.id";		
					$libros=ConsultaSql($sqlLibros);
				?>
				<div class="table-responsive">
					<table id="tabla" class="table table-striped">
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
									echo "<td>".$l['cantPaginas']."</td>";
									echo "<td>".$l['nroEdicion']."</td>";
									echo "<td>".$l['precio']."</td>";
									echo "<td>".$l['existencia']."</td>";
									echo "<td>".$l['editorial']."</td>";
						
									if(mysql_num_rows($sqlcategoria)==1)
									{
										echo "<td>".$categoria['descripcion']."</td>";
									}
									else{echo "<td></td>";}
									echo "<td><a href='modLibro.php?idmodif=".$l['id']."'><IMG SRC='icon/modify.png' WIDTH=20 HEIGHT=20></a>
										  <a href='eliLibro.php?idelim=".$l['id']."'> <IMG SRC='icon/gnome_edit_delete.png' WIDTH=30 HEIGHT=30>  </a></td>";
									echo "<tr>";
								}
							?>
						</tbody>
					</table>
					<center>
						<div>
							<button id="CSV" class="btn btn-primary" data-export="export">Exportar a CSV</button>
							<button id="XLS" class="btn btn-primary" data-export="export">Exportar a XLS</button>
							<button id="XML" class="btn btn-primary" data-export="export">Exportar a XML</button>
							<button id="JSON" class="btn btn-primary" data-export="export">Exportar a JSON</button>
						</div>
					</center>  
				</div>
			</div>
		</div>
	</div>
	    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="dist/sweetalert.min.js"></script>
		<script>
		$(document).ready(function(){
			$("form").submit(function(event){		
				
				var isbn=$("#isbn").val();
	  			isbn =parseInt(isbn);
	  			if(isNaN(isbn)){
	  				alert("El campo ISBN ingresado debe ser un numero");	  
					error=true;
					//cancela el evento
	   				event.preventDefault();
	  			}else error=false;
	  			
				var cantidad=$("#cpaginas").val();
	  			cantidad =parseInt(cantidad);
	  			if(isNaN(cantidad)){
	  				alert("El campo Cantidad de Paginas ingresado debe ser un numero");	  
					error=true;
					//cancela el evento
	   				event.preventDefault();
	  			}else error=false;
	  				
	  			var nro_edicion=$("#nedicion").val();
	  			nro_edicion =parseInt(nro_edicion);
	  			if(isNaN(nro_edicion)){
	  				alert("El campo Número de Edicion ingresado debe ser un numero");	  
					error=true;
					//cancela el evento
					event.preventDefault();
	  			}else error=false;
	  				
	  			var precio=$("#precio").val();
	  			precio =parseFloat(precio);
	  			if(isNaN(precio)){
	  				alert("El campo Precio ingresado debe ser un numero o un decimal");	 
					error=true;					
	  				//cancela el evento
	   				event.preventDefault();
	  			}else error=false;
	  				
	  			var existencia=$("#nexistencia").val();
	  			existencia =parseInt(existencia);
	  			if(isNaN(existencia)){
	  				alert("El campo Existencia ingresado debe ser un numero");	  
					error=true;
	  				//cancela el evento
	   				event.preventDefault();
	  			}else error=false;
				
				var editorial=$("#editorial_id").val();
				if(editorial === ''){
					alert("El campo Editorial no puede quedar vacio, seleccione una opcion.");	  
					//cancela el evento
					event.preventDefault();
				}
				var categoria=$("#categoria_id").val();
				if(categoria === ''){
					alert("El campo Categoria no puede quedar vacio, seleccione una opcion.");	  
					//cancela el evento
					event.preventDefault();
				}	
				
				if (editorial !="" && categoria !="" && error==false){
					swal("Libro guardado", "", "success");
					$('.confirm').click(function(){
					$('#form1').submit();

					});
				}
			});
		});
		</script>
	</body>
</html>

<?php 
}
?>
