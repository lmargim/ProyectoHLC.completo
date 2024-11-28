<?php
require_once("funcionesBD.php");

$conexion = obtenerConexion();

// Recibir los datos del formulario
$id = intval($_POST['id']);
$nombrepaquete = mysqli_real_escape_string($conexion, $_POST['nombrepaquete']);
$tipopaquete = mysqli_real_escape_string($conexion, $_POST['tipopaquete']);
$tipoalojamiento = mysqli_real_escape_string($conexion, $_POST['tipoalojamiento']);
$fechainicio = mysqli_real_escape_string($conexion, $_POST['fechainicio']);
$fechafin = mysqli_real_escape_string($conexion, $_POST['fechafin']);
$transporte = mysqli_real_escape_string($conexion, $_POST['transporteModificado']);
$viaje_id = intval($_POST['lstModificarViajes']);

// Consulta de actualización
$sql = "UPDATE Paquete SET 
            nombre = '$nombrepaquete', 
            tipopaquete = '$tipopaquete', 
            tipoalojamiento = '$tipoalojamiento', 
            fechainicio = '$fechainicio', 
            fechafin = '$fechafin', 
            transporte = '$transporte',
            viaje_id = '$viaje_id'
        WHERE id = $id";

// Ejecutar la consulta
if (mysqli_query($conexion, $sql)) {
    // Redirigir al formulario de modificación con un mensaje de éxito
    $mensaje = "<div class='container table-container'>";
    $mensaje .= "<table id='modificadoPaquete'>";
    $mensaje .= "<thead><tr><th>Se ha modificado el paquete</th></tr></thead>";
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
