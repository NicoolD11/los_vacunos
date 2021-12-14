<?php
include 'conexion.php';

$codigo= $_POST['codigo'];
$nombre_finca= $_POST['nombre_finca'];
$vereda= $_POST['nombre_vereda'];
$departamento= $_POST['departamento'];
$hectareas= $_POST['hectareas'];
 
$stmt= $dbh->prepare("INSERT INTO fincas (codigo_finca, nombre_finca, nombre_vereda, departamento, hectareas) VALUES (?,?,?,?,?)");

$stmt->bindParam(1, $codigo);
$stmt->bindParam(2, $nombre_finca);
$stmt->bindParam(3, $vereda);
$stmt->bindParam(4, $departamento);
$stmt->bindParam(5, $hectareas);
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