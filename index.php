<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}
include 'config.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Data Mahasiswa</title>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-image: url('assets/images/bg.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      min-height: 100vh;
    }

    .judul-timbul {
      background-color: #e0f0ff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      border-radius: 0.5rem;
      padding: 0.5rem 1rem;
      color: #007bff;
      font-weight: bold;
      font-size: 1.25rem;
    }

    .scrollable-container {
      overflow-x: auto;
      overflow-y: auto;
      max-height: 400px;
    }

    table thead th {
      position: sticky;
      top: 0;
      background-color: #f8f9fa;
      z-index: 1;
    }

    table {
      min-width: 1500px;
    }

    .footer {
      margin-top: 2rem;
      font-size: 1rem;
      color: #fff;
    }
  </style>
</head>

<body>

  <?php include 'navbar.php'; ?>

  <div class="container-lg mt-4 mb-5">

    <!-- Judul & Tombol -->
    <div class="d-flex justify-content-between align-items-center mb-3">
      <div class="judul-timbul">Data Mahasiswa</div>
      <div class="d-flex gap-2">
        <a href="form_input.php" class="btn btn-primary btn-sm">+ Tambah Data</a>
        <a href="export_excel.php" class="btn btn-success btn-sm">Export Excel</a>
        <a href="export_pdf.php" class="btn btn-danger btn-sm">Export PDF</a>
      </div>
    </div>

    <!-- Form Pencarian -->
    <form class="d-flex mb-3" method="GET" action="">
      <input type="text" name="keyword" class="form-control me-2" placeholder="Cari nama mahasiswa..." value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>">
      <button type="submit" class="btn btn-outline-primary btn-sm">Cari</button>
    </form>

    <?php
    $keyword = isset($_GET['keyword']) ? $conn->real_escape_string($_GET['keyword']) : '';
    $query = "SELECT * FROM mahasiswa";
    if (!empty($keyword)) {
      $query .= " WHERE nama_mahasiswa LIKE '%$keyword%'";
    }
    $query .= " ORDER BY id DESC";
    $result = $conn->query($query);
    ?>

    <?php if (!empty($keyword)) : ?>
      <div class="mb-3 text-muted">
        Hasil pencarian untuk: <strong><?= htmlspecialchars($keyword) ?></strong>
      </div>
    <?php endif; ?>

    <!-- Tabel Data -->
    <div class="scrollable-container border rounded shadow-sm">
      <table class="table table-striped table-bordered table-light text-center align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th style="width:5%;">No</th>
            <th style="width:20%;">Nama Mahasiswa</th>
            <th style="width:15%;">NIM</th>
            <th style="width:20%;">Prodi</th>
            <th style="width:10%;">Tahun Masuk</th>
            <th style="width:15%;">No HP</th>
            <th style="width:40%;">Alamat</th>
            <th style="width:15%;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($result->num_rows > 0) : ?>
            <?php while ($row = $result->fetch_assoc()) : ?>
              <tr>
                <td><?= htmlspecialchars($row['no']) ?></td>
                <td><?= htmlspecialchars($row['nama_mahasiswa']) ?></td>
                <td><?= htmlspecialchars($row['nim']) ?></td>
                <td><?= htmlspecialchars($row['prodi']) ?></td>
                <td><?= htmlspecialchars($row['tahun_masuk']) ?></td>
                <td><?= htmlspecialchars($row['no_handphone']) ?></td>
                <td><?= htmlspecialchars($row['alamat']) ?></td>
                <td>
                  <div class="d-flex gap-1 justify-content-center">
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                  </div>
                </td>
              </tr>
            <?php endwhile; ?>
          <?php else : ?>
            <tr>
              <td colspan="8" class="text-muted">Belum ada data</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

  <footer class="footer text-center">
    &copy; <?= date('Y') ?> - Aplikasi Data Mahasiswa
  </footer>

  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
