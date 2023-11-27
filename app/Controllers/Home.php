<?php

namespace App\Controllers;

use App\Models\PlaystationModel;
use App\Models\RiwayatTransactionModel;

class Home extends BaseController
{

    function __construct()
    {
        //set Time Indonesia
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'id_ID');
        $this->playstation = new PlaystationModel();
        $this->transaction = new RiwayatTransactionModel();
    }



    public function index(): string
    {
        $data    = [
            'pagetitle' => 'Dashboard',
        ];
        $content = [
            'title'     => 'Rent',
            'header'    => view('templates/header'),
            'breadcumb' => view('templates/breadcumb', $data),
            'sidebar'   => view('templates/side_bar', $data),
            'page'      => view('pages/dashboard/dashboard_page')
        ];
        return view('index', $content);
    }


    public function get_monitoring()
    {
        $html = '';
        $no=1;
        $data = $this->playstation->get_monitoring();
        $html.= '
        <table class="table" id="data_monitoring">
        <thead>
            <tr>
                <th scope="col">Kode TRX</th>
                <th scope="col">Pelanggan</th>
                <th scope="col">Waktu Bermain</th>
                <th scope="col">Total Bermain</th>
                <th scope="col">Timer</th>
            </tr>
        </thead>
        <tbody>
           ';
        foreach($data as $row) {
            $html.= "<tr>";
            $html.= "<th scope='row'><span class='text-primary'>".$row['Kode_Pemesanan']."</span></th>";
            $html.= "<td>".$row['Username']."</td>";
            $html.= "<td>".$row['Start_Time']." - ".$row['End_Time']."</td>";
            $html.= "<td>".$row['Lama_Bermain']."</td>";
            $html.= "<th>
                        <input type='hidden' value='".$row['Id_Unit']."' id='id_unit'>
                        <input type='hidden' class='end-time' value='".date('Y-m-d H:i:s', strtotime($row['End_Time']))."'>
                        <p class='show_time text-primary' style='font-size:15px'> </p>
                        
                     </th>";
            
        
            $html.="</tr>";
            $no++;
        }
        $html .= '
        <script type="text/javascript">
            $(document).ready(function() {
                $("#data_monitoring").DataTable({
                    "paging": false,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                });
             });
        </script>
        ';
        echo $html;
        // $this->move_to_history();
  }


  public function move_to_history()
  {
      $data   = $this->playstation->get_monitoring();
      $results = [];
  
      foreach ($data as $row) {
          $date = date('Y-m-d H:i:s', strtotime($row['End_Time']));
  
          if ($date < date('Y-m-d H:i:s')) {
              $results[] = [
                  'Id_Unit'           => $row['Id_Unit'],
                  'Kode_Pemesanan'    => $row['Kode_Pemesanan'],
                  'Tanggal_Pemesanan' => $row['Tanggal_Pemesanan'],
                  'Start_Time'        => $row['Start_Time'],
                  'End_Time'          => $row['End_Time'],
                  'Lama_Bermain'      => $row['Lama_Bermain'],
                  'Total_Pembayaran'  => $row['Total_Pembayaran'],
                  'Bayar_Via'         => $row['Bayar_Via'],
                  'Status_Order'      => $row['Status_Order'],
                  'Id_Guest'          => $row['Id_Guest'],
                  'Id_Bukti'          => $row['Id_Bukti'],
                  'Author'            => $row['Author']
              ];
              
              
              
          }
      }
      
      if($this->transaction->save_trx($results))
      {
          $this->transaction->delete_trx();
      }
  
  }
  

    
    public function get_available_unit()
    {
        $html = '';
        $no=1;
        $data = $this->playstation->get_available_unit();
        $html.= '<table class="table table-hover" id="unit-available" style="width: 100%;">
        <thead>
            <tr>
                <th scope="col">Kode Unit</th>
                <th scope="col">Nama Unit</th>
                <th scope="col">Playstation</th>
                <th scope="col">Harga Per Jam</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
           ';
        foreach($data as $row) {
            $html.= "<tr>";
            $html.= "<th scope='row'><span class='text-primary'>".$row['Kode_Unit']."</span></th>";
            $html.= "<td>".$row['Nama_Unit']."</td>";
            $html.= "<td>".$row['Nama_Playstation']."</td>";
            $html.= "<td>Rp ".number_format($row['Harga_Per_Hour'], 2)."</td>";
            $html.= "<th>";
            if($row['Keterangan']=='Tersedia')
            {
                $html.= "<span class='badge bg-success'>".$row['Keterangan']."</span>";
                
            }else{
                $html.= "<span class='badge bg-secondary-light'>".$row['Keterangan']."</span>";
           
            }
            
            $html.= "</th>";
        
            $html.="</tr>";
            $no++;
        }
        $html .= '
        <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            $("#unit-available").DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
            });
        });
    </script>';
        echo $html;
    }
}