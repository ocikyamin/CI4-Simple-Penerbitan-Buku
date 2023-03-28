<?= $this->extend('Admin/Layouts') ?>
<?= $this->section('content') ?>
<div class="page-title mb-3">
<div class="row">
<div class="col-12 col-md-6 order-md-1 order-last">
<h3>Data Anggota</h3>
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
<div class="card">

<div class="card-header">
<h4 class="card-title"><i class="bi bi-credit-card"></i> List Anggota</h4>
<a href="<?=base_url('print/anggota') ?>" target="_blank" class="btn btn-dark m-0"><i class="bi bi-printer"></i> Cetak Laporan Penulis</a>
<hr>
</div>
<div class="card-body">
    
<div class="table-responsive">
    <table class="table table-sm table-hover table-striped tabel">
        <thead>
            <tr>
                <th>No.</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jk</th>
                <th>Email</th>
                <th><i class="bi bi-person"></i></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i=1;
            foreach ($list as $b) {?>
            <tr>
                <td class="p-1"><?=$i++ ?>.</td>
                <td class="p-1"><?=$b['nik'] ?></td>
                <td class="p-1"><?=$b['nama'] ?></td>
                <td class="p-1"><?=$b['jk'] ?></td>
                 <td class="p-1"><?=$b['email'] ?></td>
                <td class="p-1">
                <a href="<?=base_url('admin/anggota/detail/'.$b['id']) ?>" class="btn btn-success btn-sm m-0"><i class="bi bi-person"></i> Detail</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

</div>
</div>
</section>
<div class="viewmodal"></div>

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
</script>


<?=$this->endSection() ?>

