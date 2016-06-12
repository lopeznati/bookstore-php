<?php 
include_once './funciones.php';
$idEliminar=$_REQUEST['idelim'];

$sqlEliminar="DELETE FROM clientes WHERE id=".$idEliminar."";
ConsultaSql($sqlEliminar);
header('Location: nuevoCliente.php')
?>