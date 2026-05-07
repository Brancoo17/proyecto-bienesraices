<?php

namespace Controllers;

use Model\Blog;
use MVC\Router;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager as Image;

class BlogController {
    public static function crear(Router $router) {
       
        $blog = new Blog;

        // Arreglo con mensajes de errores
        $errores = Blog::getErrores();

        // Ejecutar el código cuando el usuario envia el formulario
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $blog = new Blog($_POST['blog']);

            // Generar un nombre único para la imagen
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            // Setear la imagen
            // Realiza un resize a la imagen con intervention
            $imagen = null;
            if($_FILES['blog']['tmp_name']['imagen']) {
                $manager = new Image(Driver::class);
                $imagen = $manager->read($_FILES['blog']['tmp_name']['imagen'])->cover(800, 600);
                $blog->setImagen($nombreImagen);
            }

            // Validar
            $errores = $blog->validar();

            // Revisar que no haya errores
            if(empty($errores)) {

                /** SUBIDA DE ARCHIVOS */
                // Crear carpeta
                if(!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                // Guarda la imagen en el servidor
                $imagen->save(CARPETA_IMAGENES . $nombreImagen);

                $blog->guardar();
            } 
        }

        $router->render('blogs/crear', [
            'blog' => $blog,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        
        $id = validarORedireccionar('/admin');

        // Obtener datos de la propiedad
        $blog = Blog::find($id);

        // Arreglo con mensajes de errores
        $errores = Blog::getErrores();

        // Ejecutar el código cuando el usuario envia el formulario
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Asignar los atributos de la propiedad
            $args = $_POST['blog'];
            $blog->sincronizar($args);

            // Validar
            $errores = $blog->validar();

            /* Subida de Archivos*/
            // Generar un nombre único para la imagen
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            // Setear la imagen
            // Realiza un resize a la imagen con intervention
            $imagen = null;
            if($_FILES['blog']['tmp_name']['imagen']) {
                $manager = new Image(Driver::class);
                $imagen = $manager->read($_FILES['blog']['tmp_name']['imagen'])->cover(800, 600);
                $blog->setImagen($nombreImagen);
            }

            // Revisar que no haya errores
            if(empty($errores)) {
                // Almacenar la imagen
                if($imagen) {
                    $imagen->save(CARPETA_IMAGENES . $nombreImagen);
                }

                // Insertar en la base de datos
                $blog->guardar();
            } 
        }

        $router->render('blogs/actualizar', [
            'blog' => $blog,
            'errores' => $errores
        ]);
    }

     public static function eliminar() {

        // Eliminar blog
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Validar el ID
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id) {

                // Validar el tipo
                $tipo = $_POST['tipo'];

                if(validarTipoContenido($tipo)) {
                    
                    $blog = Blog::find($id);
                    $blog->eliminar();
                }
            }
        }
        
    }
}