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
		<small>Laporan Data Penerbitan</small></h3>
		<hr>

        <table width="100%" border="1" style="border-collapse:collapse" cellpadding="3">
        <tr>
                <th>No.</th>
                <th>Kode</th>
                <th>Tgl.Pengajuan</th>
                <th>Penulis</th>
                <th>Judul Buku</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i=1;
            foreach ($list as $b) {?>
            <tr>
                <td><?=$i++ ?>.</td>
                <td><?=$b['kode_pengajuan'] ?></td>
                <td><?=date('d/m/Y', strtotime($b['tgl_pengajuan'])) ?></td>
                <td><?=$b['nama'] ?></td>
                 <td><?=$b['judul_buku'] ?></td>
                <td>
                    <?php 
                    if ($b['status']==1) {
                        echo "<span class='badge bg-success'>Selesai</span>";
                    }elseif ($b['status']==2) {
                        echo "<span class='badge bg-danger'>Ditolak</span>";
                    }elseif ($b['status']==3) {
                        echo "<span class='badge bg-danger'>Menunggu Pembayaran</span>";
                    }else{
                        echo "<span class='badge bg-warning'>Menunggu Pemeriksaan Naskah</span>";
                    }

                     ?>
                    
                    
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

