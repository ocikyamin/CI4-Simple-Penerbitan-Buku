

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
                <th>NIK</th>
                <th>Nama</th>
                <th>Jk</th>
                <th>Email</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i=1;
            foreach ($list as $b) {?>
            <tr>
                <td><?=$i++ ?>.</td>
                <td><?=$b['nik'] ?></td>
                <td><?=$b['nama'] ?></td>
                <td><?=$b['jk'] ?></td>
                 <td><?=$b['email'] ?></td>
                 <td><?=$b['alamat'] ?></td>
            </tr>
        <?php } ?>
</tbody>
</table>


<script>
window.print()
</script>

</body>
</html>

