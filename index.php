<?php
include_once "menu-lateral.php";
?>
<head>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script type="text/javascript"  src="js/libro.js"></script>

		<link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style-responsive.css" rel="stylesheet">
		<script src="https://use.fontawesome.com/7fa1cd24b5.js"></script>
</head>
<body>
    <!-- MENU -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<!-- Sector de busqueda -->
				<?php include_once 'busq.php';?>
				<h2 class="page-header">Libros</h2>
				<?php
					if(isset($_REQUEST['busqueda']))
					{
						$busqueda=$_REQUEST['busqueda'];
						$libros= ConsultaSql("SELECT * FROM libros WHERE titulo like '".$busqueda."%' ORDER BY TITULO DESC");
					}
					else
					{
						$sqllibros="select * from libros";
						$libros=ConsultaSql($sqllibros);
					}
				?>
				<div class="table-responsive">
					<table class="table table-hover" class="modulobuscador" >
						<tbody>
						<?php
							while($l=mysql_fetch_array($libros))
							{
								$sqlCategoria="select * from categorias where id=".$l['id_categoria']."";
								$c=mysql_fetch_assoc(ConsultaSql($sqlCategoria));

								$sqlEditorial="select * from editoriales where id=".$l['id_editorial']."";
								$e=mysql_fetch_assoc(ConsultaSql($sqlEditorial));
								echo "<form action='verCarro.php' action='GET'>";
								echo "<tr>";
								echo "<td class='celdafoto'><img class='foto' src='".$l['foto']."'/></td>";
								echo "<td>
										<span class='titulos'>".$l['titulo']."</span></br>
										<span class='titulos'>ISBN: </span>".$l['ISBN']."</br>
										<span class='titulos'>Precio: </span>"."$ ".$l['precio']."</br>
										<span class='titulos'>Categoria: </span>".$c['descripcion']."</br>
										<span class='titulos'>Editorial: </span>".$e['nombre']."</br>
										<div class='celdaboton'><a href='detalle.php?id=".$l['id']."'><botton class='btn btn-sunny text-uppercase'><i class='fa fa-plus' aria-hidden='true'></i>Info</botton></a>
											<input  type='submit' class='btn btn-fresh text-uppercase' value='Comprar'/>
											<!--<input  type='submit' class='btn btn-primary' value='+Info'/>
											<botton id='cartelLibro' class='btn btn-primary'> Carro</botton>
											<a href='detalle.php'><botton class='btn btn-primary'> Carro</botton></a>-->
										</div>
										<input type='hidden' name='id' value='".$l['id']."'>
									</td>";
								echo "</tr>";
								echo "</form>";
							}
						?>
						</tbody>
					</table>
				</div>
			</div>
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
