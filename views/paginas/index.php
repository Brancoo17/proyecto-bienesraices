
<main class="contenedor seccion">
    <h1>Más Sobre Nosotros</h1>

    <?php include 'iconos.php'; ?>
</main>

<section class="seccion contenedor">
    <h2>Casas y Deptos en Venta</h2>

    <?php
        include 'listado.php';
    ?>

    <div class="alinear-derecha">
        <a href="/propiedades" class="boton-verde">Ver Todas</a>
    </div>
</section>

<section class="imagen-contacto">
    <h2>Encontrá la casa de tu sueños</h2>
    <p>Llená el formulario de contacto y un asesor se pondrá en contacto con vos a la brevedad</p>
    <a href="/contacto" class="boton-amarillo-inlineblock">Contactános</a>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro Blog</h3>

        <?php
        include 'listadoBlogs.php';
        ?>

        <div class="alinear-izquierda">
            <a href="/blog" class="boton-verde">Ver Todo</a>
        </div>
    </section>

    <section class="testimoniales">
        <h3>Testimoniales</h3>

        <div class="testimonial">
            <blockquote>
                El personal se comportó de una excelente forma, muy buena atención 
                y la casa que me ofrecieron cumple con todas mis expectativas.
            </blockquote>
            <p>- Adrián Martínez</p>
        </div>
    </section>
</div>
  