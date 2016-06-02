<?php 
include_once 'funciones.php';
$idEliminar=$_REQUEST['idelim'];

$sqlEliminar="DELETE FROM categorias WHERE id=".$idEliminar."";
ConsultaSql($sqlEliminar);
header('Location: nuevaCategoria.php')
?>