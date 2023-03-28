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
<div class="card">

<div class="card-header">
<h4 class="card-title"><i class="bi bi-book"></i> List Pengajuan</h4>
<hr>
</div>
<div class="card-body">
    <?php
    
    // echo "<pre>";
    // print_r($baru);
    // echo "</pre>";
    ?>
    <!-- <a href="<?=base_url('anggota/penerbitan/entry') ?>" class="btn btn-primary m-0"><i class="bi bi-plus"></i> Buat Pengajuan Penerbitan</a> -->
<div class="table-responsive">
    <table class="table table-sm table-hover table-striped tabel">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode</th>
                <th>Tgl.Pengajuan</th>
                <th>Penulis</th>
                <th>Judul Buku</th>
                <th>Status</th>
                <th>
                    
                </th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i=1;
            foreach ($baru as $b) {?>
            <tr>
                <td class="p-1"><?=$i++ ?>.</td>
                <td class="p-1"><?=$b['kode_pengajuan'] ?></td>
                <td class="p-1"><?=date('d/m/Y', strtotime($b['tgl_pengajuan'])) ?></td>
                <td class="p-1"><?=$b['nama'] ?></td>
                 <td class="p-1"><?=$b['judul_buku'] ?></td>
                <td class="p-1">
                    <?php 
                    if ($b['status']==1) {
                        echo "<span class='badge bg-success'>Selesai</span>";
                    }elseif ($b['status']==2) {
                        echo "<span class='badge bg-danger'>Ditolak</span>";
                    }else{
                        echo "<span class='badge bg-warning'>Menunggu Pemeriksaan Naskah</span>";
                    }

                     ?>
                    
                    
                </td>
                <td class="p-1">
                <a href="<?=base_url('admin/penerbitan/detail/'.$b['id']) ?>" class="btn btn-primary m-0"><i class="bi bi-search"></i> Lihat Detail</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

</div>
</div>
</section>


<?=$this->endSection() ?>

