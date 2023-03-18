<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>

<main class="flex-shrink-0">

    <div class="container">
        <h1>Enviar mensajes</h1>
        <div class="row g-3 align-items justify-content-center mb-3 mt-3">
            <form action="<?php echo RUTA_URL?>/Mensajes/enviarMensaje/" method="post">

                <input list="usuarios" name="usuario" class="form-control" id="usuario" placeholder="Selecciona el usuario:">
                <datalist id="usuarios">
                    <?php foreach($datos['usuario'] as $usuarios): ?>
                        <option id="<?php echo $usuarios->email ?>" value="<?php echo $usuarios->email ?>"><?php echo $usuarios->nombre ?></option>
                    <?php endforeach ?>
                </datalist>
                <br>

                <input type="text" name="asunto" class="form-control" autocomplete="off" placeholder="Asunto del mensaje:" id="asunto">
                <br>

                <textarea type="textarea" name="cuerpo" class="form-control cuerpo" autocomplete="off" placeholder="Cuerpo del mensaje:" id="cuerpo"></textarea>
                <br>

                <input type="submit" class="btn btn-success" value="Enviar mensaje">
            </form>
        </div>
    </div>

</main>

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
