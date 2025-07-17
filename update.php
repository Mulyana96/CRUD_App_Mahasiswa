
<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['id'];
  $no = $_POST['no'];
  $nama = $_POST['nama_mahasiswa'];
  $nim = $_POST['nim'];
  $prodi = $_POST['prodi'];
  $tahun = $_POST['tahun_masuk'];
  $hp = $_POST['no_handphone'];
  $alamat = $_POST['alamat'];

  $sql = "UPDATE mahasiswa SET no=?, nama_mahasiswa=?, nim=?, prodi=?, tahun_masuk=?, no_handphone=?, alamat=? WHERE id=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssssissi", $no, $nama, $nim, $prodi, $tahun, $hp, $alamat, $id);

  if ($stmt->execute()) {
    echo "<script>
            alert('Data berhasil diupdate!');
            window.location='index.php';
        </script>";
  } else {
    echo "Gagal mengupdate data: " . $conn->error;
  }
}
?>

