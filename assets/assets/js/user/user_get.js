$(document).ready(function() {
    $.ajax({
      url: 'user-get',
      method: 'GET',
      success: function(response) {
        $('#user-table').html(response);
     
      }
    });

});


