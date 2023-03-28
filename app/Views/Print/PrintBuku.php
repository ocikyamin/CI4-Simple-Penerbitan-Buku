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
		<small>Laporan Data Buku</small></h3>
		<hr>

        <table width="100%" border="1" style="border-collapse:collapse" cellpadding="3">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode</th>
                <th>Judul</th>
                <th>Jenis</th>
                <th>Penulis</th>
                <th>Tahun Terbit</th>
                
            </tr>
        </thead>
        <tbody>
            <?php 
            $i=1;
            foreach ($buku as $b) {?>
            <tr>
                <td><?=$i++ ?>.</td>
                <td><?=$b['kode_buku'] ?></td>
                <td><?=$b['judul_buku'] ?></td>
                <td><?=$b['jenis'] ?></td>
                <td><?=$b['nama'] ?></td>
                <td><?=$b['tahun_terbit'] ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>


    <script>
    window.print()
</script>

</body>
</html>

