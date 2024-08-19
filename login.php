<?php
include "inc/koneksi.php";
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Sistem Informasi Manajemen UKM Pramuka Uniska</title>
    <link rel="icon" href="dist/img/pramuka.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7f6;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .login-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 360px;
            padding: 20px;
            text-align: center;
        }
        .login-header {
            margin-bottom: 20px;
        }
        .login-header h4 {
            margin: 0;
            color: #333;
            font-weight: 600;
        }
        .logo {
            width: 150px;
            margin-bottom: 20px;
        }
        .form-control {
            border-radius: 25px;
            border: 1px solid #ddd;
            padding: 10px 15px;
            font-size: 14px;
        }
        .btn-login {
            border-radius: 25px;
            padding: 10px;
            font-weight: 600;
            background-color: #4e73df;
            border: none;
            color: white;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s ease;
        }
        .btn-login:hover {
            background-color: #2e59d9;
        }
        .input-group-text {
            background-color: #f4f7f6;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
<div class="login-container">
    <div class="login-header">
        <img src="img/racana.png" alt="Logo" class="logo" width="150" height="150">
        <h4>LOGIN SIMPRASKA</h4>
    </div>

        <form action="" method="POST">
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                </div>
            </div>
            <div class="mb-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-login" name="btnLogin">Masuk</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php
    if (isset($_POST['btnLogin'])) {
        $username = mysqli_real_escape_string($koneksi, $_POST['username']);
        $password = mysqli_real_escape_string($koneksi, $_POST['password']);

        $sql_login = "SELECT * FROM tb_pengguna WHERE BINARY username='$username' AND password=md5('$password')";
        $query_login = mysqli_query($koneksi, $sql_login);
        $data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);
        $jumlah_login = mysqli_num_rows($query_login);

        if ($jumlah_login == 1) {
            $_SESSION["ses_id"] = $data_login["id_pengguna"];
            $_SESSION["ses_nama"] = $data_login["nama_lengkap"];
            $_SESSION["ses_username"] = $data_login["username"];
            $_SESSION["ses_status"] = $data_login["status"];

            echo "<script>
                Swal.fire({
                    title: 'Login Berhasil',
                    text: 'Selamat datang, " . $_SESSION["ses_nama"] . "!',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location = 'dashboard.php';
                });
            </script>";
        } else {
            echo "<script>
                Swal.fire({
                    title: 'Login Gagal',
                    text: 'Username atau password salah',
                    icon: 'error',
                    confirmButtonText: 'Coba Lagi'
                });
            </script>";
        }
    }
    ?>
</body>
</html>
