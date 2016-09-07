<?php
session_start();
include_once "funciones.php";

?>
    <section id="container" >
    	<header class="header black-bg">
        	<div class="sidebar-toggle-box">
            	<div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
			<a href="index.php" class="logo"><b>The Open Book</b></a>
            <div class="nav notify-row" id="top_menu">
                <ul class="nav top-menu">
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="verCarro.php">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </a>
                    </li>
                    </ul>
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
            	<?php if(!isset($_SESSION['usuario_valido']) or $_SESSION['usuario_valido']!=TRUE ){ ?>
                    <li><a class="logout" href="signin.php">Iniciar Sesión</a></li>
                    <?php
            			}else{ ?>
                    <li><h5 class="centered acomodar">Hola, <?php echo $_SESSION['usuario']?>!</h5></li>
                    <li><a class="logout" href="logout.php">Cerrar Sesión</a></li>
                    <?php } ?>
            	</ul>
            </div>
        </header>
      </section>
