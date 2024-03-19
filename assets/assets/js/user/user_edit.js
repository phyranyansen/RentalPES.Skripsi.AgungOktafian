
//EDIT USER
$(document).ready(function() {
    $(document).on('click', '#unit_id', function() {
        var id = $(this).attr('data-unit');
        // console.log(id);

        $.ajax({
            url     : 'get-user',
            method  : 'POST',
            data    : {
                id_user : id
            },
            success: function(data) {
               var msg = JSON.parse(data);
                console.log(msg);
                 var id_user        = msg.Id_User;
                 var username       = msg.Username;
                 var email          = msg.Email;
                 var alamat         = msg.Alamat;
                 var no_telp        = msg.No_Telp;
                 var status         = msg.Status;

                 $('#id_user').val(id_user);
                 $('#username').val(username);
                 $('#email').val(email);
                 $('#alamat').val(alamat);
                 $('#no_telp').val(no_telp);
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
    $('#edit-user').submit(function(){

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
                    url  : 'edit-user',
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
                                url: 'data-user',
                                method: 'GET',
                                success: function(response) {
                                  $('#user-table').html(response);
                               
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