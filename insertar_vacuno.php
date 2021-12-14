<?php
require 'conexion.php';
$codigo=$_POST['codigo'];
$fecha=$_POST['fecha'];
$nombre=$_POST['nombre'];
$genero=$_POST['genero'];

$color=$_POST['color'];
$raza=$_POST['raza'];
$finca=$_POST['finca'];

$stmt=$dbh->prepare("INSERT INTO VACUNOS (codigo_vacuno, fecha_nacimiento, nombre, genero, color, raza, codigo_finca) VALUES (?,?,?,?,?,?,?)");

$stmt->bindParam(1, $codigo);
$stmt->bindParam(2, $fecha);
$stmt->bindParam(3, $nombre);
$stmt->bindParam(4, $genero);
$stmt->bindParam(5, $color);
$stmt->bindParam(6, $raza);
$stmt->bindParam(7, $finca);
$stmt->execute();
if($stmt == TRUE){
    echo'<script type="text/javascript"> alert("REGISTRO ALMACENADO CON EXITO!")</script>';
    echo "<script> window.location.href = 'index.php';</script>";
} 
else {
    echo'<script type="text/javascript"> alert("ERROR!")</script>';
    echo "<script> window.location.href = 'index.php';</script>";
}

?>