<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-image: url('assets/images/bg.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      height: 100vh;
    }

    .dashboard-box {
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 10px;
      padding: 2rem;
      margin-top: 5%;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .footer {
      margin-top: 1rem;
      font-size: 1.0rem;
      color: #ffffff;
    }
  </style>
</head>

<body>
  <?php include 'navbar.php'; ?>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="dashboard-box text-center">
          <h3 class="text-primary">Hello! Selamat Datang</h3>
          <p class="text-secondary">
            Di Aplikasi Data_Mahasiswa<strong><?= htmlspecialchars($_SESSION['Mahasiswa']) ?></strong>
          </p>
          <a href="index.php" class="btn btn-success mt-3">Lanjut ke Data Mahasiswa</a>
        </div>
      </div>
    </div>
  </div>

  <div class="footer text-center">
    &copy; <?= date('Y') ?> - Aplikasi Data Mahasiswa
  </div>

  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
