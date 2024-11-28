<?php

include_once("cabecera.html");

?>
    
    <div class="container mt-5">
        <form action="procesar_buscar_paquete.php" name="frmBuscarPaquete" id="frmBuscarPaquete" method="get">
            <fieldset id="form-paquetes">
                <legend>Buscar paquete</legend>
                <!-- ID -->
                <label for="txtidBuscarPaquete" class="form-label">Id del Paquete</label>
                <input type="text" class="form-control" id="txtidBuscarPaquete" name="txtidBuscarPaquete" placeholder="Por ej: 1" required>
                <!-- Botón Añadir -->
                <div class="text-center mt-4">
                    <button id="btnBuscarPaquete" type="submit" class="btn btn-personalizado"><i
                            class="bi bi-search"></i></button>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>