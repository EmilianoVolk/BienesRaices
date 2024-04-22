<?php 

namespace Controllers;
use Model\Bloggers;
use Model\Bloggs;
use MVC\Router;

class BloggersController {
    public static function crear(Router $router) {
        $errores = Bloggers::getErrores();
        $bloggers = new Bloggers();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bloggers = new Bloggers($_POST['bloggers']);
            $errores = $bloggers->validar();

            if (empty($errores)) {
                $bloggers->guardar();
            }
        }

        $router->render('bloggers/crear',[
            'errores' => $errores,
            'bloggers' => $bloggers
        ]);
    }
    public static function actualizar(Router $router) {
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        $blogger = Bloggers::find($id);
        $errores = Bloggers::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args = $_POST['bloggers'];
            $blogger->sincronizar($args);
            // debuguear($blogger);

            $errores = $blogger->validar();
            if (empty($errores)) {
                $blogger->guardar();
            }

        }

        $router->render('bloggers/actualizar',[
            'blogger' => $blogger
        ]);
    }
    public static function eliminar(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $tipo = $_POST['tipo'];
            
            // debuguear($tipo);
            if ($id) {
                if (validarTipoContenido($tipo)) {
                    $blogger = Bloggers::find($id);
                    $blogger->eliminar();
                } 
            }
        }
    }
}