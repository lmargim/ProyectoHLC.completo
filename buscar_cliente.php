<?php
include_once("cabecera.html");
?>

<div class="container mt-5">
    <form name="frmBuscarCliente" id="frmBuscarCliente" action="procesar_buscar_cliente.php" method="POST">
        <fieldset id="form-viajes">
            <legend>Buscar cliente</legend>
            <!-- DNI -->
            <label for="txtdniBuscarCliente" class="form-label">DNI</label>
            <input type="text" class="form-control" id="txtdniBuscarCliente" name="txtdniBuscarCliente" placeholder="12345678A" required>
            <!-- Botón Añadir -->
            <div class="text-center mt-4">
                <button id="btnBuscarCliente" type="submit" class="btn btn-personalizado"><i
                        class="bi bi-search"></i></button>
            </div>
        </fieldset>
    </form>
</div>
</body>

</html>