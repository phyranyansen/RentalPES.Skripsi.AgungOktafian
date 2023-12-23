<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">

                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">

                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Transaction <span>| Today</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bx bx-money"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?= $trx['jumlah']; ?></h6>
                                    <span class="text-success small pt-1 fw-bold">12%</span> <span
                                        class="text-muted small pt-2 ps-1">increase</span>

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card revenue-card">

                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Revenue <span>| This Month</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bx bx-wallet"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>Rp <?= number_format($pendapatan['pendapatan'], 2); ?></h6>
                                    <span class="text-success small pt-1 fw-bold">8%</span> <span
                                        class="text-muted small pt-2 ps-1">increase</span>

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Revenue Card -->

                <!-- Customers Card -->
                <div class="col-xxl-4 col-xl-12">

                    <div class="card info-card customers-card">

                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Customers <span>| This Year</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?= $user['jumlah'] ?></h6>
                                    <span class="text-danger small pt-1 fw-bold">12%</span> <span
                                        class="text-muted small pt-2 ps-1">decrease</span>

                                </div>
                            </div>

                        </div>
                    </div>

                </div><!-- End Customers Card -->


                <!-- Recent Sales -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">

                        <!-- <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">Next Year</a></li>
                            </ul>
                        </div> -->

                        <div class="card-body">
                            <h5 class="card-title">Monitoring <span>| Today, <?= date('d M Y') ?></span></h5>

                            <div id="table-monitoring"></div>

                        </div>

                    </div>
                </div><!-- End Recent Sales -->


                <!-- Recent Available -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">

                        <!-- <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">Next Year</a></li>
                            </ul>
                        </div> -->

                        <div class="card-body">
                            <h5 class="card-title">Unit Available <span>| Today,
                                    <?= date('d M Y') ?></span></h5>
                            <div id="table-unit"></div>

                        </div>

                    </div>
                </div><!-- End Recent Sales -->



            </div>
        </div><!-- End Left side columns -->



    </div>
</section>
<script src="assets/assets/js/dashboard/dashboard.js"></script>

<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

    function updateTimers() {
        $("input.end-time").each(function() {
            var endTime = $(this).val();
            var endTimeMoment = moment(endTime);
            var nowMoment = moment();
            var duration = moment.duration(endTimeMoment.diff(nowMoment));
            var totalSeconds = duration.asSeconds();

            // Tambahkan kondisi untuk menghentikan waktu dan menetapkan ke 0 jika telah mencapai endTime
            if (totalSeconds <= 0) {
                $(this).next("p.show_time").text("0:0:0").removeClass(
                    "text-warning text-danger text-primary").addClass("text-danger");

                //Save to history trx
                $.ajax({
                    url: 'dashboard-refresh-monitor',
                    method: 'GET',
                    success: function(response) {
                        console.log(response);
                    }
                });


                $.ajax({
                    url: 'dashboard-monitoring',
                    method: 'GET',
                    success: function(response) {
                        $('#table-monitoring').html(response);

                    }
                });


                //---------------------------------
                $.ajax({
                    url: 'dashboard-unit',
                    method: 'GET',
                    success: function(response) {
                        $('#table-unit').html(response);

                    }
                });

            } else {
                var hours = Math.floor(totalSeconds / 3600);
                var minutes = Math.floor((totalSeconds % 3600) / 60);
                var seconds = Math.floor(totalSeconds % 60);
                var formattedTime = hours + ":" + minutes + ":" + seconds;

                var textClass = "";
                if (totalSeconds < 1800) { // Kurang dari 30 menit
                    textClass = "text-danger";
                } else if (totalSeconds < 3600) { // Kurang dari 1 jam
                    textClass = "text-warning";
                } else { // 1 jam atau lebih
                    textClass = "text-primary";
                }

                $(this).next("p.show_time").text(formattedTime).removeClass(
                    "text-warning text-danger text-primary").addClass(textClass);
            }
        });
    }

    // Panggil updateTimers setiap detik
    setInterval(updateTimers, 1000);
});
</script>