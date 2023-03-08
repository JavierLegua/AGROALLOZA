<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<section class="main"> <!-- quitar clase main -->
    <div class="container">

        <div class="row d-flex justify-content-around" style="margin-bottom: 50px;">

            <div class="borde border col-lg-3 col-md-3 p-0 tarjeta">
                <div class="card-header d-flex justify-content-center colortarjeta">
                    <i class="bi bi-people-fill iconsize"></i>
                </div>

                <div class="card-body">
                    
                    <p class="card-text">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        <h5 class="card-title text-center">Grupos</h5>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne1" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <a href="#">Crear</a> <br>
                                        <a href="#">Eliminar</a> <br>
                                        <a href="#">Ver</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </p>
                </div>
            </div>

            <div class="borde border col-lg-3 col-md-3 p-0 tarjeta">
                <div class="card-header d-flex justify-content-center colortarjeta">
                    <i class="bi bi-calendar2-plus iconsize"></i>
                </div>
                
                <div class="card-body">
                    
                    <p class="card-text">
                        <div class="accordion accordion-flush" id="accordionFlushExample2">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne2" aria-expanded="false" aria-controls="flush-collapseOne2">
                                        <h5 class="card-title text-center">Eventos</h5>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne2" class="accordion-collapse collapse" aria-labelledby="flush-headingOne2" data-bs-parent="#accordionFlushExample2">
                                    <div class="accordion-body">
                                        <a href="#">Organizar</a> <br>
                                        <a href="#">Gestionar</a> <br>
                                        <a href="#">Consultar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </p>
                </div>

            </div>

            <div class="borde border col-lg-3 col-md-3 p-0 tarjeta">

                <div class="card-header d-flex justify-content-center colortarjeta">
                    <i class="bi bi-envelope iconsize"></i>
                </div>

                <div class="card-body">
                    <p class="card-text">
                        <div class="accordion accordion-flush" id="accordionFlushExample3">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne3" aria-expanded="false" aria-controls="flush-collapseOne3">
                                        <h5 class="card-title text-center">Correo</h5>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne3" class="accordion-collapse collapse" aria-labelledby="flush-headingOne2" data-bs-parent="#accordionFlushExample3">
                                    <div class="accordion-body">
                                    <a href="#">Enviar</a> <br>
                                    <a href="#">Gestionar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </p>
                </div>

            </div>



            <div class="borde border col-lg-3 col-md- p-0 tarjeta">

                <div class="card-header d-flex justify-content-center colortarjeta">
                    <i class="bi bi-journal-text iconsize"></i>
                </div>

                <div class="card-body">
                    <p class="card-text">
                        <div class="accordion accordion-flush" id="accordionFlushExample4">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne4" aria-expanded="false" aria-controls="flush-collapseOne4">
                                        <h5 class="card-title text-center">Inscripciones</h5>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne4" class="accordion-collapse collapse" aria-labelledby="flush-headingOne4" data-bs-parent="#accordionFlushExample4">
                                    <div class="accordion-body">
                                    <a href="#">Grupo</a> <br>
                                    <a href="#">Evento</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </p>
                </div>

            </div>




            <div class="borde border col-lg-3 col-md- p-0 tarjeta">

                <div class="card-header d-flex justify-content-center colortarjeta">
                    <i class="bi bi-currency-euro iconsize"></i>
                </div>

                <div class="card-body">
                    <p class="card-text">
                        <div class="accordion accordion-flush" id="accordionFlushExample5">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne5">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne5" aria-expanded="false" aria-controls="flush-collapseOne5">
                                        <h5 class="card-title text-center">Facturación</h5>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne5" class="accordion-collapse collapse" aria-labelledby="flush-headingOne5" data-bs-parent="#accordionFlushExample5">
                                    <div class="accordion-body">
                                    <a href="#">Consultar</a> <br>
                                    <a href="#">Pagos</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </p>
                </div>

            </div>
        
        
            <div class="borde border col-md-4 p-0 tarjeta">
                <div class="card-header d-flex justify-content-center colortarjeta">
                <i class="bi bi-cart2 iconsize"></i>
                </div>
                <div class="card-body">
                    
                    <p class="card-text">
                        <div class="accordion accordion-flush" id="accordionFlushExample6">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne6">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne6" aria-expanded="false" aria-controls="flush-collapseOne6">
                                        <h5 class="card-title text-center">Tiendas</h5>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne6" class="accordion-collapse collapse" aria-labelledby="flush-headingOne6" data-bs-parent="#accordionFlushExample6">
                                    <div class="accordion-body"><a href="#">Consultar</a></div>
                                </div>
                            </div>
                        </div>
                    </p>
                </div>
            </div>


            <div class="borde border col-md-4 p-0 tarjeta">
                <div class="card-header d-flex justify-content-center colortarjeta">
                    <i class="bi bi-file-earmark-person iconsize"></i>    
                </div>
                <div class="card-body">
                    
                    <p class="card-text">
                        <div class="accordion accordion-flush" id="accordionFlushExample7">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne7">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne7" aria-expanded="false" aria-controls="flush-collapseOne7">
                                        <h5 class="card-title text-center">Licencias</h5>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne7" class="accordion-collapse collapse" aria-labelledby="flush-headingOne7" data-bs-parent="#accordionFlushExample7">
                                    <div class="accordion-body">
                                        <a href="#">Consultar</a> <br>
                                        <a href="#">Dar de alta</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </p>
                </div>
            </div>


            <div class="borde border col-md-4 p-0 tarjeta">
                <div class="card-header d-flex justify-content-center colortarjeta">
                    <i class='bi bi-calendar-date iconsize'></i>
                </div>
                <div class="card-body">
                    
                    <p class="card-text">
                        <div class="accordion accordion-flush" id="accordionFlushExample8">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne8">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne8" aria-expanded="false" aria-controls="flush-collapseOne8">
                                    <h5 class="card-title text-center">Temporadas</h5>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne8" class="accordion-collapse collapse" aria-labelledby="flush-headingOne8" data-bs-parent="#accordionFlushExample8">
                                    <div class="accordion-body">
                                        <a href="#">Consultar</a> <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </p>
                </div>
            </div>

            <div class="borde border col-md-4 p-0 tarjeta">
                <div class="card-header d-flex justify-content-center colortarjeta">
                    <i class='bi bi-person-fill iconsize'></i>
                </div>
        
                <div class="card-body">
                    
                    <p class="card-text">
                        <div class="accordion accordion-flush" id="accordionFlushExample9">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne9">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne9" aria-expanded="false" aria-controls="flush-collapseOne9">
                                    <h5 class="card-title text-center">Usuarios</h5>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne9" class="accordion-collapse collapse" aria-labelledby="flush-headingOne9" data-bs-parent="#accordionFlushExample9">
                                    <div class="accordion-body"><a href="#">Gestionar</a></div>
                                </div>
                            </div>
                        </div>
                    </p>
                </div>
            </div>

            

        </div><!-- fin row -->

    </div> <!-- fin container -->
</section>
<footer class="d-flex align-items-end footer"> <!-- quitar clase footer -->
    <div class="container-fluid position-absolute bottom-0 end-0 color">
        <div class="row">

            <div class="col" style="margin-left: 50px;">
                <a href="#">Inicio</a>
                <a href="#">Eventos</a>
                <a href="#">Facturación</a>
                <a href="#">Licencias</a>
                <a href="#">Tiendas</a>
                <a href="#">Temporadas</a>
            </div>

            <div class="col">
                <i class="bi bi-facebook float-end ms-3" style='font-size:35px; color:#023ef9'></i> 
                <i class="bi bi-instagram float-end ms-3" style="font-size:35px; color:#023ef9"></i>
                <i class="bi bi-youtube float-end ms-3" style="font-size:35px; color:#023ef9"></i>
            </div>

        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>