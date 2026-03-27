<?php
    // Importar la conexion a la base de datos
    $db = conectarDB();

    // Consultar la base de datos
    $query = "SELECT * FROM propiedades LIMIT {$limite}";

    // Obtener los resultados
    $resultado = mysqli_query($db, $query);
?>

    <div class="contenedor-anuncios">
        <?php while($propiedad = mysqli_fetch_assoc($resultado)) : ?>
        <div class="anuncio">
            <picture>
                <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="anuncio">
            </picture>

            <div class="contenido-anuncio">
                <h3><?php echo $propiedad['titulo']; ?></h3>
                <p><?php echo $propiedad['descripcion']; ?></p>
                <p class="precio">$<?php echo $propiedad['precio']; ?></p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
                        <p><?php echo $propiedad['wc']; ?></p>
                    </li>
                    <li>
                        <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono dormitorio" loading="lazy">
                        <p><?php echo $propiedad['habitaciones']; ?></p>
                    </li>
                    <li>
                        <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono est" loading="lazy">
                        <p><?php echo $propiedad['estacionamiento']; ?></p>
                    </li>
                </ul>

                <a href="anuncio.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo">VER PROPIEDAD</a>

            </div><!--.contenido-anuncio-->
        </div><!--.anuncio-->
        <?php endwhile; ?>
    </div><!--.contenedor-anuncios-->

<?php
    // Cerrar la conexion
    mysqli_close($db);
?>