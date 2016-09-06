<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
		<?php if(!isset($_SESSION['rol']) or $_SESSION['rol']!='admi' or !isset($_SESSION['usuario_valido']) or $_SESSION['usuario_valido']!=TRUE )
		{
		?>
			<li class="active"><a href="miCuenta.php">Mi Cuenta</a></li>
			<li><a href="pedidosCliente.php">Mis pedidos</a></li>
		<?php 
		}
		else
		{
		?>
			<li><a href="miCuenta.php">Mi Cuenta</a></li>
			<li class="active"><a href="nuevoLibro.php">Libros <span class="sr-only">(current)</span></a></li>
			<li><a href="nuevoCliente.php">Clientes</a></li>
			<li><a href="nuevaCategoria.php">Categorias</a></li>
			<li><a href="listadoPedidosClientes.php">Pedidos Clientes</a></li>
		<?php 
		} 
		?>
    </ul>
</div>