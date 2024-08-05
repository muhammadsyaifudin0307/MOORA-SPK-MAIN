<?php

if (isset($_GET['aksi'])) {
  if ($_GET['aksi'] == 'login') {
    session_start();
    include "asset/conn/config.php";


    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM tbl_akun WHERE username = '$username' AND password = '$password'";
    $stm = $conn->query($query);
    $row = $stm->num_rows;

    if ($row > 0) {
      $data = $stm->fetch_assoc();
      $id_akun = $data['id_akun'];
      $_SESSION['id_akun'] = $id_akun;
      echo '<script>alert("Login berhasil!"); window.location.href = "admin/index.php";</script>';
    } else {
      header("location:index.php?pesan=gagal");
    }
  }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <title>MOORA</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="../asset/img/spk-icon.png" sizes="16x16" type="image/png">

  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

  <link rel="stylesheet" href="asset/login/css/style.css" />
</head>

<body>
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center"></div>
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
          <div class="login-wrap p-4 p-md-5">
            <div class="icon d-flex align-items-center justify-content-center">
              <span class="fa fa-user-o"></span>
            </div>
            <h3 class="text-center mb-4">Login</h3>
            <form action="index.php?aksi=login" method="post" class="login-form">
              <?php
              if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == 'gagal') {
                  echo "<div class= 'alert alert-danger'><span class= 'fa fa-times'></span>Login Gagal!!! </div>";
                }
              }
              ?>
              <div class="form-group">
                <input type="text" class="form-control rounded-left" placeholder="Username" name="username" />
              </div>
              <div class="form-group d-flex">
                <input type="password" class="form-control rounded-left" placeholder="Password" name="password" />
              </div>
              <div class="form-group d-md-flex">
                <div class="w-50">
                  <label class="checkbox-wrap checkbox-primary">Remember Me
                    <input type="checkbox" checked />
                    <span class="checkmark"></span>
                  </label>
                </div>
                <div class="w-50 text-md-right">
                  <a href="#">Forgot Password</a>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary rounded submit p-3 px-5">
                  Login
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>