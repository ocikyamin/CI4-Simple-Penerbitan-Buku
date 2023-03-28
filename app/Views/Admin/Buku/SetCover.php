<!--Disabled Backdrop Modal -->
<div class="modal fade text-left" id="modal_cover" tabindex="-1" role="dialog"
aria-labelledby="label_titel" aria-hidden="true">
<div class="modal-dialog"
role="document">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="label_titel">Cover Buku
</h4>
<button type="button" class="close" data-bs-dismiss="modal"
aria-label="Close">
<i data-feather="x"></i>
</button>
</div>
<div class="modal-body">
<?php
$cover = $buku['cover']==NULL ? 'no.jpg': $buku['cover'];
?>
<img src="<?=base_url('public/buku/'.$cover)?>" class="img-thumbnail">
<form action="<?=base_url('admin/buku/simpancover')?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?=$buku['id']?>">
<div class="form-group mt-3">
<label> Upload Cover</label>
<input type="file" name="cover" class="form-control">
</div>

<div class="mb-3 mt-4 text-center">
	<button type="button" class="btn btn-light-secondary"
data-bs-dismiss="modal">
<i class="bx bx-x d-block d-sm-none"></i>
<span class="d-none d-sm-block">Batal</span>
</button>
<button type="submit" class="btn btn-primary ml-1">
<i class="bx bx-check d-block d-sm-none"></i>
<span class="d-none d-sm-block">Upload</span>
</button>
</div>
</form>
</div>

</div>
</div>
</div>
