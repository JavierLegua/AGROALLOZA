<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
    <main class="flex-shrink-0">

        <div class="container">

            <h1>Usuario</h1>

            <div class="row justify-content-around justify-content-center align-items-center"> 
    
    <!-- ----------------------- -->

            <div class="col-md-3 col-sm-12 col-md-3 col-sm-12 d-flex justify-content-center">
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
            </div>
                
                
    <!-- ----------------------- -->
                <div class="col-md-3 col-sm-12 col-md-3 col-sm-12 d-flex justify-content-center">
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
                </div>

    <!-- ----------------------- -->

                <div class="col-md-3 col-sm-12 col-md-3 col-sm-12 d-flex justify-content-center">
                <div class="borde border col-md-4 p-0 tarjeta shadow mb-5 bg-white rounded">
                    <div class="card-header d-flex justify-content-center colortarjeta">
                    <a class="imagen" href="<?php echo RUTA_URL?>/mensajes"><i class='bi bi-envelope-fill iconsize'></i></a>
                    </div>
                
                    <div class="card-body d-flex justify-content-around">
                        <p class="card-text">
                            <a class="colorb" href="<?php echo RUTA_URL?>/mensajes"><h4>Mensajería</h4></a>
                        </p>
                    </div>
            
                </div>
                </div>
                
                
   
            </div><!-- fin row -->

        </div> <!-- fin container -->
    </main>

    <?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
