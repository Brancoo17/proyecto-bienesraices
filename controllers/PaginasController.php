<?php

namespace Controllers;

use Model\Propiedad;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController {
    public static function index(Router $router) {
        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }

    public static function propiedades(Router $router) {
        $propiedades = Propiedad::all();

        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }

    public static function propiedad(Router $router) {
        
        // Validar que sea un ID válido
        $id = validarORedireccionar('/propiedades');

        // Buscar la propiedad por su ID
        $propiedad = Propiedad::find($id);
        
        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }

    public static function blog(Router $router) {
        $router->render('paginas/blog', []);
    }

    public static function entrada(Router $router) {
        $router->render('paginas/entrada', []);
    }

    public static function nosotros(Router $router) {
        $router->render('paginas/nosotros', []);
    }

    public static function contacto(Router $router) {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // Crear una nueva instancia de PHPMailer
            $mail = new PHPMailer();

            // Configurar el servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = 'bc69bc3b5a9557';
            $mail->Password = 'af1c3fa2ceb46c';
            $mail->SMTPSecure = 'tls';

            // Configurar el contenido del mail
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'Bienes Raices.com');
            $mail->Subject = "Tienes un Nuevo Mensaje";

            // Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            
            // Contenido del correo
            $contenido = "<html> <p>Tienes un Nuevo Mensaje</p> </html> ";

            $mail->Body = $contenido;
            $mail->AltBody = "Tienes un mensaje";

            // Enviar el correo
            if ($mail->send()) {
                echo "Mensaje enviado correctamente";
            } else {
                echo "El mensaje no se pudo enviar";
            }
            
            
        }

        $router->render('paginas/contacto', []);
    }
}