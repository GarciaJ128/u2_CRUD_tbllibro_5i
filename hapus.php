<?php
include("./config.php");

if (isset($_POST['deletedata'])) {
    // ambil id dari query string
    $id = $_POST['delete_id'];

    // query hapus
    $consulta = "DELETE FROM tbl_libro WHERE id = '$id'";
    $query = mysqli_query($bd, $consulta);

    // apa query berhasil dihapus?
    if ($query) {
        header('Location: ./index.php?hapus=sukses');
    } else
        die('Location: ./index.php?hapus=gagal');
} else
    die("Acceso prohibido...");
