<?php 

namespace Model;
use Model\ActiveRecord;

class Bloggs extends ActiveRecord{
    protected static $tabla = 'bloggs';
    protected static $columasDB = ['id', 'contenido', 'fecha', 'bloggers_id', 'portada', 'titulo'];
    protected static $foto = 'portada';

    public $id;
    public $contenido;
    public $fecha;
    public $bloggers_id;
    public $portada;
    public $titulo;


    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->contenido = $args['contenido'] ?? '';
        $this->fecha = date('Y/m/d');
        $this->bloggers_id = $args['bloggers_id'] ?? '';
        $this->foto = self::$foto ?? ''; 

        // $this->portada = $args['portada'] ?? $this->fotografia;
        //$args['portada'] ?? self::$fotografia;
        $this->titulo = $args['titulo'] ?? '';
    }
    public function validar()
    {
        if (!$this->contenido) {
            self::$errores[] = "El contenido es obligatorio";
        }
        if (!$this->portada) {
            self::$errores[] = "La imagen es necesaria";
        }
        if (!$this->titulo) {
            self::$errores[] = "El titulo es obligatorio";
        }
        if (!$this->bloggers_id) {
            self::$errores[] = "Debes seleccionar un Blogger";
        }
        return self::$errores;
    }

}