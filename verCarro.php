<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript"  src="js/scripts.js"></script>
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
<link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
<link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/style-responsive.css" rel="stylesheet">
<script src="assets/js/chart-master/Chart.js"></script>
<?php
include_once "menu-lateral.php";
include_once "header.php";

if(isset($_SESSION['carro'])){
	if(isset($_REQUEST['id'])){
		$arreglo=$_SESSION['carro'];
		$encontro=false;
		$numero=0;
		for($i=0;$i<count($arreglo);$i++){
			if($arreglo[$i]['id']==$_REQUEST['id']){
				$encontro=true;
				$numero=$i;
			}
		}
		if($encontro==true){
			$arreglo[$numero]['cantidad']=$arreglo[$numero]['cantidad'] +1;
			$_SESSION['carro']=$arreglo;
		}else{
			$titulo="";
			$precio=0;
			$re=ConsultaSql("select * from libros where id='".$_REQUEST['id']."'");
			while($f=mysql_fetch_array($re)){
				$titulo=$f['titulo'];
				$precio=$f['precio'];
			}
			$datosNuevos=ARRAY('id'=> $_REQUEST['id'],
							'titulo'=>$titulo,
							'precio'=>$precio,
							'cantidad'=>1);
			array_push($arreglo,$datosNuevos);
			$_SESSION['carro']=$arreglo;
		}
}
} else{
	//primera vez
	if(isset($_REQUEST['id'])){
		$titulo="";
		$precio=0;
		$re=ConsultaSql("select * from libros where id='".$_REQUEST['id']."'");
		while($f=mysql_fetch_array($re)){
			$titulo=$f['titulo'];
			$precio=$f['precio'];
		}
		$arreglo[]=ARRAY('id'=> $_REQUEST['id'],
						'titulo'=>$titulo,
						'precio'=>$precio,
						'cantidad'=>1);
		$_SESSION['carro']=$arreglo;
	}
}
?>
			<section id="container white-backround" >
	  			<section id="main-content">
          			<section class="wrapper">
              			<div class="row mt">
                  		<div class="col-md-12">
                  		<h4><i class="fa fa-angle-right"></i>Tu carrito</h4>
	              		<hr>
                      	<div class="content-panel">
													<?php
													if(isset($_SESSION['carro'])){
														$datos=$_SESSION['carro'];
														$total=0;

													//si el carro no está vacío,
													//mostramos los productos
													?>
                        	<table id="tabla" class="table table-striped">
              					<thead>
                					<tr>
                  						<th>Libro</th>
                  						<th>Precio</th>
                 					 		<th>Cantidad de Unidades</th>
                 					 		<th>SubTotal</th>
                					</tr>
              					</thead>
                        <tbody>
													<?php
													$color=array("#ffffff","#F0F0F0");
													$contador=0;
													$suma=0;
													foreach($datos as $k => $v){
													$subto=$v['cantidad']*$v['precio'];
													$suma=$suma+$subto;
													$contador++;
													?>
                      		<tr bgcolor="<?php echo $color[$contador%2]; ?>" class='prod'>
                          	<td><?php echo $v['titulo'] ?></td>
														<td><?php echo $v['precio'] ?></td>
														<td><input  type='text' value='<?php echo $v['cantidad']; ?>'
																	data-precio="<?php echo $v['precio']; ?>"
																	data-id="<?php echo $v['id']; ?>"
																	class="cantidad"></td>
														<td><span class='subtotal_<?php echo $v['id']; ?>'><?php echo $v['precio']*$v['cantidad']; ?></span></td>
														<td><a href="borracar.php?id=<?php echo $v['id'] ?>"><img src="trash.gif" width="12" height="14" border="0"></a>
															<input name="id" type="hidden" id="id" value="<?php echo $v['id'] ?>"> </td>
													</tr>
                      	</tbody>
												<?php } ?>
                        </table>
                        <div align="center"><span >Total de Articulos:<?php echo count($datos); ?></span>
									</div><br>
									<div  align="center" id='total'><span >Total:$<?php echo number_format($suma,2); ?>
								</span>
								</div><br>
									<div  align="center">
										<span>Continuar la seleccion de productos</span>
										<a href="index.php?<?php echo SID; ?>">
										<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
									</div>
									<div  align="center">
										<?php if($suma!=0) { ?>
										<input type="button" name="btnComprar" value="Comprar" class="btn btn-primary" onClick="location.href='comprar.php'">

									</div>
									<br>
                  <?php } ?>
									<?php } else{ ?>
									<div align="center">
										<span class="prod">No hay productos seleccionados</span>
							    		<a href="index.php?<?php echo SID; ?>">
										<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
									</div>
									<div  align="center">
										<input disabled type="button" name="btnComprar" value="Comprar" class="btn btn-primary" onClick="location.href='comprar.php'">
									</div>
									<? } ?>
                      		</div>
                  		</div>
              		</div>
				</section>
      		</section>
	  	</section>
