
<?php
$host = 'localhost';
$user = 'root';
$pass = ''; // kosongkan jika default XAMPP
$db   = 'mahasiswa_db';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}
?>

