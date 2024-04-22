<?php 

namespace Controllers;

use MVC\Router;
use Model\Bloggers;
use Model\Bloggs;
use Intervention\Image\ImageManagerStatic as image;

class BloggsController{
    public static function admin(Router $router) {
        
        $bloggs = new Bloggs();
        $bloggers = new Bloggers();
        $resultado = $_GET['resultado'] ?? null;
        
        $router->render('bloggs/admin',[
            'resultado' => $resultado,
            'bloggers' => $bloggers,
            'bloggs' => $bloggs
        ]);
    }
    public static function crear(Router $router) {

        $errores = Bloggs::getErrores();
        $blog = new Bloggs;
        $bloggers = Bloggers::all();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $blog = new Bloggs($_POST['blog']);
            
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
            
            if ($_FILES['blog']['tmp_name']['portada']) {
                $imagen = Image::make($_FILES['blog']['tmp_name']['portada'])->fit(800, 600);
                $blog->portada = $nombreImagen;
                $blog->setImage($nombreImagen);
            }
            
            $errores = $blog->validar();
            
            if (empty($errores)) {
                
                //Crear la carpeta de imagenes
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
                
                //Guarda la imagen en el servidor
                $ruta = CARPETA_IMAGENES . $nombreImagen;
                
                $imagen->save($ruta);
                $blog->guardar();
                // debuguear($blog);
            }
        }

        $router->render('bloggs/crear',[
            'errores' => $errores,
            'blog' => $blog,
            'bloggers' => $bloggers
        ]);
    }
    public static function actualizar(Router $router) {
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        
        $errores = Bloggs::getErrores();
        $bloggers = Bloggers::all();
        $blog = new Bloggs();
        $blog = Bloggs::find($id);

        
        if (!$id || !$blog->id) {
            redireccion(0);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args = $_POST['blog'];
            $blog->sincronizar($args);

            $errores = $blog->validar();

            /*SUBIDA DE ARCHIVOS*/
            //generar nombre unico 
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
            if ($_FILES['blog']['tmp_name']['portada']) {
                //$blog->portada = $nombreImagen;
                $imagen = Image::make($_FILES['blog']['tmp_name']['portada'])->fit(800, 600);
                $blog->setImage($nombreImagen);
            }
            
            if (empty($errores)) {
                if ($_FILES['blog']['tmp_name']['portada']) {
                    //Almacenar la imagen
                    $imagen->save(CARPETA_IMAGENES . $nombreImagen);
                }

                $blog->guardar();
            }
        }

        $router->render('bloggs/actualizar',[
            'blog' => $blog,
            'bloggers' => $bloggers
        ]);
    }
    public static function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tipo = $_POST["tipo"];
            $id = ($_POST["id"]);
            if($id) {
                if (validarTipoContenido($tipo)) {
                    $blog = Bloggs::find($id);
                    $blog->eliminar();
                }

            }
        }
    }
}