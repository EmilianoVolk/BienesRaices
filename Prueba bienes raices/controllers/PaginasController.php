<?php

namespace Controllers;

use Model\Bloggers;
use Model\Bloggs;
use MVC\Router;
use Model\Propiedad;
use Model\Formulario;
use PHPMailer\PHPMailer\PHPMailer;


class PaginasController{
    public static function index(Router $router){
        $propiedades = Propiedad::get(3);
        $router->render('paginas/index', [
            'propiedades' => $propiedades
        ]);
    }
    public static function nosotros(Router $router){
        $router->render('paginas/nosotros');
    }
    public static function propiedades(Router $router){
        $propiedades = Propiedad::all();
        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }
    public static function propiedad(Router $router){
        $id = $_GET['id'];
        $propiedad = Propiedad::find($id);
        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }
    public static function contacto(Router $router){

        $mensaje = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respuestas = $_POST["contacto"];
            if (isset($respuestas['contacto'])) {
                
                $mail = new PHPMailer();
    
                //Configurar SMPT
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host = 'sandbox.smtp.mailtrap.io';
                $mail->SMTPAuth = true;
                $mail->Port = 2525;
                $mail->Username = '65781b112c8c00';
                $mail->Password = '22ccc04345e072';
                $mail->SMTPSecure = 'tls';
    
                //Configurar el contenido del email
                $email = $_POST["contacto"]["email"];
                $mail->setFrom($email);
                $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
                $mail->Subject = 'Tienes un nuevo mensaje';
    
                //Habilitar HTML
                $mail->isHTML(true);
                $mail->CharSet = 'UTF-8';
    
                //Definir el contenido
                $mensaje = '<html>' ;
                $mensaje .= '<p>Tienes mensaje nuevo</p>';
                $mensaje .= '<p>Nombre:'. $respuestas["nombre"] .'</p>';
                if ($respuestas['contacto'] === 'email') {
                    $mensaje .= '<p>El cliente eligio ser contactado por E-mail</p>';
                    $mensaje .= '<p>Email:'. $respuestas["email"] .'</p>';
                }
                if ($respuestas["contacto"] === 'telefono') {
                    $mensaje .= '<p>El cliente eligio ser contactado por Telefono</p>';
                    $mensaje .= '<p>Telefono: ' . $respuestas["telefono"] . '</p>';
                    $mensaje .= '<p>Fecha y hora que le gustaria ser contactado: '. $respuestas["fecha"]. ' a las: '. $respuestas["hora"] .'</p>';
                }
                    $mensaje .= '<p>Mensaje:'. $respuestas["mensaje"] .'</p>';
                    $mensaje .= '<p>Vende o Compra:'. $respuestas["tipo"] .'</p>';
                    $mensaje .= '<p>Precio o Presupuesto:   '. '$' . $respuestas["presupuesto"] .'</p>';
                    $mensaje .= '</html>';
        
                    $mail->Body = $mensaje;
                    $mail->AltBody = $mensaje;
        
                    //Enviar el mail
                    if ($mail->send()) {
                        $mensaje = 1; //1 representa que se envio correctamente
                }
            }
            else {
                    $mensaje = 2; //2 representa que no se pudo enviar
                }
        }

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
    public static function blog(Router $router){
        $bloggs = Bloggs::all();
        $blogger = new Bloggers();
        $router->render('paginas/blog', [
            'bloggs' => $bloggs,
            'blogger' => $blogger
        ]);
    }
    public static function entrada(Router $router){
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        
        $blog = Bloggs::find($id);
        $blogger = new Bloggers();
        
        if (!$id || !$blog->id) {
            redireccion(0);
        }
        
        $router->render('paginas/entrada', [
            'id' => $id,
            'blog' => $blog,
            'blogger' => $blogger
        ]);
    }
}