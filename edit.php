<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}
include 'config.php';

if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

$id = $_GET['id'];
$query = $conn->query("SELECT * FROM mahasiswa WHERE id = $id");
$data = $query->fetch_assoc();

if (!$data) {
  echo "Data tidak ditemukan!";
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Edit Data Mahasiswa</title>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-image: url('assets/images/bg.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      height: 160vh;
    }

    /* Judul timbul biru muda */
    .judul-timbul {
      background-color: #e0f0ff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      border-radius: 0.5rem;
      padding: 0.5rem 1rem;
      color: #007bff;
      font-weight: bold;
    }

    /* Label form abu dan timbul */
    .form-label {
      color: #6c757d;
      font-weight: 500;
      text-shadow: 0.5px 0.5px 1px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>

<body>

  <?php include 'navbar.php'; ?>

  <div class="container mt-4 mb-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-sm">
          <div class="card-body">
            <div class="judul-timbul text-center mb-4">Edit Data Mahasiswa</div>

            <form action="update.php" method="POST">
              <input type="hidden" name="id" value="<?= $data['id'] ?>">

              <div class="mb-3">
                <label for="no" class="form-label">No</label>
                <input type="text" class="form-control" id="no" name="no" value="<?= htmlspecialchars($data['no']) ?>" required>
              </div>

              <div class="mb-3">
                <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" value="<?= htmlspecialchars($data['nama_mahasiswa']) ?>" required>
              </div>

              <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" value="<?= htmlspecialchars($data['nim']) ?>" required>
              </div>

              <div class="mb-3">
                <label for="prodi" class="form-label">Prodi</label>
                <input type="text" class="form-control" id="prodi" name="prodi" value="<?= htmlspecialchars($data['prodi']) ?>">
              </div>

              <div class="mb-3">
                <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                <input type="number" class="form-control" id="tahun_masuk" name="tahun_masuk" value="<?= htmlspecialchars($data['tahun_masuk']) ?>">
              </div>

              <div class="mb-3">
                <label for="no_handphone" class="form-label">No Handphone</label>
                <input type="text" class="form-control" id="no_handphone" name="no_handphone" value="<?= htmlspecialchars($data['no_handphone']) ?>">
              </div>

              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="2"><?= htmlspecialchars($data['alamat']) ?></textarea>
              </div>

              <div class="row">
                <div class="col-6 d-grid">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
                <div class="col-6 d-grid">
                  <a href="index.php" class="btn btn-secondary">Kembali</a>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include 'footer.php'; ?>
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
