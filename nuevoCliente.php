<?php 
session_start();

if(!isset($_SESSION['rol']) or $_SESSION['rol']!='admi' or !isset($_SESSION['usuario_valido']) or $_SESSION['usuario_valido']!=TRUE ){
	header('Location: signin.php');
}else{
	


include_once "header.php";

if(!empty($_POST AND !empty($_POST['nombre']) AND !empty($_POST['apellido']) AND !empty($_POST['telefono']) AND !empty($_POST['domicilio']) AND !empty($_POST['mail']) AND !empty($_POST['usuario']) AND !empty($_POST['contraseña']) AND !empty($_POST['localidad_id']))){
	$nombre=trim($_POST['nombre']);
	$apellido=trim($_POST['apellido']);
	$telefono=trim($_POST['telefono']);
	
	$domicilio=trim($_POST['domicilio']);
	$mail=trim($_POST['mail']);
	$usuario=trim($_POST['usuario']);
	$contraseña=trim($_POST['contraseña']);
	$localidadid=trim($_POST['localidad_id']);
	$rol=trim($_POST['rol']);
	
	$agregarCliente="INSERT INTO clientes(id,usuario,clave,apellido, nombre,domicilio,telefono,mail,id_localidad, rol)  
	VALUES('','".$usuario."','".$contraseña."','".$apellido."','".$nombre."','".$domicilio."','".$telefono."','".$mail."','".$localidadid."', '".$rol."')";
	$resultado=ConsultaSql($agregarCliente);
	echo $resultado;
	
	
		
	
	
}



$localidades=ConsultaSql('select * from localidades');
?>


	
	//menu

    <div class="container-fluid">
      <div class="row">
         <?php 
		include_once "menu-lateral.php";
		?>

		--..circulos del medio-..-
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Nuevo Cliente</h1>

		  
		  <form action="" method="post">
		  <table class="table table-striped">
             
                <tr>
                  <td>Nombre</td>
                  <td><input type="text" name="nombre"></td>
                </tr>
				
				<tr>
                  <td>apellido</td>
                  <td><input type="text" name="apellido"></td>
                </tr>
				
				<tr>
                  <td>Telefono</td>
                  <td><input type="text" name="telefono"></td>
                </tr>
				
				
				
				<tr>
                  <td>domicilio</td>
                  <td><input type="text" name="domicilio"></td>
                </tr>
				
				<tr>
                  <td>mail</td>
                  <td><input type="text" name="mail"></td>
                </tr>
				
				<tr>
                  <td>usuario</td>
                  <td><input type="text" name="usuario"></td>
                </tr>
				
				<tr>
                  <td>contraseña</td>
                  <td><input type="password" name="contraseña"></td>
                </tr>
				
				<tr>
                  <td>Localidad</td>
				  
                  <td>
					<select name="localidad_id">
						<option>Elegir Opcion</option>
						<?php
							while($c=mysql_fetch_array($localidades)){
								echo "<option value='".$c['id']."'>".$c['nombre']."</option>";
							}
						?>
					</select>
				  </td>
                </tr>
				
				<tr>
                  <td>Rol</td>
				  
                  <td>
					<select name="rol">
						<option>Elegir Opcion</option>
						<option value='admi'>Administrador</option>
						<option value='cli'>Cliente</option>
						
					</select>
				  </td>
                </tr>
				
				<tr>
                  <td></td>
                  <td><input type="submit" value="Guardar"></td>
                </tr>
				
           </table>
		   
		   </form>
		   <?php 
		   
	       ?>

             
               
                
		  <!-- Listado de Libros -->
          <h2 class="sub-header">Listado</h2>
		  <?php 
		  
			$sqlclientes="SELECT c.*, l.nombre as localidad FROM clientes c
						inner join localidades l
							on c.id_localidad=l.id
						
						";
			$clientes=ConsultaSql($sqlclientes);
		  ?>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Domicilio</th>
                  <th>Telefono</th>
				  <th>Mail</th>
                  <th>Usuario</th>
                  <th>Contraseña</th>
                  <th>Localidad</th>
				  <th>Acciones</th>
				  
                </tr>
              </thead>
              <tbody>
			  <?php 
			  while($c=mysql_fetch_array($clientes)){
				  echo "<tr>";
					echo "<td>".$c['id']."</td>";
					echo "<td>".$c['nombre']."</td>";
					echo "<td>".$c['apellido']."</td>";
					echo "<td>".$c['domicilio']."</td>";
					echo "<td>".$c['telefono']."</td>";
					echo "<td>".$c['mail']."</td>";
					echo "<td>".$c['usuario']."</td>";
					echo "<td>".$c['clave']."</td>";
					echo "<td>".$c['localidad']."</td>";
					
					echo "<td>
				         <a href='eliCliente.php?idelim=".$c['id']."'> <IMG SRC='icon/gnome_edit_delete.png' WIDTH=30 HEIGHT=30>  </a></td>";
					
				   echo "<tr>";
                  
                
				  
			  }
			  ?>
                
              </tbody>
            </table>
			
			<form action="" method="post">
				<input type="hidden" name="exportar" value="1" />
				<input type="submit" class="btn btn-primary" value="EXPORTAR a CSV" />
			</form>
			
 
			
			<?php
				date_default_timezone_set('America/Argentina/Buenos_Aires');
				if(!empty($_POST['exportar']) AND $_POST['exportar'] ==1){
				//Genero el archivo csv.
				$nombreArchivo = "clientes".date('Y-m-d_H.i').".csv";
				$res = ConsultaSql("select * from clientes;");
				
				$salida = "";
				if($res and mysql_num_rows($res) > 0){
					while ($r = mysql_fetch_array($res)) {
						$salida .= '"'.$r['id'].'",';
						$salida .= '"'.$r['nombre'].'",';
						$salida .= '"'.$r['apellido'].'",';
						$salida .= '"'.$r['domicilio'].'",';
						$salida .= '"'.$r['telefono'].'",';
						$salida .= '"'.$r['mail'].'",';
						$salida .= '"'.$r['usuario'].'",';
						$salida .= '"'.$r['id_localidad'].'";';
						
						
					}
				}
				$ac = fopen($nombreArchivo,'a+');
				fputs($ac,$salida);
				fclose($ac);
				echo "Generé el archivo csv en el disco !!";
			}
			
			?>
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