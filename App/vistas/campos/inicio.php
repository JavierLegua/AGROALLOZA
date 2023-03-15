<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

<main class="flex-shrink-0">

<div class="container">
    
    <h1>Campos</h1>
    <div class="row g-3 align-items justify-content-center mb-3 mt-3">
                <div class="col-6">
                    <input oninput="buscadorFiltrador()" type="text" name="buscador" id="buscadorpalabra" class="form-control" aria-describedby="passwordHelpInline" placeholder="Buscador">
                </div>
    </div>

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

</main>

<script>

        function buscadorFiltrador(){
            var palabra = document.getElementById("buscadorpalabra").value;
            let campos = '<?php echo $this->camEncript['campos'];  ?>'

            let camposDecod = JSON.parse(campos)
        
            document.getElementById("tablebody").innerHTML = "";

            for (let i = 0; i < camposDecod.length; i++) {
                if (palabra == "") {
                    //escribir la tabla con todos los usuarios
                    //location.reload();
                    window.location.href="<?php echo RUTA_URL?>/campos ?>";


                } else if(camposDecod[i].nombre.toLowerCase().includes(palabra.toLowerCase()) || camposDecod[i].partida.toLowerCase().includes(palabra.toLowerCase()) || camposDecod[i].estado_tierra.toLowerCase().includes(palabra.toLowerCase()) || camposDecod[i].estado_arboles.toLowerCase().includes(palabra.toLowerCase())
                || camposDecod[i].tipo_plantacion.toLowerCase().includes(palabra.toLowerCase())) {

                    var tr = document.createElement("tr")
                    var td = document.createElement("td")

                    

                    var contenido = document.createTextNode(camposDecod[i].nombre)
                    td.appendChild(contenido)
                    tr.appendChild(td)

                    var td3 = document.createElement("td")
                    var contenido3 = document.createTextNode(camposDecod[i].partida)
                    td3.appendChild(contenido3)
                    tr.appendChild(td3)

                    var td4 = document.createElement("td")
                    var contenido4 = document.createTextNode(camposDecod[i].estado_tierra)
                    td4.appendChild(contenido4)
                    tr.appendChild(td4)

                    var td5 = document.createElement("td")
                    var contenido5 = document.createTextNode(camposDecod[i].estado_arboles)
                    td5.appendChild(contenido5)
                    tr.appendChild(td5)

                    var td9 = document.createElement("td")
                    var contenido9 = document.createTextNode(camposDecod[i].tipo_plantacion)
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
                    a2.setAttribute("onclick", "crearmodalEditar("+camposDecod[i].idusuario+")")
                    td6.appendChild(a2)
                    

                    var a3 = document.createElement("button")
                    var iconb = document.createElement("i") 
                    var iclaseb = "bi bi-trash-fill"
                    iconb.setAttribute("class", iclaseb)
                    var contenido6 = document.createTextNode(iconb)
                    a3.appendChild(iconb)
                    var btn3 = "btn btn-danger ms-3"
                    a3.setAttribute("class", btn3)
                    a3.setAttribute("data-bs-target", "#modalborrar_"+camposDecod[i].idusuario)
                    a3.setAttribute("data-bs-toggle", "modal")
                    td6.appendChild(a3)
                    tr.appendChild(td6)

                    document.getElementById("tablebody").appendChild(tr);

                    //alert(camposDecod[i].idusuario); 
                // exit();
                }
            }    
        }

</script>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
