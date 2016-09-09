<?php
	include_once "menu-lateral.php";
	date_default_timezone_set('America/Argentina/Buenos_Aires');

	if(!isset($_SESSION['rol']) or !isset($_SESSION['usuario_valido']) or $_SESSION['usuario_valido']!=TRUE )
	{
		header('Location: signin.php');
	}
	else {
?>
		<div class="container-fluid margen">
			<div class="row margen">
				<?php
					include_once "menu-lateral.php";
				?>
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main margen">
				<h2 class="sub-header">Mis Pedidos</h2>

				<!-- Listado Pedidos de un cliente -->

				<?php

					$sqlPedidos="SELECT p.*, concat(c.nombre,' ',c.apellido) as cliente FROM pedidos p inner join clientes c on p.id_cliente= c.id where p.id_cliente=" .$_SESSION['id_usuario'];
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
									$sqllibro=ConsultaSql("select titulo from libros where id='".$p['id_libro']."'");
									$libro=mysql_fetch_array($sqllibro);

									$sqllocalidad=ConsultaSql("select nombre from localidades where id='".$p['localidad_id']."'");
									$localidad=mysql_fetch_array($sqllocalidad);

									echo "<tr>";
									echo "<td>".$p['fechaPedido']."</td>";
									echo "<td>".$p['cliente']."</td>";
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
