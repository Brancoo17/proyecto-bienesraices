<?php

namespace Controllers;

use MVC\Router;
use Model\Admin;

class LoginController {
    public static function login(Router $router) {
        
        $errores = [];
        
        // Autenticar el usuario
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $auth = new Admin($_POST);
            $errores = $auth->validar();

            if(empty($errores)) {
                // Verificar que el usuario existe
                $resultado = $auth->existeUsuario();

                if(!$resultado) {
                    // Mensaje de error
                    $errores = Admin::getErrores();
                } else {
                    // Verificar que el password es correcto
                    $autenticado = $auth->comprobarPassword($resultado);

                    if($autenticado) {
                        // Autenticar el usuario
                        $auth->autenticar();
                    } else {
                        // Password incorrecto (mensaje de error)
                        $errores = Admin::getErrores();
                    }
                }
            }
        }

        $router->render('auth/login', [
            'errores' => $errores
        ]);
    }

    public static function logout() {
        session_start();
        $_SESSION = [];
        header('Location: /');
    }

    public static function registro(Router $router) {

        $errores = Admin::getErrores();

        $admin = new Admin;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Crear una nueva instancia con los datos del formulario
            $admin = new Admin($_POST['admin']);

            // Validar
            $errores = $admin->validar();

            // Validar el nombre
            if(!trim($admin->nombre)) {
                $errores[] = 'El nombre es obligatorio';
            }

            // Validar que los passwords coincidan
            $password2 = $_POST['admin']['password2'] ?? '';
            if($admin->password !== $password2) {
                $errores[] = 'Los passwords no coinciden';
            }

            if(empty($errores)) {
                // Verificar que el usuario no exista previamente
                $existeUsuario = $admin->existeUsuario();

                if($existeUsuario) {
                    $errores = ['El email ya está registrado'];
                } else {
                    // Hashear el password
                    $admin->password = password_hash($admin->password, PASSWORD_DEFAULT);

                    // Guardar en la base de datos
                    $admin->guardar();
                }
            }
        }

        $router->render('auth/registro', [
            'admin' => $admin,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {

        $errores = Admin::getErrores();

        // Obtener el ID
        $id = validarORedireccionar('/admin');

        // Obtener los datos del administrador
        $admin = Admin::find($id);

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Asignar los atributos
            $args = $_POST['admin'];

            // Sincronizar datos en memoria
            $admin->sincronizar($args);

            // Validar
            $errores = $admin->validar();

            // Validar el nombre
            if(!trim($admin->nombre)) {
                $errores[] = 'El nombre es obligatorio';
            }

            // Validar que los passwords coincidan
            $password2 = $_POST['admin']['password2'] ?? '';
            if($admin->password !== $password2) {
                $errores[] = 'Los passwords no coinciden';
            }

            if(empty($errores)) {
                // Hashear el password
                $admin->password = password_hash($admin->password, PASSWORD_DEFAULT);

                // Guardar en la base de datos
                $admin->guardar();
            }
        }

        $router->render('auth/actualizar', [
            'admin' => $admin,
            'errores' => $errores
        ]);
    }

    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Obtener el ID
            $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);

            if($id) {
                // Validar que sea un administrador
                $tipo = $_POST['tipo'];

                if(validarTipoContenido($tipo)) {
                    $admin = Admin::find($id);
                    $admin->eliminar();
                }
            }
        }
    }
}
