<?php

$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$nombre_basededatos = "bdlibreria";

$bd = mysqli_connect($servidor, $usuario, $contrasena, $nombre_basededatos);

if (!$bd)
    die("No se pudo conectar con la base de datos: " . mysqli_connect_error());
