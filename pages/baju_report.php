<?php

require_once '..\vendor\autoload.php';
include "../data/code.php";
$code = new Code();
$data_baju = $code->show();

$mpdf = new \Mpdf\Mpdf();
$html = '
<!DOCTYPE html>
<html lang="en">
<head>

  <title>Data Baju</title>
</head>
<body>
<h1 style="text-align:center">Data Baju</h1>
<table width="450px" border="1" cellspading="10" cellspacing="0">
    <tr>
        <th>No.</th>
        <th>Nama Baju</th>
        <th>Stock</th>
        <th>Harga(pcs)</th>
    </tr>';
    $no = 1;
    foreach ($data_baju as $row) {
    $html .= '<tr>
            <td>' . $no++ . '</td>
            <td width="50%">'. $row['nmbaju'] .'</td>
            <td width="50%">'. $row['stock'] .'</td>
            <td width="50%">'. $row['harga'] .'</td>
        </tr>';
    }

$html .='
</table>
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output('data-baju.pdf', \Mpdf\Output\Destination::INLINE);

?>
