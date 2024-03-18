
//EDIT USER
$(document).ready(function() {
    $(document).on('click', '#unit_id', function() {
        var id = $(this).attr('data-unit');
        // console.log(id);

        $.ajax({
            url     : 'get-unit',
            method  : 'POST',
            data    : {
                id_unit : id
            },
            success: function(data) {
               var msg = JSON.parse(data);
              
                 var id_unit        = msg.Id_Unit;
                 var kode_unit      = msg.Kode_Unit;
                 var nama_unit      = msg.Nama_Unit;
                 var id_playstation = msg.Id_Playstation;
                 var keterangan     = msg.Keterangan;
                 var status         = msg.Status;

                 $('#id_unit').val(id_unit);
                 $('#kode_unit').val(kode_unit);
                 $('#nama_unit').val(nama_unit);
                 $('#id_playstation').val(id_playstation);
                 $('#status').val(status);
                 $('#keterangan').val(keterangan);
                //  project_detail();
              
            },
            error   : function(data) {
                Swal.fire('Failed!', 'Something went wrong! '+ data, 'error');
            }
    
        })
    });

    // function project_detail()
    // {
    //     $.ajax({
    //         url: 'project-aset',
    //         method: 'GET',
    //         success: function(response) {
    //           $('#detail-aset').html(response);
    //         }
    //       });
    // }
  
  });



  
//GANTI PROJECT
$(document).ready(function(){
    $('#edit-unit').submit(function(){

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary m-2',
                cancelButton: 'btn btn-warning m-2'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
            title: 'Anda yakin ingin mengubah status unit ini ?',
            text: "Status unit akan ditetapkan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Ubah!',
            cancelButtonText: 'Tidak',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url  : 'edit-unit',
                    type : 'POST',
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    success : function(response){
                        var msg = JSON.parse(response);
                        console.log(msg);
                        if(msg.code==200)
                        {
                            Swal.fire('Sukses!', 'Berhasil menyimpan perubahan!', 'success');
                            $.ajax({
                                url: 'data-unit',
                                method: 'GET',
                                success: function(response) {
                                  $('#unit-table').html(response);
                               
                                }
                              });
                        }else{
                            Swal.fire('Failed!', 'Gagal menyimpan perubahan!', 'error');
                        }
                    },
                    
                    error   : function(response){
                        console.log(response);
                        Swal.fire('Failed!', 'Something went wrong!', 'error');
                    }
        
                });
       
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled!',
                'File is not update :)',
                'info'
            )
        }

       
    })

});
})  