<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css" integrity="sha384-7ynz3n3tAGNUYFZD3cWe5PDcE36xj85vyFkawcF6tIwxvIecqKvfwLiaFdizhPpN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo RUTA_URL?>/public/css/estilos.css">
    <!-- <link rel="stylesheet" href="css/estilos.css"> -->
    <title><?php echo "Página de inicio"?></title>
</head>
<body class="d-flex flex-column h-100">
<header>
<?php if($datos['usuarioSesion']->rol_idrol == 1): ?>
    <nav class="navbar navbar-expand-md fixed-top orden justufy-content-between">
<?php endif ?>
<?php if($datos['usuarioSesion']->rol_idrol == 2): ?>
    <nav class="admin navbar navbar-expand-md fixed-top orden justufy-content-between">
<?php endif ?>
<?php if($datos['usuarioSesion']->rol_idrol == 3): ?>
    <nav class="peon navbar navbar-expand-md fixed-top orden justufy-content-between">
<?php endif ?>


        <a class="navbar-brand" href="<?php echo RUTA_URL?>/"><img class="menu" src="<?php echo RUTA_URL?>/public/img/agroalloza_sinfondo.png" width="100" height="100"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">

            <ul class="navbar-nav navbar-center">

<?php if (tienePrivilegios($datos['usuarioSesion']->rol_idrol,[1])):?>
                    <li class="nav-item">
                        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
                            <a class="nav-link color1" aria-current="page" href="<?php echo RUTA_URL ?>/usuarios">Usuarios</a>
                        <?php else: ?>
                            <a class="nav-link" aria-current="page" href="<?php echo RUTA_URL ?>/usuarios">Usuarios</a>
                        <?php endif ?>
                    </li>

                    <li class="nav-item">
                        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
                            <a class="nav-link color1" aria-current="page" href="<?php echo RUTA_URL ?>/balances">Balance</a>
                        <?php else: ?>
                            <a class="nav-link" aria-current="page" href="<?php echo RUTA_URL ?>/balances">Balance</a>
                        <?php endif ?>
                    </li>

                    <li class="nav-item">
                        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
                            <a class="nav-link color1" aria-current="page" href="<?php echo RUTA_URL ?>/encargado">Encargado</a>
                        <?php else: ?>
                            <a class="nav-link" aria-current="page" href="<?php echo RUTA_URL ?>/encargado">Encargado</a>
                        <?php endif ?>
                    </li>

            
<?php endif ?>

<?php if (tienePrivilegios($datos['usuarioSesion']->rol_idrol,[2])):?>
                    <li class="nav-item">
                        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
                            <a class="nav-link color1" aria-current="page" href="<?php echo RUTA_URL ?>/maquinas">Máquinas</a>
                        <?php else: ?>
                            <a class="nav-link" aria-current="page" href="<?php echo RUTA_URL ?>/maquinas">Máquinas</a>
                        <?php endif ?>
                    </li>

                    <li class="nav-item">
                        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
                            <a class="nav-link color1" aria-current="page" href="<?php echo RUTA_URL?>/aperos">Aperos</a>
                        <?php else: ?>
                            <a class="nav-link" aria-current="page" href="<?php echo RUTA_URL ?>/aperos">Aperos</a>
                        <?php endif ?>
                    </li>

                    <li class="nav-item">
                        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
                            <a class="nav-link color1" aria-current="page" href="<?php echo RUTA_URL?>/campos">Campos</a>
                        <?php else: ?>
                            <a class="nav-link" aria-current="page" href="<?php echo RUTA_URL ?>/campos">Campos</a>
                        <?php endif ?>
                    </li>

                    <li class="nav-item">
                        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
                            <a class="nav-link color1" aria-current="page" href="<?php echo RUTA_URL ?>/tareas">Tareas</a>
                        <?php else: ?>
                            <a class="nav-link" aria-current="page" href="<?php echo RUTA_URL ?>/tareas">Tareas</a>
                        <?php endif ?>
                    </li>

                    <li class="nav-item">
                        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
                            <a class="nav-link color1" aria-current="page" href="<?php echo RUTA_URL?>/colaboradores">Colaboradores</a>
                        <?php else: ?>
                            <a class="nav-link" aria-current="page" href="<?php echo RUTA_URL ?>/colaboradores">Colaboradores</a>
                        <?php endif ?>
                    </li>

                    <li class="nav-item">
                        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
                            <a class="nav-link color1" aria-current="page" href="<?php echo RUTA_URL ?>/campanas">Campañas</a>
                        <?php else: ?>
                            <a class="nav-link" aria-current="page" href="<?php echo RUTA_URL ?>/campanas">Campañas</a>
                        <?php endif ?>
                    </li>

                    <li class="nav-item">
                        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
                            <a class="nav-link color1" aria-current="page" href="<?php echo RUTA_URL ?>/cosechas">Cosechas</a>
                        <?php else: ?>
                            <a class="nav-link" aria-current="page" href="<?php echo RUTA_URL ?>/cosechas">Cosechas</a>
                        <?php endif ?>
                    </li>

                    <li class="nav-item">
                        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
                            <a class="nav-link color1" aria-current="page" href="<?php echo RUTA_URL ?>/mensajeria">Mensajeria</a>
                        <?php else: ?>
                            <a class="nav-link" aria-current="page" href="<?php echo RUTA_URL ?>/mensajeria">Mensajeria</a>
                        <?php endif ?>
                    </li>


<?php endif ?>

<?php if (tienePrivilegios($datos['usuarioSesion']->rol_idrol,[3])):?>

                    <li class="nav-item">
                        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
                            <a class="nav-link color1" aria-current="page" href="<?php echo RUTA_URL ?>/perfiles">Perfil</a>
                        <?php else: ?>
                            <a class="nav-link" aria-current="page" href="<?php echo RUTA_URL ?>/perfiles">Perfil</a>
                        <?php endif ?>
                    </li>

                    <li class="nav-item">
                        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
                            <a class="nav-link color1" aria-current="page" href="<?php echo RUTA_URL ?>/tareas">Tareas</a>
                        <?php else: ?>
                            <a class="nav-link" aria-current="page" href="<?php echo RUTA_URL ?>/tareas">Tareas</a>
                        <?php endif ?>
                    </li>

                    <li class="nav-item">
                        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
                            <a class="nav-link color1" aria-current="page" href="<?php echo RUTA_URL ?>/mensajeria">Mensajeria</a>
                        <?php else: ?>
                            <a class="nav-link" aria-current="page" href="<?php echo RUTA_URL ?>/mensajeria">Mensajeria</a>
                        <?php endif ?>
                    </li>

<?php endif ?>
                </ul>
                
                <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item dropdown final">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $datos['usuarioSesion']->nombre?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo RUTA_URL?>/perfiles">Editar perfil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?php echo RUTA_URL ?>/login/logout">LogOut</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
