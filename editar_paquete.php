<?php
require_once("funcionesBD.php");

$conexion = obtenerConexion();

$paquete_id = intval($_POST['paquete_id']);

// Mostrar mensaje si se pasa como parámetro
if (isset($_GET['mensaje'])) {
    echo '<div class="alert alert-info" role="alert">' . htmlspecialchars($_GET['mensaje']) . '</div>';
}

// Consultar los datos del paquete
$sql = "SELECT * FROM Paquete WHERE id = $paquete_id;";
$resultado = mysqli_query($conexion, $sql);

if ($fila = $resultado->fetch_assoc()) {
    $paquete = $fila;
}

include_once("cabecera.html");
?>

<!-- FORMULARIO PAQUETES -->
<div class="container mt-5">
        <form action="procesar_modificar_paquete.php" method="post">
            <fieldset id="form-ModificarPaquete">
                <legend>Modificar Paquete</legend>

                <!-- ID del Paquete -->
                <input type="hidden" name="id" value="<?php echo $paquete['id']; ?>" />

                <!-- Nombre del Paquete -->
                <div class="mb-3">
                    <label for="nombreModificarPaquete" class="form-label">Nombre del Paquete</label>
                    <input type="text" class="form-control" name="nombrepaquete" id="nombreModificarPaquete"
                        value="<?php echo $paquete['nombre']; ?>" required>
                </div>

                <!-- Tipo de Paquete -->
                <div class="mb-3">
                    <label for="tipoModificarPaquete" class="form-label">Tipo de Paquete</label>
                    <select class="form-select" name="tipopaquete" id="tipoModificarPaquete" required>
                        <option value="Aventura" <?php echo ($paquete['tipopaquete'] == "Aventura") ? "selected" : ""; ?>>Aventura</option>
                        <option value="Relax" <?php echo ($paquete['tipopaquete'] == "Relax") ? "selected" : ""; ?>>Relax</option>
                        <option value="Cultural" <?php echo ($paquete['tipopaquete'] == "Cultural") ? "selected" : ""; ?>>Cultural</option>
                        <option value="Romántico" <?php echo ($paquete['tipopaquete'] == "Romántico") ? "selected" : ""; ?>>Romántico</option>
                        <option value="Familiar" <?php echo ($paquete['tipopaquete'] == "Familiar") ? "selected" : ""; ?>>Familiar</option>
                    </select>
                </div>

                <!-- Alojamiento -->
                <div class="mb-3">
                    <label for="alojamientoModificarPaquete" class="form-label">Alojamiento</label>
                    <select class="form-select" name="tipoalojamiento" id="alojamientoModificarPaquete" required>
                        <option value="Hotel 5 estrellas" <?php echo ($paquete['tipoalojamiento'] == "Hotel 5 estrellas") ? "selected" : ""; ?>>Hotel 5 estrellas</option>
                        <option value="Hotel 4 estrellas" <?php echo ($paquete['tipoalojamiento'] == "Hotel 4 estrellas") ? "selected" : ""; ?>>Hotel 4 estrellas</option>
                        <option value="Hostal" <?php echo ($paquete['tipoalojamiento'] == "Hostal") ? "selected" : ""; ?>>Hostal</option>
                        <option value="Apartamento" <?php echo ($paquete['tipoalojamiento'] == "Apartamento") ? "selected" : ""; ?>>Apartamento</option>
                        <option value="Camping" <?php echo ($paquete['tipoalojamiento'] == "Camping") ? "selected" : ""; ?>>Camping</option>
                    </select>
                </div>

                <!-- Fechas -->
                <div class="row">
                    <div class="col">
                        <label for="fechaInicioModificarPaquete" class="form-label">Fecha de Inicio</label>
                        <input type="date" class="form-control" name="fechainicio" id="fechaInicioModificarPaquete"
                            value="<?php echo $paquete['fechainicio']; ?>" required>
                    </div>
                    <div class="col">
                        <label for="fechaFinModificarPaquete" class="form-label">Fecha de Fin</label>
                        <input type="date" class="form-control" name="fechafin" id="fechaFinModificarPaquete"
                            value="<?php echo $paquete['fechafin']; ?>" required>
                    </div>
                </div>

                <!-- Transporte Incluido -->
                <div class="row mb-3">
                    <div class="col-6">
                        <label class="form-label">Transporte Incluido: </label><br>

                        <input class="form-check-input" type="radio" id="transporteAereo" name="transporteModificado" value="aéreo">
                        <label class="form-check-label" for="transporteAereo">Aéreo</label>

                        <input class="form-check-input" type="radio" id="transporteTerrestre" name="transporteModificado" value="terrestre">
                        <label class="form-check-label" for="transporteTerrestre">Terrestre</label><br>

                        <input class="form-check-input" type="radio" id="transporteMaritimo" name="transporteModificado" value="marítimo">
                        <label class="form-check-label" for="transporteMaritimo">Marítimo</label>
                    </div>
                    

                    <!-- Viaje -->
                    <div class="col-6">
                        <label for="lstModificarViajes" class="form-label">Selecciona un Viaje</label>
                        <select class="form-select" name="lstModificarViajes" id="lstModificarViajes" required>
                        <?php
                            // Bloque de PHP que genera las opciones de viaje
                            $sql = "SELECT id, origen, destino FROM Viaje;";

                            $resultado = mysqli_query($conexion, $sql);

                            $options = "";
                            $paquete_id = intval($_POST['paquete_id']); // Obtener el ID del paquete que se está editando

                            // Obtener el viaje asociado al paquete actual
                            $sql_viaje_paquete = "SELECT viaje_id FROM Paquete WHERE id = $paquete_id;";
                            $resultado_viaje_paquete = mysqli_query($conexion, $sql_viaje_paquete);
                            $viaje_id_seleccionado = null;

                            if ($fila = mysqli_fetch_assoc($resultado_viaje_paquete)) {
                                $viaje_id_seleccionado = $fila["viaje_id"];
                            }

                            // Generar las opciones del <select> y marcar el viaje seleccionado
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                $selected = ($fila["id"] == $viaje_id_seleccionado) ? "selected" : "";
                                $options .= "<option value='" . $fila["id"] . "' $selected>" . $fila["origen"] . " - " . $fila["destino"] . "</option>";
                            }

                            echo $options;
                        ?>
                        </select>
                    </div>
                </div>

                <!-- Botón Guardar -->
                <div class="text-center mt-4">
                    <button type="submit" id="btnModificarPaquete" class="btn btn-personalizado">
                        <i class="bi bi-floppy"></i>
                    </button>
                </div>
            </fieldset>
        </form>
    </div>
    <!-- FORMULARIO PAQUETES -->
</body>
</html>

