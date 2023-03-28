<?= $this->extend('Anggota/Layouts') ?>
<?= $this->section('content') ?>
<div class="page-heading">
<h3>Home </h3>
</div>
<div class="row">

<div class="col-6 col-lg-4 col-md-6">
<div class="card shadow-sm">
<div class="card-body">
<div class="row">
<div class="col-lg-4">
<div class="stats-icon blue">
<i class="bi bi-book"></i>
</div>
</div>
<div class="col-lg-8">
<h6 class="text-muted font-semibold">Buku</h6>
<h6 class="font-extrabold mb-0"><a href="<?=base_url('anggota/buku')?>">Lihat</a></h6>
</div>
</div>
</div>
</div>
</div>

<div class="col-6 col-lg-4 col-md-6">
<div class="card shadow-sm">
<div class="card-body">
<div class="row">
<div class="col-lg-4">
<div class="stats-icon red">
<i class="bi bi-book"></i>
</div>
</div>
<div class="col-lg-8">
<h6 class="text-muted font-semibold">Penerbitan</h6>
<h6 class="font-extrabold mb-0"><a href="<?=base_url('anggota/penerbitan')?>">Lihat</a></h6>
</div>
</div>
</div>
</div>
</div>


<div class="col-6 col-lg-4 col-md-6">
<div class="card shadow-sm">
<div class="card-body">
<div class="row">
<div class="col-lg-4">
<div class="stats-icon purple">
<i class="bi bi-credit-card"></i>
</div>
</div>
<div class="col-lg-8">
<h6 class="text-muted font-semibold">Pembayaran</h6>
<h6 class="font-extrabold mb-0"><a href="<?=base_url('anggota/pembayaran')?>">Lihat</a></h6>
</div>
</div>
</div>
</div>
</div>


</div>
<?=$this->endSection() ?>

