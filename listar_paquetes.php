<?php
header("Access-Control-Allow-Origin: *");  // Permite todos los orígenes
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");  // Métodos permitidos
header("Access-Control-Allow-Headers: Content-Type, Authorization");  // Encabezados permitidos

require_once("funcionesBD.php");
$conexion = obtenerConexion();

// No hay  datos de entrada

// Consulta sql

$sql = "SELECT * FROM Paquete";

$resultado = mysqli_query($conexion, $sql);

$mensaje = "<div class='container table-container' id='listadoPaquetes'>";
$mensaje .= "<table id='listadoPaquetes'>";
$mensaje .= "<thead><tr><th>ID</th><th>NOMBRE</th><th>TIPO DE PAQUETE</th><th>ALOJAMIENTO</th><th>FECHA INICIO</th><th>FECHA FIN</th><th>TRANSPORTE</th><th>ID VIAJE</th><th>ACCIÓN</th></tr></thead>";
$mensaje .= "<tbody>";

// Recorrer filas
while ($fila = mysqli_fetch_assoc($resultado)) {
    $mensaje .= "<tr><td>" . $fila['id'] . "</td>";
    $mensaje .= "<td>" . $fila['nombre'] . "</td>";
    $mensaje .= "<td>" . $fila['tipopaquete'] . "</td>";
    $mensaje .= "<td>" . $fila['tipoalojamiento'] . "</td>";
    $mensaje .= "<td>" . $fila['fechainicio'] . "</td>";
    $mensaje .= "<td>" . $fila['fechafin'] . "</td>";
    $mensaje .= "<td>" . $fila['transporte'] . "</td>";
    $mensaje .= "<td>" . $fila['viaje_id'] . "</td>";

    $mensaje .= "<td>
                    <form action='editar_paquete.php' method='post'>
                        <input type='hidden' name='paquete_id' value='" . $fila['id'] . "' />
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
