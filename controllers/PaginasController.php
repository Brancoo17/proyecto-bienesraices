<?php

namespace Controllers;

use Model\Propiedad;
use Model\Blog;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController {
    public static function index(Router $router) {
        $propiedades = Propiedad::get(3);
        $blogs = Blog::get(2);
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'blogs' => $blogs,
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
        $blogs = Blog::all();

        $router->render('paginas/blog', [
            'blogs' => $blogs
        ]);
    }

    public static function entrada(Router $router) {

        // Validar que sea un ID válido
        $id = validarORedireccionar('/blog');

        // Buscar el blog por su ID
        $blog = Blog::find($id);

        $router->render('paginas/entrada', [
            'blog' => $blog
        ]);
    }

    public static function nosotros(Router $router) {
        $router->render('paginas/nosotros', []);
    }

    public static function contacto(Router $router) {

        $mensaje = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $respuestas = $_POST['contacto'];
            
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
            $contenido = '<html>'; 
            $contenido .= '<h1>Tienes un Nuevo Mensaje</h1> '; 
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . '</p>';

            // Lógica para email o telefono
            if ($respuestas['metodo'] === 'telefono') {
                // Para telefono
                $contenido .= '<p>Método de Contacto: ' . $respuestas['metodo'] . '</p>';
                $contenido .= '<p>Teléfono: ' . $respuestas['telefono'] . '</p>';
                $contenido .= '<p>Fecha: ' . $respuestas['fecha'] . '</p>';
                $contenido .= '<p>Hora: ' . $respuestas['hora'] . '</p>';
            } else {
                // Para email
                $contenido .= '<p>Método de Contacto: ' . $respuestas['metodo'] . '</p>';
                $contenido .= '<p>Email: ' . $respuestas['email'] . '</p>';
            }

            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . '</p>';
            $contenido .= '<p>Vende o Compra: ' . $respuestas['tipo'] . '</p>';
            
            // Mostrar precio si existe
            if ($respuestas['precio']) {
                $contenido .= '<p>Precio o Presupuesto: $ ' . $respuestas['precio'] . '</p>';
            }
            
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = "Tienes un mensaje";

            // Enviar el correo
            if ($mail->send()) {
                $mensaje = "Mensaje enviado correctamente";
            } else {
                $mensaje = "El mensaje no se pudo enviar";
            }
            
            
        }

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
}