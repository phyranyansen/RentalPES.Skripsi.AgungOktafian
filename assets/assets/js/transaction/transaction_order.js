$(document).ready(function() {
    $(document).on('click', '#order', function() {
        var id = $(this).attr('data-unit');
        console.log(id);
        $.ajax({
            url     : 'transaction-order-params',
            method  : 'POST',
            data    : {
                id_unit : id
            },
            success: function(data) {
               var msg = JSON.parse(data);
               if(msg.statusCode==200)
               {
                //    console.log(msg);
                   showloading_data();
               }
            },
            error   : function(data) {
                Swal.fire('Failed!', 'Something went wrong! '+ data, 'error');
            }
    
        });
    });
});


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
            window.location.href = 'transaction-checkout';
        }
        }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log('I was closed by the timer')
        }
        })
    }