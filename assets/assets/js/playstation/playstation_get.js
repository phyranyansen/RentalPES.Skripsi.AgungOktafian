$(document).ready(function() {
      $.ajax({
        url: 'playstation-get',
        method: 'GET',
        success: function(response) {
          $('#playstation-table').html(response);
       
        }
      });

});