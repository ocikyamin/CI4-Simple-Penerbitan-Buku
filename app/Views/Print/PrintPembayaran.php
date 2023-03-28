

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Print Anggota </title>
<style>
body{
font-family: arial;
}
</style>
</head>
<body>
<center>
<h3><b>CV. Genzo Media Pustaka</b> <br>
<small>Laporan Data Pembayaran</small></h3>
<hr>

<table width="100%" border="1" style="border-collapse:collapse" cellpadding="3">
<thead>
<tr>
<th>No.</th>
<th>Wkt.Transaksi</th>
<th>Norek</th>
<th>Bank</th>
<th>Pengirim</th>
<th>Jumlah</th>
<th>Status</th>
</tr>
</thead>
<tbody>
<?php 
$i=1;
foreach ($list as $b) {?>
<tr>
<td><?=$i++ ?>.</td>
<td><?=$b['wkt_bayar'] ?></td>
<td><?=$b['norek'] ?></td>
<td><?=$b['bank'] ?></td>
<td><?=$b['nm_penyetor'] ?></td>
<td><?='IDR. '.number_format($b['jml_transfer']) ?></td>
<td>
<?php
// status bayar 
if ($b['stt_bukti']==1) {
    echo "<span class='badge bg-success'>Diterima</span>";
}else if ($b['stt_bukti']==2) {
    echo "<span class='badge bg-danger'> Ditolak</span>";
}else{
    echo "<span class='badge bg-info'>Menunggu Konfirmasi</span>";
} ?>
</td>
</tr>
<?php } ?>
</tbody>
</table>


<script>
window.print()
</script>

</body>
</html>

