<?php
$host="ec2-34-193-235-32.compute-1.amazonaws.com"
$port="5432"
$contrasena = "c455960953a21f64cf1c477d48297c65d81f28b9c98b59198a2940b23c41234d";
$usuario = "arevixddrlppxc";
$nombre_base_de_datos = "dbcm9r2ib56l2p";
try{
	$dbh = new PDO('pgsql:host=$host;dbname=' . $nombre_base_de_datos, $usuario, $contrasena);
//	echo "CONECTADO A A LA BASE DE DATOS ";
}catch(Exception $e){
	echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}
?>