<?= $this->extend('Admin/Layouts') ?>
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
Daftar Buku
</div>
<div class="card-body">
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
  
    <?php
if (User()->level_id==1) {
   ?>
     <a href="<?=base_url('admin/buku/entry') ?>" class="btn btn-primary m-0"><i class="bi bi-plus"></i> Entry Baru</a>
   <?php
}
    ?>
    <a href="<?=base_url('print/buku') ?>" target="_blank" class="btn btn-dark m-0"><i class="bi bi-printer"></i> Cetak Laporan Buku</a>
<div class="table-responsive">
    <table class="table table-sm table-hover table-striped tabel">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode</th>
                <th>Judul</th>
                <th>Status</th>
                <th>Publish</th>
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
                <td class="p-1"><?=$b['is_publis']==1 ? '<span class="badge bg-success">Ditampilkan</span>': '<span class="badge bg-warning">Disembunyikan</span>' ?></td>
                <td class="p-1">
            <button onclick="SetPublis(<?=$b['id'] ?>)" type="submit" class="btn btn-<?=$b['is_publis']==1 ? 'warning': 'info' ?> btn-block btn-sm"><?=$b['is_publis']==NULL ? 'Tampilkan': 'Sembunyikan' ?></button>
           

                </td>
            
                <td class="p-1">
                    <a href="<?=$b['link_naskah'] ?>" class="btn btn-success btn-sm" target="_blank"> <i class="bi bi-cloud-arrow-up"></i> Lihat Naskah </a>
                    <button onclick="SetCover(<?=$b['id'] ?>)" class="btn btn-info btn-sm"> <i class="bi bi-images"></i> Cover </button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

</div>
</div>
</section>
<div class="viewmodal">

</div>
<script>
//     $('.form-setpublis').submit(function (e) { 
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
function SetPublis (id) {
    $.ajax({
            type: "POST",
            url: "<?=base_url('admin/buku/setpublik')?>",
            data: {id:id},
            dataType: "json",
            success: function (response) {
                
                window.location=response.link
            }
        });
  }


  function SetCover(id) {
    $.ajax({
            type: "POST",
            url: "<?=base_url('admin/buku/setcover')?>",
            data: {id:id},
            dataType: "json",
            success: function (response) {
                
                $('.viewmodal').html(response.view).show()
                $('#modal_cover').modal('show')
            }
        });
  }

</script>


<?=$this->endSection() ?>

