<style>
body {
    margin-top: 20px;
}

.steps {
    border: 1px solid #e7e7e7
}

.steps-header {
    padding: .375rem;
    border-bottom: 1px solid #e7e7e7
}

.steps-header .progress {
    height: .25rem
}

.steps-body {
    display: table;
    table-layout: fixed;
    width: 100%
}

.step {
    display: table-cell;
    position: relative;
    padding: 1rem .75rem;
    -webkit-transition: all 0.25s ease-in-out;
    transition: all 0.25s ease-in-out;
    border-right: 1px dashed #dfdfdf;
    color: rgba(0, 0, 0, 0.65);
    font-weight: 600;
    text-align: center;
    text-decoration: none
}

.step:last-child {
    border-right: 0
}

.step-indicator {
    display: block;
    position: absolute;
    top: .75rem;
    left: .75rem;
    width: 1.5rem;
    height: 1.5rem;
    border: 1px solid #e7e7e7;
    border-radius: 50%;
    background-color: #fff;
    font-size: .875rem;
    line-height: 1.375rem
}

.has-indicator {
    padding-right: 1.5rem;
    padding-left: 2.375rem
}

.has-indicator .step-indicator {
    top: 50%;
    margin-top: -.75rem
}

.step-icon {
    display: block;
    width: 1.5rem;
    height: 1.5rem;
    margin: 0 auto;
    margin-bottom: .75rem;
    -webkit-transition: all 0.25s ease-in-out;
    transition: all 0.25s ease-in-out;
    color: #888
}

.step:hover {
    color: rgba(0, 0, 0, 0.9);
    text-decoration: none
}

.step:hover .step-indicator {
    -webkit-transition: all 0.25s ease-in-out;
    transition: all 0.25s ease-in-out;
    border-color: transparent;
    background-color: #f4f4f4
}

.step:hover .step-icon {
    color: rgba(0, 0, 0, 0.9)
}

.step-active,
.step-active:hover {
    color: rgba(0, 0, 0, 0.9);
    pointer-events: none;
    cursor: default
}

.step-active .step-indicator,
.step-active:hover .step-indicator {
    border-color: transparent;
    background-color: #5c77fc;
    color: #fff
}

.step-active .step-icon,
.step-active:hover .step-icon {
    color: #5c77fc
}

.step-completed .step-indicator,
.step-completed:hover .step-indicator {
    border-color: transparent;
    background-color: rgba(51, 203, 129, 0.12);
    color: #33cb81;
    line-height: 1.25rem
}

.step-completed .step-indicator .feather,
.step-completed:hover .step-indicator .feather {
    width: .875rem;
    height: .875rem
}

@media (max-width: 575.98px) {
    .steps-header {
        display: none
    }

    .steps-body,
    .step {
        display: block
    }

    .step {
        border-right: 0;
        border-bottom: 1px dashed #e7e7e7
    }

    .step:last-child {
        border-bottom: 0
    }

    .has-indicator {
        padding: 1rem .75rem
    }

    .has-indicator .step-indicator {
        display: inline-block;
        position: static;
        margin: 0;
        margin-right: 0.75rem
    }
}

.bg-secondary {
    background-color: #f7f7f7 !important;
}
</style>


<section id="center" class="center_login">
    <div class="center_om clearfix">
        <div class="container-sm">
            <div class="row center_o1">
                <div class="col-md-12" style="height: 5px;">
                    <h2 class="text-white">Pemesanan</h2>
                    <h6 class="mb-0 mt-3 fw-normal col_oran"><a class="text-light" href="#">Home</a> <span
                            class="mx-2 col_light">/</span> Checout</h6>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="login" class="p_3 bg_light">
    <div class="container-xl">
        <hr>
        <div class="row">
            <div class="col-md-12">
                <form action="javascript:void(0);" id="unit-konfirm">
                    <div class="container pb-5 mb-sm-4">
                        <!-- Details-->
                        <div class="row mb-3">

                            <div class="col-sm-4 mb-2">
                                <div class="bg-secondary p-4 text-dark text-center"><span
                                        class="font-weight-semibold mr-2">Status: </span>Proses Checkout</div>
                            </div>
                            <div class="col-sm-4 mb-2">
                                <div class="bg-secondary p-4 text-dark text-center"><span
                                        class="font-weight-semibold mr-2">Expired Time:</span>
                                    <?= session()->get('TimeExpired'); ?></div>
                            </div>
                            <div class="col-sm-4 mb-2">
                                <!-- <div class="bg-secondary p-4 text-dark text-center"><span
                                        class="font-weight-semibold mr-2">Shipped via:</span>UPS Ground</div> -->
                            </div>
                        </div>
                        <!-- Progress-->
                        <div class="steps">
                            <div class="steps-header">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="40"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="steps-body">
                                <table class="table table-hover table-striped" style="width: 100%;">
                                    <thead>
                                        <tr class="col_oran">
                                            <th>Kode Trx</th>
                                            <th>Unit </th>
                                            <th>PES </th>
                                            <th>Tanggal</th>
                                            <th>Jam </th>
                                            <th>Harga / Jam</th>
                                            <th>Total Harga</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="checkout-table">

                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <!-- Footer-->
                        <div class="d-sm-flex flex-wrap justify-content-between align-items-center text-center pt-4">
                            <span>
                                <input type="hidden" value="true" name="konfirm">
                                <button type="submit" class="btn btn-primary btn-sm mt-2" id="btnCheckout">
                                    Checkout</button>
                                <a class="btn btn-secondary btn-sm mt-2" href="">
                                    Kembali</a>

                            </span>
                            <div class="custom-control custom-checkbox mt-2 mr-3">
                                <input class="custom-control-input" type="checkbox" id="notify-me" checked="">
                                <label class="custom-control-label" for="notify-me">Notify me when order is
                                    delivered</label>

                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
</section>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-md5/2.5.0/js/md5.min.js"></script>
<script src="assets/assets/js/front/unit/unit_checkout.js"></script>
<script>
$(document).ready(function() {
    $(document).ready(function() {
        $.ajax({
            url: 'unit-checkout-list',
            method: 'GET',
            success: function(response) {
                $('#checkout-table').html(response);

            }
        });

    });

    $('#unit-konfirm').submit(function(e) {
        //header form
        $.ajax({
            url: "unit-konfirm",
            type: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {
                var msg = JSON.parse(data);
                timer_reload();
            },
            error: function(data) {
                Swal.fire('Oops,', 'Konfirmasi Gagal!', 'error');
            }
        });

        e.preventDefault();
    });
});

function timer_reload() {
    setTimeout(function() {
        window.location.href = "unit-payment";
    }, 1400);
}
</script>