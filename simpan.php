
<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $no = $_POST['no'];
  $nama = $_POST['nama_mahasiswa'];
  $nim = $_POST['nim'];
  $prodi = $_POST['prodi'];
  $tahun = $_POST['tahun_masuk'];
  $hp = $_POST['no_handphone'];
  $alamat = $_POST['alamat'];

  $sql = "INSERT INTO mahasiswa (no, nama_mahasiswa, nim, prodi, tahun_masuk, no_handphone, alamat)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssssiss", $no, $nama, $nim, $prodi, $tahun, $hp, $alamat);

  if ($stmt->execute()) {
    echo "<script>
            alert('Data berhasil disimpan!');
            window.location='index.php';
        </script>";
    exit;
  } else {
    echo "Gagal menyimpan data: " . $conn->error;
  }
}
?>

