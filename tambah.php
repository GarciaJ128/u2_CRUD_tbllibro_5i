<?php
include("./config.php");

// cek apa tombol daftar udah di klik blom
if (isset($_POST['agregar'])) {
    // ambil data dari form
    $id_libro = $_POST['id_libro'];
    $titulo = $_POST['titulo'];
    $id_autor = $_POST['id_autor'];
    $editorial = $_POST['editorial'];
    $anio = $_POST['anio'];
    $genero = $_POST['genero'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $portada = addslashes(file_get_contents($_FILES['portada']['tmp_name']));

    $sql_verificar = "SELECT * FROM tbl_libro WHERE id_libro = '$id_libro'";
    $resultado_verificar = mysqli_query($bd,$sql_verificar);

    if(mysqli_num_rows($resultado_verificar) > 0) {
        die("El ID Libro ya existe, elige otro");
    }

    $sql_verificar2 = "SELECT * FROM tbl_libro WHERE id_autor = '$id_autor'";
    $resultado_verificar2 = mysqli_query($bd,$sql_verificar2);

    if(mysqli_num_rows($resultado_verificar2) > 0) {
        die("El ID Autor ya existe, elige otro");
    }

    // query
    $sql = "INSERT INTO tbl_libro(id_libro, titulo, id_autor, editorial, anio, genero, precio, stock, portada)
    VALUES('$id_libro', '$titulo', '$id_autor', '$editorial', '$anio', '$genero', '$precio', '$stock', '$portada')";
    $query = mysqli_query($bd, $sql);
    

    // cek apa query berhasil disimpan?
    if ($query)
        header('Location: ./index.php?status=sukses');
    else
        header('Location: ./index.php?status=gagal');
} else
    die("Acceso prohibido...");
