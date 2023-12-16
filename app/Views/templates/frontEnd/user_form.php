<div class="main_3 position-absolute w-100 clearfix">
    <section id="booking">
        <form action="javascript:void(0);" id="unit-order">
            <div class="container-xl">
                <div class="booking_m clearfix bg-white">
                    <div class="row booking_1">
                        <div class="col-md-12">
                            <h4 class="mb-0">Rental Playstation</h4>
                        </div>
                    </div>
                    <div class="row booking_2 mt-4">
                        <div class="col-md-6 col-sm-6">
                            <div class="booking_2i">
                                <h6 class="mb-3"><i class="fa fa-calendar me-1 col_oran"></i> Tanggal</h6>
                                <input class="form-control text-dark" type="text" value="<?= date('d M Y') ?>"
                                    name="startDate_user" id="startDate" readonly style="background-color: white;">

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="booking_2i">
                                <h6 class="mb-3"><i class="fa fa-gamepad me-1 col_oran"></i> Playstation
                                </h6>
                                <select class="form-select text-dark" id="playStation" name="pes_user">
                                    <?php foreach($pes as $row) { ?>
                                    <option value="<?= $row['Id_Playstation'] ?>"><?= $row['Nama_Alias'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row booking_2 mt-4">
                        <div class="col-md-4 col-sm-6">
                            <div class="booking_2i">
                                <h6 class="mb-3"><i class="fa fa-history me-1 col_oran"></i> Jam Bermain</h6>
                                <div class="booking_2i1 row">
                                    <div class="col-md-12">
                                        <div class="booking_2i1l">
                                            <select class="form-select text-dark" name="jam_user"
                                                aria-label="Default select example" id="jam">
                                                <option value="1">1 Jam</option>
                                                <option value="2">2 Jam</option>
                                                <option value="3">3 Jam</option>
                                                <option value="4">4 Jam</option>
                                                <option value="5">5 Jam</option>
                                                <option value="6">6 Jam</option>
                                                <option value="7">7 Jam</option>
                                                <option value="8">8 Jam</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="booking_2i">
                                        <h6 class="mb-3">Jam Mulai</h6>
                                        <div class="booking_2i1 row">
                                            <div class="booking_2i1l">
                                                <input type="text" name="startTime_user"
                                                    value="<?php date_default_timezone_set('Asia/Jakarta'); $currentDateTime = time(); echo $newDateTime = date('h:i A', $currentDateTime);?>"
                                                    id="startTime" class="form-control text-dark"
                                                    style="background-color: white;" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="booking_2i">
                                        <h6 class="mb-3">Jam Berakhir</h6>
                                        <div class="booking_2i1 row">
                                            <div class="booking_2i1l">
                                                <input type="text" name="endTime_user"
                                                    value="<?php date_default_timezone_set('Asia/Jakarta'); $currentDateTime = time(); echo $newDateTime = date('h:i A', $currentDateTime);?>"
                                                    id="endTime" class="form-control text-dark"
                                                    style="background-color: white;" readonly>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="booking_2i">
                                <h6 class="mb-3"><i class="fa fa-search me-1 col_oran"></i> Cari</h6>
                                <h6 class="text-center mb-0"><button class="button pt-3 pb-3 d-block" type="submit"
                                        style="width: 100%;">Search</button>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="assets/assets/js/transaction/transaction_form.js"></script>
<script src="assets/assets/js/transaction/transaction_get.js"></script>
<script src="assets/assets/js/front/unit/order_form.js"></script>