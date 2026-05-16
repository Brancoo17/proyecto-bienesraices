<?php
/** @var string[] $errores */
/** @var \Model\Admin $admin */
?>

<fieldset>
    <legend>Información del Administrador</legend>

    <label for="nombre">Nombre y Apellido:</label>
    <input type="text" id="nombre" name="admin[nombre]" placeholder="Nombre y Apellido del Administrador" value="<?php echo s($admin->nombre); ?>">
</fieldset>

<fieldset>
    <legend>Email y Password</legend>

    <label for="email">E-mail:</label>
    <input type="email" id="email" name="admin[email]" placeholder="Email del Administrador" value="<?php echo s($admin->email); ?>">

    <label for="password">Password:</label>
    <input type="password" id="password" name="admin[password]" placeholder="Password del Administrador">

    <label for="password2">Repetir Password:</label>
    <input type="password" id="password2" name="admin[password2]" placeholder="Repite el Password">
</fieldset>
