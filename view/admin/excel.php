<?php
  require_once("../../models/freelanceModel.php");

  $query = "SELECT * FROM pembayaran INNER JOIN pekerjaan_request ON pembayaran.id_pekerjaan = pekerjaan_request.id_pekerjaan";
  $result = mysqli_query($conn, $query);
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename = report-penghasilan.xls");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Report Penghasilan</h2>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Pemasukan</th>
        </tr>
        <?php 
            $count = 1;
            foreach($result as $row):
        ?>
        <tr>
            <td><?= $count ?></td>
            <td><?= $row['tanggal'] ?></td>
            <td><?= $row['status'] ?></td>
            <td><?= $row['harga']*10/100 ?></td>
        </tr>
        <?php
            $count++; 
            endforeach;
        ?>
    </table>
</body>
</html>