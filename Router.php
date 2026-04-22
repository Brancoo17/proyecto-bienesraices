<?php

namespace MVC;

class Router {

    public array $rutasGet = [];
    public array $rutasPost = [];

    public function get($url, $fn) {
        $this->rutasGet[$url] = $fn;
    }

    public function post($url, $fn) {
        $this->rutasPost[$url] = $fn;
    }

    public function comprobarRutas() {
       $urlActual = $_SERVER['PATH_INFO'] ?? '/';
       $metodo = $_SERVER['REQUEST_METHOD'];

       if ($metodo === 'GET') {
            $fn = $this->rutasGet[$urlActual] ?? null;
       }

       if ($metodo === 'POST') {
            $fn = $this->rutasPost[$urlActual] ?? null;
       }

       if ($fn) {
            // La URl existe y hay una función asociada        
            call_user_func($fn, $this);
       } else {
            echo "Página no encontrada";
       }
    }

    // Muestra una vista 
    public function render($view, $datos = []) {

        ob_start(); // Almacenamiento en memoria durante un momento...

        // Convertir los datos en variables
        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        include __DIR__ . "/views/{$view}.php";

        $contenido = ob_get_clean(); // Lo guardamos en una variable y limpiamos el buffer

        include __DIR__ . "/views/layout.php"; // Finalmente lo incluimos en el layout
    }
    
}