
<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

include 'config.php';

// Cek apakah parameter id ada
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

$id = intval($_GET['id']); // Amankan dari injeksi

// Jalankan query hapus
$query = $conn->prepare("DELETE FROM mahasiswa WHERE id = ?");
$query->bind_param("i", $id);

if ($query->execute()) {
  header("Location: index.php");
  exit;
} else {
  echo "Gagal menghapus data: " . $conn->error;
}
?>

