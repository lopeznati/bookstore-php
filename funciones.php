<?php 
function ConsultaSql($sql){
	
	$link=mysql_connect("localhost","root","");
	mysql_select_db("bookstore",$link);
	$resultado=mysql_query($sql);
	return $resultado;
}
?>