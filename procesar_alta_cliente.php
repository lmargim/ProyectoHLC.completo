<?php 

require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recogemos los datos
$nombre = $_POST['txtnombre'];
$dni = $_POST['txtdni'];
$telefono = $_POST['txtextensiontelefono'] . '-' . $_POST['txttelefono'];
$email = $_POST['txtcuerpocorreo'] ."@". $_POST['txtextensioncorreo'];
$direccion = $_POST['txtdireccion'];

// Consulta INSERT
$sql = "INSERT INTO Cliente VALUES ('$dni','$nombre','$email','$telefono','$direccion')";


// Ejecutamos la consulta
$resultado = mysqli_query($conexion, $sql);


// Verificamos si existen errores y almacenamos el mensaje
if (mysqli_errno($conexion) != 0) {
    // Si hay un error, lo devuelve
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);

    $mensaje =  "<h2 class='text-center mt-5'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h2>";
} else {
    $mensaje =  "<h2 class='text-center mt-5'>Cliente insertado</h2>"; 
}

// Redireccionamos tras 5 segundos al index
// Siempre debe ir antes de DOCTYPE
header( "refresh:5;url=index.php" );

// Aquí empieza la página
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
