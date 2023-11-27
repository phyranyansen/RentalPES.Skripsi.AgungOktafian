<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gamebox</title>
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
                                    <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.html">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="models.html">Games </a>
                                </li>

                            </ul>
                            <ul class="navbar-nav mb-0 ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="login.html">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link button_2 ms-2 me-2" href="register.html">Register <i
                                            class="fa fa-check-circle ms-1"></i></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </nav>
            </section>
        </div>
        <div class="main_2 clearfix">
            <section id="center" class="center_home">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                            class="active" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2" class="" aria-current="true"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/front/img/game1.jpeg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-md-block">
                                <h5>Plan your trip now</h5>
                                <h1 class="font_50 mt-4">Save <span class="col_oran">big</span> with our <br> car rental
                                </h1>
                                <p class="mt-4 mb-4">To contribute to positive change and achieve our sustainability
                                    goals with many extraordinary</p>
                                <!-- <h6 class="d-inline-block me-2 mb-0"><a class="button" href="#">Book Ride <i
                                            class="fa fa-check-circle ms-1"></i> </a></h6>
                                <h6 class="d-inline-block mb-0"><a class="button_1" href="#">Learn More <i
                                            class="fa fa-check-circle ms-1"></i> </a></h6> -->
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="assets/front/img/game2.jpeg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-md-block">
                                <h5>Plan your trip now</h5>
                                <h1 class="font_50 mt-4">Lorem <span class="col_oran">sit</span> dolor eget <br> sit
                                    amet</h1>
                                <p class="mt-4 mb-4">To contribute to positive change and achieve our sustainability
                                    goals with many extraordinary</p>
                                <!-- <h6 class="d-inline-block me-2 mb-0"><a class="button" href="#">Book Ride <i
                                            class="fa fa-check-circle ms-1"></i> </a></h6>
                                <h6 class="d-inline-block mb-0"><a class="button_1" href="#">Learn More <i
                                            class="fa fa-check-circle ms-1"></i> </a></h6> -->
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="assets/front/img/game3.jpeg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-md-block">
                                <h5>Plan your trip now</h5>
                                <h1 class="font_50 mt-4">Semp <span class="col_oran">port</span> diam quis <br> nulla
                                    porta</h1>
                                <p class="mt-4 mb-4">To contribute to positive change and achieve our sustainability
                                    goals with many extraordinary</p>
                                <!-- <h6 class="d-inline-block me-2 mb-0"><a class="button" href="#">Book Ride <i
                                            class="fa fa-check-circle ms-1"></i> </a></h6>
                                <h6 class="d-inline-block mb-0"><a class="button_1" href="#">Learn More <i
                                            class="fa fa-check-circle ms-1"></i> </a></h6> -->
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </section>
        </div>
        <div class="main_3 position-absolute w-100 clearfix">
            <section id="booking">
                <div class="container-xl">
                    <div class="booking_m clearfix bg-white">
                        <div class="row booking_1">
                            <div class="col-md-12">
                                <h4 class="mb-0">Book a car</h4>
                            </div>
                        </div>
                        <div class="row booking_2 mt-4">
                            <div class="col-md-4 col-sm-6">
                                <div class="booking_2i">
                                    <h6 class="mb-3"><i class="fa fa-car me-1 col_oran"></i> Select Your Car Type</h6>
                                    <select class="form-select" id="example-select">
                                        <option>Select your car type</option>
                                        <option>Mercedes</option>
                                        <option>Lexus CT</option>
                                        <option>VW PassatCC</option>
                                        <option>Toyota</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="booking_2i">
                                    <h6 class="mb-3"><i class="fa fa-map-marker me-1 col_oran"></i> Pick-up</h6>
                                    <select class="form-select" id="example-select">
                                        <option>Delhi road</option>
                                        <option>Mumbai city</option>
                                        <option>London</option>
                                        <option>Brisbane</option>
                                        <option>Pearth</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="booking_2i">
                                    <h6 class="mb-3"><i class="fa fa-map-marker me-1 col_oran"></i> Drop-of</h6>
                                    <select class="form-select" id="example-select">
                                        <option>Delhi road</option>
                                        <option>Mumbai city</option>
                                        <option>London</option>
                                        <option>Brisbane</option>
                                        <option>Pearth</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row booking_2 mt-4">
                            <div class="col-md-4 col-sm-6">
                                <div class="booking_2i">
                                    <h6 class="mb-3"><i class="fa fa-calendar me-1 col_oran"></i> Pick-up</h6>
                                    <div class="booking_2i1 row">
                                        <div class="col-md-8">
                                            <div class="booking_2i1l">
                                                <input class="form-control" id="example-date" type="date" name="date">
                                            </div>
                                        </div>
                                        <div class="col-md-4 ps-0">
                                            <div class="booking_2i1r">
                                                <select class="form-select" id="example-select">
                                                    <option value="12:00 AM">12:00 AM</option>
                                                    <option value="12:30 AM">12:30 AM</option>
                                                    <option value="01:00 AM">01:00 AM</option>
                                                    <option value="01:30 AM">01:30 AM</option>
                                                    <option value="02:00 AM">02:00 AM</option>
                                                    <option value="02:30 AM">02:30 AM</option>
                                                    <option value="03:00 AM">03:00 AM</option>
                                                    <option value="03:30 AM">03:30 AM</option>
                                                    <option value="04:00 AM">04:00 AM</option>
                                                    <option value="04:30 AM">04:30 AM</option>
                                                    <option value="05:00 AM">05:00 AM</option>
                                                    <option value="05:30 AM">05:30 AM</option>
                                                    <option value="06:00 AM">06:00 AM</option>
                                                    <option value="06:30 AM">06:30 AM</option>
                                                    <option value="07:00 AM">07:00 AM</option>
                                                    <option value="07:30 AM">07:30 AM</option>
                                                    <option value="08:00 AM">08:00 AM</option>
                                                    <option value="08:30 AM">08:30 AM</option>
                                                    <option value="09:00 AM">09:00 AM</option>
                                                    <option value="09:30 AM">09:30 AM</option>
                                                    <option value="10:00 AM">10:00 AM</option>
                                                    <option value="10:30 AM">10:30 AM</option>
                                                    <option value="11:00 AM">11:00 AM</option>
                                                    <option value="11:30 AM">11:30 AM</option>
                                                    <option value="12:00 PM">12:00 PM</option>
                                                    <option value="12:30 PM">12:30 PM</option>
                                                    <option value="01:00 PM">01:00 PM</option>
                                                    <option value="01:30 PM">01:30 PM</option>
                                                    <option value="02:00 PM">02:00 PM</option>
                                                    <option value="02:30 PM">02:30 PM</option>
                                                    <option value="03:00 PM">03:00 PM</option>
                                                    <option value="03:30 PM">03:30 PM</option>
                                                    <option value="04:00 PM">04:00 PM</option>
                                                    <option value="04:30 PM">04:30 PM</option>
                                                    <option value="05:00 PM">05:00 PM</option>
                                                    <option value="05:30 PM">05:30 PM</option>
                                                    <option value="06:00 PM">06:00 PM</option>
                                                    <option value="06:30 PM">06:30 PM</option>
                                                    <option value="07:00 PM">07:00 PM</option>
                                                    <option value="07:30 PM">07:30 PM</option>
                                                    <option value="08:00 PM">08:00 PM</option>
                                                    <option value="08:30 PM">08:30 PM</option>
                                                    <option value="09:00 PM">09:00 PM</option>
                                                    <option value="09:30 PM">09:30 PM</option>
                                                    <option value="10:00 PM">10:30 PM</option>
                                                    <option value="10:30 PM">12:00 AM</option>
                                                    <option value="11:00 PM">11:00 PM</option>
                                                    <option value="11:30 PM">11:30 PM</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="booking_2i">
                                    <h6 class="mb-3"><i class="fa fa-calendar me-1 col_oran"></i> Drop-of</h6>
                                    <div class="booking_2i1 row">
                                        <div class="col-md-8">
                                            <div class="booking_2i1l">
                                                <input class="form-control" id="example-date" type="date" name="date">
                                            </div>
                                        </div>
                                        <div class="col-md-4 ps-0">
                                            <div class="booking_2i1r">
                                                <select class="form-select" id="example-select">
                                                    <option value="12:00 AM">12:00 AM</option>
                                                    <option value="12:30 AM">12:30 AM</option>
                                                    <option value="01:00 AM">01:00 AM</option>
                                                    <option value="01:30 AM">01:30 AM</option>
                                                    <option value="02:00 AM">02:00 AM</option>
                                                    <option value="02:30 AM">02:30 AM</option>
                                                    <option value="03:00 AM">03:00 AM</option>
                                                    <option value="03:30 AM">03:30 AM</option>
                                                    <option value="04:00 AM">04:00 AM</option>
                                                    <option value="04:30 AM">04:30 AM</option>
                                                    <option value="05:00 AM">05:00 AM</option>
                                                    <option value="05:30 AM">05:30 AM</option>
                                                    <option value="06:00 AM">06:00 AM</option>
                                                    <option value="06:30 AM">06:30 AM</option>
                                                    <option value="07:00 AM">07:00 AM</option>
                                                    <option value="07:30 AM">07:30 AM</option>
                                                    <option value="08:00 AM">08:00 AM</option>
                                                    <option value="08:30 AM">08:30 AM</option>
                                                    <option value="09:00 AM">09:00 AM</option>
                                                    <option value="09:30 AM">09:30 AM</option>
                                                    <option value="10:00 AM">10:00 AM</option>
                                                    <option value="10:30 AM">10:30 AM</option>
                                                    <option value="11:00 AM">11:00 AM</option>
                                                    <option value="11:30 AM">11:30 AM</option>
                                                    <option value="12:00 PM">12:00 PM</option>
                                                    <option value="12:30 PM">12:30 PM</option>
                                                    <option value="01:00 PM">01:00 PM</option>
                                                    <option value="01:30 PM">01:30 PM</option>
                                                    <option value="02:00 PM">02:00 PM</option>
                                                    <option value="02:30 PM">02:30 PM</option>
                                                    <option value="03:00 PM">03:00 PM</option>
                                                    <option value="03:30 PM">03:30 PM</option>
                                                    <option value="04:00 PM">04:00 PM</option>
                                                    <option value="04:30 PM">04:30 PM</option>
                                                    <option value="05:00 PM">05:00 PM</option>
                                                    <option value="05:30 PM">05:30 PM</option>
                                                    <option value="06:00 PM">06:00 PM</option>
                                                    <option value="06:30 PM">06:30 PM</option>
                                                    <option value="07:00 PM">07:00 PM</option>
                                                    <option value="07:30 PM">07:30 PM</option>
                                                    <option value="08:00 PM">08:00 PM</option>
                                                    <option value="08:30 PM">08:30 PM</option>
                                                    <option value="09:00 PM">09:00 PM</option>
                                                    <option value="09:30 PM">09:30 PM</option>
                                                    <option value="10:00 PM">10:30 PM</option>
                                                    <option value="10:30 PM">12:00 AM</option>
                                                    <option value="11:00 PM">11:00 PM</option>
                                                    <option value="11:30 PM">11:30 PM</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="booking_2i">
                                    <h6 class="mb-3"><i class="fa fa-search me-1 col_oran"></i> Find</h6>
                                    <h6 class="text-center mb-0"><a class="button pt-3 pb-3 d-block" href="#">Search</a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


    <section id="ride">
        <div class="ride_m">
            <div class="container-xl">
                <div class="row ride_1">
                    <div class="col-md-8">
                        <div class="ride_1l">
                            <h1 class="text-white">Save big with our cheap <br> car rental!</h1>
                            <p class="text-light mb-0 fs-4 mt-3">Top Airports. Local Suppliers. 24/7 Support.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="ride_1r mt-4 text-end">
                            <h6 class="mb-0"><a class="button_2" href="#">Book Ride <i
                                        class="fa fa-check-circle ms-1"></i> </a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="choose" class="p_3">
        <div class="container-xl">
            <div class="row choose_1">
                <div class="col-md-7">
                    <div class="choose_1l">
                        <h5 class="col_oran">Why Choose Us</h5>
                        <h1>Best valued deals you <br> will ever find</h1>
                        <p class="mt-3">Thrown shy denote ten ladies though ask saw. Or by to he going think order event
                            music. Incommode so intention defective at convinced. Led income months itself and houses
                            you.</p>
                        <h6 class="mb-0 mt-4"><a class="button" href="#">Find Deals <i
                                    class="fa fa-check-circle ms-1"></i> </a></h6>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="choose_1r">
                        <div class="choose_1ri row">
                            <div class="col-md-3">
                                <div class="choose_1ril">
                                    <span class="fs-1 d-inline-block text-center col_oran"><i
                                            class="fa fa-car"></i></span>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="choose_1rir">
                                    <h4>Cross Country Drive</h4>
                                    <p class="mb-0 mt-3">Speedily say has suitable disposal add boy. On forth doubt
                                        miles of child. Exercise joy man children rejoiced.</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="choose_1ri row mt-3">
                            <div class="col-md-3">
                                <div class="choose_1ril">
                                    <span class="fs-1 d-inline-block text-center col_oran"><i
                                            class="fa fa-dollar"></i></span>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="choose_1rir">
                                    <h4>All Inclusive Pricing</h4>
                                    <p class="mb-0 mt-3">Speedily say has suitable disposal add boy. On forth doubt
                                        miles of child. Exercise joy man children rejoiced.</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="choose_1ri row mt-3">
                            <div class="col-md-3">
                                <div class="choose_1ril">
                                    <span class="fs-1 d-inline-block text-center col_oran"><i
                                            class="fa fa-rupee"></i></span>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="choose_1rir">
                                    <h4>No Hidden Charges</h4>
                                    <p class="mb-0 mt-3">Speedily say has suitable disposal add boy. On forth doubt
                                        miles of child. Exercise joy man children rejoiced.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <hr>
    <section id="footer" class="pt-3 pb-3">
        <div class="container-xl">
            <div class="row footer_1">
                <div class="col-md-6">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!3m2!1sen!2sid!4v1701096037850!5m2!1sen!2sid!6m8!1m7!1s6KzNfnkkUrNihflUvtUHAw!2m2!1d-7.135704389074873!2d112.5951298202078!3f68.82139527846388!4f7.287345782613897!5f0.7820865974627469"
                        width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""
                        aria-hidden="false" tabindex="0"></iframe>
                    <!-- <iframe src="https://www.google.com/maps/embed?pb=!3m2!1sen!2sid!4v1701096037850!5m2!1sen!2sid!6m8!1m7!1s6KzNfnkkUrNihflUvtUHAw!2m2!1d-7.135704389074873!2d112.5951298202078!3f68.82139527846388!4f7.287345782613897!5f0.7820865974627469" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                </div>
                <div class="col-md-3">
                    <div class="footer_1i">
                        <h4><a href="index.html"><i class="fa fa-gamepad col_oran me-1"></i> Gamebox <span
                                    class="fw-normal"></span>Playstation</a></h4>
                        <p class="mt-3">Tersedia layanan rental game playstation mulai dari pes 2, pes 3 dan pes 4.</p>
                        <h6 class="mt-3 fw-normal"><i class="fa fa-map col_oran me-1"></i> Jl. Poros Penganden No.38,
                            Suci, Kec. Manyar, Kabupaten Gresik, Jawa Timur
                            61151.</h6>
                        <h6 class="mt-3 fw-normal"><a href="#"><i
                                    class="fa fa-phone col_oran me-1"></i>+6285233657296</a></h6>
                        <h6 class="mt-3 mb-0 fw-normal"><a href="#"><i class="fa fa-envelope col_oran me-1"></i>
                                agungoktafian1998@gmail.com</a></h6>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer_1i">
                        <h4>WORK HOURS</h4>
                        <p class="mt-3">Open Dayly: <span class="fw-bold text-black">07:00AM - 04:00AM</span></p>
                        <p class="mt-3 mb-0">Description: <span class="fw-bold text-black">Tutup apabila hari
                                raya</span></p>
                    </div>
                </div>

            </div>
            <hr>
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
                            <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    window.onscroll = function() {
        myFunction()
    };

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