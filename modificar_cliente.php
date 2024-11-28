<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recupero datos de parametro en forma de array asociativo
$cliente = json_decode($_POST['cliente'], true);


include_once("cabecera.html");
?>

<!-- FORMULARIO CLIENTE -->
<div class="container mt-5  mb-5">
    <form name="frmModificarCliente" id="frmModificarCliente" action="procesar_modificar_cliente.php" method="POST">
        <fieldset id="form-ModificarCliente">
            <legend>Modificar Cliente</legend>
            <!-- Nombre y DNI -->
            <div class="mb-3">
                <div class="row">
                    <!-- Nombre -->
                    <div class="col-lg-6">
                        <label for="txtNombreModificarCliente" class="form-label">Nombre</label>
                        <input value="<?php echo $cliente['nombre'] ?>" type="text" class="form-control"
                            id="txtNombreModificarCliente" name="txtNombreModificarCliente"
                            placeholder="Introduce tu nombre completo" required>
                    </div>
                    <!-- DNI -->
                    <div class="col-lg-6">
                        <label for="txtDniModificarClienteVisible" class="form-label">DNI</label>
                        <input value="<?php echo $cliente['dni'] ?>" type="text" class="form-control"
                            id="txtDniModificarClienteVisible" name="txtDniModificarClienteVisible" disabled="disabled">
                            <input value="<?php echo $cliente['dni'] ?>" type="hidden" class="form-control"
                            id="txtDniModificarCliente" name="txtDniModificarCliente">
                    </div>
                </div>
            </div>
            <!-- Correo Electrónico -->
            <div class="mb-3">
                <label for="txtEmailModificarCliente" class="form-label">Email</label>
                <div class="input-group">
                    <input value="<?php echo $cliente['email'] ?>" type="text" class="form-control"
                        id="txtEmailModificarCliente" name="txtEmailModificarCliente" placeholder="ejemplo@gmail.com">
                </div>
            </div>
            <!-- Teléfono -->
            <div class="mb-3">
                <label for="txtTelefonoModificarCliente" class="form-label">Teléfono</label>
                <input value="<?php echo $cliente['telefono'] ?>" type="text" class="form-control"
                    id="txtTelefonoModificarCliente" name="txtTelefonoModificarCliente" placeholder="+34-625123456"
                    required>
            </div>
            <!-- Dirección -->
            <div class="mb-3">
                <label for="txtDireccionModificarCliente" class="form-label">Dirección</label>
                <input value="<?php echo $cliente['direccion'] ?>" type="text" class="form-control"
                    id="txtDireccionModificarCliente" name="txtDireccionModificarCliente"
                    placeholder="Calle, número, ciudad, código postal" required>
            </div>
            <div class="text-center mt-4">
                <button id="btnAñadirCambios" type="submit" class="btn btn-personalizado"><i
                        class="bi bi-floppy"></i></button>
            </div>

        </fieldset>
    </form>
</div>
<!-- FORMULARIO CLIENTE -->
</body>

</html>