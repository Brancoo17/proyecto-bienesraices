<?php

namespace MVC;

class Router {

    public array $rutasGet = [];
    public array $rutasPost = [];

    public function get(string $url, callable $fn): void {
        $this->rutasGet[$url] = $fn;
    }

    public function post(string $url, callable $fn): void {
        $this->rutasPost[$url] = $fn;
    }

    public function comprobarRutas(): void {

        session_start();
        $auth = $_SESSION['login'] ?? null;

        // Arreglo de rutas protegidas
        $rutasProtegidas = ['/admin', '/propiedades/crear', '/propiedades/actualizar', '/propiedades/eliminar', '/vendedores/crear', '/vendedores/actualizar', '/vendedores/eliminar'];

        // Identificar rutas
       $urlActual = $_SERVER['PATH_INFO'] ?? '/';
       $metodo = $_SERVER['REQUEST_METHOD'];

       if ($metodo === 'GET') {
            $fn = $this->rutasGet[$urlActual] ?? null;
       }

       if ($metodo === 'POST') {
            $fn = $this->rutasPost[$urlActual] ?? null;
       }

       // Proteger las rutas
       if(in_array($urlActual, $rutasProtegidas) && !$auth) {
            header('Location: /');
            exit;
       }

       if ($fn) {
            // La URl existe y hay una función asociada        
            call_user_func($fn, $this);
       } else {
            echo "Página no encontrada";
       }
    }

    // Muestra una vista 
    public function render(string $view, array $datos = []): void {

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