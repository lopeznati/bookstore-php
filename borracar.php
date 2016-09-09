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
$carro2=[];
$n=0;

for($i=0;$i<count($carro);$i++){
	if($carro[$i]['id']!=$id){

		//unset($carro[$i]);
		$carro2[$n]['id']=$carro[$i]['id'];
		$carro2[$n]['titulo']=$carro[$i]['titulo'];
		$carro2[$n]['precio']=$carro[$i]['precio'];
		$carro2[$n]['cantidad']=$carro[$i]['cantidad'];

		$n++;

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
$_SESSION['carro']=$carro2;

header("Location:verCarro.php");
?>