<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gamebox</title>
    <!-- other templates Sweet Alert -->
    <link href="https://adminlte.io/themes/v3/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css"
        rel="stylesheet" type="text/css">
    <link href="https://adminlte.io/themes/v3/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css"
        rel="stylesheet" type="text/css">
    <base href="<?= base_url(); ?>">
    <link href="assets/front/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/front/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/front/css/global.css" rel="stylesheet">
    <link href="assets/front/css/index.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="assets/front/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="main clearfix position-relative">
        <div class="main_1 clearfix position-absolute top-0 w-100">
            <section id="header">
                <nav class="navbar navbar-expand-md navbar-light" id="navbar_sticky">
                    <div class="container-xl">
                        <a class="navbar-brand fs-3 p-0 fw-bold text-white" href="index.html">
                            <img src="assets/front/img/logo.png" alt="">
                            Gamebox
                            <!-- <p class="fs-1 span_1" style="font-size: x-small;">Playstation</p> -->
                            <!-- <br><span class="fs-5 span_1">Playstation</span> -->
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mb-0 ">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.html">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="models.html">Games </a>
                                </li>
                                <?php
                                 $session = session();
                                 $successAlert = null;
                                 $messageAlert = null;
                                 if(!empty($session->get('res'))) {
                                    $successAlert = $session->get('res')['status'];
                                    $messageAlert = $session->get('res')['message'];
                                 }
                                 if(!empty($session->get('login')))
                                 {
                                ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">

                                        Profile
                                    </a>
                                    <ul class="dropdown-menu drop_1" aria-labelledby="navbarDropdown">
                                        <li> <a class="dropdown-item" href="login.html"><i class="fa fa-user"></i>
                                                Profile Saya</a></li>
                                        <li><a class="dropdown-item" href="unit-checkout"><i class="fa fa-list-alt"></i>
                                                Pesanan Saya</a></li>
                                        <li><a class="dropdown-item border-0" href="riwayat-trx"><i
                                                    class="fa fa-file-text-o"></i> Riwayat Transaksi</a>
                                        </li>
                                        <li><a class="dropdown-item button_2 me-2 text-light border-0" href="logout"><i
                                                    class="fa fa-sign-out"></i> Logout</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php } ?>
                            </ul>

                            <ul class="navbar-nav mb-0 ms-auto">
                                <?php 
                                
                               
                                $status  = $session->get('login');
                                if($status!=='logged_in') { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="login">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link button_2 ms-2 me-2" href="register">Register <i
                                            class="fa fa-check-circle ms-1"></i></a>
                                </li>
                                <?php } ?>
                                <!-- <li class="nav-item">
                                    <a class="nav-link button_2 ms-2 me-2 bg_light" href="javascript:void(0);">
                                        <?= $session->get('email'); ?></a>
                                </li> -->

                            </ul>
                        </div>
                    </div>
                </nav>
            </section>
        </div>
        <?= $banner ?>
    </div>


    <?= $page; ?>

    <section id="footer" class="pt-3 pb-3">
        <div class="container-xl">
            <?= $footer; ?>

            <div class="row footer_2">
                <div class="col-md-8">
                    <div class="footer_2l">
                        <p class="mb-0 mt-1">© 2013 Gamebox. All Rights Reserved</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer_2r text-end">
                        <ul class="social-network social-circle mb-0">
                            <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-pinterest"></i></a>
                            </li>
                            <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ohter templates Sweet Alert-->
    <script src="https://adminlte.io/themes/v3/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script>
    window.onscroll = function() {
        myFunction()
    };

    <?php if($successAlert != null && $messageAlert != null) {
        ?>
    Swal.fire('Sukses', '<?php echo $messageAlert;?>', '<?php echo $successAlert;?>');
    <?php

        $session->remove('res');
    } ?>

    var navbar_sticky = document.getElementById("navbar_sticky");
    var sticky = navbar_sticky.offsetTop;
    var navbar_height = document.querySelector('.navbar').offsetHeight;

    function myFunction() {
        if (window.pageYOffset >= sticky + navbar_height) {
            navbar_sticky.classList.add("sticky")
            document.body.style.paddingTop = navbar_height + 'px';
        } else {
            navbar_sticky.classList.remove("sticky");
            document.body.style.paddingTop = '0'
        }
    }
    </script>
</body>

</html>