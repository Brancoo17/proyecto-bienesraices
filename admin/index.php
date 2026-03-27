<?php

    require '../includes/app.php';

    estaAutenticado();

    use App\Propiedad;

    // Implementar un método para obtener propiedades (usando Active Record)
    $propiedades = Propiedad::all();

    // Muestra un mensaje de alerta
    $resultado = $_GET['resultado'] ?? null;

    // Eliminar propiedad
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id) {

            $propiedad = Propiedad::find($id);

            $propiedad->eliminar();
        }
    }

    // Incluye un template
    incluirTemplate('header'); 
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>

        <?php if(intval($resultado) === 1): ?>
            <p class="alerta exito">Propiedad creada correctamente</p>
        <?php endif; ?>

        <?php if(intval($resultado) === 2): ?>
            <p class="alerta exito">Propiedad actualizada correctamente</p>
        <?php endif; ?>

        <?php if(intval($resultado) === 3): ?>
            <p class="alerta exito">Propiedad eliminada correctamente</p>
        <?php endif; ?>

        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- Mostrar los Resultados -->
                <?php foreach($propiedades as $propiedad): ?>
                <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td><img src="/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla"></td>
                    <td>$<?php echo $propiedad->precio; ?></td>
                    <td>
                        <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>" class="boton boton-amarillo">Actualizar</a>
                        
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="submit" value="Eliminar" class="boton boton-rojo">
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

<?php
    // Cerrar la conexión
    mysqli_close($db);

    incluirTemplate('footer');
?>