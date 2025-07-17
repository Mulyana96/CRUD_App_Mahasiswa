<?php
session_start();
include 'config.php';

if (isset($_SESSION['login'])) {
  header("Location: dashboard.php");
  exit();
}

$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  $query = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
  $query->bind_param("ss", $username, $password);
  $query->execute();
  $result = $query->get_result();

  if ($result->num_rows === 1) {
    $_SESSION['login'] = true;
    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
    exit();
  } else {
    $error = "Username atau password salah!";
  }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-image: url('assets/images/bg.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
    }

    .login-container {
      background-color: rgba(255, 255, 255, 0.95);
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
      max-width: 360px;
      width: 100%;
    }

    .footer {
      margin-top: 1rem;
      font-size: 1.0rem;
      color: #ffffff;
    }
  </style>
</head>

<body>

  <div class="login-container text-center">
    <img src="assets/images/logo.png" alt="Logo" width="80">
    <h5 class="mb-4 text-primary">Login Aplikasi</h5>

    <?php if ($error): ?>
      <div class="alert alert-danger py-1"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
      <div class="mb-3 text-start">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" required>
      </div>
      <div class="mb-3 text-start">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" required>
      </div>
      <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </form>
  </div>

  <div class="footer text-center">
    &copy; <?= date('Y') ?> - Aplikasi Data Mahasiswa
  </div>

  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
