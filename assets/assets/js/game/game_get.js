$(document).ready(function() {
    $.ajax({
      url: 'games-get',
      method: 'GET',
      success: function(response) {
        $('#game-table').html(response);
     
      }
    });

});