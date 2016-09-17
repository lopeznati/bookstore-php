<?php
	include_once "menu-lateral.php";
	$idlibro=$_REQUEST['id'];
	$sql="select * from libros where id='".$idlibro."'";
	$libro=ConsultaSql($sql);
	echo $idLibro;
?>
<link href="dashboard.css" rel="stylesheet">

<div class="container-fluid">
    <div class="row">
    <?php
		include_once "menu-lateral.php";
	?>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h1 class="page-header">Libro</h1>
			<div class="table-responsive">
				<table class="table table-striped" class="modulobuscador"'>
					<tbody>
						<?php
							while($l=mysql_fetch_array($libro))
							{
								$sqlCategoria="select * from categorias where id=".$l['id_categoria']."";
								$c=mysql_fetch_assoc(ConsultaSql($sqlCategoria));

								$sqlEditorial="select * from editoriales where id=".$l['id_editorial']."";
								$e=mysql_fetch_assoc(ConsultaSql($sqlEditorial));

								echo "<form action='verCarro.php' action='GET'>";
								echo "<tr>";
								echo "<td class='celdafoto'><img class='foto' src='".$l['foto']."'/></td>";
								/* echo "<td>
										<span class='titulos'>".$l['titulo']."</span></br>
										<span class='titulos'>ISBN: </span>".$l['ISBN']."</br>
										<span class='titulos'>Precio: </span>"."$ ".$l['precio']."</br>
										<span class='titulos'>Categoria: </span>".utf8_encode($c['descripcion'])."</br>
										<span class='titulos'>Editorial: </span>".$e['nombre']."</br>
										<span class='titulos'>Paginas: </span>".$l['cantPaginas']."</br>
										<div class='celdaboton2'>
											<input  type='submit' class='btn btn-primary' value='Comprar +'/>
										</div>
										</br>
										</div>
										<input type='hidden' name='id' value='".$l['id']."'>
									  </td>";

								*/
							?>
							
							
								<td>
									<span class='titulos'><?php=$l['titulo']?></span></br>
									<span class='titulos'>ISBN: </span><?php=$l['ISBN']?></br>
									<span class='titulos'>Precio: </span>$ <?php=$l['precio']?></br>
									<span class='titulos'>Categoria: </span><?php=utf8_encode($c['descripcion'])?></br>
									<span class='titulos'>Editorial: </span><?=$e['nombre']?></br>
									<span class='titulos'>Paginas: </span><?php=$l['cantPaginas']?></br>
									<?php 
										if(!isset($_SESSION['rol']) or $_SESSION['rol']!='admi' or !isset($_SESSION['usuario_valido']) or $_SESSION['usuario_valido']!=TRUE )
										{ ?>
									      <div class='celdaboton2'>
											<input  type='submit' class='btn btn-primary' value='Comprar +'/>
										  </div>
										<?php 
										}?>
										<!--<input  type='submit' class='btn btn-primary' value='+Info'/>
                                        <botton id='cartelLibro' class='btn btn-primary'> Carro</botton>
                                        <a href='detalle.php'><botton class='btn btn-primary'> Carro</botton></a>-->
										</br>
									<input type='hidden' name='id' value='".$l['id']."'>
								</td>
								<?php

									echo "</tr>";
		
								?>
					
								<tr>
									<td class='titulos'>Sinopsis:</td>
								</tr>
								<tr>
									<td colspan='2' ><?php echo $l['descripcion'];?><td>
								</tr>
								<?php
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
