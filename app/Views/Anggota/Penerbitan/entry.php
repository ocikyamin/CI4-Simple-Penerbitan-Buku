<?= $this->extend('Anggota/Layouts') ?>
<?= $this->section('content') ?>
<div class="page-title mb-3">
<div class="row">
<div class="col-12 col-md-6 order-md-1 order-last">
<h3>Data Penerbitan</h3>
<!-- <p class="text-subtitle text-muted">The default layout </p> -->
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
<h4 class="card-title">Form Pengajuan Penerbitan</h4>
<hr>
</div>
<div class="card-body">
<form id="form-pengajuan" method="post">
<?=csrf_field() ?>
<input type="hidden" name="user_id" value="<?=Anggota()->id ?> ">
<div class="form-group row">
<label class="col-lg-3">Kode Pengajuan</label>
<div class="col-lg-4 ">
<input type="text" name="kode_pengajuan" class="form-control" readonly value="<?='P-'.time() ?>">
</div>
</div>

<div class="form-group row">
<label class="col-lg-3">Tanggal Pengajuan</label>
<div class="col-lg-4 ">
<input type="date" name="tgl_pengajuan" id="tgl_pengajuan" class="form-control">
<div class="tgl_pengajuan invalid-feedback"></div>
</div>
</div>
<div class="form-group row">
<label class="col-lg-3">Kode Buku</label>
<div class="col-lg-4">
<select name="buku_id" id="buku_id" class="form-control">
<option value="">Pilih Kode Buku</option>                                        
<?php 
foreach ($buku as $d) {
echo "<option value=".$d['id'].">".$d['kode_buku']." - ".$d['judul_buku']."</option>";
}

?>
</select>
<div class="buku_id invalid-feedback"></div>
</div>
</div>
<div class="form-group row">
<label class="col-lg-3">Judul Buku</label>
<div class="col-lg-9">
<input type="text" id="judul_buku" class="form-control" readonly>
</div>
</div>

<div class="form-group row">
<label class="col-lg-3">Penulis</label>
<div class="col-lg-4">
<input type="text" class="form-control" id="nama_penulis" readonly>
</div>
</div>



<div class="form-group row">
<label class="col-lg-3"></label>
<div class="col-9">
<button id="btn-kirim-pengajuan" type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Kirim Pengajuan</button>
</div>
</div>
</form>

</div>
</div>
</section>

<script>
$('#form-pengajuan').submit(function(e) {
e.preventDefault()
$.ajax({
url: '<?=base_url('anggota/penerbitan/entry') ?>',
type: 'POST',
dataType: 'json',
data: $(this).serialize(),
beforeSend: function () {
$('#btn-kirim-pengajuan').html('Loading...');
},
complete: function() {
$('#btn-kirim-pengajuan').prop('disabled', false);
$('#btn-kirim-pengajuan').html(`<i class="bi bi-save"></i> Simpan`);
},
success : function (response) {
if (response.error) {
if (response.error.buku_id) {
$('#buku_id').addClass('is-invalid')
$('.buku_id').html(response.error.buku_id)
}
if (response.error.tgl_pengajuan) {
$('#tgl_pengajuan').addClass('is-invalid')
$('.tgl_pengajuan').html(response.error.tgl_pengajuan)
}


}


// jika sukses 

if (response.sukses) {
// alert(response.sukses)
Swal.fire({
icon: 'success',
title: 'Sukses',
text : "Pengajuan Penerbitan Buku masuk dalam antrian, selanjutnya silahkan melakukan pembayaran.",
showConfirmButton: false,
timer: 1500
}).then((result) => {
window.location='./';
})


}



}

})

});


// Kode Buku 
$('#buku_id').change(function(e) {
	e.preventDefault();
	$.ajax({
		url: '<?=base_url('getbuku')?>',
		type: 'POST',
		dataType: 'json',
		data: {id: $(this).val()},
		success : function (response) {
			
			
			$('#judul_buku').val(response.buku.judul_buku)
			$('#nama_penulis').val(response.buku.nama)
			// console.log(response.buku)
		}
	})
	
});

</script>

<?=$this->endSection() ?>

