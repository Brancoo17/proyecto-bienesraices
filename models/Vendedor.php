<?php

namespace Model;

class Vendedor extends ActiveRecord {
    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];

    // Atributos
    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = trim($args['nombre'] ?? '');
        $this->apellido = trim($args['apellido'] ?? '');
        $this->telefono = trim($args['telefono'] ?? '');
    }

    public function validar() {
        // Sanitizar espacios en blanco
        $this->nombre = trim($this->nombre);
        $this->apellido = trim($this->apellido);
        $this->telefono = trim($this->telefono);

        if(!$this->nombre) {
            self::$errores[] = "El nombre es obligatorio";
        } elseif(!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s]+$/', $this->nombre)) {
            self::$errores[] = "El nombre solo debe contener letras";
        }

        if(!$this->apellido) {
            self::$errores[] = "El apellido es obligatorio";
        } elseif(!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s]+$/', $this->apellido)) {
            self::$errores[] = "El apellido solo debe contener letras";
        }

        if(!$this->telefono) {
            self::$errores[] = "El teléfono es obligatorio";
        } elseif(!preg_match('/^[0-9]{10}$/', $this->telefono)) {
            self::$errores[] = "Formato no válido";
        }

        return self::$errores;
    }
}