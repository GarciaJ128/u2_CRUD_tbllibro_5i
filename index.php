<?php include("./config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Belajar Dasar CRUD dengan PHP dan MySQL">
    <title>Librería DenysTale</title>

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- material icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-light">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom" style="position: sticky !important;
    top: 0 !important; z-index : 99999 !important;">
        <div class="container-fluid container">
            <a class="navbar-brand" href="#">Libreria DenysTale</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link active text-sm-start text-center" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary ms-md-4 text-white" href="#">Iniciar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-5">
        <!-- form tambah mahasiswa -->
        <div class="card mb-5">
            <!-- <div class="card-header">
                Latihan CRUD PHP & MySQL
            </div> -->
            <!-- tambah data -->
            <div class="card-body">
                <h3 class="card-title">Librería DenysTale</h3>
                <p class="card-text">Nombre: Garcia Joaquin Jennifer Denisse <br> Grado y grupo: 5°I</p>
                <h4 class="card-title">Formulario Tabla Libro</h4>
                <!-- tampilkan pesan sukses ditambah -->
                <?php if (isset($_GET['status'])): ?>
                    <?php
                    if ($_GET['status'] == 'sukses')
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>¡Exitoso!</strong> ¡Datos agregados exitosamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    else
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong>¡Error al agregar datos!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    ?>
                <?php endif; ?>


                <form class="row g-3" action="tambah.php" method="POST" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <label for="id_libro" class="form-label">ID Libro</label>
                        <input type="number" name="id_libro" class="form-control" placeholder="1" required>
                    </div>

                    <div class="col-md-6">
                        <label for="id_autor" class="form-label">ID Autor</label>
                        <input type="number" name="id_autor" class="form-control" placeholder="1" required>
                    </div>

                    <div class="col-md-12">
                        <label for="titulo" class="form-label">Titulo</label>
                        <input type="text" name="titulo" class="form-control" placeholder="Drácula" required>
                    </div>

                    <div class="col-md-6">
                        <label for="editorial" class="form-label">Editorial</label>
                        <input type="text" name="editorial" class="form-control" placeholder="Planeta" required>
                    </div>

                    <div class="col-md-6">
                        <label for="anio" class="form-label">Año</label>
                        <input type="number" name="anio" class="form-control" placeholder="2001" required>
                    </div>

                    <div class="col-md-12">
                        <label for="genero" class="form-label">Genero</label>
                        <select class="form-select" name="genero" aria-label="Default select example">
                            <option value="Novela">Novela</option>
                            <option value="Ficcion">Ciencia Ficcion</option>
                            <option value="Terror">Terror</option>
                            <option value="Ficcion">Ficcion</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="text" name="precio" class="form-control" placeholder="250.00" required>
                    </div>

                    <div class="col-md-6">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" name="stock" class=" form-control" placeholder="210" required>
                    </div>

                    <div class="col-md-12">
                        <label for="portada" class="form-label">Portada del libro (imagen)</label>
                        <input type="file" name="portada" class="form-control" placeholder="Drácula" required>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" value="daftar" name="agregar"><i
                                class="fa fa-plus"></i><span class="ms-2">Agregar Libro</span></button>
                    </div>
                </form>
            </div>
        </div>


        <!-- judul tabel -->
        <h5 class="mb-3">Tabla Libro</h5>

        <div class="row my-3">
            <div class="col-md-2 mb-3">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Mostrar entradas</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="col-md-3 ms-auto">
                <div class="input-group mb-3 ms-auto">
                    <input type="text" class="form-control" placeholder="Buscar algo..." aria-label="cari"
                        aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2"><i
                            class="fa fa-search"></i></button>
                </div>
            </div>
        </div>


        <!-- tampilkan pesan sukses dihapus -->
        <?php if (isset($_GET['hapus'])): ?>
            <?php
            if ($_GET['hapus'] == 'sukses')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>¡Exitoso!</strong> ¡Datos eliminados exitosamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> ¡Los datos eliminados fallaron!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- tampilkan pesan sukses di edit -->
        <?php if (isset($_GET['update'])): ?>
            <?php
            if ($_GET['update'] == 'sukses')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>¡Exitoso!</strong> ¡Datos actualizados exitosamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> ¡Los datos no se pudieron actualizar!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- tabel -->
        <div class="table-responsive mb-5 card">
            <?php
            echo "<div class='card-body'>";

            echo "<table class='table table-hover align-middle bg-white'>";
            echo "<thead>";
            echo "<tr>";
            // echo "<th scope='col' class='text-center'>No</th>";
            echo "<th scope='col'>ID Libro</th>";
            echo "<th scope='col'>Titulo</th>";
            echo "<th scope='col'>ID Autor</th>";
            echo "<th scope='col'>Editorial</th>";
            echo "<th scope='col'>Año</th>";
            echo "<th scope='col'>Genero</th>";
            echo "<th scope='col'>Precio</th>";
            echo "<th scope='col'>Stock</th>";
            echo "<th scope='col'>Portada</th>";
            echo "<th scope='col' class='text-center'>Opción</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";



            $limite = 10;
            $pagina = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
            $pagina_comienzo = ($pagina > 1) ? ($pagina * $limite) - $limite : 0;

            $previous = $pagina - 1;
            $next = $pagina + 1;

            $data = mysqli_query($bd, "SELECT * FROM tbl_libro");
            $cantidad_datos = mysqli_num_rows($data);
            $total_pagina = ceil($cantidad_datos / $limite);

            $data_mhs = mysqli_query($bd, "SELECT * FROM tbl_libro LIMIT $pagina_comienzo, $limite");
            $no = $pagina_comienzo + 1;

            // $sql = "SELECT * FROM tbl_libro";
            // $query = mysqli_query($bd, $sql);
            



            while ($datos_libro = mysqli_fetch_array($data_mhs)) {
                echo "<tr>";
                echo "<td style='display:none'>" . $datos_libro['id'] . "</td>";
                // echo "<td class='text-center'>" . $no++ . "</td>";
                echo "<td>" . $datos_libro['id_libro'] . "</td>";
                echo "<td>" . $datos_libro['titulo'] . "</td>";
                echo "<td>" . $datos_libro['id_autor'] . "</td>";
                echo "<td>" . $datos_libro['editorial'] . "</td>";
                echo "<td>" . $datos_libro['anio'] . "</td>";
                echo "<td>" . $datos_libro['genero'] . "</td>";
                echo "<td>" . $datos_libro['precio'] . "</td>";
                echo "<td>" . $datos_libro['stock'] . "</td>";
                echo '<td><img height="200" width="130" src="data:image/jpg;base64,' . base64_encode($datos_libro['portada']) . '"/></td>';
                echo "<td class='text-center'>";

                echo "<button type='button' class='btn btn-primary editButton pad m-1'><span class='material-icons align-middle'>edit</span></button>";

                // tombol hapus
                echo "
                            <!-- Button trigger modal -->
                            <button type='button' class='btn btn-danger deleteButton pad m-1'><span class='material-icons align-middle'>delete</span></button>";
                echo "</td>";

                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            if ($cantidad_datos == 0) {
                echo "<p class='text-center'>Tidak ada data yang tersedia pada tabel ini</p>";
            } else {
                echo "<p>Total $cantidad_datos entri</p>";
            }

            echo "</div>";
            ?>
        </div>

        <!-- pagination -->
        <nav class="mt-5 mb-5">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php echo ($pagina > 1) ? "href='?pagina=$previous'" : "" ?>><i
                            class="fa fa-chevron-left"></i></a>
                </li>
                <?php
                for ($x = 1; $x <= $total_pagina; $x++) {
                    ?>
                    <li class="page-item"><a class="page-link" href="?pagina=<?php echo $x ?>">
                            <?php echo $x; ?>
                        </a></li>
                    <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" <?php echo ($pagina < $total_pagina) ? "href='?pagina=$next'" : "" ?>><i
                            class="fa fa-chevron-right"></i></a>
                </li>
            </ul>
        </nav>

        <!-- Modal Edit-->
        <div class='modal fade' style="top:58px !important;" id='editModal' tabindex='-1'
            aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog' style="margin-bottom:100px !important;">
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Editar datos</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>

                    <form action='edit.php' method='POST' enctype="multipart/form-data">
                        <div class='modal-body text-start'>
                            <p>Llena todos los campos</p>

                            <input type='hidden' name='edit_id' id='edit_id'>

                            <div class="col-12 mb-3">
                                <label for="edit_id_libro" class="form-label">ID Libro</label>
                                <input type="text" name="edit_id_libro" id="edit_id_libro" class="form-control"
                                    placeholder="1" disabled>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="edit_titulo" class="form-label">Titulo</label>
                                <input type="text" name="edit_titulo" id="edit_titulo" class="form-control"
                                    placeholder="Drácula" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="edit_id_autor" class="form-label">ID Autor</label>
                                <input type="text" name="edit_id_autor" id="edit_id_autor" class="form-control"
                                    placeholder="1" disabled>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_editorial" class="form-label">Editorial</label>
                                <input type="text" name="edit_editorial" id="edit_editorial" class="form-control"
                                    placeholder="Planeta" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_anio" class="form-label">Año</label>
                                <input type="text" name="edit_anio" id="edit_anio" class="form-control" placeholder="2000"
                                    required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_genero" class="form-label">Genero</label>
                                <select class="form-select" name="edit_genero" id="edit_genero"
                                    aria-label="Default select example">
                                    <option value="Novela">Novela</option>
                                    <option value="Ficcion">Ciencia Ficcion</option>
                                    <option value="Terror">Terror</option>
                                    <option value="Ficcion">Ficcion</option>
                                </select>
                            </div>


                            <div class="col-12 mb-3">
                                <label for="edit_precio" class="form-label">Precio</label>
                                <input type="text" name="edit_precio" class="form-control" id="edit_precio"
                                    placeholder="250.00" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_stock" class="form-label">Stock</label>
                                <input type="number" name="edit_stock" id="edit_stock" class="form-control"
                                    placeholder="210" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_portada" class="form-label">Portada</label>
                                <input type="file" name="edit_portada" id="edit_portada" class="form-control" required>
                            </div>

                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='edit_data' class='btn btn-primary'>Guardar</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- Modal Delete-->
        <div class='modal fade' style="top:58px !important;" id='deleteModal' tabindex='-1'
            aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Confirmación</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>


                    <form action='hapus.php' method='POST'>

                        <div class='modal-body text-start'>
                            <input type='hidden' name='delete_id' id='delete_id'>
                            <p>¿Estás seguro de que deseas eliminar estos datos?</p>
                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='deletedata' class='btn btn-primary'>Borrar</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- tutup container -->
    </div>


    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Javascript bule with popper bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- edit function -->
    <script>
        $(document).ready(function () {
            $('.editButton').on('click', function () {
                $('#editModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                $('#edit_id').val(data[0]);
                $('#edit_id_libro').val(data[1]);
                $('#edit_titulo').val(data[2]);
                $('#edit_id_autor').val(data[3]);
                $('#edit_editorial').val(data[4]);
                $('#edit_anio').val(data[5]);
                $('#edit_genero').val(data[6]);
                $('#edit_precio').val(data[7]);
                $('#edit_stock').val(data[8]);
            });
        });

    </script>

    <!-- delete function -->
    <script>
        $(document).ready(function () {
            $('.deleteButton').on('click', function () {
                $('#deleteModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#delete_id').val(data[0]);
            });
        });
    </script>

    <script>
        function clicking() {
            window.location.href = './index.php';
        }
    </script>
</body>

</html>