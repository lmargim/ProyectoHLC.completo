<?php
// Cabecera HTML que incluye navbar
include_once("cabecera.html");
?>
    <!-- FORMULARIO VIAJES -->
    <div class="container mt-5">
        <form name="frmViajes" id="frmViajes" action="proceso_alta_viaje.php" method="post">
            <fieldset id="form-viajes">
                <legend>Añadir Viaje</legend>
                <!-- ORIGEN Y DESTINO -->
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="txtOrigen" class="form-label">Origen</label>
                        <input type="text" class="form-control" id="txtOrigen" name="txtOrigen" value="" required placeholder="Madrid">
                    </div>
                    <div class="col-6">
                        <label for="txtDestino" class="form-label">Destino</label>
                        <input type="text" class="form-control" id="txtDestino" name="txtDestino" value="" required
                            placeholder="Nueva york">
                    </div>
                </div>
                <!-- IDA Y VUELTA -->
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
                <!-- Botón de envío -->
                <div class="text-center mt-4">
                    <button type="submit" id="btnAñadirViaje" class="btn btn-personalizado"><i
                            class="bi bi-plus"></i></button>
                </div>
            </fieldset>
        </form>
    </div>
    <!-- FORMULARIO VIAJES -->
</body>
</html>