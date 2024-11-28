<?php

include_once("cabecera.html");

?>
    
    <div class="container mt-5">
        <form action="procesar_buscar_viaje.php" name="frmBuscarViaje" id="frmBuscarViaje" method="get">
            <fieldset id="form-viaje">
                <legend>Buscar Viaje</legend>
                <!-- ID -->
                <label for="txtidBuscarViaje" class="form-label">Id del Viaje</label>
                <input type="text" class="form-control" id="txtidBuscarViaje" name="txtidBuscarViaje" placeholder="Por ej: 1" required>
                <!-- Botón Añadir -->
                <div class="text-center mt-4">
                    <button id="btnBuscarViaje" type="submit" class="btn btn-personalizado"><i
                            class="bi bi-search"></i></button>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>