<?php
include_once "menu-lateral.php";
?>


	<meta charset="UTF-8">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  src="js/scripts.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Crete+Round|Oswald|Roboto" rel="stylesheet">
	<link href="styles.css" rel="stylesheet">


	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
	<link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
	<link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/style-responsive.css" rel="stylesheet">
	<script src="assets/js/chart-master/Chart.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  src="js/scripts.js"></script>

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



				//paginacionn
				$cant_por_pag=4;
				$pagina=isset($_GET['pagina'])? $_GET['pagina']: null;
				if(!$pagina){
					$inicio=0;
					$pagina=1;


				}
				else{
					$inicio=($pagina -1) * $cant_por_pag;

				}

				$total_registros=mysql_num_rows($libros);
				$total_paginas=ceil($total_registros / $cant_por_pag);
				if(isset($_REQUEST['busqueda']))
				{
					$libros=ConsultaSql("SELECT * FROM libros WHERE titulo like '".$busqueda."%' limit ".$inicio.",".$cant_por_pag);

					//echo "SELECT * FROM libros WHERE titulo like '".$busqueda."%' limit ".$inicio.",".$cant_por_pag;
				}
				else
				{
					$libros=ConsultaSql("select * from libros"." limit ".$inicio.",".$cant_por_pag);

				}


				$total_registros=mysql_num_rows($libros);




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
								echo "<td class='celdafoto'><img src='".$l['foto']."' class='foto'></td>";


								/*echo "<td>
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
									</td>"; */

								?>

								<td>

									   <span class='titulos'><?=$l['titulo'] ?></span></br>
										<span class='titulos'>ISBN: </span><?=$l['ISBN']?></br>
										<span class='titulos'>Precio: </span>$ <?=$l['precio']?></br>
										<span class='titulos'>Categoria: </span><?=$c['descripcion']?></br>
										<span class='titulos'>Editorial: </span><?=$e['nombre']?></br>
										<div class='celdaboton'><a href='detalle.php?id=<?=$l['id']?>'><botton class='btn btn-sunny text-uppercase'><i class='fa fa-plus' aria-hidden='true'></i>Info</botton></a>
											<?php if(!isset($_SESSION['rol']) or $_SESSION['rol']!='admi' or !isset($_SESSION['usuario_valido']) or $_SESSION['usuario_valido']!=TRUE )
											{ ?>


											<input  type='submit' class='btn btn-fresh text-uppercase' value='Comprar'/>

											<?php }?>
											<!--<input  type='submit' class='btn btn-primary' value='+Info'/>
											<botton id='cartelLibro' class='btn btn-primary'> Carro</botton>
											<a href='detalle.php'><botton class='btn btn-primary'> Carro</botton></a>-->
										</div>
										<input type='hidden' name='id' value='<?=$l['id']?>'>
									</td>


						<?php






								echo "</tr>";
								echo "</form>";


							}

						echo "</tbody>";
						echo "</table>";
						echo "</div>";
						echo "<ul class='pagination'>";
						if($total_paginas > 1){
							for($i=1;$i<=$total_paginas;$i++){
								if($pagina==$i){
									 echo "<li class='active'><a href='index.php?pagina=".$pagina."'>".$pagina."</a></li>";

								}else echo "<li><a href='index.php?pagina=".$i."'>".$i."</a></li>";
							}
						}
						echo "</ul>";

	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
	<script src="dist/js/bootstrap.min.js"></script>
	<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
	<script src="assets/js/vendor/holder.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
		<script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>
    <script src="assets/js/common-scripts.js"></script>
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

  </body>
