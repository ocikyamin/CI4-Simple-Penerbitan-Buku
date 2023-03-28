<!--Disabled Backdrop Modal -->
<div class="modal fade text-left" id="modal_buktibayar" tabindex="-1" role="dialog"
aria-labelledby="label_titel" aria-hidden="true">
<div class="modal-dialog"
role="document">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="label_titel">Upload Pembayaran
</h4>
<button type="button" class="close" data-bs-dismiss="modal"
aria-label="Close">
<i data-feather="x"></i>
</button>
</div>
<div class="modal-body">
<form action="<?=base_url('anggota/pembayaran/confirm')?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="id_pengajuan" value="<?=$id ?>">

<div class="form-group position-relative has-icon-left">
<input type="number" name="norek" class="form-control" placeholder="Nomor Rekening">
<div class="form-control-icon">
<i class="bi bi-credit-card"></i>
</div>
</div>
<div class="form-group position-relative has-icon-left">
<input type="text" name="bank" class="form-control" placeholder="BANK">
<div class="form-control-icon">
<i class="bi bi-credit-card"></i>
</div>
</div>

<div class="form-group position-relative has-icon-left">
<input type="text" name="nm_penyetor" class="form-control" placeholder="Nama Penyetor">
<div class="form-control-icon">
<i class="bi bi-person"></i>
</div>
</div>

<div class="form-group position-relative has-icon-left">
<input type="text" name="wkt_bayar" class="form-control" placeholder="Waktu Transaksi">
<div class="form-control-icon">
<i class="bi bi-clock"></i>
</div>
</div>

<div class="form-group position-relative has-icon-left">
<input type="number" name="jml_transfer" class="form-control" placeholder="Jumlah">
<div class="form-control-icon">
<i class="bi bi-credit-card"></i>
</div>
</div>
		<em class="text-danger text-sm">
Bukti transfer berformat JPG/JPEG/PNG Maksimal 2 MB
</em>
<div class="input-group mb-3">

<label class="input-group-text" for="file_bukti"><i class="bi bi-upload"></i></label>
<input type="file" name="bukti" class="form-control" id="file_bukti">
</div>
<div class="mb-3 mt-4 text-center">
	<button type="button" class="btn btn-light-secondary"
data-bs-dismiss="modal">
<i class="bx bx-x d-block d-sm-none"></i>
<span class="d-none d-sm-block">Batal</span>
</button>
<button type="submit" class="btn btn-primary ml-1">
<i class="bx bx-check d-block d-sm-none"></i>
<span class="d-none d-sm-block">Upload Bukti Pembayaran</span>
</button>
</div>
</form>
</div>

</div>
</div>
</div>
