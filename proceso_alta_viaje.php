<?php 
header("Access-Control-Allow-Origin: *");  // Permite todos los orígenes
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");  // Métodos permitidos
header("Access-Control-Allow-Headers: Content-Type, Authorization");  // Encabezados permitidos

include_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recogemos los datos enviados desde el formulario
$origen = $_POST['txtOrigen'];
$destino = $_POST['txtDestino'];
$fechainicio = $_POST['fechaInicio'];
$fechafin = $_POST['fechaFin'];

// Insertamos los datos en la base de datos
$sql = "INSERT INTO Viaje (`id`, `origen`, `destino`, `fechainicio`, `fechafin`) 
        VALUES (NULL, '$origen', '$destino', '$fechainicio', '$fechafin');";

mysqli_query($conexion, $sql);

if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h2 class='text-center mt-5'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h2>";
} else {
    $mensaje = "<div class='container table-container'>";
    $mensaje .= "<table id='insertadoViaje'>";
    $mensaje .= "<thead><tr><th>Se ha insertado el viaje</th></tr></thead>";
    $mensaje .= "</table></div>";
}
// Redireccionar tras 5 segundos al index.
// Siempre debe ir antes de DOCTYPE
header( "refresh:5;url=index.php" );

// Aquí empieza la página
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>