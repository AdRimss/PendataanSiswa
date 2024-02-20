<?php
session_start();
if (isset($_SESSION['login'])) {
    header("Location:index.php");
}
if (isset($_POST['login'])) {
    if ($_POST['username'] == 'Admin' && $_POST['password'] == '12345') {
        $_SESSION['login'] = true;
        echo "<script>alert('Login Berhasil')
        document.location.href='index.php';
        </script>";
    } else {
        echo "<script>alert('Login Gagal')</script>";
    }
}
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
    <main class="container m-5">
        <div class="row">
            <div class="col"></div>
            <div class="col-4">
                <br>
                <h2 class="text-center"><b>LogIn</b></h2>
                <div class="table-responsive text-center ">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Username</th>
                                <th scope="col">Password</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td scope="row">Admin</td>
                                <td>12345</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <form action="" method="post" class="mb-4 pt-3">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control mb-5">
                    <div class="d-flex justify-content-center">
                        <button type="submit" name="login" class="btn btn-secondary d-flex px-5"> Log In </button>
                    </div>
                </form>

                <h2 class="text-center"><b>Pendataan Siswa</b></h2>
            </div>
            <div class="col"></div>
        </div>
    </main>
</body>

</html>
<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>