<section id="ride">
    <div class="ride_m">
        <div class="container-xl">
            <div class="row ride_1">
                <div class="col-md-8">
                    <div class="ride_1l">
                        <!-- <h1 class="text-white">Save big with our cheap <br> car rental!</h1>
                        <p class="text-light mb-0 fs-4 mt-3">Top Airports. Local Suppliers. 24/7 Support.</p> -->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ride_1r mt-4 text-end">
                        <!-- <h6 class="mb-0"><a class="button_2" href="#">Book Ride <i class="fa fa-check-circle ms-1"></i>
                            </a></h6> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="choose" class="p_3 bg_light">
    <div class="container-xl">
        <div class="col-md-2">
            <div class="choose_1l">
                <h5>Unit Tersedia <i class="fa fa-gamepad"></i></h5>
            </div>
        </div>
        <div class="row choose_1">
            <div class="col-md-12">
                <div class="choose_1r">
                    <hr>
                    <table class="table table-hover" style="width: 100%;">
                        <thead>
                            <tr>
                                <!-- <th>#NO</th> -->
                                <th class="col_oran">Unit Playstation</th>
                                <th class="col_oran">Harga / Jam</th>
                                <th class="col_oran">Total Bayar</th>
                                <th class="col_oran">Status</th>
                                <?php $session = session(); if($session->get('login') == 'logged_in') {
                                    ?>
                                    <th class="col_oran">#Order</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody id="unit-table">


                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
</section>
<script src="assets/assets/js/front/unit/unit_get.js"></script>
<script src="assets/assets/js/front/unit/order_unit.js"></script>