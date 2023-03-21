<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

<main class ="flex-shrink-0">

<div class="container">

    <h1>Campañas</h1>
    <div class="row g-3 align-items justify-content-center mb-3 mt-3">
                <div class="col-6">
                    <input oninput="buscadorFiltrador()" type="text" name="buscador" id="buscadorpalabra" class="form-control" aria-describedby="passwordHelpInline" placeholder="Buscador">
                </div>
    </div>

<div class="table table-responsive">

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Fecha inicio</th>
                <th>Fecha fin</th>
                <th>Tipo cultivo</th>
                <th>Kilos recolectados</th>
                <th>Encargado</th>
            </tr>
        </thead>

        <tbody id="tablebody">
            <?php foreach($datos['campana'] as $campanas): ?>

                <tr>
                    <td><?php echo $campanas->nombre ?></td>
                    <td><?php echo $campanas->fecha_inicio ?></td>
                    <td><?php echo $campanas->fecha_fin ?></td>
                    <td><?php echo $campanas->tipo_cultivo ?></td>
                    <td><?php echo $campanas->kilos_recolectados ?></td>
                    <?php foreach($datos['encargado'] as $encargados): ?>
                        <?php if($campanas->idencargado == $encargados->idusuario): ?>
                            <td><?php echo $encargados->nombre ?></td>
                        <?php endif ?> 
                    <?php endforeach ?>

                    <td class="text-center">                            
                            <button class="btn btn-warning" id="myBtn<?php echo $campanas->idcampaña ?>" onclick="crearmodalEditar(<?php echo $campanas->idcampaña ?>)"><i class="bi bi-pencil"></i></button>
                            &nbsp;
                            <a onclick="return confirm_delete()" href="<?php echo RUTA_URL ?>/Campanas/borrarCampana/<?php echo $campanas->idcampaña ?>"><button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                            &nbsp;
                    

                    <div id="<?php echo $campanas->idcampaña ?>" class="modal1">
                                <div class="modal-content1">
                                    <div class="modal-header">
                                        <h5 class="modal-title"> Editar campaña</h5>
                                        <span onclick="cerrar(<?php echo $campanas->idcampaña ?>)" class="close"><i class="bi bi-x-lg"></i></span>
                                    </div>
                                <!-- Modal content -->
                                    <form method="post" action="<?php echo RUTA_URL?>/Campanas/editarCampana/<?php echo $campanas->idcampaña ?>">
                                        <div class="mt-3 mb-3">
                                            <label for="nombre">Nombre: <sup>*</sup></label>
                                            <input type="text" name="nombre" id="nombre" class="form-control form-control-lg" value="<?php echo $campanas->nombre ?>" >
                                            <input type="hidden" value="<?php echo $campanas->idcampaña?>" name="idcampana">
                                        </div>
                                        <div class="mb-3">
                                            <label for="fecha_inicio">Fecha inicio: <sup>*</sup></label>
                                            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control form-control-lg" autocomplete="off" value="<?php echo $campanas->fecha_inicio ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="fecha_fin">Fecha fin: <sup>*</sup></label>
                                            <input type="date" name="fecha_fin" id="fecha_fin" class="form-control form-control-lg" autocomplete="off"  value="<?php echo $campanas->fecha_fin ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="tipo_cultivo">Tipo cultivo: <sup>*</sup></label>
                                            <input type="text" name="tipo_cultivo" id="tipo_cultivo" class="form-control form-control-lg" autocomplete="off" value="<?php echo $campanas->tipo_cultivo ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="kilos_recolectados">Kilos recolectados: <sup>*</sup></label>
                                            <input type="text" name="kilos_recolectados" id="kilos_recolectados" class="form-control form-control-lg" autocomplete="off"  value="<?php echo $campanas->kilos_recolectados ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="encargado_idencargado">Encargado: <sup>*</sup></label>
                                            <select name="encargado_idencargado" id="encargado_idencargado" class="form-select form-select-lg">
                                                <?php foreach($this->encargados as $encargado): ?>
                                                    <?php if ($encargado->idencargado == $datos['campanas']->encargado_idencargado):?>
                                                        <option value="<?php echo $encargado->idencargado?>" selected><?php echo $encargado->idencargado?></option>
                                                    <?php else: ?>
                                                        <option value="<?php echo $encargado->idencargado?>"><?php echo $encargado->idencargado?></option>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </select>
                                        </div>

                                        <input type="submit" class="btn btn-success" value="Editar campaña" onclick="return confirm('¿Seguro que quieres editar esta campaña?');">
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
            Crear campaña
        </button>
    </div>

    <div id="modalAdd" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Crear campaña</h5>
                        <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close" ></button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo RUTA_URL?>/Campanas/anadirCampana/">
                        <div class="mt-3 mb-3">
                            <label for="nombre">Nombre: <sup>*</sup></label>
                            <input type="text" name="nombre" id="nombre" class="form-control form-control-lg" >
                        </div>
                        <div class="mb-3">
                            <label for="fecha_inicio">Fecha inicio: <sup>*</sup></label>
                            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control form-control-lg" autocomplete="off">
                        </div>
                        <!-- <div class="mb-3">
                            <label for="fecha_fin">Fecha fin: <sup>*</sup></label>
                            <input type="date" name="fecha_fin" id="fecha_fin" class="form-control form-control-lg" autocomplete="off">
                        </div> -->
                        <div class="mb-3">
                            <label for="tipo_cultivo">Tipo cultivo: <sup>*</sup></label>
                            <input type="text" name="tipo_cultivo" id="tipo_cultivo" class="form-control form-control-lg" autocomplete="off">
                        </div>
                        <!-- <div class="mb-3">
                            <label for="kilos_recolectados">Kilos recolectados: <sup>*</sup></label>
                            <input type="text" name="kilos_recolectados" id="kilos_recolectados" class="form-control form-control-lg" autocomplete="off">
                        </div> -->
                        <div class="mb-3">
                            <label for="encargado_idencargado">Encargado: <sup>*</sup></label>
                            <select name="encargado_idencargado" id="encargado_idencargado" class="form-select form-select-lg">
                                <?php foreach($this->encargados as $encargado): ?>
                                    <?php if ($encargado->idencargado == $datos['campanas']->encargado_idencargado):?>
                                        <option value="<?php echo $encargado->idencargado?>" selected><?php echo $encargado->idencargado?></option>
                                    <?php else: ?>
                                        <option value="<?php echo $encargado->idencargado?>"><?php echo $encargado->idencargado?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>                            
                        </div>
                        <input type="submit" class="btn btn-success" value="Crear campaña" onclick="return confirm('¿Seguro que quieres crear esta campaña?');">
                    </form>
                </div>
            </div>
        </div>
    </div>

