
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

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="buil/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="/entrada">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p class="info-meta">Escrito el: <span>20/2/2026</span> por: <span>Admin</span></p>

                    <p>
                        Consejos para constrtuir una terraza en el techo de tu casa con 
                        los mejores materiales y ahorrando dinero.
                    </p>
                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog3.webp" type="image/webp">
                    <source srcset="buil/img/blog3.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog3.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="/entrada">
                    <h4>Guía para la decoración de tu hogar</h4>
                    <p class="info-meta">Escrito el: <span>20/2/2026</span> por: <span>Admin</span></p>

                    <p>
                        Maximiza el espacio en tu hogar con esta guía, aprende a 
                        combinar muebles y colores para darle vida a tu espacio.
                    </p>
                </a>
            </div>
        </article>

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
  