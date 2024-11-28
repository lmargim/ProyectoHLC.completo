<?php
header("Access-Control-Allow-Origin: *");  // Permite todos los orígenes
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");  // Métodos permitidos
header("Access-Control-Allow-Headers: Content-Type, Authorization");  // Encabezados permitidos

require_once("funcionesBD.php");
$conexion = obtenerConexion();

$idpaquete = $_GET['txtidBuscarPaquete'];
// Consulta sql

$sql = "SELECT * FROM Paquete WHERE id = $idpaquete;";

$resultado = mysqli_query($conexion, $sql);

$mensaje = "<div class='container table-container'>";
$mensaje .= "<table id='listadoPaquetes'>";
$mensaje .= "<thead><tr><th>ID</th><th>NOMBRE</th><th>TIPO DE PAQUETE</th><th>ALOJAMIENTO</th><th>FECHA INICIO</th><th>FECHA FIN</th><th>TRANSPORTE</th><th>ID VIAJE</th><th>ACCIÓN</th></tr></thead>";
$mensaje .= "<tbody>";

// Recorrer filas
if(mysqli_num_rows($resultado) > 0) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $mensaje .= "<tr><td>" . $fila['id'] . "</td>";
        $mensaje .= "<td>" . $fila['nombre'] . "</td>";
        $mensaje .= "<td>" . $fila['tipopaquete'] . "</td>";
        $mensaje .= "<td>" . $fila['tipoalojamiento'] . "</td>";
        $mensaje .= "<td>" . $fila['fechainicio'] . "</td>";
        $mensaje .= "<td>" . $fila['fechafin'] . "</td>";
        $mensaje .= "<td>" . $fila['transporte'] . "</td>";
        $mensaje .= "<td>" . $fila['viaje_id'] . "</td>";
    
        $mensaje .= "<td><form class='d-inline' action='proceso_borrar_paquete.php' method='post'>";
        $mensaje .= "<input type='hidden' name='id' value='" . $fila['id']  . "' />";
        $mensaje .= "<button name='Borrar' class='btn btn-danger'><i class='bi bi-trash'></i></button></form>";
    
        $mensaje .= "</td></tr>";
        
    }
} else {
    $mensaje = "<div class='container table-container'>";
    $mensaje .= "<table id='buscarPaquete'>";
    $mensaje .= "<thead><tr><th>No existe ese paquete</th></tr></thead>";
    $mensaje .= "</table></div>";
}

// Cerrar tabla
$mensaje .= "</tbody></table></div>";

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
