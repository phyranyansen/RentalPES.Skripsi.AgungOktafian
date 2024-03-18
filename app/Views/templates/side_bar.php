 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

     <ul class="sidebar-nav" id="sidebar-nav">

         <li class="nav-item">
             <a class="nav-link collapsed" href="dashboard">
                 <i class="bi bi-grid"></i>
                 <span>Dashboard</span>
             </a>
         </li><!-- End Dashboard Nav -->
         <li class="nav-item">
             <a class="nav-link collapsed" href="transaction">
                 <i class="bi bi-grid"></i>
                 <span>Transaction</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link collapsed" href="unit">
                 <i class="bi bi-playstation"></i>
                 <span>Unit Playstation</span>
             </a>
         </li>

         <li class="nav-item">
             <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-menu-button-wide"></i><span>Data Master</span><i
                     class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="data-playstation">
                         <i class="bi bi-circle"></i><span>Data Playstation</span>
                     </a>
                 </li>
                 <li>
                     <a href="data-transaksi">
                         <i class="bi bi-circle"></i><span>Data Transaksi</span>
                     </a>
                 </li>
                 <li>
                     <a href="data-user">
                         <i class="bi bi-circle"></i><span>Data User</span>
                     </a>
                 </li>
                 <!-- <li>
                     <a href="data-games">
                         <i class="bi bi-circle"></i><span>Data Game</span>
                     </a>
                 </li> -->
             </ul>
         </li><!-- End Components Nav -->





     </ul>

 </aside><!-- End Sidebar-->


 <script>
$(document).ready(function() {
    // Ambil URL halaman saat ini
    var currentURL = window.location.href;

    // Loop melalui semua elemen dengan kelas "nav-link"
    $('.nav-link').each(function() {
        // Ambil href dari setiap elemen
        var linkURL = $(this).attr('href');

        // Cek apakah URL halaman saat ini sesuai dengan href elemen
        if (currentURL.includes(linkURL)) {
            // Jika sesuai, hilangkan class "collapsed" dari elemen
            $(this).removeClass('collapsed');
            $(this).closest('li.nav-item').removeClass(
                'collapsed'); // Hapus class "collapse show"
            $(this).closest('li.nav-item').addClass(
                'active'); // Tambahkan class "active" ke elemen "li"
        }
    });

    // Cek khusus untuk sub-menu "Data Playstation"
    if (currentURL.includes("playstation")) {
        $(this).closest('li.nav-item').removeClass(
            'collapsed'); // Hapus class "collapse show"
        $('a[href="playstation"]').addClass('active');
        $('#components-nav').addClass('show'); // Tampilkan submenu
    }
    // Cek khusus untuk sub-menu "Data Playstation"
    if (currentURL.includes("games")) {
        $(this).closest('li.nav-item').removeClass(
            'collapsed'); // Hapus class "collapse show"
        $('a[href="games"]').addClass('active');
        $('#components-nav').addClass('show'); // Tampilkan submenu
    }
});
 </script>