<?php require_once RUTA_APP.'/vistas/inc/header.php'?>
<main class="flex-shrink-0">

    <div class="container">
            <h1>Balance</h1>
    </div>

    <div class="container">
        <br>
        <!-- esto sirve para poner en el input el dia de hoy -->
        <?php 

            $month = date('m');
            $day = date('d');
            $year = date('Y');

            $today = $year . '-' . $month . '-' . $day;

            $balanceTotal = 0;
            $balanceGastos = 0;
            $balanceIngresos = 0;

            // print_r($datos[tipos])
        ?>



        Ver datos desde: <input type="date" name="fecha_min" id="fecha_min" value="01/01/2001" onchange="entreFechas()"> hasta: <input type="date" value="<?php echo $today; ?>" id="fecha_max" name="fecha_max" onchange="entreFechas()">


        <select name="tipos" id="tipos" onchange="filtrarTipo()">
                    <option value="0">Filtrar por tipo</option>
            <?php foreach ($datos["tipo"] as $tipos): ?>
                    <option value="<?php echo $tipos->idtipo; ?>"> <?php echo $tipos->nombre; ?></option>
            <?php endforeach; ?>
        </select>

    </div>
            
    
                
    </div>

    <div class="container">
        <br>
    <div>
        <div class="d-flex justify-content-around">
            <div>
                <h1>Total ingresos:</h1>
                <p class="ingresos">+ 
                <?php foreach($datos['ingreso'] as $ingresos): 
                    $balanceTotal += $ingresos->cantidad;
                
                    $balanceIngresos += $ingresos->cantidad; 
                    endforeach;
                    echo $balanceIngresos;
                ?>€
                </p>
            </div>

            <div>
                <h1>Total gastos:</h1>
                <p class="gastos">- 
                <?php foreach($datos['gasto'] as $gastos): 
                    $balanceTotal -= $gastos->cantidad;
                
                    $balanceGastos += $gastos->cantidad; 
                    endforeach;
                    echo $balanceGastos;
                ?>€
                </p>
            </div>

            <div>
                <h1>Total balance:</h1>
                <p class="">
                    <?php if ($balanceTotal >= 0): ?>
                        <p class="ingresos" id="balanceTotal">+<?php echo $balanceTotal."€" ?></p>
                        <?php endif ?>
                
                    <?php if ($balanceTotal < 0): ?>
                        <p class="gastos" id="balanceTotal">-<?php echo $balanceTotal."€" ?></p>
                        <?php endif ?>
                </p>
            </div>
        </div>
        <div class="table-responsive">
            <h1>Ingresos</h1>
            <table class="table table-hover">
                <thead>
                            <tr>
                                <th>Concepto</th>
                                <th>Fecha</th>
                                <th>Cantidad</th>
                                <th>Tipo</th>
                                <th>Banco</th>
                <?php if (tienePrivilegios($datos['usuarioSesion']->rol_idrol,[1])):?>
                                <th colspan="3" class="text-center">Acciones</th>
                <?php endif ?>
                            </tr>
                </thead>

                <tbody id="tablebody">
                            
                <!-- <?php print_r($datos['tipo']);?> -->
                        
                            <?php 
                            $i = 0;

                            foreach($datos['ingreso'] as $ingresos): 
                                $balanceTotal += $ingresos->cantidad;
                                $balanceIngresos += $ingresos->cantidad;
                                ?>

                                <!--  <?php echo json_encode($datos) ?>-->

                                <tr>
                                    <td><?php echo $ingresos->concepto ?></td>
                                    <td><?php echo $ingresos->fecha ?></td>
                                    <td class="ingresos">+<?php echo $ingresos->cantidad ?>€</td>
                                    <td><?php $nombre = nombre($ingresos->tipo);     echo $nombre; ?></td>
                                    <td><?php echo $ingresos->banco ?></td>
                <?php if (tienePrivilegios($datos['usuarioSesion']->rol_idrol,[1])):?>
        
        
                                <td class="text-center">
                                    <!-- PRUEBA -->
                                    <form method="POST" action="<?php echo RUTA_URL?>/Balances/borrarIngreso" id="formIng">
                                    <input type="hidden" value="<?php echo $ingresos->idingresos ?>" name="id" id="id">
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                    </form>
                                    &nbsp;
                                </td>
        
                                </tr>
                <?php endif ?>
        
                            <?php endforeach ?>

                            <?php function nombre($id){
                                $nombre = "";
                                
                                // print_r ($id);
                                switch ($id) {
                                    case '1':
                                        $nombre = 'Cosecha';
                                        break;
                                    
                                    case '2':
                                        $nombre = 'Venta';
                                        break;
                                }
                                return $nombre;
                            } ?>
                        </tbody>
            </table>


        </div>

        <div class="table-responsive">
            <h1>Gastos</h1>
            <table class="table table-hover">
                <thead>
                            <tr>
                                <th>Concepto</th>
                                <th>Fecha</th>
                                <th>Cantidad</th>
                                <th>Tipo</th>
                                <th>Banco</th>
                                <th>Cuenta destino</th>

                <?php if (tienePrivilegios($datos['usuarioSesion']->rol_idrol,[1])):?>
                                <th colspan="3" class="text-center">Acciones</th>
                <?php endif ?>
                            </tr>
                </thead>

                <tbody id="tablebody1">
                            
                        
                            <?php foreach($datos['gasto'] as $gastos): 
                                $balanceTotal -= $gastos->cantidad;
                                $balanceGastos += $gastos->cantidad;
                                ?>
                                <!--  <?php echo json_encode($datos) ?>-->
                                
                                <tr>
                                    <td><?php echo $gastos->concepto ?></td>
                                    <td><?php echo $gastos->fecha ?></td>
                                    <td class="gastos">-<?php echo $gastos->cantidad ?>€</td>
                                    <td><?php $nombre = nombre($gastos->tipo);     echo $nombre; ?></td>
                                    <td><?php echo $gastos->banco ?></td>
                                    <td><?php echo $gastos->cuenta_destino ?></td>

                <?php if (tienePrivilegios($datos['usuarioSesion']->rol_idrol,[1])):?>
        
        
                    <td class="text-center">
                                    <!-- PRUEBA -->
                                    <form method="POST" action="<?php echo RUTA_URL?>/Balances/borrarGasto" id="formIng">
                                    <input type="hidden" value="<?php echo $gastos->idgastos ?>" name="id" id="id">
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                    </form>
                                    &nbsp;
                                </td>
        
                                </tr>
                <?php endif ?>
        
        
                            <?php endforeach ?>
                        </tbody>
            </table>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-2">
                 <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalIngreso">
                    Agregar ingreso
                </button>
            </div>

            <div class="col-2">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalg">
                    Agregar gasto
                </button>
            </div>

            <div class="col-2">
                <form action="<?php echo RUTA_URL ?>/balances/exportCSV" method="post">
                    <button type="submit" class="btn btn-success">Exportar a CSV</button>
                </form>
            </div>
            <br>
        </div>
    </div>

    <div class="modal fade" id="modalIngreso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Añadir ingreso</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close" ></button>
                </div>
                <div class="modal-body">
                
                    <form method="post" action="<?php echo RUTA_URL ?>/balances/agregarIngreso" id="formNuevoIngreso">
                        <div class="mt-3 mb-3">
                            <label for="concepto">concepto: <sup>*</sup></label>
                            <input type="text" name="concepto" id="concepto" class="form-control form-control-lg">
                        </div>
                        <div class="mb-3">
                            <label for="fecha">fecha: <sup>*</sup></label>
                            <input type="date" name="fecha" id="fecha" class="form-control form-control-lg">
                        </div>
                        <div class="mb-3">
                            <label for="banco">banco: <sup>*</sup></label>
                            <input type="text" name="banco" id="banco" class="form-control form-control-lg" >
                        </div>
                        <div class="mb-3">
                            <label for="cantidad">cantidad: <sup>*</sup></label>
                            <input type="text" name="cantidad" id="cantidad" class="form-control form-control-lg" >
                        </div>
                        <div class="mb-3">
                            <label for="tipo">Tipo: <sup>*</sup></label>
                            <select name="tipo" id="tipo">
                                <option value="0">Seleccione</option>
                                    <?php foreach ($datos["tipo"] as $tipos): ?>
                                            <option value="<?php echo $tipos->idtipo; ?>"> <?php echo $tipos->nombre; ?></option>
                                    <?php endforeach; ?>
                            </select>
                        </div>

                        <input type="submit" class="btn btn-success" value="Añadir ingreso" onclick="return confirm('¿Seguro que quieres agregar este ingreso?');">
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Añadir gasto</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close" ></button>
                </div>
                <div class="modal-body">
                
                    <form method="post" action="<?php echo RUTA_URL ?>/balances/agregarGasto" id="formNuevoGasto">
                        <div class="mt-3 mb-3">
                            <label for="concepto">concepto: <sup>*</sup></label>
                            <input type="text" name="concepto" id="concepto" class="form-control form-control-lg">
                        </div>
                        <div class="mb-3">
                            <label for="fecha">fecha: <sup>*</sup></label>
                            <input type="date" name="fecha" id="fecha" class="form-control form-control-lg">
                        </div>
                        <div class="mb-3">
                            <label for="banco">banco: <sup>*</sup></label>
                            <input type="text" name="banco" id="banco" class="form-control form-control-lg" >
                        </div>
                        <div class="mb-3">
                            <label for="cantidad">cantidad: <sup>*</sup></label>
                            <input type="text" name="cantidad" id="cantidad" class="form-control form-control-lg" >
                        </div>
                        <div class="mb-3">
                            <label for="tipo">Tipo: <sup>*</sup></label>
                            <select name="tipo" id="tipo">
                                <option value="0">Seleccione</option>
                                    <?php foreach ($datos["tipo"] as $tipos): ?>
                                            <option value="<?php echo $tipos->idtipo; ?>"> <?php echo $tipos->nombre; ?></option>
                                    <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="cuenta_destino">Cuenta destino: <sup>*</sup></label>
                            <input type="text" name="cuenta_destino" id="cuenta_destino" class="form-control form-control-lg" >
                        </div>

                        <input type="submit" class="btn btn-success" value="Añadir gasto" onclick="return confirm('¿Seguro que quieres agregar este gasto?');">
                    </form>

                </div>
            </div>
        </div>
    </div>

        
