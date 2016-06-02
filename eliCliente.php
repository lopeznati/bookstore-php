<?php 
include_once './funciones.php';
$idEliminar=$_REQUEST['ideli'];

$sqlEliminar="DELETE FROM clientes WHERE id=".$idEliminar."";
ConsultaSql($sqlEliminar);
header('Location: signin.php')
?>