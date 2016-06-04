<?php 
session_start();
include_once 'funciones.php';
$idlibro=$_REQUEST['idlib'];

$sql="select * from libros where id='".$idlibro."'";
$libro=ConsultaSql($sql);

$l=mysql_fetch_array($libro);


$archivo2=fopen('datos.dat','a+');
fputs($archivo2,$l['id'].','.$l['titulo'].','.$_SESSION['id_usuario'].';');
fclose($archivo2);
header('location:detalle.php?id='.$idlibro.'');
?>