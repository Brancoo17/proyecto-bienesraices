<?php

namespace Model;

class Propiedad extends ActiveRecord {

    protected static string $tabla = 'propiedades';
    protected static array $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];

    // Atributos
    public ?int $id;
    public string $titulo;
    public string $precio;
    public string $imagen;
    public string $descripcion;
    public string $habitaciones;
    public string $wc;
    public string $estacionamiento;
    public string $creado;
    public string $vendedorId;

    public function __construct(array $args = []) {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? '';
    }

    public function validar() {

        self::$errores = [];
        
        // Sanitizar espacios en blanco
        $this->titulo = trim($this->titulo);
        $this->descripcion = trim($this->descripcion);

        if(!$this->titulo) {
            self::$errores[] = "Debes añadir un título";
        }

        if(!$this->precio) {
            self::$errores[] = "Debes añadir un precio";
        }

        if(strlen($this->descripcion) < 30) {
            self::$errores[] = "Debes añadir una descripción de al menos 30 caracteres";
        }

        if(!$this->habitaciones) {
            self::$errores[] = "Debes añadir el número de habitaciones";
        }

        if(!$this->wc) {
            self::$errores[] = "Debes añadir el número de baños";
        }

        if(!$this->estacionamiento) {
            self::$errores[] = "Debes añadir el número de estacionamientos";
        }

        if(!$this->vendedorId) {
            self::$errores[] = "Debes añadir un vendedor";
        }

        if(!$this->imagen) {
            self::$errores[] = "La imagen es obligatoria";
        } 

        return self::$errores;
    }

}
