<?php
include_once 'menu-lateral.php';


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
        include_once "menu-lateral.php";
		?>

		<!-- Alta libros -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		  <?php
			if(!empty($_POST) AND !empty($_POST['domicilio']) AND !empty($_POST['numero_tarjeta']) AND !empty($_POST['codigo_seguridad']) AND !empty($_POST['titular']))
			{
				$domicilio=trim($_POST['domicilio']);
				$numero_tarjeta=trim($_POST['numero_tarjeta']);
				$codigo_seguridad=trim($_POST['codigo_seguridad']);
				$titular=trim($_POST['titular']);
				$tipo_tarjeta=trim($_POST['tipo_tarjeta']);
				$localidadid=trim($_POST['localidad_id']);
				$sqlTarjeta="INSERT INTO tarjeta(id,numero_Tarjeta,titular,codigo_seguridad,tipo_tarjeta)
									VALUES('','".$numero_tarjeta."','".$titular."','".$codigo_seguridad."','".$tipo_tarjeta."')";

				ConsultaSql($sqlTarjeta);
				$idTarjeta=mysql_insert_id();

				foreach($arreglo as $k => $v){
					$subtotal=$v['precio']*$v['cantidad'];
					ConsultaSql("UPDATE libros set existencia=(existencia - ".$v['cantidad'].") where id=".$v['id']);
					$agregarLibro="INSERT INTO pedidos(id,fechaPedido,id_cliente,id_libro,cantidad,subtotal,id_tarjeta,domicilio,localidad_id)
								   VALUES('',NOW(),'".$_SESSION['id_usuario']."','".$v['id']."','".$v['cantidad']."','".$subtotal."','".$idTarjeta."','".$domicilio."','".$localidadid."')";
					$resultado=ConsultaSql($agregarLibro);
				}
				if($resultado)
				{
					echo "<div style='text-align:center; color:blue;'>Se ha realizado la compra!!!!</div>";
				}
			}
			$localidades=ConsultaSql('select * from localidades');
			?>

			<form action="" method="post" enctype="multipart/form-data">
				<table class="table table-striped">
					<tr>
						<td colspan='2' class='titulos'>Datos de Entrega:</td>
					</tr>
					<tr>
						<td>Domicilio:</td> <td><input type="text" name="domicilio" placeHolder="Calle y Nro" required></td>
					<tr>
					<tr>
						<td>Localidad:</td>
						<td>
							<select id="localidad_id" name="localidad_id">
								<option value="">Elegir Opcion</option>
								<?php
									while($c=mysql_fetch_array($localidades))
									{
										echo "<option value='".$c['id']."'>".$c['nombre']."</option>";
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td> <br></td><br>
					</tr>
					<tr>
						<td colspan='2' class='titulos'>Medio de Pago:</td>
					</tr>
					<tr>
						<td>Tarjeta:</td>
					<td>
						<select id="tipo_tarjeta" name="tipo_tarjeta">
							<option value="">Elegir Opcion</option>
							<option value="Visa">Visa</option>
							<option value="Mastercard">Mastercard</option>
							<option value="American Express ">American Express </option>
						</select>
					</td>
					</tr>
					<tr>
						<td>Numero de Tarjeta:</td> <td><input type="text" id="numero_tarjeta" name="numero_tarjeta" required></td>
					</tr>
					<tr>
						<td>Codigo de Seguridad:</td> <td> <input type="text" name="codigo_seguridad" required></td>
					</tr>
					<tr>
						<td>Titular:</td> <td><input type="text" name="titular" placeHolder="Apellido y Nombre" required></td>
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
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="dist/sweetalert.min.js"></script>
	<script>

	$(document).ready(function(){
			$("form").submit(function(event){

				var error=false;

  				var localidad=$("#localidad_id").val();
  				if(localidad === ''){
  					//alert("El campo Localidad no puede quedar vacio, seleccione una opcion.");
  				//cancela el evento
   					event.preventDefault();
					error=true;
					swal("", "El campo Localidad no puede quedar vacio, seleccione una opcion.", "warning");
  				}


				//valido la longitud de la tarjeta
				if($("#numero_tarjeta").val().length !=16){
  		 			//alert("El numero de tarjeta debe tener 16 caracteres");
  		 			event.preventDefault()
   					$("#numero_tarjeta").focus();
					error=true;
					swal("", "El numero de tarjeta debe tener 16 caracteres.", "warning");

				}

  				//valido que el campo de numero de tarjeta sean solo numeros

				var num_tarjeta=$("#numero_tarjeta").val();
  				if(isNaN(num_tarjeta)){
  					//alert("El campo Numero de Tarjeta debe ser numerico");

  				//cancela el evento
   					event.preventDefault();
   					$("#numero_tarjeta").val("");
   					$("#numero_tarjeta").focus();
					error=true;
					swal("", "El campo Numero de Tarjeta debe ser numerico.", "warning");

				}

				var tarjeta=$("#tipo_tarjeta").val();
  				if(tarjeta === ''){
  					//alert("El campo Tipo Tarjeta no puede quedar vacio, seleccione una opcion.");
  				//cancela el evento
   					event.preventDefault();
					error=true;
					swal("", "El campo Tipo Tarjeta no puede quedar vacio, seleccione una opcion.", "warning");

				}

				if(error==false){
					swal({   title: "Compra Realizada",   text: "Muchas gracias por su compra",   timer: 5000,   showConfirmButton: false });
				}


			});
		});
	</script>
	<?php
	}else{
	header('location:signin.php');
	}
	$arreglo=$_SESSION['carro'];
	$fecha=time();
	?>
