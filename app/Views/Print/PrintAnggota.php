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
		<small></small></h3>
		<hr>

</center>
<h4 class="card-title m-3"><i class="bi bi-person"></i> Informasi Anggota / Penulis</h4>
<hr>
<table class="table table-sm">
<tr>
<td class="p-1">NIK</td>
<td class="p-1">:</td>
<td class="p-1"><?=$data['nik']?></td>
</tr>
<tr>
<td class="p-1">Nama</td>
<td class="p-1">:</td>
<td class="p-1"><?=$data['nama']?></td>
</tr>
<tr>
<td class="p-1">Tempat & Tgl Lahir</td>
<td class="p-1">:</td>
<td class="p-1"><?=$data['tmp_lahir']?>, <?=date('d-m-Y', strtotime($data['tgl_lahir']))?></td>
</tr>
<tr>
<td class="p-1">Jenis Kelamin</td>
<td class="p-1">:</td>
<td class="p-1"><?=$data['jk']?></td>
</tr>
<tr>
<td class="p-1">Email</td>
<td class="p-1">:</td>
<td class="p-1"><?=$data['email']?></td>
</tr>
<tr>
<td class="p-1">Alamat</td>
<td class="p-1">:</td>
<td class="p-1"><?=$data['alamat']?></td>
</tr>
</table>

<h4 class="card-title m-3"><i class="bi bi-book"></i> Informasi Penerbitan</h4>
<hr>

<table width="100%" border="1" style="border-collapse:collapse" cellpadding="3">
<thead>
<tr>
<th>No.</th>
<th>Tgl</th>
<th>Kode Pengajuan</th>
<th>Buku</th>
<th>Status</th>
<th>Pembayaran</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
foreach ($penerbitan as $d ){ ?>
<tr>
<td class="p-1"><?=$i++?>.</td>
<td class="p-1"><?=$d['tgl_pengajuan']?></td>
<td class="p-1"><?=$d['kode_pengajuan']?></td>
<td class="p-1"><?=$d['judul_buku']?></td>
<td class="p-1"> <?php 
if ($d['status']==1) {
echo "<span class='badge bg-success'>Selesai</span>";
}elseif ($d['status']==2) {
echo "<span class='badge bg-danger'>Ditolak</span>";
}elseif ($d['status']==3) {
echo "<span class='badge bg-danger'>Menunggu Pembayaran</span>";
}else{
echo "<span class='badge bg-warning'>Menunggu Pemeriksaan Naskah</span>";
}

?></td>
<td class="p-1"><?php
// status bayar 
if ($d['is_payment']==1) {
echo "<span class='badge bg-success'>Telah dibayar</span>";
}else if ($d['is_payment']==2) {
echo "<span class='badge bg-info'>Menunggu Konfirmasi Oleh admin</span>";
}else if ($d['is_payment']==3) {
echo "<span class='badge bg-danger'>Bukti Pembayaran Ditolak</span>";
}else{
echo "<span class='badge bg-warning'>Belum dibayar</span>";
} ?></td>

</tr>
<?php }?>
</tbody>

</table>


<script>
    window.print()
</script>

</body>
</html>