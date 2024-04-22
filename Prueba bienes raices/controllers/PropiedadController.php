<?php 

namespace Controllers;

use Model\Propiedad;
use Model\Vendedor;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as image;


class PropiedadController {

    public static function index(Router $router){
    
        $propiedades = Propiedad::all();

        $vendedores = Vendedor::all();
        //Mensaje adicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render('propiedades/admin', [
            'propiedades' => $propiedades, 
            'resultado' => $resultado,
            'vendedores' => $vendedores
        ]);
    }
    public static function eliminar(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tipo = $_POST["tipo"];
            $id = ($_POST["id"]);
            if ($id) {
                if (validarTipoContenido($tipo)) {
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
            }
        }
    }

    public static function crear(Router $router){
        $errores = Propiedad::getErrores();
        $vendedores = Vendedor::all();
        $propiedad = new Propiedad();
        


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            /*CREA UNA NUEVA INSTANCIA */
            $propiedad = new Propiedad($_POST['propiedad']);    

            //Asignar atributos

            /* SUBIDA DE ARCHIVOS */
            //generar nombre unico 
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            
            //Setear la imagen
            //Realiza un resize a la image con intervention
            
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $imagen = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                
                $propiedad->setImage($nombreImagen);
            }
            //Validar
            $errores = $propiedad->validar();
            
            if (empty($errores)) {
                
                //Crear la carpeta de imagenes
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
                
                $ruta = CARPETA_IMAGENES . $nombreImagen;
                $imagen->save($ruta);
                
                
                $propiedad->guardar();
            }
        }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
        

    }

    
    public static function actualizar(Router $router){
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        
        $errores = Propiedad::getErrores();
        $vendedores = Vendedor::all();
        $propiedad = new Propiedad();
        $propiedad = Propiedad::find($id);
        
        if (!$id || !$propiedad->id) {
            redireccion(0);
        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Asignar atributos
            $args = $_POST['propiedad'];
            $propiedad->sincronizar($args);

            //Validacion
            $errores = $propiedad->validar();

            /*SUBIDA DE ARCHIVOS*/
            //generar nombre unico 
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $imagen = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImage($nombreImagen);
            }

            if (empty($errores)) {
                if ($_FILES['propiedad']['tmp_name']['imagen']) {
                    //Almacenar la imagen
                    $imagen->save(CARPETA_IMAGENES . $nombreImagen);
                }

                $propiedad->guardar();
            }
        }
        

        $router->render('propiedades/actualizar', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }
}