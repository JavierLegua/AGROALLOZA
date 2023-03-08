<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

<main class="flex-shrink-0">

<div class="container">

    <div class="table-responsive">

    <?php foreach($datos['maquina'] as $maquinas): ?>
        <?php if($maquinas->idmaquina == $datos['id']):?>
            <h3>Mantenimientos de <?php echo $maquinas->modelo ?></h3>
        <?php endif ?>
    <?php endforeach ?>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Nºhoras</th>
                    <th>Lugar</th>
                    <th>Nºhoras proximo mantenimiento</th>
                    <th>Observaciones</th>
                    <th>Fecha</th>
                </tr>
            </thead>

            <tbody id="tablebody">
                <?php foreach($datos['mantenimiento'] as $mantenimientos): ?>

                    <tr>
                        <td><?php echo $mantenimientos->tipo ?></td>
                        <td><?php echo $mantenimientos->num_horas ?></td>
                        <td><?php echo $mantenimientos->lugar ?></td>
                        <td><?php echo $mantenimientos->num_horas_prox_mantenimiento ?></td>
                        <td><?php echo $mantenimientos->observaciones ?></td>
                        <td><?php echo $mantenimientos->fecha ?></td>

                        <td class="text-center">
                            <a onclick="return confirm_delete()" href="<?php echo RUTA_URL ?>/MantenimientosMaquinas/borrar/<?php echo $mantenimientos->idmantenimiento_maquina ?>"><button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                                &nbsp;
                        </td>
                    </tr>

                <?php endforeach ?>
            </tbody>
        </table>

    </div>

    <div class="col text-center" > <!--  onMouseDown="comprobarExiste()"> -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAdd">
                    Crear mantenimiento
                </button>
            </div>
    </div>

    <div id="modalAdd" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Crear mantenimiento</h5>
                        <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close" ></button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo RUTA_URL?>/MantenimientosMaquinas/anadirMantenimiento/">
                    <div class="mt-3 mb-3">
                        <label for="tipo">Descripción: <sup>*</sup></label>
                        <input type="text" name="tipo" id="tipo" class="form-control form-control-lg" >
                        <input type="text" name="id" id="id" value="<?php echo $datos['id'] ?>" class="form-control form-control-lg" hidden>

                    </div>
                    <div class="mt-3 mb-3">
                        <label for="num_horas">Nºhoras: <sup>*</sup></label>
                        <input type="text" name="num_horas" id="num_horas" class="form-control form-control-lg" >
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="lugar">Lugar: <sup>*</sup></label>
                        <input type="text" name="lugar" id="lugar" class="form-control form-control-lg" >
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="num_horasproxmant">Nºhoras proximo mantenimiento: <sup>*</sup></label>
                        <input type="text" name="num_horasproxmant" id="num_horasproxmant" class="form-control form-control-lg" >
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="observaciones">Observaciones: <sup>*</sup></label>
                        <input type="text" name="observaciones" id="observaciones" class="form-control form-control-lg" >
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="fecha">Fecha: <sup>*</sup></label>
                        <input type="date" name="fecha" id="fecha" class="form-control form-control-lg" >
                    </div>
                    
                        <input type="submit" class="btn btn-success" value="Añadir mantenimiento" onclick="return confirm('¿Seguro que quieres añadir este mantenimiento?');">
                    </form>
                </div>
            </div>
        </div>

</div>

</main>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>