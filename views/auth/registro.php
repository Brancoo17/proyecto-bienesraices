<?php
    $errores ??= [];
?>

<main class="contenedor seccion">
    <h1>Registrar Administrador</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" action="/auth/registro">
        <?php include 'formulario.php'; ?>

        <input type="submit" value="Registrar Administrador" class="boton boton-verde">
    </form>

</main>
