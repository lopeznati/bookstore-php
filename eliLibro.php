<?php 
include_once './funciones.php';
$idEliminar=$_REQUEST['idelim'];

$sqlEliminar="DELETE FROM libros WHERE id=".$idEliminar."";
ConsultaSql($sqlEliminar);
header('Location: nuevoLibro.php')
?>