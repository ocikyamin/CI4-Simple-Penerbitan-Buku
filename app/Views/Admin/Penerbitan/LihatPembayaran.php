<!--Disabled Backdrop Modal -->
<div class="modal fade text-left" id="modal_lihat_pembayaran" tabindex="-1" role="dialog"
aria-labelledby="label_titel" aria-hidden="true">
<div class="modal-dialog"
role="document">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="label_titel">Bukti Pembayaran
</h4>
<button type="button" class="close" data-bs-dismiss="modal"
aria-label="Close">
<i data-feather="x"></i>
</button>
</div>
<div class="modal-body">

<table width="100%">
    <tr>
        <td>Nomor Rekening</td>
        <td>:</td>
        <td><?=$pay['norek'] ?></td>
    </tr>
    <tr>
        <td>BANK</td>
        <td>:</td>
        <td><?=$pay['bank'] ?></td>
    </tr>
    <tr>
        <td>Nama Penyetor</td>
        <td>:</td>
        <td><?=$pay['nm_penyetor'] ?></td>
    </tr>
    <tr>
        <td>Waktu Transaksi</td>
        <td>:</td>
        <td><?=$pay['wkt_bayar'] ?></td>
    </tr>
    <tr>
        <td>Jumlah</td>
        <td>:</td>
        <td><?='IDR. '.number_format($pay['jml_transfer']) ?></td>
    </tr>
</table>
<p>
    Lampiran : <br>
    <a target="_blank" class="btn btn-secondary shadow-sm btn-block mt-2" href="<?=base_url('files/'.$pay['bukti']) ?>"> Bukti Pembayaran</a>
</p>

<p>
    <form action="<?=base_url('admin/penerbitan/confpembayaran')?>" method="post">
    <input type="hidden" name="id" value="<?=$pay['id'] ?>">
    <input type="hidden" name="id_pengajuan" value="<?=$pay['id_pengajuan'] ?>">

<div class="form-group">
<select name="status" id="status_pembayaran" class="form-control" required>
	<option value="">Status Pembayaran</option>
	<option value="1">Terima</option>
	<option value="2">Tolak</option>
</select>
</div>
<div id="keterangan"></div>

</p>

<div class="mb-3 mt-4 text-center">
	<button type="button" class="btn btn-light-secondary"
data-bs-dismiss="modal">
<i class="bx bx-x d-block d-sm-none"></i>
<span class="d-none d-sm-block">Batal</span>
</button>
<button type="submit" class="btn btn-primary ml-1">
<i class="bx bx-check d-block d-sm-none"></i>
<span class="d-none d-sm-block">Konfirmasi</span>
</button>
</div>
</form>
</div>

</div>
</div>
</div>
<script>
$(document).ready(function () {
    // alert('okk')
    $('#status_pembayaran').change(function(e) {
		e.preventDefault()
		if ($(this).val()==2) {
			$('#keterangan').html(`<div class="form-group"><textarea name="ket" class="form-control" rows="3">Buat Catatan Penolakan</textarea></div>`)
		}else{
			$('#keterangan').html('');
		}
	});
});
</script>