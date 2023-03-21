<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>

<main class="flex-shrink-0">

<div class="container">
    <h1>Tareas</h1>

    <div class="">
            <div class="accordion" id="accordionExample">
                    <?php foreach($datos['tarea'] as $tareas): ?> <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tarea_<?php echo $tareas->idtarea ?>" aria-expanded="false" aria-controls="tarea_<?php echo $tareas->idtarea ?>">
                                <?php echo $tareas->descripcion ?>
                                <?php if($datos['tareasSinTerminar'] != '0' && $tareas->completado == '0'): ?>
                                    &nbsp <span title="Tarea sin completar" class="badge rounded-pill badge-notification bg-danger justify-content-right">!</span>
                                <?php endif ?> 
                            </button>
                        </h2>
                        <div id="tarea_<?php echo $tareas->idtarea ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <div class="d-flex justify-content-around">
                                <div class="me-2">
                                <div class="mb-3">
                                        <label for="">Descripción:</label>
                                        <input type="text" name="descripcion" id="descripcion" class="form-control form-control-lg" placeholder="<?php echo $tareas->descripcion ?>" disabled>
                                    </div>
                                    <div class="mb-3">
                                    <label for="">Observaciones:</label>
                                        <input type="text" name="observaciones" id="observaciones" class="form-control form-control-lg" maxlength="9" autocomplete="off" placeholder="<?php echo $tareas->observaciones ?>" disabled>
                                    </div>
                                    <div class="mb-3">
                                    <label for="">Coste:</label>
                                        <input type="text" name="coste" id="coste" class="form-control form-control-lg" placeholder="<?php echo $tareas->coste ?>" disabled>
                                    </div>
                                    <div class="mb-3">
                                    <label for="">Estado:</label>
                                        <?php if($tareas->completado == 1): ?>
                                            <input type="text" name="Completada" id="Completada" class="form-control form-control-lg" autocomplete="off" placeholder="Completada" disabled>
                                        <?php else:?>
                                            <input type="text" name="Completada" id="Completada" class="form-control form-control-lg" placeholder="Sin completar" disabled>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div>
                                    <div class="mb-3">
                                    <label for="">Encargado:</label>
                                        <?php foreach($datos['usuario'] as $usuarios): ?>
                                            <?php if($usuarios->idusuario == $tareas->encargado):?>
                                                <input type="text" name="encargado" id="encargado" class="form-control form-control-lg" placeholder="<?php echo $usuarios->nombre ?>" disabled>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </div>

                                    <div class="mb-3">
                                    <label for="">Campo:</label>
                                        <?php foreach($datos['campo'] as $campos): ?>
                                            <?php if($campos->idcampo == $tareas->campo_idcampo):?>
                                                <input type="text" name="encargado" id="encargado" class="form-control form-control-lg" placeholder="<?php echo $campos->nombre ?>" disabled>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </div>
                                    <div class="mb-3">
                                    <label for="">Máquina:</label>
                                        <?php foreach($datos['maquina'] as $maquinas): ?>
                                            <?php if($maquinas->idmaquina == $tareas->maquina_idmaquina):?>
                                                <input type="text" name="encargado" id="encargado" class="form-control form-control-lg" placeholder="<?php echo $maquinas->modelo ?>" disabled>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </div>
                                    <div class="mb-3">
                                    <label for="">Apero:</label>
                                        <?php foreach($datos['apero'] as $aperos): ?>
                                            <?php if($aperos->idapero == $tareas->apero_idapero):?>
                                                <input type="text" name="encargado" id="encargado" class="form-control form-control-lg" placeholder="<?php echo $aperos->modelo ?>" disabled>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </div>
                                    <?php if($tareas->completado == 0): ?>
                        <a onclick="return confirm_delete()" href="<?php echo RUTA_URL ?>/Tareas/borrarTarea/<?php echo $tareas->idtarea ?>"><button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                            &nbsp;
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalcompletar_<?php echo $tareas->idtarea ?>"><i class="bi bi-check2-circle"></i></button>
                            &nbsp;

                            <!-- modal completar tarea -->
                            <div class="modal fade" id="modalcompletar_<?php echo $tareas->idtarea ?>" tabindex="-1" aria-labelledby="exampleModalCompletar" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCompletar">Completar tarea</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <form method="post" action="<?php echo RUTA_URL?>/Tareas/completarTarea/<?php echo $tareas->idtarea ?>">
                                                <div class="mt-3 mb-3">
                                                    <label for="">Descripción: <sup>*</sup></label>
                                                    <input type="text" name="" id="" class="form-control form-control-lg" value="<?php echo $tareas->descripcion ?>" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="observaciones">Observaciones: <sup>*</sup></label>
                                                    <input type="text" name="observaciones" id="observaciones" class="form-control form-control-lg" value="" autocomplete="off">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="coste">Coste: <sup>*</sup></label>
                                                    <input type="text" name="coste" id="coste" class="form-control form-control-lg" value="" autocomplete="off">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="num_horas">Nºhoras: <sup>*</sup></label>
                                                    <input type="text" name="num_horas" id="num_horas" class="form-control form-control-lg" value="" autocomplete="off">
                                                </div>
                                                <input type="submit" class="btn btn-success" value="Completar tarea" onclick="return confirm('¿Seguro que quieres completar esta tarea?');">
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php endif ?>
                    
                                </div>
                                
                            </div>                   
                            
                            </div>
                            
                        </div>
                        
                    </div>
                    
                    <?php endforeach ?> 
                    
                
            </div>
            <div class="col text-center" >
                <br>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAdd">
                    Crear tarea
                </button>
            </div>                            

        

        <div class="col text-center" > <!--  onMouseDown="comprobarExiste()"> -->

                

                <div id="modalAdd" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Crear tarea</h5>
                        <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close" ></button>
                    </div>
                    <div class="modal-body">
                <form method="post" action="<?php echo RUTA_URL?>/Tareas/crearTarea/">
                    <div class="mt-3 mb-3">
                        <label for="descripcion">Descripción: <sup>*</sup></label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control form-control-lg" >
                    </div>
                    <div class="mb-3">
                        <label for="encargado">Encargado: <sup>*</sup></label>
                        <select name="encargado" id="encargado" class="form-select form-select-lg">
                                <option value="">Seleccione una opción:</option>
                            <?php foreach($this->datos['usuario'] as $tareas): ?>
                                <option value="<?php echo $tareas->idusuario?>"><?php echo $tareas->nombre?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="campo">Campo: <sup>*</sup></label>
                        <select name="campo" id="campo" class="form-select form-select-lg">
                                    <option value="">Seleccione una opción:</option>    
                            <?php foreach($this->datos['campo'] as $campos): ?>
                                    <option value="<?php echo $campos->idcampo?>"><?php echo $campos->nombre?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="maquina">Máquina: <sup>*</sup></label>
                        <select name="maquina" id="maquina" class="form-select form-select-lg">
                                    <option value="">Seleccione una opción:</option>    
                            <?php foreach($this->datos['maquina'] as $maquinas): ?>
                                    <option value="<?php echo $maquinas->idmaquina?>"><?php echo $maquinas->modelo?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="apero">Apero: <sup>*</sup></label>
                        <select name="apero" id="apero" class="form-select form-select-lg">
                                    <option value="">Seleccione una opción:</option>    
                            <?php foreach($this->datos['apero'] as $aperos): ?>
                                    <option value="<?php echo $aperos->idapero?>"><?php echo $aperos->modelo?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                        <input type="submit" class="btn btn-success" value="Crear tarea" onclick="return confirm('¿Seguro que quieres crear está tarea?');">
                </form>
                </div>
            </div>
            </div>
    </div>
    
    </div>

