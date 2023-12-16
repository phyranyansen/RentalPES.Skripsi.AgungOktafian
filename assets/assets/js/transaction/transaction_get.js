$(document).ready(function() {
    $.ajax({
      url: 'transaction-get',
      method: 'GET',
      success: function(response) {
        $('#transaction-list').html(response);
     
      }
    });

    // Event listener for the #jam select element
    $('#jam').on('change', function() {
      // Get the selected value
      var selectedJam = parseInt($(this).val());

      // Get the current date and time
      var currentDate = new Date();
      var currentHours = currentDate.getHours();
      var currentMinutes = currentDate.getMinutes();

      // Calculate end time based on selected jam
      // var endTime = new Date(currentDate.getTime() + selectedJam * 60 * 60 * 1000);
      var endTime = new Date(currentDate.getTime() + (selectedJam * 60 * 60 * 1000) + (5 * 60 *
          1000));


      // Format hours and minutes
      var formattedCurrentTime = currentHours + ':' + (currentMinutes < 10 ? '0' : '') +
          currentMinutes;
      var formattedEndTime = endTime.getHours() + ':' + (endTime.getMinutes() < 10 ? '0' : '') +
          endTime.getMinutes();

      // Update startTime and endTime fields
      $('#startTime').val(formattedCurrentTime);
      $('#endTime').val(formattedEndTime);
  });

  // Trigger the change event initially to set the initial values
  $('#jam').trigger('change');
});
