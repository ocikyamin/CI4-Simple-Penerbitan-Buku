<?= $this->extend('Admin/Layouts') ?>
<?= $this->section('content') ?>
<div class="page-title mb-3">
<div class="row">
<div class="col-12 col-md-6 order-md-1 order-last">
<h3>Info Anggota</h3>
</div>
<div class="col-12 col-md-6 order-md-2 order-first">
<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Anggota</li>
</ol>
</nav>
</div>
</div>
</div>
<section class="section">

<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-body p-1">
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
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <p>
            <?php 
            if($data['is_active']==1){
                echo "<div class='alert alert-success'>
                <h4 class='alert-heading'>Active</h4>
                <p>Terdaftar Pada  <br> ".date('d/m/Y H:i:s', strtotime($data['created_at']))."</p>
            </div>";
            }
            
            ?>
           
        </p>
    <a href="<?=base_url('/print/anggota/'.$data['id'])?>" target="_blank" class="btn btn-lg btn-dark btn-block shadow-sm"><i class="bi bi-printer"></i> Cetak</a>
    </div>
    <div class="col-lg-12">
        <div class="card shadow-sm">
            <div class="card-body p-0">
            <h4 class="card-title m-3"><i class="bi bi-book"></i> Informasi Penerbitan</h4>
            <hr>
            <div class="table-responsive">
            <table class="table table-sm table-hover table-light p-0 tabel">
                <thead>
                <tr>
                <th>No.</th>
                <th>Tgl</th>
                <th>Kode Pengajuan</th>
                <th>Buku</th>
                <th>Status</th>
                <th>Pembayaran</th>
                <th></th>
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
<td class="p-1">
<a href="<?=base_url('admin/penerbitan/detail/'.$d['id']) ?>" class="btn btn-primary btn-sm m-0"><i class="bi bi-search"></i> Lihat Detail</a>
</td>
                </tr>
                <?php }?>
            </tbody>
              
            </table>
            </div>
            </div>
        </div>
    </div>
</div>
</section>




<?=$this->endSection() ?>

