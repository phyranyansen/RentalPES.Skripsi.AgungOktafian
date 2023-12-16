$(document).ready(function() {

 
  //------------------------------------------------------------------------------
  //INSERT
 //------------------------------------------------------------------------------
    $('#unit-order').submit(function(e) {
            $.ajax({
                url : "unit-order",
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                success : function(data) {
                    showloading_data_available();
                },
                error : function(data) {
                    Swal.fire('Failed!', 'Something went wrong!', 'error');
                }
            })

        e.preventDefault();
    });

 

});




function showloading_data_available()
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
          //UNIT AVAILABLE-------------------------------
            $.ajax({
                url: 'unit-available',
                method: 'GET',
                success: function(response) {
                  $('#unit-table').html(response);
               
                }
              });
        }
        }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log('I was closed by the timer')
        }
        })
    }