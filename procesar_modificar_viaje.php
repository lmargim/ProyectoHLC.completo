<?php
require_once("funcionesBD.php");

$conexion = obtenerConexion();

// Recibir los datos del formulario
$id = intval($_POST['id']);
$origen = mysqli_real_escape_string($conexion, $_POST['txtOrigenMod']);
$destino = mysqli_real_escape_string($conexion, $_POST['txtDestinoMod']);
$fechainicio = mysqli_real_escape_string($conexion, $_POST['fechaInicioMod']);
$fechafin = mysqli_real_escape_string($conexion, $_POST['fechaFinMod']);

// Consulta de actualización
$sql = "UPDATE Viaje SET 
            origen = '$origen', 
            destino = '$destino', 
            fechainicio = '$fechainicio',
            fechafin = '$fechafin'
        WHERE id = $id";

// Ejecutar la consulta
if (mysqli_query($conexion, $sql)) {
    // Redirigir al formulario de modificación con un mensaje de éxito
    $mensaje = "<div class='container table-container'>";
    $mensaje .= "<table id='modificadoViaje'>";
    $mensaje .= "<thead><tr><th>Se ha modificado el viaje</th></tr></thead>";
    $mensaje .= "</table></div>";
} 

// Cerrar la conexión
mysqli_close($conexion);

header( "refresh:5;url=index.php" );

// Aquí empieza la página
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
?>
