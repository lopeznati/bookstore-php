<?php

include_once "menu-lateral.php";
if(!isset($_SESSION['rol']) or $_SESSION['rol']!='admi' or !isset($_SESSION['usuario_valido']) or $_SESSION['usuario_valido']!=TRUE ){
	header('Location: signin.php');
}else{

//devuelvo libro a modificar
		$idModificar=$_REQUEST['idmodif'];
		$sql="select * from clientes where id=".$idModificar."";
		$resultado=ConsultaSql($sql);
		$clienteMod=mysql_fetch_array($resultado);


if(!empty($_POST) AND isset($_POST['Modificado']) AND $_POST['Modificado']==1 AND !empty($_POST['nombre']) AND !empty($_POST['apellido']) AND !empty($_POST['telefono']) AND !empty($_POST['domicilio']) AND !empty($_POST['mail'])  AND !empty($_POST['localidad_id'])){
	$id=trim($_POST['idcliente']);
	$nombre=trim($_POST['nombre']);
	$apellido=trim($_POST['apellido']);
	$telefono=trim($_POST['telefono']);

	$domicilio=trim($_POST['domicilio']);
	$mail=trim($_POST['mail']);
	$usuario=trim($_POST['usuario']);
	$contraseña=trim($_POST['contraseña']);
	$localidadid=trim($_POST['localidad_id']);
	$rol=trim($_POST['rol']);


	$modificarLibro="UPDATE clientes SET apellido='".$apellido."',nombre='".$nombre."',domicilio='".$domicilio."',telefono='".$telefono."',mail='".$mail."',id_localidad='".$localidadid."' WHERE id='".$id."'";
	$resultado=ConsultaSql($modificarLibro);

	echo $modificarLibro;

	header('Location: nuevoCliente.php');
	exit();





}



$localidades=ConsultaSql('select * from localidades');
?>




    <div class="container-fluid margen">
      <div class="row margen">
         <?php
		include_once "menu-lateral.php";
		?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main margen">
          <h1 class="page-header">Nuevo Usuario</h1>


		  <form id="form1" action="" method="post">
		  <table class="table table-striped">

              <input type="hidden" name="idcliente" value="<?php echo $clienteMod['id'];?>">
              <input type="hidden" name="Modificado" value="1">

                <tr>
                  <td>Nombre:</td>
                  <td><input type="text" id="nombre" name="nombre" value="<?php echo $clienteMod['nombre'];?>" required></td>
                </tr>

				<tr>
                  <td>Apellido:</td>
                  <td><input type="text" id="apellido" name="apellido" value="<?php echo $clienteMod['apellido'];?>" required></td>
                </tr>

				<tr>
                  <td>Telefono:</td>
                  <td><input type="text" id="telefono" name="telefono" value="<?php echo $clienteMod['telefono'];?>" required></td>
                </tr>
				<tr>
                  <td>Domicilio:</td>
                  <td><input type="text" id="domicilio" name="domicilio" placeholder="Calle y Nro" value="<?php echo $clienteMod['domicilio'];?>" required></td>
                </tr>

				<tr>
                  <td>E-Mail:</td>
                  <td><input type="email" name="mail" value="<?php echo $clienteMod['mail'];?>" required></td>
                </tr>


				<tr>
                  <td>Localidad:</td>

                  <td>
					<select id="localidad_id" name="localidad_id">
						<option value="">Elegir Opcion</option>
						<?php
							while($c=mysql_fetch_array($localidades)){

							    if($c['id']==$clienteMod['id_localidad'])
												$sel='selected';
								else $sel='';
								echo "<option ".$sel." value='".$c['id']."'>".$c['nombre']."</option>";

							}
						?>
					</select>
				  </td>
                </tr>



                  <td></td>
                  <td><input type="submit" id="guardar" class="btn btn-primary" value="Guardar"></td>
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
					echo "<td>".$c['localidad']."</td>";

					echo "<td><a href='modCliente.php?idmodif=".$c['id']."'><IMG SRC='icon/modify.png' WIDTH=20 HEIGHT=20></a>
				         <a href='#' onClick='eliminar(".$c['id'].")'> <IMG SRC='icon/gnome_edit_delete.png' WIDTH=30 HEIGHT=30>  </a></td>";

				   echo "<tr>";

                 // <a href='eliCliente.php?idelim=".$c['id']."'> <IMG SRC='icon/gnome_edit_delete.png' WIDTH=30 HEIGHT=30>  </a></td>";


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


    <form class="elim" action="" method="get">
        <input class="idelim" type="hidden" name="idelim" value="">
    </form>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>

    <script src="dist/sweetalert.min.js"></script>

    <script>
    $(document).ready(function(){

		$("#form1").submit(function(event){


		var error=false;







  				if($("#apellido").val().length >15){
                //alert("El numero de tarjeta debe tener 16 caracteres");
                event.preventDefault()
                $("#apellido").focus();
                error=true;
                swal("", "La cantidad de caracteres ingresados en el campo apellido supera el permitido.", "warning");

            }

            if($("#nombre").val().length >10){
                //alert("El numero de tarjeta debe tener 16 caracteres");
                event.preventDefault()
                $("#nombre").focus();
                error=true;
                swal("", "La cantidad de caracteres ingresados en el campo nombre supera el permitido.", "warning");

            }



            if($("#telefono").val().length >15){
                //alert("El numero de tarjeta debe tener 16 caracteres");
                event.preventDefault()
                $("#telefono").focus();
                error=true;
                swal("", "La cantidad de caracteres ingresados en el campo telefono supera el permitido.", "warning");

            }


            var telefono=$("#telefono").val();
            if(isNaN(telefono)){
                //alert("El campo Numero de Tarjeta debe ser numerico");

                //cancela el evento
                event.preventDefault();
                $("#telefono").val("");
                $("#telefono").focus();
                error=true;
                swal("", "El campo telefono debe ser numerico.", "warning");

            }




            if($("#domicilio").val().length >15){
                //alert("El numero de tarjeta debe tener 16 caracteres");
                event.preventDefault()
                $("#nombre").focus();
                error=true;
                swal("", "La cantidad de caracteres ingresados en el campo domicilio supera el permitido.", "warning");

            }





				if (error==false){
					swal("Cliente guardado", "", "success");

					//$('#form1').submit();


				}
		});
    });


     function  eliminar(id){
            swal({
            title: "Desea eliminar al cliente?",
            text: "",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si, eliminarlo!",
            closeOnConfirm: false
        }, function () {
            swal("Eliminado!", "El cliente ha sido eliminada.", "success");
              var url='eliCliente.php';
            $('.elim').attr('action',url);
            $('.idelim').attr('value',id);
            $('.elim').submit();

        });
        }
    </script>

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
