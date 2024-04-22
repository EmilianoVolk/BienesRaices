<?php 

namespace MVC;

use \AllowDynamicProperties;  // Ignorar Dynamic Properties Deprecation
#[AllowDynamicProperties]


class Router {

    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn){
        $this->rutasGET[$url] = $fn;
    }

    public function post($url, $fn){
        $this->rutasPOST[$url] = $fn;
    }
    
    public function comprobarRutas() {

        session_start();

        $auth = $_SESSION['login'] ?? null;

        //Arreglo de rutas protegidas
        $rutas_protegidas = ['/admin','/propiedades/crear', '/propiedades/actualizar', '/propiedades/eliminar', '/propiedades/crear','/vendedores/crear','/vendedores/actualizar', '/propiedades/eliminar', '/admin/bloggs', '/bloggs/crear', '/bloggs/actualizar', '/bloggs/eliminar', '/bloggers/crear', '/bloggers/actualizar', '/bloggers/eliminar'];

        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];   
        
        if ($metodo === 'GET') {
            $fn = $this->rutasGET[$urlActual] ?? null;
        } else { 
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }


        if (in_array($urlActual, $rutas_protegidas) && !$auth) {
            header('Location: /login');
        }

        if($fn){
            call_user_func($fn, $this);
        } else{
            echo 'pagina no encontrada';
        }

        
    }

    //Muestra una vista
    public function render($view, $datos = []){
        foreach($datos as $key => $value){
            $$key = $value;
        }

        ob_start();

        include __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean();

        include __DIR__ . "/views/layout.php";

    }
}
