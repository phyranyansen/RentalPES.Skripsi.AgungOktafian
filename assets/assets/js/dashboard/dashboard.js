
// dashboard-monitoring
$(document).ready(function() {
  //-------------------------------------
    $.ajax({
      url: 'dashboard-monitoring',
      method: 'GET',
      success: function(response) {
        $('#table-monitoring').html(response);
     
      }
    });


    //---------------------------------
    $.ajax({
      url: 'dashboard-unit',
      method: 'GET',
      success: function(response) {
        $('#table-unit').html(response);
     
      }
    });
});