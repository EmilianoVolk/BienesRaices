<?php

namespace Model;

use MVC\Router;
use Model\Propiedad;

use \AllowDynamicProperties;  // Ignorar Dynamic Properties Deprecation
#[AllowDynamicProperties]

class ActiveRecord {
    //Base de datos
    protected static $db; //static porque no requerimos muchas instancias
    protected static $columasDB = [];
    protected static $tabla = '';
    protected static $foto = '';



    //Errores
    protected static $errores = [];

    //Todo public "this->"
    //Todo static "self::"

    

    //Definir la conexion a la DB
    public static function setDB($database)
    {
        self::$db = $database;
    }

    public function guardar()
    {
        if (!is_null($this->id)) {
            //Actualizar
            $this->actualizar();
            // $this->foto = $this->{static::$foto};
        } else {
            $this->crear();
        }
    }

    public function crear()
    {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Insertar en la base de datos
        $query = "INSERT INTO " . static::$tabla . "( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES ('";
        $query .= join("', '", array_values($atributos));
        $query .= "')";

        // debuguear($query);
        $resultado = self::$db->query($query);

        if ($resultado) {
            // Redirige al usuario
            redireccion(1);
        } else {
            debuguear('asd');
        }
    }

    public function actualizar()
    {
        $atributos = $this->sanitizarAtributos();

        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "$key = '$value'";
        }

        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= "LIMIT 1;";


        $resultado = self::$db->query($query);

        if ($resultado) {
            redireccion(2);
        }
    }

    //Eliminar un resgistro

    public function eliminar()
    {
        //Eliminar el registro
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);

        if ($resultado) {
            $this->borrarImagen();
            redireccion(3);
        }
    }


    //Identificar y unior los atributos de la BD
    public function atributos()
    {
        $atributos = [];
        $columnas = static::$columasDB;
        foreach ($columnas as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }

        return $atributos;
    }

    public function sanitizarAtributos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    public function setImage($image)
    {

        // Asignar al atributo de imagen el nombre de la imagen
        if (!is_null($this->id)) {
            $this->borrarImagen();
            
        }
        if ($image) {
                // $this->{static::$foto} = $image;
                // $this->foto = $this->{static::$foto};
                $this->{static::$foto} = $image;
                //debuguear($this);
                // debuguear($this->{static::$foto});
            
        }
        
        
    }
    public function borrarImagen(){
        $this->foto = $this->{static::$foto};
        
        //Comprobar si existe el archivo
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->foto);
        // debuguear(CARPETA_IMAGENES . $this->foto);

        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->foto);
        }
    }

    public static function getErrores()
    {
        return static::$errores;
    }

    //Validacion
    public function validar()
    {
        static::$errores = [];
        return static::$errores;
    }
    //Lista todas las propiedades

    public static function all()
    {
        $query = "SELECT * FROM " . static::$tabla;

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    public static function get($cantidad)
    {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT $cantidad";

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    //Busca una propiedad por su id
    public static function find($id)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = $id";

        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    /*OBJETO SIMILAR A LA DB*/

    public static function consultarSQL($query)
    {
        //Consultar la DB
        $resultado = self::$db->query($query);

        //Iterar los resultados
        $array = [];

        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        //Liberar la memoria 
        $resultado->free();

        //Retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro)
    {
        $objeto = new static;

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    //Sincronizar el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}