</div>

</main>

<script>
    function buscadorfiltrador(){
            var palabra = document.getElementById("buscador").value;
            let tareas = '<?php echo $this->datos['tareaEncript'];  ?>'

            let tareasDecod = JSON.parse(tareas)

        
            document.getElementById("tablebody").innerHTML = "";

            for (let i = 0; i < tareasDecod.length; i++) {
                if (palabra == "") {
                    //escribir la tabla con todos los tareas
                    //location.reload();
                    window.location.href="<?php echo RUTA_URL?>/tareas ?>";


                } else if(tareasDecod[i].descripcion.toLowerCase().includes(palabra.toLowerCase())) {
                

                    var tr = document.createElement("tr")
                    var td = document.createElement("td")

                    

                    var contenido = document.createTextNode(tareasDecod[i].descripcion)
                    td.appendChild(contenido)
                    tr.appendChild(td)

                    var td6 = document.createElement("td")

                    var tc = "text-center"
                    td6.setAttribute("class", tc)

                    var a2 = document.createElement("button")
                    var icon = document.createElement("i") 
                    var iclase = "bi bi-info-circle"
                    icon.setAttribute("class", iclase)
                    var contenido6 = document.createTextNode(icon)
                    a2.appendChild(icon)
                    var btn2 = "btn btn-info"
                    a2.setAttribute("class", btn2)
                    a2.setAttribute("onclick", "crearmodalEditar("+tareasDecod[i].idtarea+")")
                    td6.appendChild(a2)
                    tr.appendChild(td6)


                    document.getElementById("tablebody").appendChild(tr);

                    //alert(tareasDecod[i].idusuario); 
                // exit();
                }
            }    
        }
    
      function filtrador(){
            var palabra = document.getElementById("completada").value;
            let tareas = '<?php echo $this->datos['tareaEncript'];  ?>'

            let tareasDecod = JSON.parse(tareas)

        
            document.getElementById("tablebody").innerHTML = "";

            for (let i = 0; i < tareasDecod.length; i++) {
                if (palabra == "") {
                    //escribir la tabla con todos los tareas
                    //location.reload();
                    window.location.href="<?php echo RUTA_URL?>/tareas ?>";


                } else if(tareasDecod[i].completado.toLowerCase().includes(palabra.toLowerCase()) ) {
                

                    var tr = document.createElement("tr")
                    var td = document.createElement("td")

                    

                    var contenido = document.createTextNode(tareasDecod[i].descripcion)
                    td.appendChild(contenido)
                    tr.appendChild(td)

                    var td6 = document.createElement("td")

                    var tc = "text-center"
                    td6.setAttribute("class", tc)

                    var a2 = document.createElement("button")
                    var icon = document.createElement("i") 
                    var iclase = "bi bi-info-circle"
                    icon.setAttribute("class", iclase)
                    var contenido6 = document.createTextNode(icon)
                    a2.appendChild(icon)
                    var btn2 = "btn btn-info"
                    a2.setAttribute("class", btn2)
                    a2.setAttribute("onclick", "crearmodalEditar("+tareasDecod[i].idtarea+")")
                    td6.appendChild(a2)
                    tr.appendChild(td6)


                    document.getElementById("tablebody").appendChild(tr);

                    //alert(tareasDecod[i].idusuario); 
                // exit();
                }
            }    
        }
</script>

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
