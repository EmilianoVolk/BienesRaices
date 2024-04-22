<?php

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController {
    public static function login(Router $router){
        $errores = [];
        $auth = new Admin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Admin($_POST);


            $errores = $auth->validar();

            if (empty($errores)) {
                $resultado = $auth->existeUsuario();
                if(!$resultado){
                    //Verificar si el usuario existe 
                    $errores = Admin::getErrores();
                } else{
                    //Verificar el password 
                    $autenticado = $auth->comprobarPassword($resultado);
                    if ($autenticado) {
                        //Autenticar al usuario
                        $auth->autenticar();
                        
                    } else {
                        $errores = Admin::getErrores();
                    }
                }

            }
        }

        $router->render('auth/login', [
            'errores' => $errores,
            'auth' => $auth
        ]);
    
    }
    public static function logout(){
        session_start();
        $_SESSION = [];

        header('Location: /');
    }
}