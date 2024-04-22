<?php

namespace Model;

use Model\ActiveRecord;

class Bloggers extends ActiveRecord {
    protected static $tabla = 'bloggers';
    protected static $columasDB = ['id', 'nombre', 'apellido', 'correo'];

    public $id;
    public $nombre;
    public $apellido;
    public $correo;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->correo = $args['correo'] ?? '';
    }

    public function validar(){
        if (!$this->nombre) {
            self::$errores[] = "El nombre es obligatorio";
        }
        if (!$this->apellido) {
            self::$errores[] = "El apellido es obligatorio";
        }
        if (!$this->correo) {
            self::$errores[] = "Es necesario un correo Electronico";
        }
        return self::$errores;
    }
}
