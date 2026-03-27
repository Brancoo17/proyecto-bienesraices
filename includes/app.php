<?php

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

use App\Propiedad;

// Conectar a la base de datos
$db = conectarDB();
Propiedad::setDB($db);

