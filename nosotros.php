<?php
    require 'includes/app.php';
    incluirTemplate('header'); 
?>

    <main class="contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre Nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>25 Años de Experiencia</blockquote>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, tempora exercitationem. 
                Ipsum, qui provident praesentium iure repellendus tempore est et quibusdam maiores soluta 
                labore cum in fuga, quae optio laboriosam. Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                Similique fugit quod eaque autem beatae illum mollitia reprehenderit sit? Eum perspiciatis consequatur 
                quod atque a optio, maxime itaque ipsam provident quae?</p>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam beatae illo, nemo voluptatem accusantium 
                vel itaque quisquam quae consectetur ipsa optio veritatis, quibusdam repudiandae quo praesentium! 
                Qui pariatur a incidunt!</p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti at ipsam autem 
                iusto reprehenderit quae asperiores dolorum iste quisquam. Lorem ipsum dolor</p>
            </div>

            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti at ipsam autem 
                iusto reprehenderit quae asperiores dolorum iste quisquam. Lorem ipsum dolor</p>
            </div>

            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Seguridad" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti at ipsam autem 
                iusto reprehenderit quae asperiores dolorum iste quisquam. Lorem ipsum dolor</p>
            </div>
        </div>
    </section>

<?php
    incluirTemplate('footer');
?>