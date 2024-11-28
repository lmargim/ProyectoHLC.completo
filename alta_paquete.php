<?php
require_once("funcionesBD.php");

$conexion = obtenerConexion();

$sql = "SELECT * FROM Viaje;";

$resultado = mysqli_query($conexion, $sql);

$options = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    // $tipos[] = $fila; // Insertar una fila al final
    $options .= "<option value='" . $fila["id"] . "'>" . $fila["origen"] . " - " . $fila["destino"] . "</option>";
}

// Cabecera HTML que incluye navbar
include_once("cabecera.html");
?>

    <!-- FORMULARIO PAQUETES -->
    <div class="container mt-5">
        <form action="proceso_alta_paquete.php" name="frmPaquetes" id="frmPaquetes" method="post">
            <fieldset id="form-paquetes">
                <legend>Añadir Paquete</legend>
                
                <!-- Nombre del Paquete -->
                <div class="mb-3">
                    <label for="nombrePaquete" class="form-label">Nombre del Paquete</label>
                    <input type="text" class="form-control" id="nombrePaquete" name="nombrePaquete"
                        placeholder="Introduce el nombre del paquete" required>
                </div>
                
                <!-- Tipo de Paquete y Alojamiento -->
                <div class="row mb-3">
                    <!-- Tipo de Paquete -->
                    <div class="col-6">
                        <label for="tipoPaquete" class="form-label">Tipo de Paquete</label>
                        <select class="form-select" id="tipoPaquete" name="tipoPaquete" required>
                            <option value="">Selecciona una opción</option>
                            <option value="Aventura">Aventura</option>
                            <option value="Relax">Relax</option>
                            <option value="Cultural">Cultural</option>
                            <option value="Romántico">Romántico</option>
                            <option value="Familiar">Familiar</option>
                        </select>
                    </div>
                    
                    <!-- Tipo de Alojamiento -->
                    <div class="col-6">
                        <label for="alojamiento" class="form-label">Tipo de Alojamiento</label>
                        <select class="form-select" id="alojamiento" name="alojamiento" required>
                            <option value="">Selecciona una opción</option>
                            <option value="Hotel 5 estrellas">Hotel 5 estrellas</option>
                            <option value="Hotel 4 estrellas">Hotel 4 estrellas</option>
                            <option value="Hostal">Hostal</option>
                            <option value="Apartamento">Apartamento</option>
                            <option value="Camping">Camping</option>
                        </select>
                    </div>
                </div>
                
                <!-- Fechas -->
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="fechaInicio" class="form-label">Fecha de Inicio</label>
                        <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" required>
                    </div>
                    <div class="col-6">
                        <label for="fechaFin" class="form-label">Fecha de Fin</label>
                        <input type="date" class="form-control" id="fechaFin" name="fechaFin" required>
                    </div>
                </div>
                
                <!-- Transporte y Viajes -->
                <div class="row mb-3">
                    <div class="col-6">
                        <label class="form-label">Transporte Incluido</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="transporteAereo" name="transporte" value="aéreo" required>
                            <label class="form-check-label" for="transporteAereo">Aéreo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="transporteTerrestre" name="transporte" value="terrestre">
                            <label class="form-check-label" for="transporteTerrestre">Terrestre</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="transporteMaritimo" name="transporte" value="marítimo">
                            <label class="form-check-label" for="transporteMaritimo">Marítimo</label>
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <label for="lstViajes" class="form-label">Selecciona un Viaje</label>
                        <select class="form-select" name="lstViajes" id="lstViajes" required>
                            <?php echo $options; ?>
                        </select>
                    </div>
                </div>
                
                <!-- Botón de Envío -->
                <div class="text-center mt-4">
                    <button type="submit" id="btnAñadirPaquete" class="btn btn-personalizado">
                        <i class="bi bi-plus"></i>
                    </button>
                </div>
            </fieldset>
        </form>
    </div>
    <!-- FORMULARIO PAQUETES -->
</body>
</html>