<?php

namespace Controllers;

use Model\Vendedor;
use MVC\Router;

class VendedorController {

    public static function crear(Router $router){
        $errores = Vendedor::getErrores();
        $vendedor = new Vendedor;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            /*CREA UNA NUEVA INSTANCIA */
            $vendedor = new Vendedor($_POST['vendedor']);    

            //Validar
            $errores = $vendedor->validar();

            if (empty($errores)) {              
                $vendedor->guardar();
            }
        }

        $router->render('vendedores/crear', [
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router){
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if (!$id) {
            header('Location: /admin');
        }

        $vendedor = Vendedor::find($id);
        $errores = Vendedor::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Asignar atributos
            $args = $_POST['vendedor'];
            $vendedor->sincronizar($args);

            //Validacion
            $errores = $vendedor->validar();

            if (empty($errores)) {
                $vendedor->guardar();
            }
        }

        $router->render('vendedores/actualizar', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function eliminar(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id){
                $tipo = $_POST['tipo'];
                if (validarTipoContenido($tipo)) {
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                }
            }
        }
    }
}