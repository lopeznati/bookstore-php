<?php 
function ConsultaSql($sql){
	error_reporting(E_ALL ^ E_DEPRECATED);
	$link=mysql_connect("localhost","root","");
	mysql_select_db("bookstore",$link);
	$resultado=mysql_query($sql);
	return $resultado;
}
?>