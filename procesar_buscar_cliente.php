<?
require_once('funcionesBD.php');
$conexion = obtenerConexion();

// Recogemos datos de entrada
$dni = $_POST['txtdniBuscarCliente'];

// Montamos la consulta
$sql = "SELECT Cliente.* FROM Cliente WHERE Cliente.dni = '$dni'";

$resultado = mysqli_query($conexion, $sql);

// Mostrar tabla de datos si el numero de filas es mayor que 0
if (mysqli_num_rows($resultado) > 0) {

    $mensaje = "<h2 class='text-center'>Cliente localizado</h2>";
    $mensaje .= "<div class='container table-container'>";
    $mensaje .= "<table id='listadoClientes'>";
    $mensaje .= "<thead><tr><th>NOMBRE</th><th>DNI</th><th>EMAIL</th><th>TELÉFONO</th><th>DIRECCIÓN</th><th>ACCIÓN</th></tr></thead>";
    $mensaje .= "<tbody>";
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $mensaje .= "<tr>";
        $mensaje .= "<td>" . $fila['nombre'] . "</td>";
        $mensaje .= "<td>" . $fila['dni'] . "</td>";
        $mensaje .= "<td>" . $fila['email'] . "</td>";
        $mensaje .= "<td>" . $fila['telefono'] . "</td>";
        $mensaje .= "<td>" . $fila['direccion'] . "</td>";
        $dni = $fila['dni'];
        $mensaje .= "<td><form action='procesar_borrar_cliente.php' method='post'><input type='hidden' name='dniABorrar' value='$dni'/><button type='submit' class='btn-person' id='btnBorrarCliente'><i class='bi bi-trash3'></i></button></form></td>";
        $mensaje .= "</tr>";
    }
    $mensaje .= "</tbody></table></div>";

} else { // No hay datos
    $mensaje = "<h2 class='text-center mt-5'>No existe cliente con el dni  $dni,  no está registrado</h2>";
}

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;




