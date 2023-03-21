<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
    <main class="flex-shrink-0">



        <div class="container">
        
        <!-- <h1>Administrador</h1> -->

            <div class="row justify-content-around justify-content-center align-items-center "> 
    
    <!-- ----------------------- -->

        <div class="col-md-3 col-sm-12 col-md-3 col-sm-12 d-flex justify-content-center">

            <div class="borde border p-0 tarjeta shadow mb-5 bg-white rounded">
                

                    <div class="card-header d-flex justify-content-center colortarjeta">
                    <a class="imagen" href="<?php echo RUTA_URL?>/usuarios"><i class='bi bi-person-fill-gear iconsize'></i></a>
                    </div>
                    <div class="card-body d-flex justify-content-around">
                        <p class="card-text">
                            <a class="colorb" href="<?php echo RUTA_URL?>/usuarios"><h4>Usuarios</h4>
                            <?php if($datos['usuarioNoActivo'] != '0'): ?>
                                <span title="Tienes usuarios por activar" class="badge rounded-pill badge-notification bg-danger position-fixed justify-content-right"><?php print_r($datos['usuarioNoActivo']) ?></span>
                            <?php endif ?>                            
                            </a>
                        </p>
                    </div>
            
            </div>
            </div>
                
                
    <!-- ----------------------- -->
                <div class="col-md-3 col-sm-12 col-md-3 col-sm-12 d-flex justify-content-center">
                <div class="borde border p-0 tarjeta shadow mb-5 bg-white rounded">
                    
                    <div class="card-header d-flex justify-content-center colortarjeta">
                    <a class="imagen" href="<?php echo RUTA_URL?>/balances"><i class="bi bi-piggy-bank iconsize"></i></a>
                    </div>

                    <div class="card-body d-flex justify-content-around">
                        <p class="card-text">
                            <a class="colorb" href="<?php echo RUTA_URL?>/balances"><h4>Balance</h4></a>
                        </p>
                    </div>
                </div>
                </div>

    <!-- ----------------------- -->

                <div class="col-md-3 col-sm-12 col-md-3 col-sm-12 d-flex justify-content-center">
                <div class="borde border  p-0 tarjeta shadow mb-5 bg-white rounded">
                    
                    <div class="card-header d-flex justify-content-center colortarjeta">
                    <a class="imagen" href="<?php echo RUTA_URL?>/encargado"><i class="bi bi-person-vcard iconsize"></i></a>
                    </div>

                    <div class="card-body d-flex justify-content-around">
                        <p class="card-text">
                            <a class="colorb" href="<?php echo RUTA_URL?>/encargado"><h4>Encargado</h4></a>
                        </p>
                    </div>
                </div>
                </div>
                
   
            </div><!-- fin row -->

        </div> <!-- fin container -->
    </main>

    <?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
