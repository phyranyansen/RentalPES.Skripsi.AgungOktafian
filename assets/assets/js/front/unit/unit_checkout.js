$(document).ready(function() {
    $.ajax({
      url: 'unit-checkout-list',
      method: 'GET',
      success: function(response) {
        $('#checkout-table').html(response);
     
      }
    });

});