</main>

<script>

function entreFechas(){

    var ini = new Date(document.getElementById("fecha_min").value)

    if (ini == null) {
        ini = new Date("2000/01/01")
    }

    
    var fin = new Date(document.getElementById("fecha_max").value)
    var ingresos = <?php echo json_encode($datos['ingreso']); ?>;
    var gastos = <?php echo json_encode($datos['gasto']); ?>;

    var balanceTotal = 0

    // console.log(gastos)

    // console.log(ini)
    
    // var prueba = new Date("11/06/2022")
    // if (ini<prueba) {
    //     console.log("si")
    // }else{
    //     console.log("no")
    // }

    document.getElementById("tablebody").innerHTML = "";
    document.getElementById("balanceTotal").innerHTML = "";

    for (let i = 0; i < ingresos.length; i++) {
        fecha = ingresos[i].fecha
        date = new Date(fecha)
        console.log(date)
        console.log(ini)
        if (ini<=date && date<=fin) {

            balanceTotal += ingresos[i].cantidad

            var nUsu = ingresos[i].idingresos ;      
                    console.log(nUsu);
                    console.log(ingresos[i].concepto);

                    var tr = document.createElement("tr")
                    var td = document.createElement("td")

                    

                    var contenido = document.createTextNode(ingresos[i].concepto)
                    td.appendChild(contenido)
                    tr.appendChild(td)

                    var td1 = document.createElement("td")
                    var contenido1 = document.createTextNode(ingresos[i].fecha)
                    td1.appendChild(contenido1)
                    tr.appendChild(td1)

                    var td3 = document.createElement("td")
                    var contenido3 = document.createTextNode('+' + ingresos[i].cantidad + '€')
                    td3.appendChild(contenido3)
                    tr.appendChild(td3)
                    
                    var td10 = document.createElement("td")
                    var contenido10 = document.createTextNode(ingresos[i].tipo)
                    td10.appendChild(contenido10)
                    tr.appendChild(td10)

                    var td4 = document.createElement("td")
                    var contenido4 = document.createTextNode(ingresos[i].banco)
                    td4.appendChild(contenido4)
                    tr.appendChild(td4)

                    var td6 = document.createElement("td")

                    var tc = "text-center"
                    td6.setAttribute("class", tc)
            
            var a3 = document.createElement("button")
                    var iconb = document.createElement("i") 
                    var iclaseb = "bi bi-trash-fill"
                    iconb.setAttribute("class", iclaseb)
                    var contenido6 = document.createTextNode(iconb)
                    a3.appendChild(iconb)
                    var btn3 = "btn btn-danger ms-3"
                    a3.setAttribute("class", btn3)
                    a3.setAttribute("data-bs-target", "#modalborrar_"+ingresos[i].idingresos)
                    a3.setAttribute("data-bs-toggle", "modal")
                    td6.appendChild(a3)
                    tr.appendChild(td6)

                    document.getElementById("tablebody").appendChild(tr);

        }
    }

    document.getElementById("tablebody1").innerHTML = "";

    for (let i = 0; i < gastos.length; i++) {
        
        fecha = gastos[i].fecha
        date = new Date(fecha)
        console.log(date)
        console.log(ini)
        if (ini<=date && date<=fin) {

            balanceTotal -= gastos[i].cantidad


            var nUsu = gastos[i].idgastos ;      
                    console.log(nUsu);
                    console.log(gastos[i].concepto);

                    var tr = document.createElement("tr")
                    var td = document.createElement("td")

                    

                    var contenido = document.createTextNode(gastos[i].concepto)
                    td.appendChild(contenido)
                    tr.appendChild(td)

                    var td1 = document.createElement("td")
                    var contenido1 = document.createTextNode(gastos[i].fecha)
                    td1.appendChild(contenido1)
                    tr.appendChild(td1)

                    var td3 = document.createElement("td")
                    var contenido3 = document.createTextNode('-' + gastos[i].cantidad + '€')
                    td3.appendChild(contenido3)
                    tr.appendChild(td3)

                    var td10 = document.createElement("td")
                    var contenido10 = document.createTextNode(gastos[i].tipo)
                    td10.appendChild(contenido10)
                    tr.appendChild(td10)

                    var td4 = document.createElement("td")
                    var contenido4 = document.createTextNode(gastos[i].banco)
                    td4.appendChild(contenido4)
                    tr.appendChild(td4)


                    var td5 = document.createElement("td")
                    var contenido5 = document.createTextNode(gastos[i].cuenta_destino)
                    td5 .appendChild(contenido5)
                    tr.appendChild(td5)

                    var td6 = document.createElement("td")

                    var tc = "text-center"
                    td6.setAttribute("class", tc)
            
            var a3 = document.createElement("button")
                    var iconb = document.createElement("i") 
                    var iclaseb = "bi bi-trash-fill"
                    iconb.setAttribute("class", iclaseb)
                    var contenido6 = document.createTextNode(iconb)
                    a3.appendChild(iconb)
                    var btn3 = "btn btn-danger ms-3"
                    a3.setAttribute("class", btn3)
                    a3.setAttribute("data-bs-target", "#modalborrar_"+ingresos[i].idingresos)
                    a3.setAttribute("data-bs-toggle", "modal")
                    td6.appendChild(a3)
                    tr.appendChild(td6)

                    document.getElementById("tablebody1").appendChild(tr);

        }

    }


    document.getElementById("balanceTotal").innerHTML = balanceTotal;


}

