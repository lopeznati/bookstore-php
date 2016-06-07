<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            
			
			<?php if(!isset($_SESSION['rol']) or $_SESSION['rol']!='admi' or !isset($_SESSION['usuario_valido']) or $_SESSION['usuario_valido']!=TRUE ){?>
		
			<li class="active"><a href="miCuenta.php">Mi Cuenta</a></li>
		<?php }else{?>
			<li class="active"><a href="nuevoLibro.php">Libros <span class="sr-only">(current)</span></a></li>
            <li><a href="nuevoCliente.php">Clientes</a></li>
			<li><a href="nuevaCategoria.php">Categorias</a></li>
			<li><a href="miCuenta.php">Mi Cuenta</a></li>
		<?php } ?>
            <!--
			<li><a href="#">Analytics</a></li>
            <li><a href="#">Export</a></li> -->
          </ul>
		  
		<!--
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
          </ul> -->
        </div>