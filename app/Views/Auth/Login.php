
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="<?=base_url()?>/public/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/assets/css/app.css">
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
        
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <div class="card mb-5">
                            <div class="card-header"><h4 class="card-title">Form Login</h4></div>
            
            <div class="card-body">
                <div class="alert alert-light-info color-info text-sm"><i class="bi bi-exclamation-triangle"></i> Gunakan Email & Password yang telah terdaftar. Centang Checkbox jika anda login sebagai anggota.</div>
                       
                <!-- <hr> -->
               <div class="errors alert alert-danger d-none"><i class="bi bi-file-excel"></i></div>
                <form id="form-login" method="post">
                    <?=csrf_field() ?>
                    <div class="form-group position-relative has-icon-left">
                    <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                    <div class="form-control-icon">
                    <i class="bi bi-envelope"></i>
                    </div>
                    <!-- <div class="email invalid-feedback"></div> -->
                    </div>

                    <div class="form-group position-relative has-icon-left">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    <div class="form-control-icon">
                   <i class="bi bi-shield-lock"></i>
                    </div>
                    
                    </div>

                    <div class="form-check">
                    <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" name="level" id="level" value="1">
                    <label class="form-check-label" for="level">Login Sebagai Anggota</label>
                    </div>
                    </div>
                  <!--    <div class="form-group position-relative has-icon-left">
                        <select class="form-control">
                            <option>Login as</option>
                            <option>Anggota</option>
                            <option>Pimpinan</option>
                            <option>Administrator</option>
                        </select>
                    <div class="form-control-icon">
                    <i class="bi bi-person"></i>
                    </div>
                    </div> -->
                    
                    <div class="form-group mt-3">
                            <button id="btn-login" type="submit" class="btn btn-primary btn-icon"><i class="bi bi-box-arrow-right"></i> Login</button>
                            <p class="text-gray-600 mt-3">Don't have an account? <a href="<?=base_url('register') ?>" class="font-bold">Register </a>.</p>
                        </div>
                   
                    
                </form>
                
                    </div>                    
                </div>
            </div>
        </div>
    </div>

<script>
    $('#form-login').submit(function(e) {
    e.preventDefault()
    $.ajax({
        url: '<?=base_url('login') ?>',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
            beforeSend: function () {
            $('#btn-login').html('Loading...');
            },
            complete: function() {
            $('#btn-login').prop('disabled', false);
            $('#btn-login').html(`<i class="bi bi-box-arrow-right"></i> Login`);
            },
            success : function (response) {
                    if (response.error) {
                    $('.errors').removeClass('d-none');
                    if (response.error.email) {
                    $('#email').addClass('is-invalid');
                    $('.errors').html(response.error.email)
                    }
                    if (response.error.password) {
                    $('#password').addClass('is-invalid');
                    $('.errors').html(response.error.password)
                    }
                    }

                    if (response.sukses) {
                        window.location=response.login
                    }

                    // console.log(response.level)
            }

    })
    
    });
</script>
</body>

</html>