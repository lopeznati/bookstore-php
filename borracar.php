<?php
session_start();
//con session_start()
//creamos la sesión si
//no existe o la retomamos
//si ya ha sido creada
extract($_GET);
//Como antes, usamos
//extract() por comodidad,
//pero podemos no hacerlo
//tranquilamente
$carro=$_SESSION['carro'];

for($i=0;$i<count($carro);$i++){
			if($carro[$i]['id']==$id){
			
				unset($carro[$i]);
				
				
			}
			}

//Asignamos a la variable
//$carro los valores
//guardados en la sessión

//la función unset borra
//el elemento de un array 
//que le pasemos por
//parámetro. En este caso
//la usamos para borrar el
//elemento cuyo id le pasemos
//a la página por la url 
$_SESSION['carro']=$carro;

header("Location:verCarro.php");
?>