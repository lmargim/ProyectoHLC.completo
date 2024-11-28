<?php
header("Access-Control-Allow-Origin: *");  // Permite todos los orígenes
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");  // Métodos permitidos
header("Access-Control-Allow-Headers: Content-Type, Authorization");  // Encabezados permitidos

require_once("funcionesBD.php");
$conexion = obtenerConexion();

$idviaje = $_GET['txtidBuscarViaje'];
// Consulta sql

$sql = "SELECT * FROM Viaje WHERE id = $idviaje;";

$resultado = mysqli_query($conexion, $sql);

$mensaje = "<div class='container table-container' id='listadoPaquetes'>";
$mensaje .= "<table id='listadoPaquetes'>";
$mensaje .= "<thead><tr><th>ID</th><th>ORIGEN</th><th>DESTINO</th><th>FECHA INICIO</th><th>FECHA FIN</th><th>ACCIONES</th></tr></thead>";
$mensaje .= "<tbody>";

// Recorrer filas
if(mysqli_num_rows($resultado) > 0) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $mensaje .= "<tr><td>" . $fila['id'] . "</td>";
        $mensaje .= "<td>" . $fila['origen'] . "</td>";
        $mensaje .= "<td>" . $fila['destino'] . "</td>";
        $mensaje .= "<td>" . $fila['fechainicio'] . "</td>";
        $mensaje .= "<td>" . $fila['fechafin'] . "</td>";
        
        $mensaje .= "<td><form class='d-inline' action='proceso_borrar_viaje.php' method='post'>";
        $mensaje .= "<input type='hidden' name='id' value='" . $fila['id']  . "' />";
        $mensaje .= "<button name='Borrar' class='btn btn-danger'><i class='bi bi-trash'></i></button></form>";

        $mensaje .= "</td></tr>";
    }        
} else {
    $mensaje = "<div class='container table-container'>";
    $mensaje .= "<table id='buscarViaje'>";
    $mensaje .= "<thead><tr><th>No existe ese viaje</th></tr></thead>";
    $mensaje .= "</table></div>";
}


// Cerrar tabla
$mensaje .= "</tbody></table></div>";

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
