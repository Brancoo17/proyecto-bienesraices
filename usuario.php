<?php

// Importar la conexión a la base de datos
require 'includes/app.php';
$db = conectarDB();

// Crear un usuario
$email = 'correo2@correo.com';
$password = '456789';

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Insertar en la base de datos
$query = "INSERT INTO usuarios (email, password) VALUES ('{$email}', '{$passwordHash}')";

//echo $query;

mysqli_query($db, $query);