<?php

$contrasena = "";
$usuario = "root";
$nombre_base_de_datos = "los_vacunos";
try{
	$dbh = new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $contrasena);
//	echo "CONECTADO A A LA BASE DE DATOS ";
}catch(Exception $e){
	echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}
?>