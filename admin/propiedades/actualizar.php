<?php

    use App\Propiedad;
    use App\Vendedor;
    require '../../includes/app.php';
    use Intervention\Image\Drivers\Gd\Driver;
    use Intervention\Image\ImageManager as Image;

    estaAutenticado();

    // Validar ID
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header("Location: /admin");
    }

    // Obtener los datos de la propiedad
    $propiedad = Propiedad::find($id);

    // Consultar para obtener los vendedores
    $vendedores = Vendedor::all();

    // Arreglo con mensajes de errores
    $errores = Propiedad::getErrores();

    // Ejecutar el código cuando el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Asignar los atributos de la propiedad
        $args = $_POST['propiedad'];
        $propiedad->sincronizar($args);

        // Validar
        $errores = $propiedad->validar();

        /* Subida de Archivos*/
        // Generar un nombre único para la imagen
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

        // Setear la imagen
        // Realiza un resize a la imagen con intervention
        if($_FILES['propiedad']['tmp_name']['imagen']) {
            $manager = new Image(Driver::class);
            $imagen = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600);
            $propiedad->setImagen($nombreImagen);
        }

        // Revisar que no haya errores
        if(empty($errores)) {
            // Almacenar la imagen
            if($imagen) {
                $imagen->save(CARPETA_IMAGENES . $nombreImagen);
            }

            // Insertar en la base de datos
            $propiedad->guardar();
        }

        
    }

    incluirTemplate('header'); 
?>

    <main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" enctype="multipart/form-data">
            <?php include '../../includes/templates/formulario_propiedades.php'; ?>

            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>