$(document).ready(function() {
    $.ajax({
      url: 'unit-payment-list',
      method: 'GET',
      success: function(response) {
        $('#checkout-table').html(response);
     
      }
    });

});