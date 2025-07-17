
<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

include 'config.php';

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"data_mahasiswa_" . date("Ymd_His") . ".xls\"");
header("Cache-Control: max-age=0");

echo "<table border='1'>";
echo "<thead>
        <tr>
            <th>No</th>
            <th>Nama Mahasiswa</th>
            <th>NIM</th>
            <th>Prodi</th>
            <th>Tahun Masuk</th>
            <th>No HP</th>
            <th>Alamat</th>
        </tr>
      </thead><tbody>";

$result = $conn->query("SELECT * FROM mahasiswa ORDER BY id DESC");
while ($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo "<td>" . htmlspecialchars($row['no']) . "</td>";
  echo "<td>" . htmlspecialchars($row['nama_mahasiswa']) . "</td>";
  echo "<td>" . htmlspecialchars($row['nim']) . "</td>";
  echo "<td>" . htmlspecialchars($row['prodi']) . "</td>";
  echo "<td>" . htmlspecialchars($row['tahun_masuk']) . "</td>";
  echo "<td>" . htmlspecialchars($row['no_handphone']) . "</td>";
  echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
  echo "</tr>";
}
echo "</tbody></table>";
exit;
?>

