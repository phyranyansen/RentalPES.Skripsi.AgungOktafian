<table style="width: 30%;">
    <?php 
            $startDate = session()->get('startDate');
            $timestamp = strtotime(str_replace('/', '-', $startDate));
            $playstation = null;
                if(session()->get('pes')=='1')
                {
                    $playstation = 'Plyastation 2';
                }elseif(session()->get('pes')=='2')
                {
                    $playstation = 'Plyastation 3';
        
                }else
                {
                    $playstation = 'Plyastation 4';
        
                }
            ?>
    <tr>
        <th colspan="4">Booking Date / Time</th>
    </tr>
    <tr>
        <td><i class="ri ri-calendar-todo-fill"></i></td>
        <td style="width: 20%;">Tanggal</td>
        <td>:</td>
        <td>
            <?= date('d F Y', $timestamp);?>
        </td>

    </tr>
    <tr>
        <td><i class="ri ri-time-fill"></i></td>
        <td style="width: 20%;">Jam</td>
        <td>:</td>
        <td><?= session()->get('startTime'); ?> - <?= session()->get('endTime'); ?></td>
    </tr>
</table>
<p class="float-end">
    <i class="ri ri-playstation-fill text-primary"></i> <?= $playstation; ?>

</p>
<br>
<hr style="width: 100%;">
<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Unit Playstation</th>
            <th scope="col">Price / Hour</th>
            <th scope="col">Total Price</th>
            <th scope="col">#Order</th>
        </tr>
    </thead>
    <tbody id="transaction-list">

    </tbody>
</table>
<br>
<br>
<script src="assets/assets/js/transaction/transaction_get.js"></script>
<script src="assets/assets/js/transaction/transaction_order.js"></script>