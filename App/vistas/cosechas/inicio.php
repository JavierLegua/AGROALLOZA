<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

<main class="flex-shrink-0">

<div class="container">

    <h1>Cosechas</h1>

<div class="row g-3 align-items justify-content-center mb-3">
                <div class="col-2">
                <form action="<?php echo RUTA_URL ?>/Cosechas/filtroCampana/" method="post">
        <br>
        <select name="campana" id="campana" class="form-select form-select-lg" onchange="this.form.submit()">
        <option value="%">Seleccione:</option>
            <?php foreach($this->datos['campana'] as $campanas): ?>
                <?php if($this->datos['campanaActual'] == $campanas->idcampaña): ?>
                        <option selected value="<?php echo $campanas->idcampaña?>"><?php echo $campanas->nombre?></option>
                    <?php else: ?>
                        <option value="<?php echo $campanas->idcampaña?>"><?php echo $campanas->nombre?></option>
                <?php endif ?>
            <?php endforeach ?>
        </select>
        <br>

    </form>
                </div>
            </div>



<div class="table table-responsive">

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Kilos</th>
                <th>Campaña</th>
                <th>Campo</th>
                <th>Colaborador</th>
            </tr>
        </thead>

        <tbody id="tbody">
            <?php foreach($datos['cosecha'] as $cosechas): ?>
            
                <tr>
                    <td><?php echo $cosechas->num_kilos ?></td>
                    <?php foreach($datos['campana'] as $campañas): ?>
                        <?php if ($campañas->idcampaña == $cosechas->campaña_idcampaña): ?>
                            <td><?php echo $campañas->nombre ?></td>
                        <?php endif ?>
                    <?php endforeach ?>
                    <?php foreach($datos['campo'] as $campos): ?>
                        <?php if ($campos->idcampo == $cosechas->campo_idcampo): ?>
                            <td><?php echo $campos->nombre ?></td>
                        <?php endif ?>
                    <?php endforeach ?>
                    <?php foreach($datos['colaborador'] as $colab): ?>
                        <?php if ($colab->idcolaborador == $cosechas->colaborador_idcolaborador): ?>
                            <td><?php echo $colab->empresa ?></td>
                        <?php endif ?>
                    <?php endforeach ?>
                    

                    <td class="text-center">                            
                            <button class="btn btn-warning" id="myBtn<?php echo $cosechas->idcosecha ?>" onclick="crearmodalEditar(<?php echo $cosechas->idcosecha ?>)"><i class="bi bi-pencil"></i></button>
                            &nbsp;
                            <a onclick="return confirm_delete()" href="<?php echo RUTA_URL ?>/Cosechas/borrarCosecha/<?php echo $cosechas->idcosecha ?>"><button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                            &nbsp;

                            <div id="<?php echo $cosechas->idcosecha ?>" class="modal1">
                                <div class="modal-content1">
                                    <div class="modal-header">
                                        <h5 class="modal-title"> Editar cosecha</h5>
                                        <span onclick="cerrar(<?php echo $cosechas->idcosecha ?>)" class="close"><i class="bi bi-x-lg"></i></span>
                                    </div>
                                <!-- Modal content -->
                                    <form method="post" action="<?php echo RUTA_URL?>/Cosechas/editarCosecha/<?php echo $cosechas->idcosecha ?>">
                                        <div class="mt-3 mb-3">
                                            <label for="kilos">Kilos: <sup>*</sup></label>
                                            <input type="text" name="kilos" id="kilos" class="form-control form-control-lg" value="<?php echo $cosechas->num_kilos ?>" >
                                            <input type="hidden" value="<?php echo $cosechas->idcosecha?>" name="idcosecha">
                                        </div>
                                        <div class="mb-3">
                                            <label for="campana">Campaña: <sup>*</sup></label>
                                            <select name="campana" id="campana" class="form-select form-select-lg">
                                                <?php foreach($this->datos['campana'] as $campanas): ?>
                                                        <option value="<?php echo $campanas->idcampaña?>"><?php echo $campanas->nombre?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="campo">Campo: <sup>*</sup></label>
                                            <select name="campo" id="campo" class="form-select form-select-lg">
                                                <?php foreach($this->datos['campo'] as $campos): ?>
                                                        <option value="<?php echo $campos->idcampo?>"><?php echo $campos->nombre?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="colaborador">Colaborador: <sup>*</sup></label>
                                            <select name="colaborador" id="colaborador" class="form-select form-select-lg">
                                                <?php foreach($this->datos['colaborador'] as $colaboradores): ?>
                                                        <option value="<?php echo $colaboradores->idcolaborador?>"><?php echo $colaboradores->empresa?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <input type="submit" class="btn btn-success" value="Editar cosecha" onclick="return confirm('¿Seguro que quieres editar esta cosecha?');">
                                    </form>
                                </div>
                    </div>
                    </td>
                </tr>
            
            <?php endforeach ?>

        </tbody>
    </table>

    

</div>

</div>
            <div class="col text-center" > <!--  onMouseDown="comprobarExiste()"> -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAdd">
                    Crear cosecha
                </button>
            </div>

            <div id="modalAdd" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Crear cosecha</h5>
                        <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close" ></button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo RUTA_URL?>/Cosechas/anadirCosecha/">
                    <div class="mt-3 mb-3">
                        <label for="kilos">Kilos: <sup>*</sup></label>
                        <input type="text" name="kilos" id="kilos" class="form-control form-control-lg" >
                    </div>
                    <div class="mb-3">
                        <label for="campana">Campaña: <sup>*</sup></label>
                        <select name="campana" id="campana" class="form-select form-select-lg">
                                <option value="null">Seleccione:</option>
                            <?php foreach($this->datos['campana'] as $campanas): ?>
                                <option value="<?php echo $campanas->idcampaña?>"><?php echo $campanas->nombre?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="campo">Campo: <sup>*</sup></label>
                        <select name="campo" id="campo" class="form-select form-select-lg">
                            <option value="null">Seleccione:</option>
                            <?php foreach($this->datos['campo'] as $campos): ?>
                                <option value="<?php echo $campos->idcampo?>"><?php echo $campos->nombre?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="colaborador">Colaborador: <sup>*</sup></label>
                        <select name="colaborador" id="colaborador" class="form-select form-select-lg">
                            <option value="null">Seleccione:</option>
                            <?php foreach($this->datos['colaborador'] as $colaboradores): ?>
                                <option value="<?php echo $colaboradores->idcolaborador?>"><?php echo $colaboradores->empresa?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                        <input type="submit" class="btn btn-success" value="Añadir cosecha" onclick="return confirm('¿Seguro que quieres añadir esta cosecha?');">
                    </form>
                </div>
            </div>
        </div>
    </div>

</main>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