function filtrarTipo(){
    
    var tipo = document.getElementById("tipos").value
    var ini = new Date(document.getElementById("fecha_min").value)
    var fin = new Date(document.getElementById("fecha_max").value)
    var ingresos = <?php echo json_encode($datos['ingreso']); ?>;
    var gastos = <?php echo json_encode($datos['gasto']); ?>;
 
    if (ini == null) {
         ini = new Date("2000/01/01");
    }

    var balanceTotal = 0


    // console.log(tipo)

    document.getElementById("tablebody").innerHTML = "";
    document.getElementById("balanceTotal").innerHTML = "";

    for (let i = 0; i < ingresos.length; i++) {
        fecha = ingresos[i].fecha
        date = new Date(fecha)
        console.log(date)
        console.log(ini)
        if (ini<=date && date<=fin && tipo==ingresos[i].tipo) {

            balanceTotal += ingresos[i].cantidad

            var nUsu = ingresos[i].idingresos ;      
                    console.log(nUsu);
                    console.log(ingresos[i].concepto);

                    var tr = document.createElement("tr")
                    var td = document.createElement("td")

                    

                    var contenido = document.createTextNode(ingresos[i].concepto)
                    td.appendChild(contenido)
                    tr.appendChild(td)

                    var td1 = document.createElement("td")
                    var contenido1 = document.createTextNode(ingresos[i].fecha)
                    td1.appendChild(contenido1)
                    tr.appendChild(td1)

                    var td3 = document.createElement("td")
                    var contenido3 = document.createTextNode('+' + ingresos[i].cantidad + '€')
                    td3.appendChild(contenido3)
                    tr.appendChild(td3)

                    var td10 = document.createElement("td")
                    var contenido10 = document.createTextNode(ingresos[i].tipo)
                    td10.appendChild(contenido10)
                    tr.appendChild(td10)

                    var td4 = document.createElement("td")
                    var contenido4 = document.createTextNode(ingresos[i].banco)
                    td4.appendChild(contenido4)
                    tr.appendChild(td4)

                    var td6 = document.createElement("td")

                    var tc = "text-center"
                    td6.setAttribute("class", tc)
            
            var a3 = document.createElement("button")
                    var iconb = document.createElement("i") 
                    var iclaseb = "bi bi-trash-fill"
                    iconb.setAttribute("class", iclaseb)
                    var contenido6 = document.createTextNode(iconb)
                    a3.appendChild(iconb)
                    var btn3 = "btn btn-danger ms-3"
                    a3.setAttribute("class", btn3)
                    a3.setAttribute("data-bs-target", "#modalborrar_"+ingresos[i].idingresos)
                    a3.setAttribute("data-bs-toggle", "modal")
                    td6.appendChild(a3)
                    tr.appendChild(td6)

                    document.getElementById("tablebody").appendChild(tr);

        }
    }

    document.getElementById("tablebody1").innerHTML = "";

    for (let i = 0; i < gastos.length; i++) {
        
        fecha = gastos[i].fecha
        date = new Date(fecha)
        console.log(date)
        // console.log(ini)
        if (ini<=date && date<=fin && tipo==gastos[i].tipo) {

            balanceTotal -= gastos[i].cantidad


            var nUsu = gastos[i].idgastos ;      
                    console.log(nUsu);
                    console.log(gastos[i].concepto);

                    var tr = document.createElement("tr")
                    var td = document.createElement("td")

                    

                    var contenido = document.createTextNode(gastos[i].concepto)
                    td.appendChild(contenido)
                    tr.appendChild(td)

                    var td1 = document.createElement("td")
                    var contenido1 = document.createTextNode(gastos[i].fecha)
                    td1.appendChild(contenido1)
                    tr.appendChild(td1)

                    var td3 = document.createElement("td")
                    var contenido3 = document.createTextNode('-' + gastos[i].cantidad + '€')
                    td3.appendChild(contenido3)
                    tr.appendChild(td3)

                    var td10 = document.createElement("td")
                    var contenido10 = document.createTextNode(ingresos[i].tipo)
                    td10.appendChild(contenido10)
                    tr.appendChild(td10)

                    var td4 = document.createElement("td")
                    var contenido4 = document.createTextNode(gastos[i].banco)
                    td4.appendChild(contenido4)
                    tr.appendChild(td4)


                    var td5 = document.createElement("td")
                    var contenido5 = document.createTextNode(gastos[i].cuenta_destino)
                    td5 .appendChild(contenido5)
                    tr.appendChild(td5)

                    var td6 = document.createElement("td")

                    var tc = "text-center"
                    td6.setAttribute("class", tc)
            
            var a3 = document.createElement("button")
                    var iconb = document.createElement("i") 
                    var iclaseb = "bi bi-trash-fill"
                    iconb.setAttribute("class", iclaseb)
                    var contenido6 = document.createTextNode(iconb)
                    a3.appendChild(iconb)
                    var btn3 = "btn btn-danger ms-3"
                    a3.setAttribute("class", btn3)
                    a3.setAttribute("data-bs-target", "#modalborrar_"+ingresos[i].idingresos)
                    a3.setAttribute("data-bs-toggle", "modal")
                    td6.appendChild(a3)
                    tr.appendChild(td6)

                    document.getElementById("tablebody1").appendChild(tr);

        }

    }


    document.getElementById("balanceTotal").innerHTML = balanceTotal;


}

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="<?php echo RUTA_URL?>/public/js/main.js"></script>