<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedorController;
use Controllers\PaginasController;
use Controllers\BloggersController;
use Controllers\BloggsController;

$router = new Router();
$controllers = new PropiedadController();


//Zona privada
$router->get('/admin', [PropiedadController::class, 'index']);
$router->get('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->post('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->get('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/eliminar', [PropiedadController::class, 'eliminar']);

$router->get('/vendedores/crear', [VendedorController::class, 'crear']);
$router->post('/vendedores/crear', [VendedorController::class, 'crear']);
$router->get('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/eliminar', [VendedorController::class, 'eliminar']);

$router->get('/admin/bloggs', [BloggsController::class, 'admin']);
$router->get('/bloggs/crear', [BloggsController::class, 'crear']);
$router->post('/bloggs/crear', [BloggsController::class, 'crear']);
$router->get('/bloggs/actualizar', [BloggsController::class, 'actualizar']);
$router->post('/bloggs/actualizar', [BloggsController::class, 'actualizar']);
$router->post('/bloggs/eliminar', [BloggsController::class, 'eliminar']);

$router->get('/bloggers/crear', [BloggersController::class, 'crear']);
$router->post('/bloggers/crear', [BloggersController::class, 'crear']);
$router->get('/bloggers/actualizar', [BloggersController::class, 'actualizar']);
$router->post('/bloggers/actualizar', [BloggersController::class, 'actualizar']);
$router->post('/bloggers/eliminar', [BloggersController::class, 'eliminar']);

//Zona publica
$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/propiedades', [PaginasController::class, 'propiedades']);
$router->get('/propiedad', [PaginasController::class, 'propiedad']);
$router->get('/blog', [PaginasController::class, 'blog']);
$router->get('/entrada', [PaginasController::class, 'entrada']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);

//Login y Autenticacion
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

$router->comprobarRutas();