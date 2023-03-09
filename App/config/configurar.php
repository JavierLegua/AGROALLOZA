<?php

    // Ruta de la aplicacion
    define('RUTA_APP', dirname(dirname(__FILE__)));

    // Ruta url, Ejemplo: http://localhost/daw2_mvc

    //Ruta url de localhost
    define('RUTA_URL', 'http://localhost/AGROALLOZA');

    define('NOMBRE_SITIO', 'CRUD MVC - DAW2 Alcañiz');


    // Configuracion de la Base de Datos
    define('DB_HOST', 'localhost');
    define('DB_USUARIO', 'root');
    define('DB_PASSWORD', 'toor');
    define('DB_NOMBRE', 'AgroAlloza');

    //Constantes enviar email
    define('EmailEmisor', 'agroalloza@hotmail.com');
    define('EmailPass', 'Agroza1234');
    define('Emisor', 'AgroAlloza');

    //Constante para las imagenes de las licencias
    define('RUTA_ImgDatos', RUTA_URL . '/public/img/datosBBDD/');
?>

