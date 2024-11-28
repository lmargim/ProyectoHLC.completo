<?php
require_once("funcionesBD.php");

$conexion = obtenerConexion();

$viaje_id = intval($_POST['viaje_id']);

// Mostrar mensaje si se pasa como parámetro
if (isset($_GET['mensaje'])) {
    echo '<div class="alert alert-info" role="alert">' . htmlspecialchars($_GET['mensaje']) . '</div>';
}

// Consultar los datos del paquete
$sql = "SELECT * FROM Viaje WHERE id = $viaje_id;";
$resultado = mysqli_query($conexion, $sql);

if ($fila = $resultado->fetch_assoc()) {
    $viaje = $fila;
}

include_once("cabecera.html");
?>

<!-- FORMULARIO VIAJES -->
<div class="container mt-5">
        <form action="procesar_modificar_viaje.php" method="post">
            <fieldset id="form-modificar_viajes">
                <legend>Modificar Viaje</legend>
                <input type="hidden" name="id" value="<?php echo $viaje['id'];?>">
                <!-- ORIGEN Y DESTINO -->
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="txtOrigenMod" class="form-label">Origen</label>
                        <input type="text" class="form-control" id="txtOrigenMod" name="txtOrigenMod" value="<?php echo $viaje['origen']; ?>" required placeholder="Madrid">
                    </div>
                    <div class="col-6">
                        <label for="txtDestinoMod" class="form-label">Destino</label>
                        <input type="text" class="form-control" id="txtDestinoMod" name="txtDestinoMod" value="<?php echo $viaje['destino']; ?>" required
                            placeholder="Nueva york">
                    </div>
                </div>
                <!-- IDA Y VUELTA -->
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="fechaInicioMod" class="form-label">Fecha de Inicio</label>
                        <input type="date" class="form-control" id="fechaInicioMod" name="fechaInicioMod" value="<?php echo $viaje['fechainicio']; ?>" required>
                    </div>
                    <div class="col-6">
                        <label for="fechaFinMod" class="form-label">Fecha de Fin</label>
                        <input type="date" class="form-control" id="fechaFinMod" name="fechaFinMod" value="<?php echo $viaje['fechafin']; ?>" required>
                    </div>
                </div>
                <!-- Botón de envío -->
                <div class="text-center mt-4">
                    <button type="submit" id="btnModificarViaje" class="btn btn-personalizado"><i
                            class="bi bi-plus"></i></button>
                </div>
            </fieldset>
        </form>
    </div>
    <!-- FORMULARIO VIAJES -->
</body>
</html>

