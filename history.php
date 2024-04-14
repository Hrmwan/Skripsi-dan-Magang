<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];

?>



<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- CSS Datatables Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">


    <!-- css -->
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <!-- Favicon -->
    <link rel="icon" type="image" href="my-picture/logo.png">

    <!-- <link rel="stylesheet" href="css/style_login.css" type="text/css"> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- end css -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <title>PT. SAFARI DARMA SAKTI</title>

</head>

<body>

    <div class="text-center">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <p class="container-p mt-3 text-white">HISTORI DATA</p>
            </div>
        </div>

        <a href="home.php" class="btn btn-primary"><i class="fa fa-back"></i> Kembali </a>


        <!-- <button type="button" class="btn btn-dark">Logout</button> -->
    </div>

    <!-- jumbotron / form awal aplikasi -->
    <div class="container p-5 mb-5 mt-5 ">

        <!-- Tables -->
        <table class="table table-responsive" id="example">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kunci</th>
                    <th scope="col">Nama File</th>
                    <th scope="col">Nama Gambar</th>
                    <th scope="col">Hasil</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>

            <?php
            include "koneksi.php";

            $mycoverObjectDir = 'mycover_object/';
            $sql = "SELECT * FROM tbl_enkripsi";
            $hasil = mysqli_query($connect, $sql);
            $no = 0;
            ?>

            <tbody>
                <?php while ($data = mysqli_fetch_array($hasil)) :
                    $no++;
                    // mycover_object/mycover_object/bis1.9_stego.png
                    $file_stego = $data['hasilenkripsi'];
                ?>
                    <tr>
                        <th scope="row"><?= $no; ?></th>
                        <td><?= $data['kunci']; ?></td>
                        <td><?= $data['nama_file']; ?></td>
                        <td><?= $data['nama_gambar']; ?></td>
                        <td><?= $data['hasilenkripsi']; ?></td>
                        <td>
                            <a href="<?= $file_stego ?>" download="<?= $data['hasilenkripsi'] ?>"><i class="fa fa-download"></i></a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>

        </table>
    </div>

    <div class="pb-5"></div>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <!-- JQuery Datatables -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <!-- JS Datatables Bootstrap 4 -->
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>

    <script>
        new DataTable('#example');
    </script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- untuk memunculkan informasi setiap kali aplikasi di refresh -->
    <script src="js/js.js"></script>
    <script>
        $('#myModal').modal('show');
    </script>

    <script>
        function displayFileDetails(inputId, labelId) {
            var input = document.getElementById(inputId);
            var label = document.getElementById(labelId);

            if (input.files.length > 0) {
                label.innerText = input.files[0].name;
            } else {
                label.innerText = 'Masukan File';
            }
        }

        function updateFileNameEnkripsi() {
            // Dapatkan input file
            var input = document.getElementById('gambarEnkripsi');

            // Dapatkan label file
            var label = document.getElementById('labelEnkripsi');

            // Periksa apakah pengguna telah memilih file
            if (input.files.length > 0) {
                // Update label dengan nama file yang dipilih
                label.innerHTML = input.files[0].name;
            } else {
                // Jika tidak ada file yang dipilih, kembalikan label ke teks default
                label.innerHTML = 'Masukan Gambar';
            }
        }

        function updateFileNameDeskripsi() {
            // Dapatkan input file
            var input = document.getElementById('gambarDeskripsi');

            // Dapatkan label file
            var label = document.getElementById('labelDeskripsi');

            // Periksa apakah pengguna telah memilih file
            if (input.files.length > 0) {
                // Update label dengan nama file yang dipilih
                label.innerHTML = input.files[0].name;
            } else {
                // Jika tidak ada file yang dipilih, kembalikan label ke teks default
                label.innerHTML = 'Masukan Gambar';
            }
        }

        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script>
        $(document).ready(function() {
            $("#form-enkripsi").hide();
        });
        $(".enkripsi").click(function() {
            $("#form-enkripsi").show();
            $("#form-dekripsi").hide();
        });


        $(document).ready(function() {
            $("#form-dekripsi").hide();
        });
        $(".dekripsi").click(function() {
            $("#form-dekripsi").show();
            $("#form-enkripsi").hide();
        });
        // });
    </script>
</body>

</html>