<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
    <main class="flex-shrink-0">
        <div class="container">
            <!-- <div class="row justify-content-around justify-content-center align-items-center mt-5">
                <h3>¡Bienvenido a la sección de administrador de AgroAlloza!</h3>
                <p>En esta sección podrás consultar y generar informes de los gastos e ingresos anuales del trabajo llevado acabo al igual que podras consultar los empleados.
                    <br> Si tiene alguna duda o problema contacte con el desarrollador de la aplicación.
                </p>
            </div>         -->
        </div>
        <div class="container">
            <div class="row justify-content-around justify-content-center align-items-center mt-5"> 
    
    <!-- ----------------------- -->

            <div class="borde border col-md-4 p-0 tarjeta shadow mb-5 bg-white rounded">
                    <div class="card-header d-flex justify-content-center colortarjeta">
                    <a class="imagen" href="<?php echo RUTA_URL?>/perfiles"><i class='bi bi-person-fill-gear iconsize'></i></a>
                    </div>
                
                    <div class="card-body d-flex justify-content-around">
                        <p class="card-text">
                            <a class="colorb" href="<?php echo RUTA_URL?>/perfiles"><h4>Perfil</h4></a>
                        </p>
                    </div>
            
            </div>
                
                
    <!-- ----------------------- -->
                <div class="borde border col-md-4 p-0 tarjeta shadow mb-5 bg-white rounded">
                    
                    <div class="card-header d-flex justify-content-center colortarjeta">
                    <a class="imagen" href="<?php echo RUTA_URL?>/tareas"><i class="bi bi-list-task iconsize"></i></a>
                    </div>

                    <div class="card-body d-flex justify-content-around">
                        <p class="card-text">
                            <a class="colorb" href="<?php echo RUTA_URL?>/tareas"><h4>Tareas</h4></a>
                        </p>
                    </div>
                </div>

    <!-- ----------------------- -->
                
   
            </div><!-- fin row -->

        </div> <!-- fin container -->
    </main>

    <?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
