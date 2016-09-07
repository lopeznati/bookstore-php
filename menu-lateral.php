<!--<div class="col-sm-3 col-md-2 sidebar">
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
</div>-->

<aside>
        <div id="sidebar"  class="nav-collapse ">
        	<ul class="sidebar-menu" id="nav-accordion">
            	<p class="centered"><a href="index.php"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	<h5 class="centered">The Open Book</h5>
              <?php if(!isset($_SESSION['rol']) or !isset($_SESSION['usuario_valido']) or $_SESSION['usuario_valido']!=TRUE )
          		{
          		?>
                <li class="sub-menu">
                	<a href="miCuenta.php" >
                		<i class="fa fa-user" aria-hidden="true"></i>
                		<span>Mi Cuenta</span>
                	</a>
                 </li>
                  <?php
              		}
              		else if ((strcmp($_SESSION['rol'],'admi'))==0)
              		{
              		?>
                  <li class="sub-menu">
                  	<a href="miCuenta.php" >
                  		<i class="fa fa-user" aria-hidden="true"></i>
                  		<span>Mi Cuenta</span>
                  	</a>
                   </li>
                  <li class="active">
                    <a href="nuevoLibro.php">
                      Libros <span class="sr-only">(current)</span>
                    </a>
                  </li>
                  <li class="sub-menu">
                  	<a href="nuevoCliente.php" >
                  		<i class="fa fa-user" aria-hidden="true"></i>
                  		<span>Clientes</span>
                  	</a>
                   </li>

                  <li class="sub-menu">
                      <a href="nuevaCategoria.php" >
                      	  <i class="fa fa-book" aria-hidden="true"></i>
                          <span>Categorias</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                  	<a href="listadoPedidosClientes.php" >
                  		<i class="fa fa-user" aria-hidden="true"></i>
                  		<span>Pedidos Clientes</span>
                  	</a>
                   </li>
                   <?php
               		}
					else if ((strcmp($_SESSION['rol'],'cli'))==0)
					{?>
                <li class="sub-menu">
                	<a href="miCuenta.php" >
                		<i class="fa fa-user" aria-hidden="true"></i>
                		<span>Mi Cuenta</span>
                	</a>
                 </li>
                 <li class="sub-menu">
                  <a href="pedidosCliente.php" >
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span>Mis Pedidos</span>
                  </a>
                  </li>
					<?php 
					}
					?>
              </ul>
          </div>
      </aside>
