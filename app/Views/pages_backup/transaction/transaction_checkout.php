<style>
.dashed-table {
    width: 100%;
    border-collapse: collapse;
    /* margin-top: 50px; */
    /* Menambahkan margin top agar tidak bertabrakan dengan watermark */
}

.dashed-table th,
.dashed-table td {
    border: 1px dashed black;
    padding: 10px;
    text-align: left;
}

.container {
    position: relative;
}

.watermark {
    color: grey;
    height: 20px;
    width: 520px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    font-size: 50px;
    transform: rotate(30deg);
    top: 70%;
    /* Pusatkan watermark di tengah vertikal */
    left: 70%;
    /* Pusatkan watermark di tengah horizontal */
    margin-top: -10px;
    /* Sesuaikan dengan setengah tinggi watermark */
    margin-left: -260px;
    /* Sesuaikan dengan setengah lebar watermark */
}
</style>


<table style="width: 30%;">
    <?php 
           $session   = session();
           $startDate = $session->get('startDate');
           $timestamp = strtotime(str_replace('/', '-', $startDate));
        ?>
    <tr>
        <th colspan="4">Booking Date / Time</th>
    </tr>
    <tr>
        <td><i class="ri ri-calendar-todo-fill"></i></td>
        <td style="width: 20%;">Tanggal</td>
        <td>:</td>
        <td><?= date('d F Y', $timestamp); ?></td>
    </tr>
    <tr>
        <td><i class="ri ri-time-fill"></i></td>
        <td style="width: 20%;">Jam</td>
        <td>:</td>
        <td><?= session()->get('startTime'); ?> - <?= session()->get('endTime'); ?></td>
    </tr>
</table>
<p class="float-end">
    <i class="ri ri-playstation-fill text-primary"></i> <?= session('nama_pes'); ?>

</p>
<br>
<hr style="width: 100%;">
<!-- <div class="card">
    <br>
    <div class="card-body"> -->
