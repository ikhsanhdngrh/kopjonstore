<?php

require_once '..\vendor\autoload.php';
include "../data/code.php";
$code = new Code();
$data_baju_masuk = $code->show_baju_msk();

$mpdf = new \Mpdf\Mpdf();
$html = '
<!DOCTYPE html>
<html lang="en">
<head>

  <title>Data Masuk Stock Baju</title>
</head>
<body>
<h1 style="text-align:center">Data Masuk Stock Baju</h1>
<table width="300px" border="1" cellspading="10" cellspacing="0">
    <tr>
        <th>No.</th>
        <th>Tanggal</th>
        <th>Nama Baju</th>
        <th>Jumlah</th>
        <th>Harga(pcs)</th>
        <th>Keterangan</th>
    </tr>';
    $no = 1;
    foreach ($data_baju_masuk as $row) {
    $html .= '<tr>
            <td>' . $no++ . '</td>
            <td width="50%">'. $row['tgl'] .'</td>
            <td width="50%">'. $row['nmbaju'] .'</td>
            <td width="50%">'. $row['jumlah'] .'</td>
            <td width="50%">'. $row['harga'] .'</td>
            <td width="50%">'. $row['ket'] .'</td>
        </tr>';
    }

$html .='
</table>
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output('data-masuk-stock-baju.pdf', \Mpdf\Output\Destination::INLINE);

?>
