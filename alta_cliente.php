<?php
require_once("funcionesBD.php");

$conexion = obtenerConexion();


include_once("cabecera.html");
?>

<!-- FORMULARIO CLIENTE -->
<div class="container mt-5  mb-5">
    <form name="frmClientes" id="frmClientes" action="procesar_alta_cliente.php" method="POST">
        <fieldset id="form-cliente">
            <legend>Añadir Cliente</legend>
            <!-- Nombre y DNI -->
            <div class="mb-3">
                <div class="row">
                    <!-- Nombre -->
                    <div class="col-lg-6">
                        <label for="txtnombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="txtnombre" name="txtnombre"
                            placeholder="Introduce tu nombre completo" required>
                    </div>
                    <!-- DNI -->
                    <div class="col-lg-6">
                        <label for="txtdni" class="form-label">DNI</label>
                        <input type="text" class="form-control" id="txtdni" name="txtdni" placeholder="12345678A"
                            required>
                    </div>
                </div>
            </div>
            <!-- Correo Electrónico -->
            <div class="mb-3">
                <label for="txtcuerpocorreo" class="form-label">Email</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="txtcuerpocorreo" name="txtcuerpocorreo"
                        placeholder="ejemplo">
                    <div class="input-group-text">@</div>
                    <input type="text" class="form-control" id="txtextensioncorreo" name="txtextensioncorreo"
                        placeholder="ejemplo.com">
                </div>
            </div>
            <!-- Teléfono -->
            <div class="mb-3">
                <label for="txttelefono" class="form-label">Teléfono</label>
                <div class="row">
                    <div class="col-4">
                        <select class="form-select" id="txtextensiontelefono" name="txtextensiontelefono">
                            <optgroup label="Extensiones Telefónicas">
                                <option value="+34">+34 España</option>
                                <option value="+1">+1 Estados Unidos y Canadá</option>
                                <option value="+52">+52 México</option>
                                <option value="+54">+54 Argentina</option>
                                <option value="+55">+55 Brasil</option>
                                <option value="+44">+44 Reino Unido</option>
                                <option value="+49">+49 Alemania</option>
                                <option value="+81">+81 Japón</option>
                                <option value="+86">+86 China</option>
                                <option value="+91">+91 India</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="col-8">
                        <input type="number" class="form-control" id="txttelefono" name="txttelefono"
                            placeholder="625123456" required>
                    </div>
                </div>
            </div>
            <!-- Dirección -->
            <div class="mb-3">
                <label for="txtdireccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="txtdireccion" name="txtdireccion"
                    placeholder="Calle, número, ciudad, código postal" required>
            </div>
            <!-- Botón Añadir -->
            <div class="text-center mt-4">
                <button id="btnAñadirCliente" type="submit" class="btn btn-personalizado"><i
                        class="bi bi-plus"></i></button>
            </div>
        </fieldset>
    </form>
</div>
<!-- FORMULARIO CLIENTE -->
</body>

</html>