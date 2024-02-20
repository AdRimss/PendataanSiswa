<?php

$conn = mysqli_connect("localhost", "root", "", "pendataan_siswa");

function tambahSiswa($data)
{
    global $conn;

    $nama = ucwords(strtolower($data['nama']));
    $nis = $data['nis'];
    $jk = $data['jk'];
    $agama = ucwords(strtolower($data['agama']));
    $tplahir = ucwords(strtolower($data['tplahir']));
    $tglahir = $data['tglahir'];
    $alamat = $data['alamat'];
    $img = uploadImg();
    $kepsek = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id_kepsek FROM datakepsek ORDER BY id_kepsek DESC LIMIT 1 "));
    $datKep = $kepsek['id_kepsek'];

    $sql = mysqli_query($conn, "INSERT INTO datasiswa VALUES(NULL, '$nama', '$nis', '$jk', '$agama', '$tplahir', '$tglahir', '$alamat', '$img', $datKep)");
    return mysqli_affected_rows($conn);
}

function uploadImg()
{
    $namaImg = $_FILES['img']['name'];
    $tmpImg = $_FILES['img']['tmp_name'];
    $errImg = $_FILES['img']['error'];

    $validEks = ['jpg', 'jpeg', 'png'];
    $fileEks = pathinfo($namaImg, PATHINFO_EXTENSION);

    if ($errImg == 4) {
        echo "<script>alert('Gambar tidak terbaca')</script>";
        return false;
    } elseif (!in_array($fileEks, $validEks)) {
        echo "<script>alert('Masukan ekstensi yang benar jpg/jpeg/png')</script>";
        return false;
    }

    $namaBaru = uniqid() . '.' . $fileEks;
    move_uploaded_file($tmpImg, 'img/' . $namaBaru);

    return $namaBaru;
}

function editData($data)
{
    global $conn;

    $id = $_GET['id'];

    $nama = ucwords(strtolower($data['nama']));
    $nis = $data['nis'];
    $jk = $data['jk'];
    $agama = ucwords(strtolower($data['agama']));
    $tplahir = ucwords(strtolower($data['tplahir']));
    $tglahir = $data['tglahir'];
    $alamat = $data['alamat'];
    if ($_FILES['img']['error'] != 4) {
        $img = uploadImage();

        $sql = mysqli_query($conn, "UPDATE datasiswa SET
        nama_siswa = '$nama',
        nis_nisn = '$nis',
        jenis_kelamin = '$jk',
        agama = '$agama',
        tempat_lahir = '$tplahir',
        tgl_lahir = '$tglahir',
        alamat = '$alamat'
        gambar = 'img' WHERE id = '$id'");
        return mysqli_affected_rows($conn);
    } else {
        $sql = mysqli_query($conn, "UPDATE datasiswa SET
        nama_siswa = '$nama',
        nis_nisn = '$nis',
        jenis_kelamin = '$jk',
        agama = '$agama',
        tempat_lahir = '$tplahir',
        tgl_lahir = '$tglahir',
        alamat = '$alamat' WHERE id = '$id'");
        return mysqli_affected_rows($conn);
    }
}

function deleteData($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM datasiswa WHERE id='$id'");
    return mysqli_affected_rows($conn);
}

function tambahKepsek($data)
{
    global $conn;
    $nama = ucwords(strtolower($data['kepsek']));
    $noKepsek = $data['nomorKepsek'];
    // $ttd = uploadImg();
    if ($_FILES['img']['error'] != 4) {
        $ttd = uploadImage();
    } else {
        // Tidak ada gambar baru diunggah, pertahankan gambar yang ada dari database
        $panggil = mysqli_query($conn, "SELECT ttd FROM datakepsek ORDER BY id_kepsek DESC LIMIT 1");
        $dataYangAda = mysqli_fetch_assoc($panggil);
        $ttd = $dataYangAda['ttd'];
    }

    $sql = mysqli_query($conn, "INSERT INTO datakepsek VALUES(NULL, '$nama', '$noKepsek','$ttd')");
    return mysqli_affected_rows($conn);
}
