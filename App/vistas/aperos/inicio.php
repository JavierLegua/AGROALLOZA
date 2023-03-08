<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

<main class="flex-shrink-0">

<div class="container">
    <h1>Aperos</h1>

<div class="table-responsive">

    <table class="table table-hover">

        <thead>
            <tr>
                <th>Modelo</th>
                <th>Matrícula</th>
                <!-- <th>Foto</th> -->
            </tr>
        </thead>

        <tbody id="tablebody">

            <?php foreach($datos['apero'] as $aperos): ?>

                <tr>
                    <td><?php echo $aperos->modelo ?></td>
                    <td><?php echo $aperos->matricula ?></td>
                    <!-- <td><?php echo $aperos->foto ?></td> -->

                    <td class="text-center">                            
                            <button class="btn btn-warning" id="myBtn<?php echo $aperos->idapero ?>" onclick="crearmodalEditar(<?php echo $aperos->idapero ?>)"><i class="bi bi-pencil"></i></button>
                            &nbsp;
                            <a onclick="return confirm_delete()" href="<?php echo RUTA_URL ?>/Aperos/borrarApero/<?php echo $aperos->idapero ?>"><button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                            &nbsp;
                            <a href="<?php echo RUTA_URL ?>/MantenimientosAperos/<?php echo $aperos->idapero ?>">Mantenimientos</a>
                            &nbsp;
                            <a href="<?php echo RUTA_URL ?>/AveriasAperos/<?php echo $aperos->idapero ?>">Averias</a>
                    </td>

                    <div id="<?php echo $aperos->idapero ?>" class="modal1">
                                <div class="modal-content1">
                                    <div class="modal-header">
                                        <h5 class="modal-title"> Editar apero</h5>
                                        <span onclick="cerrar(<?php echo $aperos->idapero ?>)" class="close"><i class="bi bi-x-lg"></i></span>
                                    </div>
                                <!-- Modal content -->
                                    <form method="post" action="<?php echo RUTA_URL?>/Aperos/editarApero/<?php echo $aperos->idapero ?>">
                                        <div class="mt-3 mb-3">
                                            <label for="modelo">Modelo: <sup>*</sup></label>
                                            <input type="text" name="modelo" id="modelo" class="form-control form-control-lg" value="<?php echo $aperos->modelo ?>" >
                                            <input type="hidden" value="<?php echo $aperos->idapero?>" name="idapero">
                                        </div>
                                        <div class="mb-3">
                                            <label for="matricula">Matrícula: <sup>*</sup></label>
                                            <input type="text" name="matricula" id="matricula" class="form-control form-control-lg" autocomplete="off" value="<?php echo $aperos->matricula ?>">
                                        </div>

                                        <input type="submit" class="btn btn-success" value="Editar apero" onclick="return confirm('¿Seguro que quieres editar este apero?');">
                                    </form>
                                </div>
                    </div>
                </tr>

            <?php endforeach ?>

        </tbody>

    </table>

    <div class="col text-center" > <!--  onMouseDown="comprobarExiste()"> -->

                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAdd">
                    Crear apero
                </button>
    </div>
    <div id="modalAdd" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Añadir apero</h5>
                        <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close" ></button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo RUTA_URL?>/Aperos/anadirApero/<?php echo $aperos->idapero ?>">
                        <div class="mt-3 mb-3">
                            <label for="modelo">Modelo: <sup>*</sup></label>
                            <input type="text" name="modelo" id="modelo" class="form-control form-control-lg" >
                        </div>
                        <div class="mb-3">
                            <label for="matricula">Matrícula: <sup>*</sup></label>
                            <input type="text" name="matricula" id="matricula" class="form-control form-control-lg" autocomplete="off" >
                        </div>

                        <input type="submit" class="btn btn-success" value="Añadir apero" onclick="return confirm('¿Seguro que quieres añadir este apero?');">
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

</main>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
