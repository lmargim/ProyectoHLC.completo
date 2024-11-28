<?php
header("Access-Control-Allow-Origin: *");  // Permite todos los orígenes
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");  // Métodos permitidos
header("Access-Control-Allow-Headers: Content-Type, Authorization");  // Encabezados permitidos

require_once("funcionesBD.php");
$conexion = obtenerConexion();

// No hay  datos de entrada

// Consulta sql

$sql = "SELECT * FROM Viaje";

$resultado = mysqli_query($conexion, $sql);

$mensaje = "<div class='container table-container' id='listadoPaquetes'>";
$mensaje .= "<table id='listadoPaquetes'>";
$mensaje .= "<thead><tr><th>ID</th><th>ORIGEN</th><th>DESTINO</th><th>FECHA INICIO</th><th>FECHA FIN</th><th>ACCIONES</th></tr></thead>";
$mensaje .= "<tbody>";

// Recorrer filas
while ($fila = mysqli_fetch_assoc($resultado)) {
    $mensaje .= "<tr><td>" . $fila['id'] . "</td>";
    $mensaje .= "<td>" . $fila['origen'] . "</td>";
    $mensaje .= "<td>" . $fila['destino'] . "</td>";
    $mensaje .= "<td>" . $fila['fechainicio'] . "</td>";
    $mensaje .= "<td>" . $fila['fechafin'] . "</td>";

    $mensaje .= "<td>
                    <form action='editar_viaje.php' method='post'>
                        <input type='hidden' name='viaje_id' value='" . $fila['id'] . "' />
                        <button type='submit' class='btn btn-primary btn-person'><i class='bi bi-pencil-square'></i></button>
                    </form>
                </td></tr>";
    
    $mensaje .= "</td></tr>";
    
}

// Cerrar tabla
$mensaje .= "</tbody></table></div>";

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
