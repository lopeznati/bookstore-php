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
<?php
include_once 'menu-lateral.php';
//si lo agrego una segunda vez
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

}else{
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


 <div class="container-fluid margen">
      <div class="row margen">
	   <?php

		include_once "menu-lateral.php";

		?>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

		<h1 align="center">Carrito</h1>

		<?php
		if(isset($_SESSION['carro'])){
			$datos=$_SESSION['carro'];
			$total=0;







		//si el carro no está vacío,
		//mostramos los productos
		?>

		<table width="800" border="0" cellspacing="0" cellpadding="0" align="center">
		<tr bgcolor="#333333" class="tit">
		<td width="105"> <font color="#ffffff">Libro</font></td>
		<td width="207"><font color="#ffffff">Precio</font></td>
		<td width="305"><font color="#ffffff">Cantidad de Unidades</font></td>
		<td width="105"><font color="#ffffff">SubTotal</font></td>
		<td width="10" align="center"><font color="#ffffff">Borrar</font></td>

		</tr>
		<?php
		$color=array("#ffffff","#F0F0F0");
		$contador=0;
		//las 2 líneas anteriores
		//sirven sólo para hacer
		//una tabla con colores
		//alternos
		$suma=0;
		//antes de recorrer todos
		//los valores de la matriz
		//$carro, ponemos a cero la
		//variable $suma, en la que
		//iremos sumando los subtotales
		//del costo de cada item por la
		//cantidad de unidades que se
		//especifiquen
		foreach($datos as $k => $v){
		//recorremos la matriz que tiene
		//todos los valores del carro,
		//calculamos el subtotal y el
		// total
		$subto=$v['cantidad']*$v['precio'];

		$suma=$suma+$subto;
		$contador++;
		//este es el contador que usamos
		//para los colores alternos
		?>
		<div class="producto_<?php echo $v['id']; ?>">
		<tr bgcolor="<?php echo $color[$contador%2]; ?>" class='prod'>
		<td><?php echo $v['titulo'] ?></td>
		<td><?php echo $v['precio'] ?></td>
		<td><input  type='text' value='<?php echo $v['cantidad'];?>'
					data-precio="<?php echo $v['precio']; ?>"
					data-id="<?php echo $v['id']; ?>"
					class="cantidad"></td>
		<td><span class='subtotal_<?php echo $v['id']; ?>'><?php echo $v['precio']*$v['cantidad'];?></span></td>
		<td align="center"><a href="borracar.php?id=<?php echo $v['id'] ?>"><img src="trash.gif" width="12" height="14" border="0"></a></td>



		<input name="id" type="hidden" id="id" value="<?php echo $v['id'] ?>"> </td>


		</tr>
		</div>
		<?php
		//por cada item creamos un
		//formulario que submite a
		//agregar producto y un link
		//que permite eliminarlos
		}
		?>
		</table>
		</div>
		<div class="fix-margin">
		<div style="margin-left:250px;" align="center"><span class="prod">Total de Artículos: <?php echo count($datos);
		//el total de items va a ser igual
		//a la cantidad de elementos que
		//tenga la matriz $carro, valor
		//que obtenemos con la función
		//count o con sizeof
		?></span>
		</div><br>
		<div style="margin-left:250px;" align="center" id='total'><span class="prod">Total: $<?php echo number_format($suma,2);
		//mostramos el total de la variable
		//$suma formateándola a 2 decimales
		?></span>
		</div><br>

		<div  style="margin-left:250px;" align="center"><span class="prod">Continuar la selección de productos</span>


		<a href="index.php?<?php echo SID;?>">
		<img src="continuar.gif" width="13" height="13" border="0"></a>
		</div>
		<?php if($suma!=0){ ?>
		<div  style="margin-left:900px;" align="center"><a href='comprar.php'><botton class='btn btn-primary'>Iniciar Compra</botton></a> </div>
		<?php }?>
		<?php }else{ ?>

		<p align="center"> <span class="prod">No hay productos seleccionados</span>
		<a href="index.php?<?php echo SID;?>">
		<img src="continuar.gif" width="13" height="13" border="0"></a>
		<?php }?>
		</p>
	</div>







          <div class="table-responsive">
            <table class="table table-striped">

            </table>

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
