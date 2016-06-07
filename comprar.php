<?php 
include_once 'header.php';


if($_SESSION['usuario_valido']==true){
	$arreglo=$_SESSION['carro'];
	$fecha=time();
	/*
	foreach($arreglo as $k => $v){
	$subtotal=$v['precio']*$v['cantidad'];
	$agregarLibro="INSERT INTO pedidos(id,fechaPedido,id_cliente,id_libro,cantidad,subtotal)  
							VALUES('','".$fecha."','".$_SESSION['id_usuario']."','".$v['id']."','".$v['cantidad']."','".$subtotal."')";
	$resultado=ConsultaSql($agregarLibro);

		echo $agregarLibro;
}*/
	




?>


<div class="container-fluid">
      <div class="row">
	  <?php
        if($_SESSION['rol']!='admi' or !isset($_SESSION['usuario_valido']) or $_SESSION['usuario_valido']!=TRUE ){
		
		}else{include_once "menu-lateral.php";}
		
		?>

		<!-- Alta libros -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          
		  <?php
			if(!empty($_POST) AND !empty($_POST['calle']) AND !empty($_POST['numero']) AND !empty($_POST['numero_tarjeta']) AND !empty($_POST['codigo_seguridad']) AND !empty($_POST['titular'])){
			$calle=trim($_POST['calle']).trim($_POST['numero']);
			
			$numero_tarjeta=trim($_POST['numero_tarjeta']);
	
			$codigo_seguridad=trim($_POST['codigo_seguridad']);
			$titular=trim($_POST['titular']);
			
			$sqlTargeta="INSERT INTO tarjeta(id,numero_Tarjeta,titular,codigo_seguridad)  
									VALUES('','".$numero_tarjeta."','".$titular."','".$codigo_seguridad."')";
			
			ConsultaSql($sqlTargeta);
			$idTargeta=mysql_insert_id();
			
			
	
		foreach($arreglo as $k => $v){
			$subtotal=$v['precio']*$v['cantidad'];
			$agregarLibro="INSERT INTO pedidos(id,fechaPedido,id_cliente,id_libro,cantidad,subtotal,id_tarjeta,domicilio)  
									VALUES('',NOW(),'".$_SESSION['id_usuario']."','".$v['id']."','".$v['cantidad']."','".$subtotal."','".$idTargeta."','".$calle."')";
			$resultado=ConsultaSql($agregarLibro);
			
		}
		
		header('location: index.php');
			
			
	
	
		
	
	
			}


		
			?>


		  
		  <form action="" method="post" enctype="multipart/form-data">
		  <table class="table table-striped">
              
                <tr>
                  <td colspan='2' class='titulos'>Datos de Entrega:</td>
				</tr>
               
                <tr>
                  <td>Calle:</td> <td><input type="text" name="calle" required></td>
				 </tr>
				 <tr>
				  <td> Numero:</td> <td><input type="text" name="numero" required></td><br>
				 </tr>
           
			     <tr>
				  <td> <br></td><br>
				 </tr>
				
                <tr>
                  <td colspan='2' class='titulos'>Medio de Pago:</td>
				</tr>
			
               
                  <tr>
                  <td>Numero de Targeta:</td> <td><input type="text" name="numero_tarjeta" required></td>
				 </tr>
				  
				  <tr>
                  <td>Codigo de Seguridad:</td> <td> <input type="text" name="codigo_seguridad" required></td>
				 </tr>
				 
				  <tr>
                  <td> Apellido y Nombre:</td> <td><input type="text" name="titular" required></td>
				 </tr>
				  
				<tr>
				<td colspan='2'><input type="submit" class="btn btn-primary" value="Confirmar"></td>
				</tr>
				
				  
                
			</table>	
				
				
				
				
				
           
		   
		   </form>
		   <?php 
		   
	       ?>

             
               
                
		  
         
        </div>
      </div>
    </div>
	
	<?php 
	}else{
	header('location: signin.php');
	}
	$arreglo=$_SESSION['carro'];
	$fecha=time();
	?>