<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

<main class="flex-shrink-0">

<div class="container">

    <h1>Colaboradores</h1>
    <div class="row g-3 align-items justify-content-center mb-3 mt-3">
                <div class="col-6">
                    <input oninput="buscadorFiltrador()" type="text" name="buscador" id="buscadorpalabra" class="form-control" aria-describedby="passwordHelpInline" placeholder="Buscador">
                </div>
    </div>

<div class="table table-responsive">

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Empresa</th>
                <th>Teléfono</th>
                <th>NIF</th>
                <th>Dirección</th>
                <th>Código postal</th>
            </tr>
        </thead>

        <tbody id="tablebody">

            <?php foreach($datos['colaborador'] as $colaboradores): ?>
            <tr>
                <td><?php echo $colaboradores->empresa ?></td>
                <td><?php echo $colaboradores->telefono ?></td>
                <td><?php echo $colaboradores->NIF ?></td>
                <td><?php echo $colaboradores->direccion ?></td>
                <td><?php echo $colaboradores->codigo_postal ?></td>


                <td class="text-center">                            
                        <button class="btn btn-warning" id="myBtn<?php echo $colaboradores->idcolaborador ?>" onclick="crearmodalEditar(<?php echo $colaboradores->idcolaborador ?>)"><i class="bi bi-pencil"></i></button>
                        &nbsp;
                        <a onclick="return confirm_delete()" href="<?php echo RUTA_URL ?>/Colaboradores/borrarColab/<?php echo $colaboradores->idcolaborador ?>"><button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                        &nbsp;
                

                <div id="<?php echo $colaboradores->idcolaborador ?>" class="modal1">
                                <div class="modal-content1">
                                    <div class="modal-header">
                                        <h5 class="modal-title"> Editar colaborador</h5>
                                        <span onclick="cerrar(<?php echo $colaboradores->idcolaborador ?>)" class="close"><i class="bi bi-x-lg"></i></span>
                                    </div>
                                <!-- Modal content -->
                                    <form method="post" action="<?php echo RUTA_URL?>/Colaboradores/editarColab/<?php echo $colaboradores->idcolaborador ?>">
                                        <div class="mt-3 mb-3">
                                            <label for="empresa">Empresa: <sup>*</sup></label>
                                            <input type="text" name="empresa" id="empresa" class="form-control form-control-lg" value="<?php echo $colaboradores->empresa ?>" >
                                            <input type="hidden" value="<?php echo $colaboradores->idcolaborador?>" name="idcolaborador">
                                        </div>
                                        <div class="mb-3">
                                            <label for="telefono">Teléfono: <sup>*</sup></label>
                                            <input type="text" name="telefono" id="telefono" class="form-control form-control-lg" autocomplete="off" value="<?php echo $colaboradores->telefono ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nif">NIF/DNI: <sup>*</sup></label>
                                            <input type="text" name="nif" id="nif" class="form-control form-control-lg" autocomplete="off"  value="<?php echo $colaboradores->NIF ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="direccion">Dirección: <sup>*</sup></label>
                                            <input type="text" name="direccion" id="direccion" class="form-control form-control-lg" autocomplete="off"  value="<?php echo $colaboradores->direccion ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="codigo_postal">Código postal: <sup>*</sup></label>
                                            <input type="text" name="codigo_postal" id="codigo_postal" class="form-control form-control-lg" autocomplete="off"  value="<?php echo $colaboradores->codigo_postal ?>">
                                        </div>

                                        <input type="submit" class="btn btn-success" value="Editar colaborador" onclick="return confirm('¿Seguro que quieres editar este colaborador?')">
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
                Agregar
            </button>
        </div>

        <div id="modalAdd" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Añadir colaborador</h5>
                        <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close" ></button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo RUTA_URL?>/Colaboradores/anadirColab/">
                        <div class="mt-3 mb-3">
                            <label for="empresa">Empresa: <sup>*</sup></label>
                            <input type="text" name="empresa" id="empresa" class="form-control form-control-lg" >
                        </div>
                        <div class="mb-3">
                            <label for="telefono">Teléfono: <sup>*</sup></label>
                            <input type="text" name="telefono" id="telefono" class="form-control form-control-lg" autocomplete="off" >
                        </div>
                        <div class="mb-3">
                            <label for="nif">NIF/DNI: <sup>*</sup></label>
                            <input type="text" name="nif" id="nif" class="form-control form-control-lg" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="direccion">Dirección: <sup>*</sup></label>
                            <input type="text" name="direccion" id="direccion" class="form-control form-control-lg" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="codigo_postal">Código postal: <sup>*</sup></label>
                            <input type="text" name="codigo_postal" id="codigo_postal" class="form-control form-control-lg" autocomplete="off">
                        </div>
                        <input type="submit" class="btn btn-success" value="Añadir colaborador" onclick="return confirm('¿Seguro que quieres añadir este colaborador?')">
                    </form>
                </div>
            </div>
        </div>
    </div>

