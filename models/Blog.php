<?php

namespace Model;

class Blog extends ActiveRecord {

    protected static $tabla = 'blogs';
    protected static $columnasDB = ['id', 'titulo', 'imagen', 'descripcion', 'creado', 'nombreCreador'];

    public ?int $id;
    public string $titulo;
    public string $imagen;
    public string $descripcion;
    public string $creado;
    public string $nombreCreador;

    public function __construct(array $args = []) {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->creado = $args['creado'] ?? date('Y/m/d');
        $this->nombreCreador = $args['nombreCreador'] ?? '';
    }

    public function validar() {

        self::$errores = [];
        
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

        if(!$this->nombreCreador) {
            self::$errores[] = "Debes añadir el nombre del creador";
        }

        return self::$errores;
    }
    
}