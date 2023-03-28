
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anggota</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>/public/assets/css/bootstrap.css">

    <link rel="stylesheet" href="<?=base_url()?>/public/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/assets/css/app.css">
    <link rel="shortcut icon" href="<?=base_url()?>/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?=base_url()?>/public/assets/vendors/sweetalert2/sweetalert2.min.css">
    <script src="<?=base_url()?>/public/assets/vendors/jquery/jquery.min.js"></script>
    <script src="<?=base_url() ?>/public/assets/js/extensions/sweetalert2.js"></script>
    <script src="<?=base_url() ?>/public/assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="<?=base_url('anggota') ?>">
                                <!-- <img src="<?=base_url()?>/logo.png" alt="Logo"> -->
                                 CV. Genzo</a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <!-- <li class="sidebar-title">Menu</li> -->

                        <li class="sidebar-item">
                            <a href="<?=base_url('anggota') ?>" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Home</span>
                            </a>
                        </li>

                         <li class="sidebar-item">
                            <a href="<?=base_url('anggota/buku') ?>" class='sidebar-link'>
                                <i class="bi bi-book"></i>
                                <span>Buku</span>
                            </a>
                        </li>

                         <li class="sidebar-item">
                            <a href="<?=base_url('anggota/penerbitan') ?>" class='sidebar-link'>
                                <i class="bi bi-bookmark"></i>
                                <span>Penerbitan</span>
                            </a>
                        </li>
                         <li class="sidebar-item">
                            <a href="<?=base_url('anggota/pembayaran') ?>" class='sidebar-link'>
                                <i class="bi bi-credit-card"></i>
                                <span>Pembayaran</span>
                            </a>
                        </li>
                        <li class="sidebar-title">User</li>

                         <!-- <li class="sidebar-item">
                            <a href="<?=base_url('anggota/akun') ?>" class='sidebar-link'>
                                <i class="bi bi-person"></i>
                                <span>Account</span>
                            </a>
                        </li> -->

                         <li class="sidebar-item">
                            <a href="<?=base_url('anggota/logout') ?>" class='sidebar-link'>
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Logout</span>
                            </a>
                        </li>  

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-0 mt-0">
                <nav class="navbar navbar-expand navbar-light ">
                    <div class="container">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown me-3">
                                    <!-- <a class="nav-link" href="#">
                                        <i class="bi bi-bell bi-sub fs-4 text-gray-600"></i>
                                    </a> -->
                                </li>
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false" class="">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600"><?=Anggota()->nama ?></h6>
                                            <p class="mb-0 text-sm text-gray-600">Anggota</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                 <img src="<?=base_url() ?>/public/assets/images/faces/1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <!-- <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header> -->

             <?= $this->renderSection('content') ?>  
<!-- 
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer> -->
        </div>
    </div>
    <script src="<?=base_url()?>/public/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?=base_url()?>/public/assets/js/bootstrap.bundle.min.js"></script>

    <script src="<?=base_url()?>/public/assets/js/main.js"></script>
</body>

</html>