</main>

<script>

        function buscadorFiltrador(){
            var palabra = document.getElementById("buscadorpalabra").value;
            let colaboradores = '<?php echo $this->colabEncript['colaboradores'];  ?>'

            let colaboradoresDecod = JSON.parse(colaboradores)
        
            document.getElementById("tablebody").innerHTML = "";

            for (let i = 0; i < colaboradoresDecod.length; i++) {
                if (palabra == "") {
                    //escribir la tabla con todos los usuarios
                    //location.reload();
                    window.location.href="<?php echo RUTA_URL?>/colaboradores ?>";


                } else if(colaboradoresDecod[i].empresa.toLowerCase().includes(palabra.toLowerCase()) || colaboradoresDecod[i].telefono.toLowerCase().includes(palabra.toLowerCase()) || colaboradoresDecod[i].NIF.toLowerCase().includes(palabra.toLowerCase()) || colaboradoresDecod[i].direccion.toLowerCase().includes(palabra.toLowerCase())
                || colaboradoresDecod[i].codigo_postal.toLowerCase().includes(palabra.toLowerCase())) {

                    var tr = document.createElement("tr")
                    var td = document.createElement("td")

                    

                    var contenido = document.createTextNode(colaboradoresDecod[i].empresa)
                    td.appendChild(contenido)
                    tr.appendChild(td)

                    var td3 = document.createElement("td")
                    var contenido3 = document.createTextNode(colaboradoresDecod[i].telefono)
                    td3.appendChild(contenido3)
                    tr.appendChild(td3)

                    var td4 = document.createElement("td")
                    var contenido4 = document.createTextNode(colaboradoresDecod[i].NIF)
                    td4.appendChild(contenido4)
                    tr.appendChild(td4)

                    var td5 = document.createElement("td")
                    var contenido5 = document.createTextNode(colaboradoresDecod[i].direccion)
                    td5.appendChild(contenido5)
                    tr.appendChild(td5)

                    var td9 = document.createElement("td")
                    var contenido9 = document.createTextNode(colaboradoresDecod[i].codigo_postal)
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
                    a2.setAttribute("onclick", "crearmodalEditar("+colaboradoresDecod[i].idusuario+")")
                    td6.appendChild(a2)
                    

                    var a3 = document.createElement("button")
                    var iconb = document.createElement("i") 
                    var iclaseb = "bi bi-trash-fill"
                    iconb.setAttribute("class", iclaseb)
                    var contenido6 = document.createTextNode(iconb)
                    a3.appendChild(iconb)
                    var btn3 = "btn btn-danger ms-3"
                    a3.setAttribute("class", btn3)
                    a3.setAttribute("data-bs-target", "#modalborrar_"+colaboradoresDecod[i].idusuario)
                    a3.setAttribute("data-bs-toggle", "modal")
                    td6.appendChild(a3)
                    tr.appendChild(td6)

                    document.getElementById("tablebody").appendChild(tr);

                    //alert(colaboradoresDecod[i].idusuario); 
                // exit();
                }
            }    
        }

</script>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
