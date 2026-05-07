<?php
/** @var object $blog */
?>

<fieldset>
    <legend>Información de la Entrada</legend>

    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="blog[titulo]" placeholder="Titulo Entrada" value="<?php echo s($blog->titulo); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="blog[imagen]">

    <?php if($blog->imagen): ?>
        <img src="/imagenes/<?php echo $blog->imagen; ?>" alt="Imagen Entrada" class="imagen-small">
    <?php endif; ?>

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="blog[descripcion]"><?php echo s($blog->descripcion); ?></textarea>

    <label for="texto">Texto:</label>
    <textarea id="texto" name="blog[texto]"><?php echo s($blog->texto); ?></textarea>

    <label for="nombreCreador">Nombre del Creador:</label>
    <input type="text" id="nombreCreador" name="blog[nombreCreador]" placeholder="Nombre del creador" value="<?php echo s($blog->nombreCreador); ?>">

</fieldset>
