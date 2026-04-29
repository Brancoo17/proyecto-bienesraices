<?php

namespace Model;

class Blog extends ActiveRecord {

    protected static $tabla = 'blogs';
    protected static $columnasDB = ['id', 'titulo', 'imagen', 'descripcion', 'creado', 'vendedorId'];

    public $id;
    public $titulo;
    public $imagen;
    public $descripcion;
    public $creado;
    public $vendedorId;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->creado = $args['creado'] ?? date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? '';
    }

    public function validar() {

        // Sanitizar espacios en blanco
        $this->titulo = trim($this->titulo);
        $this->descripcion = trim($this->descripcion);

        if(!$this->titulo) {
            self::$errores[] = "Debes añadir un título";
        }

        if(!$this->descripcion) {
            self::$errores[] = "Debes añadir una descripción";
        }

        if(strlen($this->descripcion) < 30) {
            self::$errores[] = "Debes añadir una descripción de al menos 30 caracteres";
        }

        if(!$this->imagen) {
            self::$errores[] = "La imagen es obligatoria";
        } 

        return self::$errores;
    }
    
}