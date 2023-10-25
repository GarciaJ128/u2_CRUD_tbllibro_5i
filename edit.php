<?php
include("./config.php");
var_dump($_POST);
// cek apa tombol daftar udah di klik blom
if (isset($_POST['edit_data'])) {
    // ambil data dari form
    $id = $_POST['edit_id'];
    $titulo = $_POST['edit_titulo'];
    $editorial = $_POST['edit_editorial'];
    $anio = $_POST['edit_anio'];
    $genero = $_POST['edit_genero'];
    $precio = $_POST['edit_precio'];
    $stock = $_POST['edit_stock'];
    if ($_FILES['edit_portada']['error'] === UPLOAD_ERR_OK) {
        $portada = addslashes(file_get_contents($_FILES['edit_portada']['tmp_name']));
    } else {
        // Manejo de errores, por ejemplo:
        die("Error al cargar la imagen. Código de error: " . $_FILES['edit_portada']['error']);
    }

    // query
    $consulta = "UPDATE tbl_libro SET titulo='$titulo',  editorial='$editorial', anio='$anio', genero='$genero', precio='$precio', stock='$stock', portada='$portada' WHERE id = '$id'";
    $query = mysqli_query($bd, $consulta);

    // cek apa query berhasil disimpan?
    if ($query)
        header('Location: ./index.php?update=sukses');
    else
        header('Location: ./index.php?update=gagal');
} else
    die("Acceso prohibido...");
