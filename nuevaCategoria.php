<?php 
include_once "header.php";

date_default_timezone_set('America/Argentina/Buenos_Aires');

if(!isset($_SESSION['rol']) or $_SESSION['rol']!='admi' or !isset($_SESSION['usuario_valido']) or $_SESSION['usuario_valido']!=TRUE ){
	header('Location: signin.php');
}else{
	

		
		
	
?>



	
	<!-- MENU -->

    <div class="container-fluid">
      <div class="row">
         <?php 
		
		include_once "menu-lateral.php";
		?>

		<!-- Alta libros -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Nueva categoria</h1>
		  
		  <?php
			if(!empty($_POST)  AND !empty($_POST['descripcion'])){
			$descripcion=trim($_POST['descripcion']);
			
			
			$agregarLibro="INSERT INTO categorias(id,descripcion)  
							VALUES('','".$descripcion."')";
			$resultado=ConsultaSql($agregarLibro);
	
	
		
	
	
			}
			?>


		  
		  <form action="" method="post" enctype="multipart/form-data">
		  <table class="table table-striped">
             
                <tr>
                  <td>Descripcion</td>
                  <td><input type="text" name="descripcion" required></td>
                </tr>
				
				<tr>
                  <td></td>
                  <td><input type="submit" class="btn btn-primary" value="Guardar"></td>
				  
	
                </tr>
           </table>
		   
		   </form>
		   </br>
		   </br>
		   <?php 
		   
	       ?>

             
               
                
		  
          <!-- Listado de categorias -->
          <h2 class="sub-header">Listado</h2>
		  <?php 
		  
			$sqlCategoria="SELECT * FROM categorias";
			$categorias=ConsultaSql($sqlCategoria);
			
		  ?>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Descripcion</th>
                 
				  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
			  <?php 
			  while($l=mysql_fetch_array($categorias)){
				  echo "<tr>";
					echo "<td>".$l['id']."</td>";
					echo "<td>".$l['descripcion']."</td>";
					echo "<td><a href='modCategoria.php?idmodif=".$l['id']."'><IMG SRC='icon/modify.png' WIDTH=20 HEIGHT=20></a>
				         <a href='eliCategoria.php?idelim=".$l['id']."'> <IMG SRC='icon/gnome_edit_delete.png' WIDTH=30 HEIGHT=30>  </a></td>";
					
				   echo "<tr>";
                  
                
				  
			  }
			  ?>
                
              </tbody>
            </table>
			

          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

<?php 
}
?>
