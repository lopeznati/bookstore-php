


<?php
include_once "menu-lateral.php";





if($_SESSION['rol']!='admi' or !isset($_SESSION['usuario_valido']) or $_SESSION['usuario_valido']!=TRUE ){
	header('Location: signin.php');
}else{
	//devuelvo libro a modificar
	$idModificar=$_REQUEST['idmodif'];
	$sql="select * from categorias where id=".$idModificar."";
	$resultado=ConsultaSql($sql);
	$categoriaMod=mysql_fetch_array($resultado);

?>




	<!-- MENU -->

    <div class="container-fluid">
      <div class="row">
        <?php
		include_once "menu-lateral.php";
		?>

		<!-- Modificar libros -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Modificar Categoria</h1>

		  <?php
			if(!empty($_POST) AND $_POST['Modificado']==1 AND !empty($_POST['descripcion']) ){
			$id=trim($_POST['id']);
			$descripcion=trim($_POST['descripcion']);


			$modificarCategoria="UPDATE categorias SET descripcion='".$descripcion."' WHERE id='".$id."'";


			$resultado=ConsultaSql($modificarCategoria);

			header('Location: nuevaCategoria.php');
			exit();





			}


			?>



		  <form id="form1" action="" method="post">
		  <table class="table table-striped">

                <input type="hidden" name="id" value="<?php echo $categoriaMod['id'];?>">
				<input type="hidden" name="Modificado" value="1">
				<tr>
                  <td>Descripcion:</td>

                  <td><input type="text" name="descripcion" id="descripcion" value="<?php echo $categoriaMod['descripcion'];?>" required></td>
                </tr>



				<tr>
                  <td></td>
                  <td>
					<input type="submit" class="btn btn-primary" value="Guardar">
					<input type="button" class="btn btn-primary" value="Cancelar" onClick="location.href='nuevaCategoria.php'">
				  </td>
                </tr>

           </table>

		   </form>
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
				           <a class='eliminar' id='eliminar_".$l['id']."' onClick='eliminar(".$l['id'].")' href='#'> <IMG SRC='icon/gnome_edit_delete.png' WIDTH=30 HEIGHT=30>  </a></td>";

				   echo "<tr>";



			  }
			  ?>

              </tbody>
            </table>


          </div>
        </div>
      </div>
    </div>

      <form class="elim" action="" method="get">
        <input class="idelim" type="hidden" name="idelim" value="">
    </form>


     <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>

    <script src="dist/sweetalert.min.js"></script>

    <script>
    $(document).ready(function(){


        $('form').on('submit',function(){

        var error=false
                if($("#descripcion").val().length >15){
                //alert("El numero de tarjeta debe tener 16 caracteres");
                event.preventDefault()
                $("#descripcion").focus();
                error=true;
                swal("", "La cantidad de caracteres ingresados en el campo Descripcion supera el permitido.", "warning");

            	}
        if(error==false){
         swal("Categoria guardada", "", "success");
          $('.confirm').click(function(){
             //$('#form1').submit();

          });
        }


        });




    });
    function  eliminar(id){

            //var url='eliCategoria.php?idelim='+id;

            //$('#eliminar_'+id).attr('href',url);

           // alert('eliminando');


            swal({
            title: "Desea eliminar la categoria?",
            text: "",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si, eliminarlo!",
            closeOnConfirm: false
        }, function () {
            swal("Eliminado!", "La categoria ha sido eliminada.", "success");
              var url='eliCategoria.php';
            $('.elim').attr('action',url);
            $('.idelim').attr('value',id);

          //  $('.elim').trigger('click');
          $('.elim').submit();

        });
        }



    </script>




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
