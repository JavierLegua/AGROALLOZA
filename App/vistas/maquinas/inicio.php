<?php require_once RUTA_APP.'/vistas/inc/header.php'?>
<main class="flex-shrink-0">

    <div class="container">

            <h1>Máquinas</h1>
            <!-- BUSCADOR -->
            <div class="row g-3 align-items justify-content-center mb-3 mt-3">
                <div class="col-6">
                    <input oninput="buscadorFiltrador()" type="text" name="buscador" id="buscadorpalabra" class="form-control" aria-describedby="passwordHelpInline" placeholder="Buscador">
                </div>
                <!-- FIN BUSCADOR -->
            </div>

            <div class="table-responsive">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Modelo</th>
                        <th>Nºhoras</th>
                        <th>Matrícula</th>
                    </tr>
                </thead>

                <tbody id="tablebody">

                    <?php foreach($datos['maquina'] as $maquinas): ?>

                    <tr>
                        <td><?php echo $maquinas->modelo?></td>
                        <td><?php echo $maquinas->num_horas?></td>
                        <td><?php echo $maquinas->matricula?></td>


                        <td class="text-center">                            
                            <button class="btn btn-warning" id="myBtn<?php echo $maquinas->idmaquina ?>" onclick="crearmodalEditar(<?php echo $maquinas->idmaquina ?>)"><i class="bi bi-pencil"></i></button>
                            &nbsp;
                            <a onclick="return confirm_delete()" href="<?php echo RUTA_URL ?>/Maquinas/borrarMaquina/<?php echo $maquinas->idmaquina ?>"><button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                            &nbsp;
                            <a href="<?php echo RUTA_URL ?>/MantenimientosMaquinas/<?php echo $maquinas->idmaquina ?>">Mantenimientos</a>
                            &nbsp;
                            <a href="<?php echo RUTA_URL ?>/AveriasMaquinas/<?php echo $maquinas->idmaquina ?>">Averias</a>
                        </td>

                            <div id="<?php echo $maquinas->idmaquina ?>" class="modal1">
                                <div class="modal-content1">
                                    <div class="modal-header">
                                        <h5 class="modal-title"> Editar máquina</h5>
                                        <span onclick="cerrar(<?php echo $maquinas->idmaquina ?>)" class="close"><i class="bi bi-x-lg"></i></span>
                                    </div>
                                <!-- Modal content -->
                                    <form method="post" action="<?php echo RUTA_URL?>/Maquinas/editarMaquina/<?php echo $maquinas->idmaquina ?>">
                                        <div class="mt-3 mb-3">
                                            <label for="modelo">Modelo: <sup>*</sup></label>
                                            <input type="text" name="modelo" id="modelo" class="form-control form-control-lg" value="<?php echo $maquinas->modelo ?>" >
                                            <input type="hidden" value="<?php echo $maquinas->idmaquina?>" name="idmaquina">
                                        </div>
                                        <div class="mb-3">
                                            <label for="matricula">Matrícula: <sup>*</sup></label>
                                            <input type="text" name="matricula" id="matricula" class="form-control form-control-lg" autocomplete="off" value="<?php echo $maquinas->matricula ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="horas">Nºhoras: <sup>*</sup></label>
                                            <input type="text" name="horas" id="horas" class="form-control form-control-lg" autocomplete="off"  value="<?php echo $maquinas->num_horas ?>">
                                        </div>

                                        <input type="submit" class="btn btn-success" value="Editar Máquina" onclick="return confirm('¿Seguro que quieres editar esta máquina?');">
                                    </form>
                                </div>
                            </div>
                    </tr>


                    <?php endforeach ?>

                </tbody>
            </table>
        
            <div class="col text-center" > <!--  onMouseDown="comprobarExiste()"> -->

                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAdd">
                    Agregar
                </button>
            </div>

        <div id="modalAdd" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Añadir máquina</h5>
                        <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close" ></button>
                    </div>
                    <div class="modal-body">
                <form method="post" action="<?php echo RUTA_URL?>/Maquinas/anadirMaquina/">
                    <div class="mt-3 mb-3">
                        <label for="modelo">Modelo: <sup>*</sup></label>
                        <input type="text" name="modelo" id="modelo" class="form-control form-control-lg" >
                    </div>
                    <div class="mb-3">
                        <label for="matricula">Matrícula: <sup>*</sup></label>
                        <input type="text" name="matricula" id="matricula" class="form-control form-control-lg" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="horas">Nºhoras: <sup>*</sup></label>
                        <input type="text" name="horas" id="horas" class="form-control form-control-lg" autocomplete="off">
                    </div>

                    <!-- <div class="mb-3">
                              <input accept="image/*" type="file" id="" name="imagen" >
                    </div> -->

                        <input type="submit" class="btn btn-success" value="Añadir Máquina" onclick="return confirm('¿Seguro que quieres añadir esta máquina?');">
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>


</main>

<script>

        function buscadorFiltrador(){
            var palabra = document.getElementById("buscadorpalabra").value;
            let maquinas = '<?php echo $this->maEncript['maquinas'];  ?>'

            let maquinasDecod = JSON.parse(maquinas)
        
            document.getElementById("tablebody").innerHTML = "";

            for (let i = 0; i < maquinasDecod.length; i++) {
                if (palabra == "") {
                    //escribir la tabla con todos los usuarios
                    //location.reload();
                    window.location.href="<?php echo RUTA_URL?>/maquinas ?>";


                } else if(maquinasDecod[i].modelo.toLowerCase().includes(palabra.toLowerCase()) || maquinasDecod[i].matricula.toLowerCase().includes(palabra.toLowerCase())) {

                    var tr = document.createElement("tr")
                    var td = document.createElement("td")

                    

                    var contenido = document.createTextNode(maquinasDecod[i].modelo)
                    td.appendChild(contenido)
                    tr.appendChild(td)

                    var td1 = document.createElement("td")
                    var contenido1 = document.createTextNode(maquinasDecod[i].num_horas)
                    td1.appendChild(contenido1)
                    tr.appendChild(td1)

                    var td3 = document.createElement("td")
                    var contenido3 = document.createTextNode(maquinasDecod[i].matricula)
                    td3.appendChild(contenido3)
                    tr.appendChild(td3)

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
                    a2.setAttribute("onclick", "crearmodalEditar("+maquinasDecod[i].idusuario+")")
                    td6.appendChild(a2)
                    

                    var a3 = document.createElement("button")
                    var iconb = document.createElement("i") 
                    var iclaseb = "bi bi-trash-fill"
                    iconb.setAttribute("class", iclaseb)
                    var contenido6 = document.createTextNode(iconb)
                    a3.appendChild(iconb)
                    var btn3 = "btn btn-danger ms-3"
                    a3.setAttribute("class", btn3)
                    a3.setAttribute("data-bs-target", "#modalborrar_"+maquinasDecod[i].idusuario)
                    a3.setAttribute("data-bs-toggle", "modal")
                    td6.appendChild(a3)
                    tr.appendChild(td6)

                    document.getElementById("tablebody").appendChild(tr);

                    //alert(maquinasDecod[i].idusuario); 
                // exit();
                }
            }    
        }

</script>

        
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
