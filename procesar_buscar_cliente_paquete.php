<?php
require_once("funcionesBD.php");

$conexion = obtenerConexion();

// Verificar si se ha enviado un paquete a través del formulario
if (isset($_POST['lstPaquetesClientes'])) {
    $idPaquete = (int) $_POST['lstPaquetesClientes']; // Asegurarse de que el ID sea un número entero

    // Preparar la consulta para obtener los clientes de un paquete específico
    $sql = "SELECT c.dni, c.nombre FROM Cliente c 
            JOIN Cliente_Paquete cp ON c.dni = cp.dni_cliente
            WHERE cp.id_paquete = $idPaquete";
    $resultado = mysqli_query($conexion, $sql);

    $optionsClientes = "";
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        while ($cliente = mysqli_fetch_assoc($resultado)) {
            $optionsClientes .= "<option value='" . htmlspecialchars($cliente['dni']) . "'>";
            $optionsClientes .= htmlspecialchars($cliente['dni']) . " - " . htmlspecialchars($cliente['nombre']);
            $optionsClientes .= "</option>";
        }
    } else {
        $optionsClientes = "<option value=''>No hay clientes para este paquete.</option>";
    }

    mysqli_free_result($resultado);
    mysqli_close($conexion);
}

// Cabecera HTML que incluye navbar
include_once("cabecera.html");
?>

    <!-- Mostrar la lista de clientes como un <select> -->
    <div class="container mt-5">
        <form action="procesar_buscar_cliente_paquete.php" name="frmListarClientesPorPaquete" id="frmListarClientesPorPaquete">
            <fieldset id="datosClientes">
                <legend>Clientes</legend>
                <select class="form-select" name="lstClientePorPaquete" id="lstClientePorPaquete">
                    <?php echo $optionsClientes; ?>
                </select>
            </fieldset>
        </form>
    </div>
</body>
</html>
