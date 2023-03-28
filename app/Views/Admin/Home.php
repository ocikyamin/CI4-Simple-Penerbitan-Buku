<?= $this->extend('Admin/Layouts') ?>
<?= $this->section('content') ?>
<div class="page-heading">
<h3>Home </h3>
</div>
<div class="row">
<div class="col-lg-3">
<div class="card shadow-sm">
<div class="card-body">
<div class="row">
<div class="col-lg-4">
<div class="stats-icon yellow">
<i class="bi bi-people"></i>
</div>
</div>
<div class="col-lg-8">
<h6 class="text-muted font-semibold">Anggota</h6>
<h6 class="font-extrabold mb-0"><?=Counts('tb_anggota')?></h6>
</div>
</div>
</div>
</div>
</div> 
<div class="col-lg-3">
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
<h6 class="font-extrabold mb-0"><?=Counts('tb_buku')?></h6>
</div>
</div>
</div>
</div>
</div>

<div class="col-lg-3">
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
<h6 class="font-extrabold mb-0"><?=Counts('tb_penerbitan')?></h6>
</div>
</div>
</div>
</div>
</div>


<div class="col-lg-3">
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
<h6 class="font-extrabold mb-0"><?=Counts('tb_pembayaran')?></h6>
</div>
</div>
</div>
</div>
</div>


</div>
<?=$this->endSection() ?>

