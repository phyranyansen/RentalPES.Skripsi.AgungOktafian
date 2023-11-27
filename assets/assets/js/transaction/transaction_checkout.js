$(document).ready(function() {
    var customerVal = $('#customer').val();
    var cashOnVal   = $('#payment').val();
    $('#loadingBtn').hide();
    $('#disabledBtn').hide();
    $('#cancelDisabledBtn').hide();
    $('#watermark').hide();
    
    $('#formCheckout').submit(function(e) {
        
        $('#checkoutBtn').hide();
        $('#loadingBtn').show();


        // Simpan konteks this
        var formContext = this;


        var paymentType = $('#paymentType').val();
            if(paymentType=='Transfer Bank')
            {

                setTimeout(function() {
                    $.ajax({
                        url: "transaction-form",
                        type: "POST",
                        data: new FormData(formContext), // Gunakan konteks this yang disimpan
                        processData: false,
                        contentType: false,
                        cache: false,
                        success: function(data) {
                            Swal.fire('Sukses!', 'Transaksi Berhasil!', 'success');
                            $('#loadingBtn').hide();
                            $('#checkoutBtn').hide();
                            $('#disabledBtn').show();
                            $('#cancelDisabledBtn').show();
                            $('#cancelBtn').hide();
                            $('#watermark').show();
    
                            var msg = JSON.parse(data);
                            $('#pelanggan').val(msg.Username);
                            $('#bookDate').val(msg.Tanggal_Pemesanan + ',');
                            $('#bookTime').val(msg.StartTIme + ' - ' + msg.EndTime);
                            $('#lamaBermain').val(msg.Lama_Bermain);
                            $('#tipePembayaran').val(msg.Bayar_Via);
                            $('#totalBayar').val('Rp ' + msg.Total_Pembayaran);
                            $('#pembayaran').val('Rp ' + msg.Bayar);
                            $('#kembali').val('Rp ' + msg.Kembalian);
                            $('#fileName').val(msg.Bukti);
                            
    
                        },
                        error: function(data) {
                            Swal.fire('Maaf :)', 'Unit ini telah dibooking!', 'error');
                        }
                    });
                }, 2000);
            }else{

                setTimeout(function() {
                    $.ajax({
                        url: "transaction-save",
                        type: "POST",
                        data: new FormData(formContext), // Gunakan konteks this yang disimpan
                        processData: false,
                        contentType: false,
                        cache: false,
                        success: function(data) {
                            Swal.fire('Sukses!', 'Transaksi Berhasil!', 'success');
                            $('#loadingBtn').hide();
                            $('#checkoutBtn').hide();
                            $('#disabledBtn').show();
                            $('#cancelDisabledBtn').show();
                            $('#cancelBtn').hide();
                            $('#watermark').show();
    
                            var msg = JSON.parse(data);
                            $('#pelanggan').val(msg.Username);
                            $('#bookDate').val(msg.Tanggal_Pemesanan + ',');
                            $('#bookTime').val(msg.StartTIme + ' - ' + msg.EndTime);
                            $('#lamaBermain').val(msg.Lama_Bermain);
                            $('#tipePembayaran').val(msg.Bayar_Via);
                            $('#totalBayar').val('Rp ' + msg.Total_Pembayaran);
                            $('#pembayaran').val('Rp ' + msg.Bayar);
                            $('#kembali').val('Rp ' + msg.Kembalian);
                            
    
                        },
                        error: function(data) {
                            Swal.fire('Maaf :)', 'Unit ini telah dibooking!', 'error');
                        }
                    });
                }, 2000);
            }
          

       

        e.preventDefault();
    });
 
  
  
  
   // Sembunyikan field upload saat halaman dimuat
    $('#uploadProof').hide();

    // Tampilkan atau sembunyikan field upload berdasarkan opsi pembayaran yang dipilih
    $('#paymentType').change(function() {
        if ($(this).val() === 'Cash') {
            $('#uploadProof').hide();
            $('#totalPriceRow').show();
            $('#payRow').show();
            $('#returnRow').show();
        } else if ($(this).val() === 'Transfer Bank') {
            $('#uploadProof').show();
            $('#totalPriceRow').show();
            $('#payRow').hide();
            $('#returnRow').hide();
        }
    });

    $('#payment').on('input', function() {
        var paymentValue = $('#payment').val();
        var totalPriceValue = $('#totalPrice').val();

        // Hapus koma jika ada
        var totalPrice = parseFloat(totalPriceValue.replace(/,/g, '')) || 0;
        var payment = parseFloat(paymentValue.replace(/,/g, '')) || 0;

        if (paymentValue === '' || payment < totalPrice) {
            $('#return').val('');
            $('#kemabalian').val('0');
            $('#bayar').val('0');
        } else {
            var result = payment - totalPrice;
            // Format hasil dengan function number_format
            $('#return').val('Rp' + number_format(result, 2, '.',
                ',')); 
            $('#kembalian').val(result);
            $('#bayar').val(payment);
        }
    });

    // Fungsi untuk format number seperti PHP
    function number_format(number, decimals, decPoint, thousandsSep) {
        decimals = decimals || 0;
        number = parseFloat(number);

        if (!decPoint || !thousandsSep) {
            decPoint = '.';
            thousandsSep = ',';
        }

        var roundedNumber = Math.round(Math.abs(number) * ('1e' + decimals)) + '';
        var numbersString = decimals ? roundedNumber.slice(0, decimals * -1) : roundedNumber;
        var decimalsString = decimals ? roundedNumber.slice(decimals * -1) : '';
        var formattedNumber = "";

        while (numbersString.length > 3) {
            formattedNumber += thousandsSep + numbersString.slice(-3);
            numbersString = numbersString.slice(0, -3);
        }

        return (number < 0 ? '-' : '') + numbersString + formattedNumber + (decimalsString ? decPoint +
            decimalsString : '');
    }

});