<div class="row">
    <div class="col-md-6">
        <form action="javascript:void(0);" id="formCheckout">
            <table style="width: 100%;">
                <tr>
                    <td>Playstation Unit</td>
                    <td>:</td>
                    <td colspan="2">
                        <input type="text" class="form-control bg-body-secondary"
                            value="<?= $session->get('nama_unit'); ?>" name="unit" placeholder="Unit" readonly>
                    </td>
                </tr>
                <tr>
                    <td>Customer</td>
                    <td>:</td>
                    <td colspan="2">
                        <input type="text" class="form-control" name="customer" placeholder="Customer" id="customer"
                            required>
                    </td>
                </tr>
                <tr>
                    <td>Payment Type</td>
                    <td>:</td>
                    <td colspan="2">
                        <select class="form-select" aria-label="Default select example" name="paymentType"
                            id="paymentType">
                            <option value="Cash">Cash</option>
                            <option value="Transfer Bank">Transfer Bank</option>
                        </select>
                    </td>
                </tr>
                <tr id="totalPriceRow">
                    <td>Total Price</td>
                    <td>:</td>
                    <td>
                        <div class="input-group">
                            <input type="text" class="form-control"
                                value="<?= number_format($session->get('price_hour'), 2) ?>" placeholder="0.00"
                                aria-label="Amount (to the nearest dollar)" readonly>
                            <input type="hidden" name="totalPlays" value="<?= $session->get('total_plays') ?> Jam">
                            <span class="input-group-text">x <b><?= $session->get('total_plays'); ?></b></span>
                        </div>
                    </td>
                    <td>
                        <input type="text" class="form-control bg-body-secondary" style="font-weight: bold;"
                            value="<?= number_format($session->get('total_price'), 2) ?>" name="totalPrice"
                            placeholder="0.00" id="totalPrice" readonly>
                    </td>
                </tr>
                <tr id="uploadProof">
                    <td>Upload Proof</td>
                    <td>:</td>
                    <td colspan="2">
                        <input type="file" class="form-control" name="bukti" accept=".jpg,.jpeg,.png" id="formFile">
                    </td>
                </tr>
                <tr id="payRow">
                    <td>Cash On Payment</td>
                    <td>:</td>
                    <td colspan="2">
                        <input type="number" value="0" class="form-control" min="0" name="payment" placeholder="0.00"
                            id="payment" required>
                        <input type="hidden" name="bayar" id="bayar">
                    </td>
                </tr>
                <tr id="returnRow">
                    <td>Return Payment</td>
                    <td>:</td>
                    <td colspan="2">
                        <input type="text" class="form-control bg-body-secondary" name="price" id="return"
                            placeholder="0.00" readonly>
                        <input type="hidden" name="kembalian" id="kembalian">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="2">
                        <p style="margin-top: 2%;">

                            <button class="btn btn-primary" type="button" id="disabledBtn" disabled>
                                <i class="ri ri-exchange-dollar-fill"></i>
                                Checkout
                            </button>
                            <button class="btn btn-primary" type="button" id="loadingBtn" disabled>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Loading...
                            </button>
                            <button class="btn btn-danger" id="cancelDisabledBtn" disabled>
                                <i class="ri ri-close-fill"></i>Cancel</button>


                            <!-- ----------------------------------------------------------------------------------- -->
                            <button class="btn btn-primary" type="submit" id="checkoutBtn"
                                <?= $session->get('Total_Pembayaran') != null ? 'disabled' : ''; ?>>
                                <i class="ri ri-exchange-dollar-fill"></i>
                                Checkout
                            </button>
                            <button class="btn btn-danger" id="cancelBtn"
                                <?= $session->get('Total_Pembayaran') != null ? 'disabled' : ''; ?>><i
                                    class="ri ri-close-fill"></i>
                                Cancel</button>
                        </p>
                    </td>
                </tr>
            </table>
            <!-- <input type="text" name="" id="fileName"> -->

        </form>
    </div>
    <div class="col-md-6">

        <table class="dashed-table" style="width: 100%;">
            <tr>
                <td colspan="2">
                    <div class="row">
                        <div class="col-md-8">
                            <b>NOTA PEMBAYARAN</b>
                            <p>(N.001/10/11/2023) <br> Tgl Nota : <?= date('d F Y'); ?></p>

                        </div>
                        <div class="col-md-4" style="text-align: center;">
                            <span class="float-end"> <img src="assets/assets/img/logo.png" alt="">
                                <span class="d-none d-lg-block"
                                    style="font-weight: 100; font-size: small;">GAMEBOX</span>
                        </div>
                    </div>

                    <!-- <span class="d-none d-lg-block">RENT</span></span> -->
                </td>
            </tr>
            <tr>
                <td style="width: 50%;">Cashier <span class="float-end">:</span></td>
                <td>
                    <input type="text" value="<?= $session->get('username'); ?>"
                        style="border: none; background-color: white;" id="cashier" disabled>
                </td>
            </tr>
            <tr>
                <td style="width: 50%;">Customer <span class="float-end">:</span></td>
                <td>
                    <input type="text" value="<?= $session->get('Username'); ?>"
                        style="border: none; background-color: white;" id="pelanggan" disabled>
                </td>
            </tr>
            <tr>
                <td style="width: 50%;">Book Date / Time <span class="float-end">:</span></td>
                <td>
                    <input type="text" value="<?= $session->get('Tanggal_Pemesanan'); ?>"
                        style="border: none; background-color: white;" id="bookDate" disabled>
                    <br>
                    <input type="text" value="<?= $session->get('StartTime'); ?>"
                        style="border: none; background-color: white;" id="bookTime" disabled>
                </td>
            </tr>
            <tr>
                <td style="width: 50%;">Total Plays <span class="float-end">:</span></td>
                <td>
                    <input type="text" value="<?= $session->get('Lama_Bermain'); ?>"
                        style="border: none; background-color: white;" id="lamaBermain" disabled>
                </td>
            </tr>
            <tr>
                <td style="width: 50%;">Payment Type <span class="float-end">:</span></td>
                <td>
                    <input type="text" value="<?= $session->get('Bayar_Via'); ?>"
                        style="border: none; background-color: white;" id="tipePembayaran" disabled>
                </td>
            </tr>
            <tr>
                <td style="width: 50%;">Total Price <span class="float-end">:</span></td>
                <td>
                    <input type="text"
                        value="<?= $session->get('Total_Pembayaran') != null ? 'Rp ' . $session->get('Total_Pembayaran') : ''; ?>"
                        style="border: none; background-color: white;" id="totalBayar" disabled>

                </td>
            </tr>
            <tr>
                <td style="width: 50%;">Cash On Payment <span class="float-end">:</span></td>
                <td>
                    <input type="text"
                        value="<?= $session->get('Bayar') != null ? 'Rp ' . $session->get('Bayar') : ''; ?>"
                        style="border: none; background-color: white;" id="pembayaran" disabled>

                </td>
            </tr>
            <tr>
                <td style="width: 50%;">Return Payment<span class="float-end">:</span></td>
                <td>
                    <input type="text"
                        value="<?php echo $session->get('Kembalian') != null ? 'Rp ' . $session->get('Kembalian') : ''; ?>"
                        style="border: none; background-color: white;" id="kembali" disabled>

                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center; font-size: small;">
                    * Thank You *
                    <p>-- Have fun and stay spirited! --</p>
                </td>
            </tr>
        </table>
        <div class="watermark" <?= $session->get('Total_Pembayaran') == null ? 'id="watermark"' : ''; ?>>
            L U N A S
        </div>

        <br>
        <span class="float-end">
            <button class="btn btn-light btn-sm"><i class="ri ri-printer-line text-primary"></i>
                Print</button>
            <button class="btn btn-light btn-sm"><i class="bx bxs-file-pdf text-danger"></i>
                PDF</button>
            <button class="btn btn-light btn-sm"><i class="bx bx-upload"></i>
                Selesai</button>
        </span>
        <br>
        <br>

    </div>

</div>

<script src="assets/assets/js/transaction/transaction_checkout.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>