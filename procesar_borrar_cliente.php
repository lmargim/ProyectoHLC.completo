<?php
require_once("funcionesBD.php");
$conexion = obtenerconexion();

// Recoger datos
$dni = $_POST["dniABorrar"];

// Consulta SQL para el borrado del cliente
$sql = "DELETE FROM Cliente WHERE dni = '$dni'";

$resultado = mysqli_query($conexion, $sql);

if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h2 class='text-center mt-5'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h2>";
} else {
    $mensaje =  "<h2 class='text-center mt-5'>Cliente con id $dni borrado</h2>"; 
}

include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;