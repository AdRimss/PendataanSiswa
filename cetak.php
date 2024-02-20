<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location:login.php");
}

require './function/function.php';
$id = $_GET['id'];
// $panggil = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM datasiswa WHERE id = '$id'"));
$panggil = mysqli_fetch_assoc(mysqli_query($conn, "SELECT datasiswa.*, datakepsek.* FROM datasiswa INNER JOIN datakepsek ON datasiswa.id_kepsek = datakepsek.id_kepsek WHERE datasiswa.id = '$id'"));
// $kepsek = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM datakepsek ORDER BY id_kepsek DESC LIMIT 1 "));
?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body class="">
    <div class="d-print-none">
        <a href="index.php" class="text-secondary"> <- Kembali</a>
                <a href="#" onclick="window.print()" class="text-warning"> Cetak -></a>

    </div>

    <div class="container-fluid mt-5">
        <div class="card" id="cetakArea">
            <h2 class="text-center">SMKN 12 Jakarta</h2>
            <div class="row">
                <div class="col-4"><img src="./img/<?= $panggil['gambar'] ?>" alt="" width="354px" height="472px" class="p-4"></div>
                <div class="col mt-3 ms-2">
                    <div class="d-flex">
                        <div class="w-50">
                            <h6 class="mt-3">Nama: </h6>
                            <h6 class="mt-3">Nis/Nisn: </h6>
                            <h6 class="mt-3">Jenis Kelamin: </h6>
                            <h6 class="mt-3">Agama: </h6>
                            <h6 class="mt-3">Tempat Tgl Lahir: </h6>
                            <h6 class="mt-3">Alamat: </h6>

                        </div>
                        <div class="ps-3 ms-3">
                            <h6 class="mt-3"><?= $panggil['nama_siswa'] ?></h6>
                            <h6 class="mt-3"><?= $panggil['nis_nisn'] ?></h6>
                            <h6 class="mt-3"><?= $panggil['jenis_kelamin'] ?></h6>
                            <h6 class="mt-3"><?= $panggil['agama'] ?></h6>
                            <h6 class="mt-3"><?= $panggil['tempat_lahir'], ", ", date("d-M-Y", strtotime($panggil['tgl_lahir'])) ?></h6>
                            <h6 class="mt-3"><?= $panggil['alamat'] ?></h6>
                        </div>
                    </div>
                    <div class="pe-5">
                        <p class="text-center p-0 pt-2 m-0"><?= $panggil['nama_kepsek'] ?></p>
                        <p class="text-center p-0 m-0"><?= $panggil['nomor_induk'] ?></p>
                        <hr>
                        <div class="d-flex justify-content-center">
                            <img class="pb-3" src="./img/<?= $panggil['ttd'] ?>" alt="" width="188px" height="126px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>