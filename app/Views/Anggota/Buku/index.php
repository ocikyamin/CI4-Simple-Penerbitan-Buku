<?= $this->extend('Anggota/Layouts') ?>
<?= $this->section('content') ?>
<div class="page-title mb-3">
<div class="row">
<div class="col-12 col-md-6 order-md-1 order-last">
<h3>Data Buku</h3>
<!-- <p class="text-subtitle text-muted">The default layout </p> -->
</div>
<div class="col-12 col-md-6 order-md-2 order-first">
<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Buku</li>
</ol>
</nav>
</div>
</div>
</div>
<section class="section">
<div class="card">

<div class="card-header">
<h4 class="card-title"><i class="bi bi-book"></i> List Buku Saya</h4>
<hr>
</div>
<div class="card-body">
    <a href="<?=base_url('anggota/buku/entry') ?>" class="btn btn-primary m-0"><i class="bi bi-plus"></i> Entry Baru</a>
<div class="table-responsive">
    <table class="table table-sm table-hover table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode</th>
                <th>Judul</th>
                <!-- <th>Kategori</th> -->
                <th>Naskah</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i=1;
            foreach ($buku as $b) {?>
            <tr>
                <td class="p-1"><?=$i++ ?>.</td>
                <td class="p-1"><?=$b['kode_buku'] ?></td>
                <td class="p-1"><?=$b['judul_buku'] ?></td>
                <td class="p-1"><a href="<?=$b['link_naskah'] ?>" class="btn btn-success btn-sm"> <i class="bi bi-cloud-arrow-up"></i> Lihat Naskah </a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

</div>
</div>
</section>


<?=$this->endSection() ?>

