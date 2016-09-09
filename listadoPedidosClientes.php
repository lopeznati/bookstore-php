<?php
	include_once "menu-lateral.php";
	date_default_timezone_set('America/Argentina/Buenos_Aires');

	if(!isset($_SESSION['rol']) or !isset($_SESSION['usuario_valido']) or $_SESSION['usuario_valido']!=TRUE )
	{
		header('Location: signin.php');
	}
	else {
?>
<head>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript"  src="js/libro.js"></script>
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="styles.css" rel="stylesheet">
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="assets/css/style-responsive.css" rel="stylesheet">
	<script src="https://use.fontawesome.com/7fa1cd24b5.js"></script>
</head>
		<div class="container-fluid">
			<div class="row">
				<?php
					include_once "menu-lateral.php";
				?>
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<h2 class="sub-header">Pedidos Clientes</h2>

				<!-- Listado Pedidos de clientes -->

				<?php

					$sqlPedidos="SELECT p.* FROM pedidos p";
					$pedidos=ConsultaSql($sqlPedidos);
				?>
				<div class="table-responsive">
					<table id="tabla" class="table table-striped">
						<thead>
							<tr>
								<th>Fecha Pedido</th>
								<th>Cliente</th>
								<th>Libro</th>
								<th>Cantidad</th>
								<th>Subtotal</th>
								<th>Domicilio</th>
								<th>Localidad</th>
							</tr>
						</thead>
						<tbody>
							<?php
								while($p=mysql_fetch_array($pedidos))
								{
									$sqlcliente=ConsultaSql("select concat(c.nombre,' ',c.apellido) as nya from clientes c where id='".$p['id_cliente']."'");
									$cliente=mysql_fetch_array($sqlcliente);

									$sqllibro=ConsultaSql("select titulo from libros where id='".$p['id_libro']."'");
									$libro=mysql_fetch_array($sqllibro);

									$sqllocalidad=ConsultaSql("select nombre from localidades where id='".$p['localidad_id']."'");
									$localidad=mysql_fetch_array($sqllocalidad);

									echo "<tr>";
									echo "<td>".$p['fechaPedido']."</td>";
									if(mysql_num_rows($sqlcliente)==1)
										echo "<td>".$cliente['nya']."</td>";
									else
										echo "<td></td>";
									if(mysql_num_rows($sqllibro)==1)
										echo "<td>".$libro['titulo']."</td>";
									else
										echo "<td></td>";
									echo "<td>".$p['cantidad']."</td>";
									echo "<td>".$p['subtotal']."</td>";
									echo "<td>".$p['domicilio']."</td>";
									if(mysql_num_rows($sqllocalidad)==1)
									{
										echo "<td>".$localidad['nombre']."</td>";
									}
									else{echo "<td></td>";}
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
			</div>
		</div>
	</body>
</html>

<?php
}
?>
