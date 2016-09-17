<?php
	include_once "menu-lateral.php";
	date_default_timezone_set('America/Argentina/Buenos_Aires');

?>
<head>
	<meta charset="utf-8">
	<script src="https://use.fontawesome.com/7fa1cd24b5.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Crete+Round|Oswald|Roboto" rel="stylesheet">
	<link href="dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="styles.css" rel="stylesheet">
	<style type="text/css">
	</style>
</head>
<body>
		<div class="container-fluid margen">
			<div class="row margen">
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main margen">
					<h1 class="page-header">Mapa del Sitio</h1>
					<div  id="SitemapTreeContainer">
						<ul>
							<li id="SitemapTreeRootNode"><a href="index.php">Inicio</a>
							<ul>
								<li>
									<a href="miCuenta.php">Mi cuenta</a>
								</li>
								<?php
									if (isset($_SESSION['rol']))
									{
										if ((strcmp($_SESSION['rol'],'cli'))==0)
										{?>
											<li><a href="verCarro.php">Carrito de Compras</a></li>
											<li><a href="pedidosCliente.php">Mis Pedidos</a></li>
										<?php
										}
										elseif ((strcmp($_SESSION['rol'],'admi'))==0)
										{
										?>
											<li><a href="nuevoLibro.php">Libros</a></li>
											<li><a href="nuevoCliente.php">Clientes</a></li>
											<li><a href="nuevaCategoria.php">Categorias</a></li>
											<li><a href="listadoPedidosClientes.php">Pedidos Clientes</a></li>
										<?php
										}
									}
									else {
										?>
										<li><a href="verCarro.php">Carrito de Compras</a></li>
										<?php
									}
									?>
								<li>
									<a href="formularioContacto.php">Contacto</a>
								</li>

								<li>
									<a href="mapaSitio.php">Mapa del Sitio</a>
								</li>
							</ul>
							</li>
						</ul>
				</div>
			</div>
		</div>
</body>