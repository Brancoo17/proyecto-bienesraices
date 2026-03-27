<?php
    require 'includes/app.php';
    incluirTemplate('header'); 
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guía para la Decoración de tu Hogar</h1>

        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="Imagen de la Propiedad">
        </picture>

        <p class="info-meta">Escrito el: <span>20/2/2026</span> por: <span>Admin</span></p>

        <div class="resumen-propiedad">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, tempora exercitationem. 
            Ipsum, qui provident praesentium iure repellendus tempore est et quibusdam maiores soluta 
            labore cum in fuga, quae optio laboriosam. Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
            Similique fugit quod eaque autem beatae illum mollitia reprehenderit sit? Eum perspiciatis consequatur 
            quod atque a optio, maxime itaque ipsam provident quae?</p>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam beatae illo, nemo voluptatem accusantium 
            vel itaque quisquam quae consectetur ipsa optio veritatis, quibusdam repudiandae quo praesentium! 
            Qui pariatur a incidunt!</p>
        </div>
    </main>

<?php
    incluirTemplate('footer');
?>