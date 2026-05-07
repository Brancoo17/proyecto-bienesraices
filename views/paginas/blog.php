<?php
/** @var object[] $blogs */
?>  
<main class="contenedor seccion contenido-centrado">
    <h1>Nuestro Blog</h1>

    <?php foreach($blogs as $blog): ?>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="/imagenes/<?php echo $blog->imagen; ?>" type="image/webp">
                    <source srcset="/imagenes/<?php echo $blog->imagen; ?>" type="image/jpeg">
                    <img loading="lazy" src="/imagenes/<?php echo $blog->imagen; ?>" alt="Texto Entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="/entrada?id=<?php echo $blog->id; ?>">
                    <h4><?php echo $blog->titulo; ?></h4>
                    <p class="info-meta">Escrito el: <span><?php echo $blog->creado; ?></span> por: <span><?php echo $blog->nombreCreador; ?></span></p>
                    <p>
                        <?php echo $blog->descripcion; ?>
                    </p>
                </a>
            </div>
        </article>
    <?php endforeach; ?>
</main>