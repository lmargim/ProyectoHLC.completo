<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$idviaje = $_POST['id'];

// No validamos, suponemos que la entrada de datos es correcta

// Definir delete
$sql = "DELETE FROM Viaje WHERE id = $idviaje;";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h2 class='text-center mt-5'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h2>";
} else {
    $mensaje = "<div class='container table-container'>";
    $mensaje .= "<table id='borradoViaje'>";
    $mensaje .= "<thead><tr><th>Se ha borrado el Viaje</th></tr></thead>";
    $mensaje .= "</table></div>";
}

include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>