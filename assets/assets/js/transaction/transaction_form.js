$(document).ready(function() {

    //-----------------------------------------------------------------------------
    // Lampirkan fungsi updateresultPES ke acara change pada elemen playStation
    var pes = $('#playStation').val();
    get_playstation(pes);

     $('#playStation').on('change', function() {
         var pes = $('#playStation').val();
         get_playstation(pes);
     });
  //---------------------------------------------------------------------



  //------------------------------------------------------------------------------
  //INSERT
 //------------------------------------------------------------------------------
    $('#form-order').submit(function(e) {
       var startDate = $('#startDate').val();
       var startTime = $('#startTime').val();
    //    var endDate   = $('#endDate').val();
       var endTime   = $('#endTime').val();
     

        //-------------------------------------------
        if(startDate !="" && startTime !="" && endTime !="")
        {
           
            $.ajax({
                url : "transaction-params",
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                success : function(data) {
                    showloading_data();
                },
                error : function(data) {
                    Swal.fire('Failed!', 'Something went wrong!', 'error');
                }
            })

        }
        e.preventDefault();
    });

 

});


function get_playstation(pes)
{
    
    $.ajax({
        url     : 'transaction-params-playstation',
        method  : 'POST',
        data    : {
            id_Pes : pes
        },
        success: function(data) {
            var msg = JSON.parse(data);
            $('#resultPES').val(msg.playstationName);
            
        },
        // error   : function(data) {
        //     console.log(data);
        //     Swal.fire('Failed!', 'Something went wrong! '+ data, 'error');
        // }

    });

}


function showloading_data()
    {
        let timerInterval
        Swal.fire({
        title: 'Loading...',
        html: 'Harap tunggu!',
        timer: 2000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
            b.textContent = Swal.getTimerLeft()
            }, 100)
        },
        willClose: () => {
            clearInterval(timerInterval);
            // Swal.fire('Sukses!', 'Select data berahasil', 'success');
            window.location.href = 'transaction-order';
        }
        }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log('I was closed by the timer')
        }
        })
    }