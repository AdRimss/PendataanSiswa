<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location:login.php");
}
require './function/function.php';

$id = $_GET['id'];
$phold = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM datasiswa WHERE id='$id'"));

if (isset($_POST['submitData'])) {
    if (editData($_POST) > 0) {
        echo "<script>
    alert('Data Berhasil Diubah')
    document.location.href = 'index.php'
    </script>";
    } else {
        echo "<script>
    alert('Data Gagal Diubah')
    document.location.href = 'index.php'
    </script>";
    }
}
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

<body>
    <div class="container">
        <h3 class="text-center mt-2">Edit Data Siswa</h3>
        <form action="" method="post" class="card m-5" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="container-fluid">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control mb-2" value="<?= $phold['nama_siswa'] ?>">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" name="img" id="foto" class="form-control mb-2">
                    <label for="nis" class="form-label">Nis/Nisn</label>
                    <input type="number" min=0 name="nis" id="nis" class="form-control mb-2" value="<?= $phold['nis_nisn'] ?>">
                    <label for="jk" class="form-label">Jenis Kelamin</label>
                    <?php if ($phold['jenis_kelamin'] != 'Laki-Laki') : ?>
                        <select name="jk" id="jk" class="form-select">
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan" selected>Perempuan</option>
                        </select>
                    <?php else : ?>
                        <select name="jk" id="jk" class="form-select">
                            <option value="Laki-Laki" selected>Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    <?php endif; ?>
                    <label for="agama" class="form-label">Agama</label>
                    <input type="text" name="agama" id="agama" class="form-control mb-2" value="<?= $phold['agama'] ?>">
                    <label for="tplahir" class="form-label">Tempat Lahir</label>
                    <input type="text" name="tplahir" id="tplahir" class="form-control mb-2" value="<?= $phold['tempat_lahir'] ?>">
                    <label for="tglahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tglahir" id="tglahir" class="form-control mb-2" value="<?= $phold['tgl_lahir'] ?>">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control mb-2" value="<?= $phold['alamat'] ?>">
                </div>
            </div>
            <div class="modal-footer">
                <a href="index.php" class="btn btn-secondary m-2">Kembali</a>
                <button type="submit" name="submitData" class="btn btn-primary m-2">Submit</button>
            </div>
        </form>
    </div>



</body>

</html>
<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>