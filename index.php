<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location:login.php");
}

require './function/function.php';

if (isset($_POST['submitData'])) {
    if (tambahSiswa($_POST) > 0) {
        echo "<script>alert('Data Berhasil Ditambahkan')</script>";
    } else {
        echo "<script>alert('Data Gagal Ditambahkan')</script>";
    }
}

// Query Table
$no = 1;
$tableQuery = mysqli_query($conn, "SELECT * FROM datasiswa");
?>



<!doctype html>
<html lang="en">

<head>
    <title>Pendataan Siswa</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container-fluid">

        <div class="row">
            <!-- Sidebar -->
            <div class="col-auto col-lg-2 p-3 border-end border-4 min-vh-100">
                <a href="index.php" class="nav-link border-bottom border-5 border-dark mb-3">
                    <h4>Pendataan Siswa</h4>
                </a>
                <div class="nav-underline">
                    <a href="index.php" class="nav-link active mb-2">Data Siswa</a>
                    <a href="settings.php" class="nav-link mb-2">Settings</a>
                    <a href="logout.php" class="nav-link mb-2" onclick="if(!confirm('LogOut?')) return false">LogOut</a>
                </div>
            </div>
            <!-- Sidebar End -->

            <div class="col p-4">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-secondary mb-3" data-bs-toggle="modal" data-bs-target="#tambahData">
                    +Data Siswa
                </button>

                <!-- Modal -->
                <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitleId">
                                    Tambah Data Siswa
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" name="nama" id="nama" class="form-control mb-2">
                                        <label for="foto" class="form-label">Foto</label>
                                        <input type="file" name="img" id="foto" class="form-control mb-2">
                                        <label for="nis" class="form-label">Nis/Nisn</label>
                                        <input type="number" min=0 name="nis" id="nis" class="form-control mb-2">
                                        <label for="jk" class="form-label">Jenis Kelamin</label>

                                        <select name="jk" id="jk" class="form-select">
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        <label for="agama" class="form-label">Agama</label>
                                        <input type="text" name="agama" id="agama" class="form-control mb-2">
                                        <label for="tplahir" class="form-label">Tempat Lahir</label>
                                        <input type="text" name="tplahir" id="tplahir" class="form-control mb-2">
                                        <label for="tglahir" class="form-label">Tanggal Lahir</label>
                                        <input type="date" name="tglahir" id="tglahir" class="form-control mb-2">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <input type="text" name="alamat" id="alamat" class="form-control mb-2">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="submit" name="submitData" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <script>
                    var tambahData = document.getElementById('tambahData');

                    tambahData.addEventListener('show.bs.modal', function(event) {
                        // Button that triggered the modal
                        let button = event.relatedTarget;
                        // Extract info from data-bs-* attributes
                        let recipient = button.getAttribute('data-bs-whatever');

                        // Use above variables to manipulate the DOM
                    });
                </script>
                <!-- Modal End -->

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Foto</th>
                                <th>Nis/Nisn</th>
                                <th>Jenis Kelamin</th>
                                <th>Agama</th>
                                <th>Tempat/Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($tableQuery as $baris) :
                            ?>
                                <tr class="">
                                    <td scope="row"><?= $no++ ?></td>
                                    <td><?= $baris['nama_siswa'] ?></td>
                                    <td><img src="./img/<?= $baris['gambar'] ?>" width="108px" alt="" srcset=""></td>
                                    <td><?= $baris['nis_nisn'] ?></td>
                                    <td><?= $baris['jenis_kelamin'] ?></td>
                                    <td><?= $baris['agama'] ?></td>
                                    <td><?= $baris['tempat_lahir'], ", ", date("m-d-Y", strtotime($baris['tgl_lahir'])) ?></td>
                                    <td><?= $baris['alamat'] ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="cetak.php?id=<?= $baris['id'] ?>" class="btn btn-success p-2 m-1">🖨️</a>
                                            <a href="editData.php?id=<?= $baris['id'] ?>" class="btn btn-warning p-2 m-1">✏️</a>
                                            <a href="delete.php?id=<?= $baris['id'] ?>" class="btn btn-danger p-2 m-1">🗑️</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>


        </div>
    </div>
</body>

</html>
<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>