<?php
session_start();
include_once "funciones.php";

?>
<<<<<<< HEAD

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Bookstore</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <!--  <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">-->


  <!--  <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">-->



    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
    <link href="styles.css" rel="stylesheet">
  <!--Goole Fonts-->
  <link href="https://fonts.googleapis.com/css?family=Crete+Round|Roboto" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-light navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Todo Colección</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
		    <?php if(!isset($_SESSION['usuario_valido']) or $_SESSION['usuario_valido']!=TRUE ){ ?>
				<li><a href="signin.php">Login</a></li>
				<?php
			}else{ ?>

			<li><a href="logout.php">Logout</a></li>
			<?php } ?>
            <li><a href="verCarro.php"><img src="vercarrito.png"></a></li>

          </ul>

        </div>
      </div>
    </nav>
=======
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
>>>>>>> 926e92ca98e1d23596793602cb7378ab7ad292c0
