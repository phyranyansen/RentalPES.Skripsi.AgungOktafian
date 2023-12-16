$(document).ready(function() {
    $.ajax({
      url: 'unit-available',
      method: 'GET',
      success: function(response) {
        $('#unit-table').html(response);
     
      }
    });

});