
<?php
require 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

include 'config.php';

$dompdf = new Dompdf();
$html = '<h3 style="text-align:center;">Data Mahasiswa</h3>';
$html .= '<table border="1" cellpadding="5" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Mahasiswa</th>
      <th>NIM</th>
      <th>Prodi</th>
      <th>Tahun Masuk</th>
      <th>No HP</th>
      <th>Alamat</th>
    </tr>
  </thead>
  <tbody>';

$result = $conn->query("SELECT * FROM mahasiswa ORDER BY id DESC");
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $html .= "<tr>
      <td>{$row['no']}</td>
      <td>{$row['nama_mahasiswa']}</td>
      <td>{$row['nim']}</td>
      <td>{$row['prodi']}</td>
      <td>{$row['tahun_masuk']}</td>
      <td>{$row['no_handphone']}</td>
      <td>{$row['alamat']}</td>
    </tr>";
  }
} else {
  $html .= '<tr><td colspan="7">Belum ada data</td></tr>';
}

$html .= '</tbody></table>';

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("data_mahasiswa.pdf", array("Attachment" => 1)); // paksa download
?>

