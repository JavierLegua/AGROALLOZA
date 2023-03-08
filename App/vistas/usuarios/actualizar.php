<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>

<!-- <script src="main.js"></script> -->

<div class="container mainF">

    <a href=".." class="btn btn-light"><i class="bi bi-chevron-double-left"></i>Volver</a>

        <div class="card bg-light mt-5 w-75 justify-content-center align-items-center;">
            <h2 class="card-header">Cambiar contraseña</h2>

            <form method="post" class="card-body">
                <div class="mb-3">
                    <label for="clave">Nueva contraseña: <sup>*</sup></label>
                    <input type="password" name="clave" id="clave" class="form-control form-control-lg" value="">
                </div>
                <div>
                    <button class="btn btn-primary" type="button" onclick="mostrarPass()"><i class="glyphicon glyphicon-eye-open"></i>Mostrar contraseña</button> <br> <br>    <!--  mostrar icono en el boton -->
                </div>
                <input type="submit" class="btn btn-success" value="Actualizar contraseña" onclick="return confirm('¿Seguro que quieres actualizar la contraseña?');">
            </form>
        </div>

</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>