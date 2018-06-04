<?php
	$mysqli = new mysqli('localhost', 'root', '', 'sistemau_prueba');
	
	if($mysqli->connect_error){
		
		echo 'Error en la conexion' . $mysqli->connect_error;	
		exit();
	}
?>