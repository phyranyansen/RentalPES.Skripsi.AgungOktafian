$(document).ready(function() {
    $.ajax({
      url: 'data-transaksi-get',
      method: 'GET',
      success: function(response) {
        $('#history-table').html(response);
     
      }
    });

});