<!-- Custom Styled Validation -->
<form class="row g-3" action="javascript:void(0);" id="form-order">
    <div class="row">
        <div class="col-md-6">
            <label for="validationCustom01" class="form-label"><b>Book Date </b> </label>
            <!-- <input type="date" class="form-control" id="validationCustom01" required> -->
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">
                    <i class="bx bxs-calendar"></i></span>
                <input type="text" value="<?= date('d M Y') ?>" name="startDate" id="startDate" class="form-control"
                    required readonly>
            </div>
        </div>
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <label for="validationCustom01" class="form-label"><b>Book / Time</b> </label>
            <div class="row mb-3">
                <div class="col-md-12">
                    <select class="form-select" name="jam" aria-label="Default select example" id="jam">
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
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label"><b>Start Time</b> </label>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="bx bxs-time-five"></i></span>
                        <input type="text" name="startTime"
                            value="<?php date_default_timezone_set('Asia/Jakarta'); $currentDateTime = time(); echo $newDateTime = date('h:i A', $currentDateTime);?>"
                            id="startTime" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label"><b>End Time</b> </label>
                    <div class="input-group mb-3" style="background-color: whitesmoke;">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="bx bxs-time-five"></i></span>
                        <input type="text" name="endTime"
                            value="<?php date_default_timezone_set('Asia/Jakarta'); $currentDateTime = time(); echo $newDateTime = date('h:i A', $currentDateTime);?>"
                            id="endTime" class="form-control" readonly>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-6">
            <label for="validationCustom01" class="form-label"><b>Playstation</b> </label>
            <div class="row mb-3">
                <div class="col-md-12">
                    <select class="form-select" name="playstation" aria-label="Default select example" id="playStation">
                        <?php foreach($pes as $row) { ?>
                        <option value="<?= $row['Id_Playstation'] ?>"><?= $row['Nama_Alias'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="validationCustom01" class="form-label"><b>Result</b> </label>
            <div class="row mb-3">
                <div class="col-md-12">
                    <input type="text" class="form-control" id="resultPES" disabled>
                </div>
            </div>
        </div>


    </div>
    <div class="col-md-12">
        <!-- <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div> -->
        <button type="submit" class="btn text-light" style="background-color:#f16a41">Get Order</button>
    </div>
</form><!-- End Custom Styled Validation -->

<script src="assets/assets/js/transaction/transaction_get.js"></script>
<script src="assets/assets/js/transaction/transaction_form.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>