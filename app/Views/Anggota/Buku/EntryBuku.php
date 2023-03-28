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
<h4 class="card-title">Entry Buku</h4>
<hr>
</div>
<div class="card-body">
<form id="form-buku" method="post">
<?=csrf_field() ?>
<input type="hidden" name="penulis" value="<?=Anggota()->id ?> ">
<div class="form-group row">
<label class="col-lg-3">Kode Buku</label>
<div class="col-lg-4 ">
<input type="text" name="kode_buku" class="form-control" readonly value="<?='B-'.time() ?>">
</div>
</div>
<div class="form-group row">
<label class="col-lg-3">Judul Buku</label>
<div class="col-lg-9">
<input type="text" name="judul_buku" id="judul_buku" class="form-control" placeholder="Tuliskan Judul Buku">
<div class="judul_buku invalid-feedback"></div>
</div>
</div>

<div class="form-group row">
<label class="col-lg-3">Penulis</label>
<div class="col-lg-4">
<input type="text" value="<?=Anggota()->nama ?>" class="form-control" readonly>
</div>
</div>

<div class="form-group row">
<label class="col-lg-3">Jenis Buku</label>
<div class="col-lg-4">
<select name="jenis_buku" id="jenis_buku" class="form-control">
<option>Pilih Jenis Buku</option>                                        
<?php 
foreach (Master('tb_jenis_buku') as $d) {
echo "<option value=".$d['id'].">".$d['jenis']."</option>";
}

?>
</select>
<div class="jenis_buku invalid-feedback"></div>
</div>
</div>
<div class="form-group row">
<label class="col-lg-3">Tahun Terbit</label>
<div class="col-lg-4">
<input type="number" name="tahun_terbit" id="tahun_terbit" class="form-control" placeholder="2023">
<div class="tahun_terbit invalid-feedback"></div>
</div>
</div>
<div class="form-group row">
<label class="col-lg-3">Link Naskah</label>
<div class="col-lg-9">
<input type="text" name="link_naskah" id="link_naskah" class="form-control" placeholder="Masukkan Link Google Drive Naskah">
<div class="link_naskah invalid-feedback"></div>
</div>
</div>

<div class="form-group row">
<label class="col-lg-3"></label>
<div class="col-9">
<button id="btn-simpan" type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
</div>
</div>
</form>

</div>
</div>
</section>

<script>
$('#form-buku').submit(function(e) {
e.preventDefault()
$.ajax({
url: '<?=base_url('anggota/buku') ?>',
type: 'POST',
dataType: 'json',
data: $(this).serialize(),
beforeSend: function () {
$('#btn-simpan').html('Loading...');
},
complete: function() {
$('#btn-simpan').prop('disabled', false);
$('#btn-simpan').html(`<i class="bi bi-save"></i> Simpan`);
},
success : function (response) {
if (response.error) {
if (response.error.judul_buku) {
$('#judul_buku').addClass('is-invalid')
$('.judul_buku').html(response.error.judul_buku)
}
if (response.error.jenis_buku) {
$('#jenis_buku').addClass('is-invalid')
$('.jenis_buku').html(response.error.jenis_buku)
}
if (response.error.tahun_terbit) {
$('#tahun_terbit').addClass('is-invalid')
$('.tahun_terbit').html(response.error.tahun_terbit)
}
if (response.error.link_naskah) {
$('#link_naskah').addClass('is-invalid')
$('.link_naskah').html(response.error.link_naskah)
}

}


// jika sukses 

if (response.sukses) {
// alert(response.sukses)
Swal.fire({
icon: 'success',
title: 'Sukses',
text : "Buku Berhasil Ditambahkan",
showConfirmButton: false,
timer: 1500
}).then((result) => {
window.location='./';
})


}



}

})

});
</script>

<?=$this->endSection() ?>

