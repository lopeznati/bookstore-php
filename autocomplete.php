<?php

// para devolver el elemento buscado
header( 'Content-type: text/html; charset=iso-8859-1' );
include_once 'funciones.php';
$search = $_POST['busqueda'];

$query_busqueda= ConsultaSql("SELECT id, titulo FROM libros WHERE titulo like '".$search."%' ORDER BY TITULO DESC");


while ($row_busqueda = mysql_fetch_array($query_busqueda)) {
    echo '<div ><a class="suggest-element" data="'.$row_busqueda['titulo'].'" id="busqueda'.$row_busqueda['id'].'">'.utf8_encode($row_busqueda['titulo']).'</a></div>';

	
	}
?>