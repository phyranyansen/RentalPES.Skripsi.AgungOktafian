<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PlaystationModel;
use App\Models\RiwayatTransactionModel;

class HistoryController extends BaseController
{

    function __construct()
    {
        //set Time Indonesia
        // date_default_timezone_set('Asia/Jakarta');
        // setlocale(LC_TIME, 'id_ID');
        $this->playstation = new PlaystationModel();
        $this->transaction = new RiwayatTransactionModel();
    }

    public function index()
    {
        $data    = [
            'pagetitle' => 'Data Transaksi',
        ];
        $content = [
            'title'     => 'Data Transaksi',
            'header'    => view('templates/header'),
            'breadcumb' => view('templates/breadcumb', $data),
            'sidebar'   => view('templates/side_bar', $data),
            'page'      => view('pages/history/transactionHistory_page')
        ];
        return view('index', $content);
    }

    public function get_HistoryTrx()
    {
        $data =  $this->transaction->get_trx();
        $html = '';
        $no=1;
        $html.= '
        <table class="table" id="data_history" style="width:100%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kode TRX</th>
                <th scope="col">Pelanggan</th>
                <th scope="col">Unit</th>
                <th scope="col">Playstation</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Waktu</th>
                <th scope="col">Total Waktu</th>
                <th scope="col">Harga</th>
                <th scope="col">Total Bayar</th>
                <th scope="col">Tipe Pembayaran</th>
                <th scope="col">Bukti Pembayaran</th>
                <th scope="col">#Action</th>

            </tr>
        </thead>
        <tbody>
           ';
        foreach($data as $row) {
            $html.= "<tr>";
            $html.= "<th scope='row'>".$no."</th>";
            $html.= "<td>".$row['Kode_Pemesanan']."</td>";
            $html.= "<td>".$row['Username']."</td>";
            $html.= "<td>".$row['Nama_Unit']."</td>";
            $html.= "<td>".$row['Nama_Playstation']."</td>";
            $html.= "<td>".$row['Tanggal_Pemesanan']."</td>";
            $html.= "<td>".$row['Start_Time']." - ".$row['End_Time']."</td>";
            $html.= "<td>".$row['Lama_Bermain']."</td>";
            $html.= "<td>".number_format($row['Harga_Per_Hour'], 2)."</td>";
            $html.= "<td>".number_format($row['Total_Pembayaran'], 2)."</td>";

            if($row['Bayar_Via']=='Transfer Bank')
            {
                
                $html.= "<td class='text-primary'>".$row['Bayar_Via']."</td>";
            }else{

                $html.= "<td  class='text-warning'>".$row['Bayar_Via']."</td>";
            }

            if($row['Bukti']!=null){

                $html.= "<td>
                        <img src='".$row['Bukti']."' width='40%' height='20p%'>
                    </td>";
            }else{
                $html.= "<td></td>";
            }
            $html.= "<td style='width: 100px; text-align:center'>
                     <a href='javascript:void(0);' class='btn btn-primary btn-sm' data-ancaman='".$row['Id_Pemesanan']."' id='id_ancaman_update' data-toggle='modal' data-target='#ancaman-update'><i class='bx bxs-edit'></i></a>
                     <a href='javascript:void(0);' class='btn btn-warning btn-sm' data-ancaman='".$row['Id_Pemesanan']."' id='id_ancaman_delete'><i class='bx bxs-trash'></i></a>
                     </td>";
            $html.="</tr>";
            $no++;
        }
        $html.= '</tbody>
                </table>';
        $html.= '<script type="text/javascript">
                $(document).ready(function() {
                    $("#data_history").DataTable();  
                });
            </script>
                ';

        echo $html;
    }


    public function get_trxById()
    {
        $data =  $this->transaction->get_trx(session()->get('id_user'));
        $html = '';
        $no = 1;
        $html .= '
            <table class="table" id="data_history" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Kode TRX</th>
                    <th scope="col">Pelanggan</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Playstation</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Total Waktu</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Total Bayar</th>
                    <th scope="col">Tipe Pembayaran</th>
                    <th scope="col">Bukti Pembayaran</th>
                    <th scope="col">#Action</th>
                </tr>
            </thead>
            <tbody>';
        foreach ($data as $row) {
            $html .= "<tr>";
            $html .= "<td>" . $row['Kode_Pemesanan'] . "</td>";
            $html .= "<td>" . $row['Username'] . "</td>";
            $html .= "<td>" . $row['Nama_Unit'] . "</td>";
            $html .= "<td>" . $row['Nama_Playstation'] . "</td>";
            $html .= "<td>" . $row['Tanggal_Pemesanan'] . "</td>";
            $html .= "<td>" . $row['Start_Time'] . " - " . $row['End_Time'] . "</td>";
            $html .= "<td>" . $row['Lama_Bermain'] . "</td>";
            $html .= "<td>" . number_format($row['Harga_Per_Hour'], 2) . "</td>";
            $html .= "<td>" . number_format($row['Total_Pembayaran'], 2) . "</td>";
    
            if ($row['Bayar_Via'] == 'Transfer Bank') {
                $html .= "<td class='text-primary'>" . $row['Bayar_Via'] . "</td>";
            } else {
                $html .= "<td  class='text-warning'>" . $row['Bayar_Via'] . "</td>";
            }
    
            if ($row['Bukti'] != null) {
                $html .= "<td>
                            <img src='" . $row['Bukti'] . "' width='40%' height='20%'>
                        </td>";
            } else {
                $html .= "<td></td>";
            }
    
            $html .= "<td style='width: 100px; text-align:center'>
                        <a href='javascript:void(0);' class='btn btn-primary btn-sm download-btn' data-ancaman='" . $row['Id_Pemesanan'] . "' data-toggle='modal' data-target='#ancaman-update'><i class='fa fa-download'></i>Download</a>
                    </td>";
    
            $html .= "</tr>";
            $no++;
        }
        $html .= '</tbody>
                </table>';
        $html .= '<!-- DataTables CSS and JS -->
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
            
            <!-- DataTables Buttons CSS and JS -->
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
            
            <!-- jsPDF -->
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>';
    
        $html .= "<script type='text/javascript'>
        $(document).ready(function() {
            var table = $('#data_history').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'print'
                ]
            });
    
            // Custom click event for download button
            $('#data_history tbody').on('click', '.download-btn', function() {
                var idPemesanan = $(this).data('ancaman');
    
                // Filter the table to show only the relevant row
                table.search(idPemesanan).draw();
    
                // Get the table data as an array
                var tableData = table.rows().data().toArray();
    
                // Generate PDF using jsPDF
                var doc = new jsPDF();
                doc.autoTable({
                    head: [['Kode TRX', 'Pelanggan', 'Unit', 'Playstation', 'Tanggal', 'Waktu', 'Total Waktu', 'Harga', 'Total Bayar', 'Tipe Pembayaran']],
                    body: tableData.map(row => [
                        row[0], row[1], row[2], row[3], row[4], row[5], row[6], row[7], row[8], row[9]
                    ]),
                });
    
                // Save or open the generated PDF
                doc.save('Transaction_Details.pdf');
    
                // Clear the table filter and redraw
                table.search('').draw();
            });
        });
    </script>
    ";
    
        echo $html;
    }
    
}