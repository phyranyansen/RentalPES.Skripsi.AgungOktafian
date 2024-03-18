$(document).ready(function() {
    $.ajax({
      url: 'data-unit',
      method: 'GET',
      success: function(response) {
        $('#unit-table').html(response);
     
      }
    });

});