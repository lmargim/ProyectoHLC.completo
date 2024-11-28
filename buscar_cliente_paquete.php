<?php
require_once("funcionesBD.php");

$conexion = obtenerConexion();

// Obtener los paquetes para el <select>
$sql = "SELECT id, nombrepaquete FROM Paquete;";
$resultado = mysqli_query($conexion, $sql);

$optionsPaq = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    $optionsPaq .= "<option value='" . $fila["id"] . "'>" . htmlspecialchars($fila["nombrepaquete"]) . "</option>";
}

mysqli_free_result($resultado);
mysqli_close($conexion);

// Cabecera HTML que incluye navbar
include_once("cabecera.html");
?>

    <!-- Formulario para seleccionar un paquete -->
    <div class="container mt-5">
        <form action="procesar_buscar_cliente_paquete.php" name="frmListarClientesPorPaquete" id="frmListarClientesPorPaquete" method="POST">
            <fieldset id="form-viajes">
                <legend>Buscar clientes de un paquete</legend>
                <div class="row">
                    <!-- Selección de paquete -->
                    <div class="col">
                        <label for="lstPaquetesClientes" class="form-label">Selecciona un Paquete</label>
                        <select class="form-select" name="lstPaquetesClientes" id="lstPaquetesClientes" required>
                            <?php echo $optionsPaq; ?>
                        </select>
                    </div>
                    <!-- Botón Buscar -->
                    <div class="col-lg-2 text-center mt-4">
                        <button type="submit" id="btnBuscarClientePorPaquete" class="btn btn-personalizado"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>