</main>

<script>

        function buscadorFiltrador(){
            var palabra = document.getElementById("buscadorpalabra").value;
            let campanas = '<?php echo $this->campEncript['campanas'];  ?>'

            let campanasDecod = JSON.parse(campanas)
        
            document.getElementById("tablebody").innerHTML = "";

            for (let i = 0; i < campanasDecod.length; i++) {
                if (palabra == "") {
                    //escribir la tabla con todos los usuarios
                    //location.reload();
                    window.location.href="<?php echo RUTA_URL?>/campanas ?>";


                } else if(campanasDecod[i].nombre.toLowerCase().includes(palabra.toLowerCase()) || campanasDecod[i].fecha_inicio.toLowerCase().includes(palabra.toLowerCase()) || campanasDecod[i].fecha_fin.toLowerCase().includes(palabra.toLowerCase()) || campanasDecod[i].tipo_cultivo.toLowerCase().includes(palabra.toLowerCase())
                || campanasDecod[i].kilos_recolectados.toLowerCase().includes(palabra.toLowerCase())) {

                    var tr = document.createElement("tr")
                    var td = document.createElement("td")

                    

                    var contenido = document.createTextNode(campanasDecod[i].nombre)
                    td.appendChild(contenido)
                    tr.appendChild(td)

                    var td3 = document.createElement("td")
                    var contenido3 = document.createTextNode(campanasDecod[i].fecha_inicio)
                    td3.appendChild(contenido3)
                    tr.appendChild(td3)

                    var td4 = document.createElement("td")
                    var contenido4 = document.createTextNode(campanasDecod[i].fecha_fin)
                    td4.appendChild(contenido4)
                    tr.appendChild(td4)

                    var td5 = document.createElement("td")
                    var contenido5 = document.createTextNode(campanasDecod[i].tipo_cultivo)
                    td5.appendChild(contenido5)
                    tr.appendChild(td5)

                    var td9 = document.createElement("td")
                    var contenido9 = document.createTextNode(campanasDecod[i].kilos_recolectados)
                    td9.appendChild(contenido9)
                    tr.appendChild(td9)

                    var td6 = document.createElement("td")

                    var tc = "text-center"
                    td6.setAttribute("class", tc)

                    var a2 = document.createElement("button")
                    var icon = document.createElement("i") 
                    var iclase = "bi bi-pencil"
                    icon.setAttribute("class", iclase)
                    var contenido6 = document.createTextNode(icon)
                    a2.appendChild(icon)
                    var btn2 = "btn btn-warning"
                    a2.setAttribute("class", btn2)
                    a2.setAttribute("onclick", "crearmodalEditar("+campanasDecod[i].idusuario+")")
                    td6.appendChild(a2)
                    

                    var a3 = document.createElement("button")
                    var iconb = document.createElement("i") 
                    var iclaseb = "bi bi-trash-fill"
                    iconb.setAttribute("class", iclaseb)
                    var contenido6 = document.createTextNode(iconb)
                    a3.appendChild(iconb)
                    var btn3 = "btn btn-danger ms-3"
                    a3.setAttribute("class", btn3)
                    a3.setAttribute("data-bs-target", "#modalborrar_"+campanasDecod[i].idusuario)
                    a3.setAttribute("data-bs-toggle", "modal")
                    td6.appendChild(a3)
                    tr.appendChild(td6)

                    document.getElementById("tablebody").appendChild(tr);

                    //alert(campanasDecod[i].idusuario); 
                // exit();
                }
            }    
        }

</script>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>