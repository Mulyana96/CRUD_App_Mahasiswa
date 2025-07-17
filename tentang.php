<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Tentang Aplikasi</title>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background-image: url('assets/images/bg.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      height: 160vh;
    }

    .judul-timbul {
      background-color: #e0f0ff;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      border-radius: 0.5rem;
      padding: 0.75rem 1rem;
      color: #007bff;
      font-weight: bold;
      text-align: center;
    }

    .kartu-deskripsi {
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      background-color: #ffffff;
      border-radius: 0.75rem;
      padding: 1.25rem;
      color: #6c757d;
      opacity: 0;
      transform: translateY(20px);
      animation: fadeInUp 0.8s ease-out forwards;
      animation-delay: 0.2s;
    }

    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .kartu-deskripsi p {
      text-align: justify;
      margin-bottom: 1rem;
    }

    .kartu-deskripsi ul {
      padding-left: 1.2rem;
      margin-bottom: 0;
    }

    @media (min-width: 480px) {
      .container-mini {
        max-width: 460px;
      }
    }
  </style>
</head>

<body>

  <?php include 'navbar.php'; ?>

  <div class="container container-mini mt-4 mb-5">
    <div class="judul-timbul mb-4">Tentang Aplikasi</div>

    <div class="kartu-deskripsi">
      <p>
        Aplikasi ini digunakan untuk menyimpan dan mengelola data mahasiswa,
        dilengkapi dengan fitur CRUD (Create, Read, Update, Delete),
        ekspor ke PDF & Excel, serta sistem login/logout yang aman dan sederhana.
      </p>

      <p><strong>Teknologi Digunakan:</strong></p>
      <ul>
        <li>PHP 8.3.6</li>
        <li>XAMPP 8.2.12</li>
        <li>Bootstrap 5</li>
        <li>Tailwind CSS</li>
        <li>JavaScript</li>
        <li>MySQL</li>
      </ul>

      <p><strong>Developer</strong></p>
      <p>Mul Yana</p>

      <!-- Logo Media Sosial -->
      <div class="social-icons">
        <a href="https://www.youtube.com/@gameteknospot" target="_blank"><i class="fab fa-youtube"></i></a>
        <a href="https://github.com/Mulyana96" target="_blank"><i class="fab fa-github"></i></a>
        <a href="https://www.linkedin.com/in/mul-yana-597767251/" target="_blank"><i class="fab fa-linkedin"></i></a>
      </div>

      <p><strong>Fitur Utama:</strong></p>
      <ul>
        <li>Input data mahasiswa</li>
        <li>Edit & hapus data (CRUD)</li>
        <li>Ekspor ke Excel dan PDF</li>
        <li>Desain menarik & responsif</li>
        <li>Login dan logout</li>
      </ul>
    </div>
    <!-- Tombol simpan dan kembali horizontal -->
    <div class="row justify-content-center">
      <div class="col-6 d-grid">
        <a href="index.php" class="btn btn-primary">Kembali</a>
      </div>
    </div>
  </div>
  <?php include 'footer.php'; ?>
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
