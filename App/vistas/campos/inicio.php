<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

<main class="flex-shrink-0">

<div class="container">
    
    <h1>Campos</h1>

<div class="table-responsive">

    <table class="table table-hover">

        <thead>
            <tr>
                <th>Nombre</th>
                <th>Partida terreno</th>
                <th>Estado tierra</th>
                <th>Estado arboles</th>
                <th>Tipo plantación</th>
            </tr>
        </thead>

        <tbody id="tablebody">

            <?php foreach($datos['campo'] as $campos): ?>

            <tr>
                <td><?php echo $campos->nombre ?></td>
                <td><?php echo $campos->partida ?></td>
                <td><?php echo $campos->estado_tierra ?></td>
                <td><?php echo $campos->estado_arboles ?></td>
                <td><?php echo $campos->tipo_plantacion ?></td>


                    <td class="text-center">                            
                            <button class="btn btn-warning" id="myBtn<?php echo $campos->idcampo ?>" onclick="crearmodalEditar(<?php echo $campos->idcampo ?>)"><i class="bi bi-pencil"></i></button>
                            &nbsp;
                            <a onclick="return confirm_delete()" href="<?php echo RUTA_URL ?>/Campos/borrarCampo/<?php echo $campos->idcampo ?>"><button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                            &nbsp;
                    </td>

                    <div id="<?php echo $campos->idcampo ?>" class="modal1">
                                <div class="modal-content1">
                                    <div class="modal-header">
                                        <h5 class="modal-title"> Editar campo</h5>
                                        <span onclick="cerrar(<?php echo $campos->idcampo ?>)" class="close"><i class="bi bi-x-lg"></i></span>
                                    </div>
                                <!-- Modal content -->
                                    <form method="post" action="<?php echo RUTA_URL?>/Campos/editarCampo/<?php echo $campos->idcampo ?>">
                                        <div class="mt-3 mb-3">
                                            <label for="nombre">Nombre: <sup>*</sup></label>
                                            <input type="text" name="nombre" id="nombre" class="form-control form-control-lg" value="<?php echo $campos->nombre ?>" >
                                            <input type="hidden" value="<?php echo $campos->idcampo?>" name="idcampo">
                                        </div>
                                        <div class="mb-3">
                                            <label for="partida">Partida: <sup>*</sup></label>
                                            <input type="text" name="partida" id="partida" class="form-control form-control-lg" autocomplete="off" value="<?php echo $campos->partida ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="estado_tierra">Estado tierra: <sup>*</sup></label>
                                            <input type="text" name="estado_tierra" id="estado_tierra" class="form-control form-control-lg" autocomplete="off"  value="<?php echo $campos->estado_tierra ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="estado_arboles">Estado arboles: <sup>*</sup></label>
                                            <input type="text" name="estado_arboles" id="estado_arboles" class="form-control form-control-lg" autocomplete="off"  value="<?php echo $campos->estado_arboles ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="tipo_plantacion">Tipo plantación: <sup>*</sup></label>
                                            <input type="text" name="tipo_plantacion" id="tipo_plantacion" class="form-control form-control-lg" autocomplete="off"  value="<?php echo $campos->tipo_plantacion ?>">
                                        </div>

                                        <input type="submit" class="btn btn-success" value="Editar Campo" onclick="return confirm('¿Seguro que quieres editar este campo?');">
                                    </form>
                                </div>
                    </div>
            </tr>

            <?php endforeach ?>


        </tbody>

    </table>

    <div class="col text-center" > <!--  onMouseDown="comprobarExiste()"> -->

                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAdd">
                    Crear campo
                </button>
    </div>

    <div id="modalAdd" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Añadir campo</h5>
                        <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close" ></button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo RUTA_URL?>/Campos/anadirCampo/">
                    <div class="mt-3 mb-3">
                        <label for="nombre">Nombre: <sup>*</sup></label>
                        <input type="text" name="nombre" id="nombre" class="form-control form-control-lg">
                    </div>
                    <div class="mb-3">
                        <label for="partida">Partida: <sup>*</sup></label>
                        <input type="text" name="partida" id="partida" class="form-control form-control-lg" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="estado_tierra">Estado tierra: <sup>*</sup></label>
                        <input type="text" name="estado_tierra" id="estado_tierra" class="form-control form-control-lg">
                    </div>
                    <div class="mb-3">
                        <label for="estado_arboles">Estado arboles: <sup>*</sup></label>
                        <input type="text" name="estado_arboles" id="estado_arboles" class="form-control form-control-lg">
                    </div>
                    <div class="mb-3">
                        <label for="tipo_plantacion">Tipo plantación: <sup>*</sup></label>
                        <input type="text" name="tipo_plantacion" id="tipo_plantacion" class="form-control form-control-lg">
                    </div>
                            <input type="submit" class="btn btn-success" value="Añadir campo" onclick="return confirm('¿Seguro que quieres añadir este campo?');">
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

<br><br>
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">

        <li class="page-item"><a class="page-link textoColor" href="<?php echo RUTA_URL?>/usuarios/index/0" tabindex="-1" aria-disabled="true">Primera</a></li>

        <?php for ($i=0; $i < $this->numPaginas; $i++): ?>

            <li class="page-item"><a class="page-link textoColor" href="<?php echo RUTA_URL?>/usuarios/index/<?php echo $i?>"><?php echo $i+1 ?></a></li>

        <?php endfor ?>

        <li class="page-item"><a class="page-link textoColor" href="<?php echo RUTA_URL?>/usuarios/index/<?php echo $this->numPaginas-1?>" tabindex="-1" aria-disabled="true">Última</a></li>
            
        </ul>
        </nav>

</main>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
