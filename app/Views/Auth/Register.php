
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="<?=base_url()?>/public/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/assets/css/app.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/assets/vendors/sweetalert2/sweetalert2.min.css">
    <script src="<?=base_url()?>/public/assets/vendors/jquery/jquery.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-light">
        <div class="container d-block">
            <a href="<?=base_url()?>"><i class="bi bi-chevron-left"></i></a>
            <a class="navbar-brand ms-4" href="<?=base_url()?>">
                <img src="<?=base_url()?>/logo.png"> CV. Genzo Media Pustaka
            </a>
        </div>
    </nav>


    <div class="container">
        <div class="card mb-5">
            
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <!-- <div class="card-header"></div> -->
                <h4 class="card-title"><i class="bi bi-pencil-square"></i> Form Register</h4>
                <hr>
                <form id="form-register" method="post">
                    <?=csrf_field() ?>
                    <div class="form-group row">
                        <label class="col-lg-3">NIK</label>
                        <div class="col-lg-9">
                            <input type="number" name="nik" id="nik" class="form-control" placeholder="Nomor Induk Kependudukan">
                            <div class="nik invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3">Nama Lengkap</label>
                        <div class="col-lg-9">
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap Susuai KTP">
                            <div class="nama invalid-feedback"></div>
                        </div>
                    </div>
                     <div class="form-group row">
                        <label class="col-lg-3">Tempat & Tanggal Lahir</label>
                        <div class="col-lg-5">
                            <input type="text" name="tmp_lahir" id="tmp_lahir" class="form-control" placeholder="Contoh : Jakarta">
                            <div class="tmp_lahir invalid-feedback"></div>
                        </div>
                        <div class="col-lg-4">
                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" placeholder="Pilih Tanggal">
                            <div class="tgl_lahir invalid-feedback"></div>
                        </div>
                    </div>

                     <div class="form-group row">
                        <label class="col-lg-3">Jenis Kelamin</label>
                        <div class="col-lg-9">
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="jk" id="jk_lk" value="L">
                        <label class="form-check-label" for="jk_lk">
                        Laki-laki
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="jk" id="jk_pr" value="P">
                        <label class="form-check-label" for="jk_pr">
                        Perempuan
                        </label>
                        </div>
                        </div>
                    </div>
                     <div class="form-group row">
                        <label class="col-lg-3">Alamat</label>
                        <div class="col-lg-9">
                            <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat Lengkap"></textarea>
                            <div class="alamat invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3">Email</label>
                        <div class="col-lg-9">
                            <input type="text" name="email" id="email" class="form-control" placeholder="Contoh : widya@gmail.com">
                            <div class="email invalid-feedback"></div>
                        </div>
                    </div>

                     <div class="form-group row">
                        <label class="col-lg-3">Password Baru</label>
                        <div class="col-lg-9">
                            <input type="password" name="new_pass" id="new_pass" class="form-control" placeholder="******">
                            <div class="new_pass invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3">Konfirmasi Password</label>
                        <div class="col-lg-9">
                            <input type="password" name="konf_pass" id="konf_pass" class="form-control" placeholder="******">
                            <div class="konf_pass invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3"></label>
                        <div class="col-lg-9">
                            <button id="btn-register" type="submit" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Register Now</button>
                        </div>
                    </div>
                    
                </form>
                
                    </div>                    
                </div>
            </div>
        </div>
    </div>
      <script src="<?=base_url() ?>/public/assets/js/extensions/sweetalert2.js"></script>
    <script src="<?=base_url() ?>/public/assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>

<script>
    $('#form-register').submit(function(e) {
    e.preventDefault()
    $.ajax({
        url: '<?=base_url('register') ?>',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
            beforeSend: function () {
            $('#btn-register').html('Loading...');
            },
            complete: function() {
            $('#btn-register').prop('disabled', false);
            $('#btn-register').html(`<i class="bi bi-pencil-square"></i> Register Now`);
            },
            success : function (response) {
                // alert(response)
                console.log(response)
                if (response.error) {
                    if (response.error.nik) {
                        $('#nik').addClass('is-invalid')
                        $('.nik').html(response.error.nik)
                    }
                    if (response.error.nama) {
                        $('#nama').addClass('is-invalid')
                        $('.nama').html(response.error.nama)
                    }
                    if (response.error.tmp_lahir) {
                        $('#tmp_lahir').addClass('is-invalid')
                        $('.tmp_lahir').html(response.error.tmp_lahir)
                    }
                    if (response.error.tgl_lahir) {
                        $('#tgl_lahir').addClass('is-invalid')
                        $('.tgl_lahir').html(response.error.tgl_lahir)
                    }

                    if (response.error.alamat) {
                        $('#alamat').addClass('is-invalid')
                        $('.alamat').html(response.error.alamat)
                    }
                    if (response.error.email) {
                        $('#email').addClass('is-invalid')
                        $('.email').html(response.error.email)
                    }

                    if (response.error.new_pass) {
                        $('#new_pass').addClass('is-invalid')
                        $('.new_pass').html(response.error.new_pass)
                    }
                    if (response.error.konf_pass) {
                        $('#konf_pass').addClass('is-invalid')
                        $('.konf_pass').html(response.error.konf_pass)
                    }

                }


                // jika sukses 

            if (response.sukses) {
                // alert(response.sukses)
                    Swal.fire({
                    icon: 'success',
                    title: 'Pendaftaran Akun Berhasil',
                    text : "Silahkan Login menggunkan alamat email dan Password yang telah terdaftar.",
                    showConfirmButton: false,
                    timer: 1500
                    }).then((result) => {
                    window.location='./login/';
                    })
                   

            }



            }

    })
    
    });
</script>
</body>

</html>