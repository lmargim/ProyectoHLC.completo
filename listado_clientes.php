<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Consultamos todos los clientes de la base de datos
$sql = "SELECT * FROM Cliente";

$resultado = mysqli_query($conexion, $sql);

// Montar tabla
$mensaje = "<h2 class='text-center'>Listado de clientes</h2>";
$mensaje .= "<div class='container table-container'>";
$mensaje .= "<table id='listadoClientes'>";
$mensaje .= "<thead><tr><th>IDCOMPONENTE</th><th>NOMBRE</th><th>DESCRIPCION</th><th>PRECIO</th><th>TIPO</th><th>ACCIÓN</th></tr></thead>";
$mensaje .= "<tbody>";

// Recorrer filas
while ($fila = mysqli_fetch_assoc($resultado)) {

    $mensaje .= "<tr>";

    $mensaje .= "<td>" . $fila['nombre'] . "</td>";
    $mensaje .= "<td>" . $fila['dni'] . "</td>";
    $mensaje .= "<td>" . $fila['email'] . "</td>";
    $mensaje .= "<td>" . $fila['telefono'] . "</td>";
    $mensaje .= "<td>" . $fila['direccion'] . "</td>";
    $mensaje .= "<td><form action='modificar_cliente.php' method='post'><input type='hidden' name='cliente' value='" . htmlspecialchars(json_encode($fila),ENT_QUOTES) . "'/><button type='submit' class='btn-person' value='' id='btnModificarCliente'><i class='bi bi-pencil-square'></i></button></form></td>";
    $mensaje .= "</tr>";
}

$mensaje .= "</tbody></table></div>";

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;