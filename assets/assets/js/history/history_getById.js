$(document).ready(function() {
    $.ajax({
      url: 'riwayat-cek',
      method: 'GET',
      success: function(response) {
        $('#history-table').html(response);
     
      }
    });

});