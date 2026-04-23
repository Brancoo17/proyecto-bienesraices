<?php

namespace Controllers;

use MVC\Router;
use Model\Vendedor;

class VendedorController {
    public static function crear(Router $router) {
        
        $errores = Vendedor::getErrores();
        
        $vendedor = new Vendedor;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // Crear una nueva instancia de vendedor
            $vendedor = new Vendedor($_POST['vendedor']);

            // Validar que no haya errores
            $errores = $vendedor->validar();

            if(empty($errores)) {
                $vendedor->guardar();
            }
        }

        $router->render('/vendedores/crear', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        
        $errores = Vendedor::getErrores();

        // Obtener el ID
        $id = validarORedireccionar('/admin');
        
        // Obtener los datos del vendedor
        $vendedor = Vendedor::find($id);

        // Ejecutar el código cuando el usuario envia el formulario
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Asignar los atributos del vendedor
            $args = $_POST['vendedor'];

            // Sincronizar datos en memoria
            $vendedor->sincronizar($args);

            // Validar
            $errores = $vendedor->validar();

            // Revisar que no haya errores
            if(empty($errores)) {
                // Insertar en la base de datos
                $vendedor->guardar();
            }
        }

        $router->render('/vendedores/actualizar', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Obtener el ID
            $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
            
            if($id) {
                // Validar que sea un vendedor
                $tipo = $_POST['tipo'];

                if(validarTipoContenido($tipo)) {
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                }
            }
        }
    }
}
