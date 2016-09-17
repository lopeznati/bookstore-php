<?php
session_start();
include_once "funciones.php";
?>
<meta charset="utf-8">
<script src="https://use.fontawesome.com/7fa1cd24b5.js"></script>
<link href="https://fonts.googleapis.com/css?family=Crete+Round|Oswald|Roboto" rel="stylesheet">
<link href="styles.css" rel="stylesheet">
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<script src="assets/js/ie-emulation-modes-warning.js"></script>
<link href="styles.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
<!--<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
		< ?php if(!isset($_SESSION['rol']) or $_SESSION['rol']!='admi' or !isset($_SESSION['usuario_valido']) or $_SESSION['usuario_valido']!=TRUE )
		{
		?>
			<li class="active"><a href="miCuenta.php">Mi Cuenta</a></li>
			<li><a href="pedidosCliente.php">Mis pedidos</a></li>
		< ?php
		}
		else
		{
		?>
			<li><a href="miCuenta.php">Mi Cuenta</a></li>
			<li class="active"><a href="nuevoLibro.php">Libros <span class="sr-only">(current)</span></a></li>
			<li><a href="nuevoCliente.php">Clientes</a></li>
			<li><a href="nuevaCategoria.php">Categorias</a></li>
			<li><a href="listadoPedidosClientes.php">Pedidos Clientes</a></li>
		< ?php
		}
		?>
    </ul>
</div>-->

<nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Todo Colección</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-2">
          <ul class="nav navbar-nav navbar-right">
            <?php
			if(!isset($_SESSION['rol']) or !isset($_SESSION['usuario_valido']) or $_SESSION['usuario_valido']!=TRUE )
            {
            ?>
            <li><a href="miCuenta.php">Mi Cuenta</a></li>
			<li><a href="formularioContacto.php">Contacto</a></li>
      <li><a href="verCarro.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
      <li><a href="mapaSitio.php">Mapa del Sitio</a></li>
			<li><a class="btn btn-default btn-outline btn-circle collapsed"  href="signin.php" aria-expanded="false" >Iniciar Sesión</a></li>
            <?php
            }
			else if (isset($_SESSION['rol']))
			{
				?>
					<li><a href="miCuenta.php">Mi Cuenta</a></li>
				<?php
				if ((strcmp($_SESSION['rol'],'admi'))==0)
				{
				?>
					<li><a href="nuevoLibro.php">Libros</a></li>
					<li><a href="nuevoCliente.php">Clientes</a></li>
					<li><a href="nuevaCategoria.php">Categorias</a></li>
					<li><a href="listadoPedidosClientes.php">Pedidos Clientes</a></li>
				<?php
				}
				else { ?>
					<li><a href="verCarro.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
					<?php
					if ((strcmp($_SESSION['rol'],'cli'))==0)
				{?>
					<li><a href="pedidosCliente.php">Mis Pedidos</a></li>
					<?php
				}}
				?>
				<li><a href="formularioContacto.php">Contacto</a></li>
				<li><a href="mapaSitio.php">Mapa del Sitio</a></li>
				<li>
					<a class="btn btn-default btn-outline btn-circle collapsed"  href="logout.php" aria-expanded="false" >Cerrar Sesión</a>
				</li>
			<?php
			} ?>
          </ul>
        <!--  <div class="collapse nav navbar-nav nav-collapse slide-down" id="nav-collapse2">
            <form class="navbar-form navbar-right form-inline" role="form">
              <div class="form-group">
                <label class="sr-only" for="Email">Email</label>
                <input type="email" class="form-control" id="Email" placeholder="Email" autofocus required />
              </div>
              <div class="form-group">
                <label class="sr-only" for="Password">Password</label>
                <input type="password" class="form-control" id="Password" placeholder="Password" required />
              </div>
              <button type="submit" class="btn btn-success">Sign in</button>
            </form>
          </div>-->
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
