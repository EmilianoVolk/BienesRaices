<?php

use MVC\Router;

define('TEMPLATES_URL', __DIR__ . '/templates/');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

function incluirTemplate( string $nombre, bool $inicio = false ){
    include TEMPLATES_URL . "$nombre.php";
}

function autenticacion() {
    session_start();

    if ($_SESSION['login']) {
        return true;
    } else {
        header('Location: /admin');
    }
}

function debuguear($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

//Escapar / Sanitizar el HTML
function s($html) : string{
    $s = htmlspecialchars($html);
    return $s;
}

//Validar tipo de contenido
function validarTipoContenido($tipo){
    $tipos = ['vendedor', 'propiedad', 'blog', 'blogger'];

    return in_array($tipo, $tipos);
}

//Muestra los mensajes

function mostrarNotificacion($codigo){
    $mensaje = ''; 

    switch ($codigo) {
        case 1:
            $mensaje = 'Creado Correctamente';
            break;
        case 2:
            $mensaje = 'Actualizado Correctamente';
            break;
        case 3:
            $mensaje = 'Borrado Correctamente';
            break;
        
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}

//Llevar a pagina index dependiendo de en cual pagina este 

function redireccion($codigo = 0)
{
    $pathInfo = $_SERVER['PATH_INFO'];
    $carpeta = 'C:\apache\htdocs\MVC\views\paginas';
    $archivosCarpeta = scandir($carpeta);

    foreach ($archivosCarpeta as $pagina => $value) {
        // Obtén la información del camino del archivo
        $infoArchivo = pathinfo($value);

        // Obtiene el nombre del archivo sin la extensión
        $nombreArchivo = $infoArchivo['filename'];

        if (in_array($nombreArchivo, $archivosCarpeta)) {
            header('Location: /');
            exit;
        }else{
            if (strpos($pathInfo, '/propiedades/') === 0 || strpos($pathInfo, '/propiedades/') === 0) {
                // Redirige a la página de administración específica para propiedades/actualizar
                header('Location: /admin?resultado=' . $codigo);
                exit;  // Termina la ejecución después de redirigir
            }
            elseif (strpos($pathInfo, '/bloggers/') === 0 || strpos($pathInfo, '/bloggs/') === 0) {
                // Redirige a la página de bloggs
                header('Location: /admin/bloggs?resultado=' . $codigo);
                exit;
            } else {
                header('Location: /');
            }
        }

    }
}