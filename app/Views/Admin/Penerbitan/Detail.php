<?= $this->extend('Admin/Layouts') ?>
<?= $this->section('content') ?>
<div class="page-title mb-3">
<div class="row">
<div class="col-12 col-md-6 order-md-1 order-last">
<h3>Data Penerbitan</h3>
<p class="text-subtitle text-muted">Pengajuan Penerbitan </p>
</div>
<div class="col-12 col-md-6 order-md-2 order-first">
<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Penerbitan</li>
</ol>
</nav>
</div>
</div>
</div>
<section class="section">

<div class="row">
    <div class="col-lg-5">
        <div class="card shadow">
            <div class="card-body">
            <h4 class="card-title"><i class="bi bi-list"></i> Status Penerbitan</h4>
            <hr>
            <p>
            <?php 
                    if ($data['status']==1) {
                        echo "<div class='alert alert-success'>Selesai</div>";
                    }elseif ($data['status']==2) {
                        echo "<div class='alert alert-danger'>Ditolak</div>";
                    }elseif ($data['status']==3) {
                        echo "<div class='alert alert-info'>Menunggu Keputusan Admin</div>";
                    }else{
                        echo "<div class='alert alert-warning'>Menunggu Pemeriksaan Naskah</div>";
                    }

                     ?>
</p>
            <h4 class="card-title"><i class="bi bi-bookmark"></i> Informasi Pengajuan</h4>
            <hr>
            <table>
                <tr>
                    <td>Kode Pengajuan</td>
                    <td>:</td>
                    <td><?=$data['kode_pengajuan']?></td>
                </tr>
                <tr>
                    <td>Tanggal Pengajuan</td>
                    <td>:</td>
                    <td><?=$data['tgl_pengajuan']?></td>
                </tr>
            </table>

            <h4 class="card-title mt-3"><i class="bi bi-book"></i> Informasi Buku</h4>
            <hr>
            <table>
                <tr>
                    <td>Kode Buku</td>
                    <td>:</td>
                    <td><?=$data['kode_buku']?></td>
                </tr>
                <tr>
                    <td>Judul</td>
                    <td>:</td>
                    <td><?=$data['judul_buku']?></td>
                </tr>
                <tr>
                    <td>Penulis</td>
                    <td>:</td>
                    <td><?=$data['nama']?></td>
                </tr>
                <tr>
                    <td>Tahun Terbit</td>
                    <td>:</td>
                    <td><?=$data['tahun_terbit']?></td>
                </tr>
                <tr>
                    <td>Jenis Buku</td>
                    <td>:</td>
                    <td><?=$data['jenis']?></td>
                </tr>
            </table>
            <p>
                <a href="<?=$data['link_naskah']?>" target="_blank" class="btn btn-success btn-block mt-3">Lihat Naskah</a>
            </p>
            
            </div>
        </div>
    </div>


    <div class="col-lg-7">
    <?php
if(session()->getFlashData('sukses')){
?>
<div class="alert alert-success" role="alert">
<?= session()->getFlashData('sukses') ?>
</button>
</div>
<?php
}
?>
        <div class="card shadow">
            <div class="card-body">
            <h4 class="card-title"><i class="bi bi-person"></i> Identitas Penulis</h4>
            <hr>
            <table>
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td><?=$data['nik']?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?=$data['nama']?></td>
                </tr>
                <tr>
                    <td>Tempat & Tgl Lahir</td>
                    <td>:</td>
                    <td><?=$data['tmp_lahir']?>, <?=date('d-m-Y', strtotime($data['tgl_lahir']))?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?=$data['jk']?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><?=$data['email']?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?=$data['alamat']?></td>
                </tr>
            </table>
            <h4 class="card-title mt-3"><i class="bi bi-credit-card"></i> Informasi Pembayaran</h4>
            <hr>
            <table>
                <tr>
                    <td>Status Pembayaran</td>
                    <td>:</td>
                    <td><?php
// status bayar 
if ($data['is_payment']==1) {
    echo "<span class='badge bg-success'>Telah dibayar</span>";
}else if ($data['is_payment']==2) {
    echo "<span class='badge bg-info'>Menunggu Konfirmasi Oleh admin</span>";
}else if ($data['is_payment']==3) {
    echo "<span class='badge bg-danger'>Bukti Pembayaran Ditolak</span>";
}else{
    echo "<span class='badge bg-warning'>Belum dibayar</span>";
} ?></td>
                </tr>
                <tr>
                    <td>Bukti Pembayaran</td>
                    <td>:</td>
                    <td></td>
                </tr>
            </table>
    
            <p>
                <table width="100%">
                    <tr>
                        <td></td>
                        <td>Wk.Transaksi</td>
                        <td>Jumlah</td>
                    </tr>
                <?php
                foreach ($pay as $p){?>
                    <tr>
                    <td><a href="<?=base_url('admin/penerbitan/pembayaran/hapus/'.$p['id'])?>" onclick="return confirm('Apakah Yakin akan menghapus Data ?')" class="btn btn-danger btn-sm m-0 <?=$p['stt_bukti'] !=1 ? null: 'd-none' ?>"><i class="bi bi-trash"></i></a></td>
                        <td><?=$p['wkt_bayar']?></td>
                        <td><?='IDR. '. number_format($p['jml_transfer'])?></td>
                        <td><?php
// status bayar 
if ($p['stt_bukti']==1) {
    echo "<span class='badge bg-success'>Diterima</span>";
}else if ($p['stt_bukti']==2) {
    echo "<span class='badge bg-danger'> Ditolak</span>";
}else{
    echo "<span class='badge bg-info'>Menunggu Konfirmasi</span>";
} ?></td>
                        <td><a href="#" onclick="LihatPembayaran(<?=$p['id']?>)" class="btn btn-success btn-sm m-0">Lihat</a></td>
                    </tr>
                    <?php }?>
                </table>
            
            </p>
            <br>
            <p class="mt-3">
            <h4 class="card-title mt-3"><i class="bi bi-globe"></i> Status Publish : <?=$data['is_publis']==1 ? '<span class="badge bg-success">Ditampilkan</span>': '<span class="badge bg-warning">Disembunyikan</span>' ?></h4>

<div class="viewmodal"></div>
</section>
<script>
    function LihatPembayaran(id) {
        $.ajax({
            type: "GET",
            url: "<?=base_url('admin/penerbitan/pembayaran')?>",
            data: {id:id},
            dataType: "json",
            success: function (response) {
                $('.viewmodal').html(response.view).show()
                $('#modal_lihat_pembayaran').modal('show')
            }
        });
      }


// $('#form-setpublis').submit(function (e) { 
//     e.preventDefault();
//         $.ajax({
//             type: "POST",
//             url: "<?=base_url('admin/buku/setpublik')?>",
//             data: $(this).serialize(),
//             dataType: "json",
//             success: function (response) {
                
//                 window.location=response.link
//             }
//         });
    
// });


</script>

<?=$this->endSection() ?>

