<?php
/** @var \Model\Blog $blog */
?>

<main class="contenedor seccion contenido-centrado">
    <h1><?php echo $blog->titulo; ?></h1>

    <picture>
        <source srcset="/imagenes/<?php echo $blog->imagen; ?>" type="image/webp">
        <source srcset="/imagenes/<?php echo $blog->imagen; ?>" type="image/jpeg">
        <img loading="lazy" src="/imagenes/<?php echo $blog->imagen; ?>" alt="Imagen de la Propiedad">
    </picture>

    <p class="info-meta">Escrito el: <span><?php echo $blog->creado; ?></span> por: <span><?php echo $blog->nombreCreador; ?></span></p>

    <div class="resumen-propiedad descripcion">
        <p><?php echo nl2br($blog->descripcion); ?></p>
    </div>

    <div class="resumen-propiedad">
        <p><?php echo nl2br($blog->texto); ?></p>
    </div>

    <a href="/blog" class="boton-verde">Volver</a>
</main>
