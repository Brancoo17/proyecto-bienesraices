<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;

class LoginController {
    public static function login(Router $router) {
        // Autenticar el usuario
        $router->render('auth/login', []);
    }

    public static function logout(Router $router) {
        $router->render('auth/logout', []);
    }
}
