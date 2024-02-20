<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location:login.php");
}
require './function/function.php';

if (isset($_POST['submitData'])) {
    if (tambahKepsek($_POST) > 0) {
        echo "<script>
        alert('Data Berhasil Diubah')
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal Diubah')
        </script>";
    }
}

$kepsek = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM datakepsek ORDER BY id_kepsek DESC LIMIT 1 "));

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
                    <a href="index.php" class="nav-link mb-2">Data Siswa</a>
                    <a href="settings.php" class="nav-link active mb-2">Settings</a>
                    <a href="logout.php" class="nav-link mb-2" onclick="if(!confirm('LogOut?')) return false">LogOut</a>
                </div>
            </div>
            <!-- Sidebar End -->

            <div class="col p-4">
                <div class="container p-3 px-5">
                    <h2 class="text-center pb-3">Data Kepala Sekolah</h2>
                    <div class="d-flex justify-content-between mb-3">
                        <div class="">
                            <h5 class="text-dark">Kepala Sekolah :</h5>
                            <h5 class="text-dark">Nomor Induk Kepala Sekolah</h5>
                        </div>
                        <div class="">
                            <h5 class="text-secondary text-end"><?= $kepsek['nama_kepsek'] ?></h5>
                            <h5 class="text-secondary text-end"><?= $kepsek['nomor_induk'] ?></h5>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#modalId" class="btn btn-secondary w-100">Edit Data Kepala Sekolah</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">
                                Edit Data Kepala Sekolah
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <label for="" class="form-label">Nama Kepala Sekolah</label>
                                    <input type="text" class="form-control" name="kepsek" value="<?= $kepsek['nama_kepsek'] ?>">
                                    <label for="" class="form-label">Nomor Induk Kepala Sekolah</label>
                                    <input type="number" class="form-control" name="nomorKepsek" value="<?= $kepsek['nomor_induk'] ?>">
                                    <label for="" class="form-label">Tanda Tangan (Gambar)</label>
                                    <input type="file" name="img" class="form-control">
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
                var modalId = document.getElementById('modalId');

                modalId.addEventListener('show.bs.modal', function(event) {
                    // Button that triggered the modal
                    let button = event.relatedTarget;
                    // Extract info from data-bs-* attributes
                    let recipient = button.getAttribute('data-bs-whatever');

                    // Use above variables to manipulate the DOM
                });
            </script>

        </div>
    </div>

</body>

</html>
<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>