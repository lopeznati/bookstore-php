<?php 
session_start();
include_once "funciones.php";

?>

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

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">


	
	    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
	
	    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Bookstore</a>
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
            <li><a href="miCuenta.php">Mi Cuenta</a></li>
          </ul>
          
        </div>
      </div>
    </nav>

 
	
	<?php 

	$_SESSION['usuario_valido']=false;
	if(!empty($_POST['usuario']) AND !empty($_POST['clave'] )){
		$sql="SELECT * FROM clientes where usuario='".$_POST['usuario']."' and clave='".$_POST['clave']."'";
		$cliente=ConsultaSql($sql);
		echo $cliente;
		$count = mysql_num_rows($cliente);
		
		$cli=mysql_fetch_array($cliente);
		
		if($count==1){
			$_SESSION['usuario_valido']=TRUE;
			$_SESSION['usuario']=$_POST['usuario'];
			$_SESSION['id_usuario']=$cli['id'];
			$_SESSION['rol']=$cli['rol'];
			header('Location: index.php');
		}else{
			
          ?>    <div id="navbar" class="navbar-collapse collapse" style="background-color: #0080FF;>
				<div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';"><a href="signin.php">X</a></span>
                <strong><center>Usuario o Contraseña  incorrectos!</strong>
                </div>
                
				</div>
           <?php
		}
		
	}
	
	?>

    <div class="container">
	

      <form class="form-signin" action="" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputUsuario" class="sr-only">Usuario address</label>
        <input type="text" name="usuario" id="inputUsuario" class="form-control" placeholder="Usuario" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="clave" id="inputPassword" class="form-control" placeholder="Password" required>
		
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		<a href="registroCliente.php" class="text-center new-account">Create an account </a>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
