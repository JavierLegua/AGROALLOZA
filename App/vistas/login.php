<!DOCTYPE html>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>AgroAlloza</title>
    <script src="<?php echo RUTA_URL?>/public/js/main.js"></script>
    <link rel="stylesheet" href="<?php echo RUTA_URL?>/public/css/estilos.css">
</head>

<body>
<main class="flex-shrink-0 margenTop">

  <div class="container">
    <div class="row d-flex vh-100 justify-content-center align-items-center">
      <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">

        <div class="card text-white justify-content-center align-items-center shadow mb-5 bg-body rounded padtop">
        
            <img src="<?php echo RUTA_URL?>/public/img/logo_agroalloza.png" alt="" class="avatar padbotom">
        
          <div class="card-body text-center padtop">

            <div class="mb-md-5 mt-md-5">
              <form method="post">

                <div class="form-outline form-white mb-4">
                  <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Usuario (email)"  required onblur="validarEmail(this.value)" />
                </div>
                
                <div class="form-outline form-white mb-4">
                  <input type="password" name="clave" id="clave" class="form-control form-control-lg" placeholder="Contraseña" autocomplete="off" required/>
                </div>

                <input type="submit" class="color mt-3 btn btn-lg px-5 btn-primary btn-primary:hover" value="Login"> <br>
              </form>  
            </div>

            <!-- ------------------------------Comienzo modal recuperar contraseña--------------------- -->

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-light btn-lg px-5  btn-primary btn-primary:hover btn-primary:active btn-primary:visited " data-bs-toggle="modal" data-bs-target="#recuperar">
              Recuperar contraseña
            </button>

            <!-- Modal -->
            <div class="modal fade" id="recuperar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog mb-1">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Correo de recuperación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body text-dark">
                    <form id="emailRecuperacion" method="post" class="card-body">
                      <div class="mb-3">
                          <label for="email">Email de recuperación: <sup>*</sup></label>
                          <input type="text" name="emailRec" id="emailRec" class="form-control form-control-lg" autocomplete="off" value="">
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="recuperarPass()">Enviar correo</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- -----------------------------Fin modal recuperar contreseña------------------------------ -->

              
        </div>
        
      </div>

    <p class="text-center">¿No estás registrado?</p>

    <div class="text-center">
      <button type="button" class="btn  btn-lg px-5  btn-primary text-center " data-bs-toggle="modal" data-bs-target="#exampleModal1">Registrate</button>
    </div>

    <p class="text-center">Aplicación desarrollada por <a class="color1" href="https://www.instagram.com/javierlegua14/" target="_blank">Javier Legua</a> en <a class="color1" href="https://www.google.com/maps/place/44509+Alloza,+Teruel/@40.9687655,-0.5369158,15z/data=!3m1!4b1!4m5!3m4!1s0xd5f21f77560b977:0xe29dd448d56b6205!8m2!3d40.9677348!4d-0.529961" target="_blank">Alloza, Teruel</a></p>

      
    </div>

    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $accion = 'Agregar'?> Usuario</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close" ></button>
                </div>
                <div class="modal-body">
                
                    <form method="post" action="<?php echo RUTA_URL ?>/Inicio/agregar" id="formNuevoUsuario">
                      <div class="d-flex justify-content-around">
                        <div class="me-2">
                          <div class="mb-3">
                                <input type="text" name="nombre" id="nombre" class="form-control form-control-lg" placeholder="Nombre">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="dni" id="dni" class="form-control form-control-lg" maxlength="9" autocomplete="off" onblur="comprobarDni(this.value)" placeholder="DNI">
                            </div>
                            <div class="mb-3">
                                <input type="date" name="fecha_nac" id="fecha_nac" class="form-control form-control-lg" placeholder="yyyy-mm-dd">
                            </div>
                            <div class="mb-3">
                                <input type="email" name="email" id="email" class="form-control form-control-lg" autocomplete="off" onblur="validarEmail(this.value)" placeholder="Email">
                            </div>
                          </div>
                          <div>
                            <div class="mb-3">
                                <input type="text" name="direccion" id="direccion" class="form-control form-control-lg" placeholder="Dirección">
                            </div>

                            <div class="mb-3">
                                <input type="password" name="clave" id="clave" class="form-control form-control-lg" autocomplete="off" placeholder="Clave">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="cp" id="cp" class="form-control form-control-lg" placeholder="Código postal">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="telefono" id="telefono" class="form-control form-control-lg" placeholder="Teléfono">
                            </div>
                          </div>
                        </div>
                        <input type="submit" class="btn btn-success" value="<?php echo $accion ?> Usuario" onclick="return confirm('¿Seguro que quieres <?php echo $accion ?> este usuario?');">
                    </form>

                </div>
            </div>
        </div>
        </div>

  </div>
</main>

<script>

  async function recuperarPass(){
        const data = new FormData(document.getElementById('emailRecuperacion'));
              // alert("aaaaaa")
              // console.log(data)
         await fetch('<?php echo RUTA_URL?>/inicio/recuperarPass', {
             method: "POST",
             body: data,
            //  alert("dddddd")
         })
             .then((resp) => resp.json())
             .then(function(data) {
              
              console.log(data)

                 if (Boolean(data)){
                   alert('Revisa tu correo')
                 } else {
                     alert('Error al Cerrar la sesión')
                 }
                
             })
  }


</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="<?php echo RUTA_URL?>/public/js/main.js"></script>
</body>
</html>





 