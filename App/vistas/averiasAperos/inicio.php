<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

<main class="flex-shrink-0">

<div class="container">

    <div class="table-responsive">

    <?php foreach($datos['apero'] as $aperos): ?>
        <?php if($aperos->idapero == $datos['id']):?>
            <h3>Mantenimientos de <?php echo $aperos->modelo ?></h3>
        <?php endif ?>
    <?php endforeach ?>

            <table class="table table-hover">

                <thead>
                    <tr>
                        <th>Descripción</th>
                        <th>Lugar reparacion</th>
                        <th>Precio reparación</th>
                        <th>Fecha</th>
                    </tr>
                </thead>

                <tbody id="tablebody">

                    <?php foreach($datos['averiaAperos'] as $averias): ?>

                        <tr>
                            <td><?php echo $averias->descripcion ?></td>
                            <td><?php echo $averias->lugar_reparacion ?></td>
                            <td><?php echo $averias->precio_reparacion ?></td>
                            <td><?php echo $averias->fecha ?></td>
                            <td class="text-center">
                            <a onclick="return confirm_delete()" href="<?php echo RUTA_URL ?>/AveriasAperos/borrar/<?php echo $averias->idaveria_apero ?>"><button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                                &nbsp;
                        </td>
                        </tr>

                    <?php endforeach ?>

                </tbody>

            </table>

    </div>

        <div class="col text-center" > <!--  onMouseDown="comprobarExiste()"> -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAdd">
                        Añadir averia
                    </button>
        </div>
    
    </div>

    <div id="modalAdd" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Añadir averia</h5>
                        <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close" ></button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo RUTA_URL?>/AveriasAperos/anadirAveria/">
                    <div class="mt-3 mb-3">
                        <label for="tipo">Descripción: <sup>*</sup></label>
                        <input type="text" name="tipo" id="tipo" class="form-control form-control-lg" >
                        <input type="text" name="id" id="id" value="<?php echo $datos['id'] ?>" class="form-control form-control-lg" hidden>
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="lugar">Lugar de reparación: <sup>*</sup></label>
                        <input type="text" name="lugar" id="lugar" class="form-control form-control-lg" >
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="precio">Precio de la reparación: <sup>*</sup></label>
                        <input type="text" name="precio" id="precio" class="form-control form-control-lg" >
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="fecha">Fecha: <sup>*</sup></label>
                        <input type="date" name="fecha" id="fecha" class="form-control form-control-lg" >
                    </div>
                    
                        <input type="submit" class="btn btn-success" value="Añadir averia" onclick="return confirm('¿Seguro que quieres añadir esta averia?');">
                    </form>
                </div>
            </div>
        </div>

</div>

</main>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>