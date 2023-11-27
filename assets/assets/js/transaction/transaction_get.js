$(document).ready(function() {
    $.ajax({
      url: 'transaction-get',
      method: 'GET',
      success: function(response) {
        $('#transaction-list').html(response);
     
      }
    });

    function updateEndTime() {
      // Dapatkan waktu awal yang dipilih
      var startTime = $("#startTime").val();

      // Parse waktu awal untuk mendapatkan jam dan menit
      var parts = startTime.split(':');
      var startHours = parseInt(parts[0]);
      var startMinutes = parseInt(parts[1]);

      // Hitung waktu akhir dengan menambahkan 1 jam ke waktu awal
      var endHours = startHours + 1;

      // Dapatkan menit saat ini
      var currentMinutes = new Date().getMinutes();

      // Setel menit pada waktu akhir sama dengan menit saat ini
      var endMinutes = currentMinutes;

      // Format waktu akhir
      var endTime = ("0" + endHours).slice(-2) + ":" + ("0" + endMinutes).slice(-2);

      // Perbarui field endTime
      $("#endTime").val(endTime);

      // Setel step untuk menit secara dinamis berdasarkan menit saat ini
      var timepickerOptions = {
          'timeFormat': 'h:i A',
          'scrollDefault': 'now',
          'forceRoundTime': true,
          'step': currentMinutes
      };

      // Hancurkan dan inisialisasi kembali timepicker untuk field endTime dengan opsi yang diperbarui
      $("#endTime").timepicker('remove'); // Gunakan 'remove' alih-alih 'destroy'
      $("#endTime").timepicker(timepickerOptions);
  }

  // Lampirkan fungsi updateEndTime ke acara changeTime pada field startTime
  $("#startTime").on('changeTime', function() {
      updateEndTime();
  });

  // Inisialisasi timepicker untuk field startTime
  $("#startTime").timepicker({
      'timeFormat': 'h:i A',
      'scrollDefault': 'now',
      'forceRoundTime': true,
      'step': 15 // Isi nilai step awal (contoh: 15 menit)
  });

  // Inisialisasi timepicker untuk field endTime
  $("#endTime").timepicker({
      'timeFormat': 'h:i A',
      'scrollDefault': 'now',
      'forceRoundTime': true,
      'step': 15 // Isi nilai step awal (contoh: 15 menit)
  });
});
