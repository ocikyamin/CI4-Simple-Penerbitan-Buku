<?= $this->extend('Anggota/Layouts') ?>
<?= $this->section('content') ?>
<div class="page-title mb-3">
<div class="row">
<div class="col-12 col-md-6 order-md-1 order-last">
<h3>Data Pembayaran</h3>
<!-- <p class="text-subtitle text-muted">The default layout </p> -->
</div>
<div class="col-12 col-md-6 order-md-2 order-first">
<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Pembayaran</li>
</ol>
</nav>
</div>
</div>
</div>
<section class="section">
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
<div class="row">
    
    <?php 
if (!empty($tagihan)) {?>
    <?php 
    foreach ($tagihan as $d) {?>
<div class="col-lg-4">
<div class="card shadow-sm">
<div class="card-header p-3">
<h4 class="card-title"><i class="bi bi-credit-card"></i> <?=$d['kode_pengajuan'] ?></h4>
</div>
<div class="card-body">
<h4 class="card-title">Jumlah Tagihan <br>
    <h2>IDR. 500.000,-</h2>
</h4>
Status Pembayaran <br>    
<?php
// status bayar 
if ($d['is_payment']==1) {
    echo "<span class='badge bg-success'>Telah dibayar</span>";
}else if ($d['is_payment']==2) {
    echo "<span class='badge bg-info'>Menunggu Konfirmasi Oleh admin</span>";
}else if ($d['is_payment']==3) {
    echo "<span class='badge bg-danger'>Bukti Pembayaran Ditolak</span>";
}else{
    echo "<span class='badge bg-warning'>Belum dibayar</span>";
} ?>

<?php 
if (empty(CekStatusBayar($d['id'])) || CekStatusBayar($d['id'])->stt_bukti==3) {?>
   
<?php } ?>
<a href="#" onclick="UploadPembayaran(<?=$d['id'] ?>)" class="btn btn-primary btn-sm btn-block shadow mt-3">Upload Bukti Pembayaran</a>
</div>
</div>

</div>
    <?php } ?>
<?php } ?>
</div>


</section>
<div class="viewmodal"></div>
<script>
    function UploadPembayaran(id) {
       $.ajax({
           url: '<?=base_url('anggota/pembayaran/upload')?>',
           type: 'GET',
           dataType: 'json',
           data: {id: id},
           success : function (response) {

            $('.viewmodal').html(response.view).show();
            $('#modal_buktibayar').modal('show');
        }
       })
       
    }
</script>


<?=$this->endSection() ?>

