<?php 
include_once "header.php";
$idlibro=$_REQUEST['id'];

$sql="select * from libros where id='".$idlibro."'";
$libro=ConsultaSql($sql);
?>

 <div class="container-fluid">
      <div class="row">
        
		     <?php 
		session_start();
		if(!isset($_SESSION['usuario_valido']) or $_SESSION['usuario_valido']!=TRUE ){
		
		}else{include_once "menu-lateral.php";}
		
		?>
	
		
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Libro</h1>
		  
		  
		  

         

         
          <div class="table-responsive">
		  
            <table class="table table-striped" class="modulobuscador"'>
            
              <tbody>
			  <?php 
				while($l=mysql_fetch_array($libro)){
					$sqlCategoria="select * from categorias where id=".$l['id_categoria']."";
					$c=mysql_fetch_assoc(ConsultaSql($sqlCategoria));
					
					$sqlEditorial="select * from editoriales where id=".$l['id_editorial']."";
					$e=mysql_fetch_assoc(ConsultaSql($sqlEditorial));
					echo "<form action='verCarro.php' action='GET'>";
					echo "<tr>";
					echo "<td class='celdafoto'><img class='foto' src='".$l['foto']."'/>
					<a href='like.php?idlib=".$l['id']."' > <IMG SRC='icon/me-gusta.jpg' WIDTH=30 HEIGHT=30>  </a></td>";
					echo "<td  > <span class='titulos'>".$l['titulo']."</span></br>
														<span class='titulos'>ISBN: </span>".$l['ISBN']."</br>
														<span class='titulos'>Precio: </span>"."$ ".$l['precio']."</br>
														<span class='titulos'>Categoria: </span>".$c['descripcion']."</br>
														<span class='titulos'>Editorial: </span>".$e['nombre']."</br>
														<span class='titulos'>Paginas: </span>".$l['cantPaginas']."</br>
														
														
														<div class='celdaboton2'><input  type='submit' class='btn btn-primary' value='Comprar +'/></div></br>
														
														
														
														
														</div>
														
														<input type='hidden' name='id' value='".$l['id']."'>
														
														</td>"; 
					
					echo "</tr>";
					?>
					<tr>
						<td class='titulos'>Sinopsis:</td>
						
					
					</tr>
					<tr>
						<td colspan='2' ><?php echo $l['descripcion'];?><td>
					
					</tr>
					
					<?php 
					
					
					
					echo "</form>";
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
