<?php

namespace App\Controllers;

use App\Models\GuestModel;
use App\Models\PlaystationModel;
use App\Models\RiwayatTransactionModel;
use App\Models\TransactionModel;

class Transaction extends BaseController
{

    
    function __construct()
    {
        //set Time Indonesia
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'id_ID');
        $this->playstation = new PlaystationModel();
        $this->transaction = new TransactionModel();
        $this->history     = new RiwayatTransactionModel();
        $this->guest       = new GuestModel();
    }


    public function index(): string
    {
        $pes['pes']      = $this->playstation->findAll();
        $data    = [
            'pagetitle' => 'Transaction',
            'content'   =>  view('pages/transaction/transaction_page', $pes),
           
        ];
        $content = [
            'title'     => 'Rent',
            'header'    => view('templates/header'),
            'breadcumb' => view('templates/breadcumb', $data),
            'sidebar'   => view('templates/side_bar', $data),
            'page'      => view('pages/transaction/components/transaction_form.php', $data),
            
        ];
        return view('index', $content);
    }


    public function order(): string
    {

        $data    = [
            'pagetitle' => 'Transaction',
            'content'   =>view('pages/transaction/transaction_order'),
        ];
        $content = [
            'title'     => 'Rent',
            'header'    => view('templates/header'),
            'breadcumb' => view('templates/breadcumb', $data),
            'sidebar'   => view('templates/side_bar', $data),
            'page'      => view('pages/transaction/components/transaction_form.php', $data),
        ];
        return view('index', $content);
    }
    

    public function checkout(): string
    {

        $data    = [
            'pagetitle' => 'Transaction',
            'content'   =>view('pages/transaction/transaction_checkout'),
        ];
        $content = [
            'title'     => 'Rent',
            'header'    => view('templates/header'),
            'breadcumb' => view('templates/breadcumb', $data),
            'sidebar'   => view('templates/side_bar', $data),
            'page'      => view('pages/transaction/components/transaction_form.php', $data),
        ];
        return view('index', $content);
    }


    


    public function pes_table()
    {
       
        $html = '';
        $no=1;
        $pes = session()->get('pes');
        $data = $this->transaction->get_order($pes);
        if(!empty($data))
        {
            foreach($data as $row) {
                $timer_range = $this->timer_range($row['Harga_Per_Hour']);
                $html.= "<tr>";
                $html.= "<td scope='row'>".$no.".</td>";
                $html.= "<td>".$row['Nama_Unit']."</td>";
                $html.= "<td>Rp ".number_format($row['Harga_Per_Hour'], 2)." <b>x <b>".$timer_range['total_hours']."</td>";
                $html.= "<td>Rp ".number_format($timer_range['total_price'], 2)."</td>";
                $html.= '<td>
                            <button type="button" class="btn btn-primary btn-sm" id="order" data-unit="'.$row['Id_Unit'].'">Order Now</button>
                       </td>';

            $html.= "</td>";

            $no++;
            $html.= '</tr>';
            }

         } else {
            $html.= "<tr>";
                $html.= '<td colspan="4" style="text-align:center; color:grey">
                    <b>Tidak Tersedia</b> </td>';
                $html.= '</tr>';
            }


            echo $html;
    }


public function sess_form()
{
    $data = [
    'startDate'  => $_POST['startDate'],
    'startTime'  => $_POST['startTime'],
    'endTime'    => $_POST['endTime'],
    'pes'        => $_POST['playstation'],
    ];

     session()->set($data);
    echo json_encode($data);
}

public function sess_order_form()
{
    $this->sess_delete();
    
    $pes    = session()->get('pes');
    $unit   = $_POST['id_unit'];
    $result = $this->transaction->get_checkout($pes, $unit);
    $timer_range = $this->timer_range($result['Harga_Per_Hour']);
    $data   = [
        'id_unit'        => $result['Id_Unit'],
        'nama_pes'       => $result['Nama_Playstation'],
        'nama_unit'      => $result['Nama_Unit'],
        'price_hour'     => $result['Harga_Per_Hour'],
        'total_price'    => $timer_range['total_price'],
        'total_plays'    => $timer_range['total_hours'],
        'statusCode'     => 200,
        ];
 
        session()->set($data);
        echo json_encode($data);
       
}


private function sess_delete()
{
    $keysToDelete = [
        'Tanggal_Pemesanan',
        'StartTime',
        'EndTime',
        'Lama_Bermain',
        'Total_Pembayaran',
        'Bayar_Via',
        'Status_Order',
        'Bukti',
        'Id_Guest',
        'Username',
        'Bayar',
        'Kembalian',
    ];
    
    foreach ($keysToDelete as $key) {
        session()->remove($key);
    }
}


public function transaction_checkout_bank_form()
{
    $session     = session();
    $pes         = $session->get('pes');
    $unit        = $session->get('id_unit');
    $result      = $this->transaction->get_checkout($pes, $unit);
    $timer_range = $this->timer_range($result['Harga_Per_Hour']);
    $tanggal     = date('m'); 
    $count       =  $this->history->get_count();
    $code        =  'TRX.00'.$count['jumlah'].'/'.$tanggal.'/2023';

    
    //Class Bukti
    $buktiPembayaran = new BuktiPembayaran();
    $bukti           = $buktiPembayaran->uploadFile($this->request);
    
    $startDate   = $session->get('startDate');
    $timestamp   = strtotime(str_replace('/', '-', $startDate));

    if($this->guest->save_guest($_POST['customer']))
    {
        $guest   = $this->guest->get_guest_new();
        if(!empty($guest))
        {
            $data   = [
                'Id_Unit'           => $result['Id_Unit'],
                'Kode_Pemesanan'    => $code,
                'Tanggal_Pemesanan' => $session->get('startDate'),
                'Start_Time'        => $session->get('startTime'),
                'End_Time'          => $session->get('endTime'),
                'Lama_Bermain'      => $_POST['totalPlays'],
                'Total_Pembayaran'  => $timer_range['total_price'],
                'Bayar_Via'         => $_POST['paymentType'],
                'Status_Order'      => 1,
                'Id_Guest'          => $guest['Id_Guest'],
                'Id_Bukti'          => $bukti['id_bukti'],
                'Author'            => 0
                ];
    
            if($this->transaction->save_transaction($data))
            {
                    $data_sess   = [
                        // 'Id_Unit'           => $result['Id_Unit'],
                        'Tanggal_Pemesanan' => date('d F Y', $timestamp),
                        'StartTime'         => $session->get('startTime'),
                        'EndTime'           => $session->get('endTime'),
                        'Lama_Bermain'      => $_POST['totalPlays'],
                        'Total_Pembayaran'  => number_format($timer_range['total_price'], 2),
                        'Bayar_Via'         => $_POST['paymentType'],
                        'Status_Order'      => 1,
                        'Bukti'             => $bukti['id_bukti'],
                        'Id_Guest'          => $guest['Id_Guest'],
                        'Username'          => $guest['Username'],
                        'Bayar'             => number_format($timer_range['total_price'], 2),
                        'Kembalian'         => number_format(0, 2)
                        ];
                
                        session()->set($data_sess);
                        echo json_encode($data_sess);
                   
            }

        }
    }
}



public function transaction_checkout_form()
{
    $session  = session();
    // $cekGuest = $this->guest->get_guest_byName($_POST['customer']);
    // if(empty($cekGuest))
    // {

        if($this->guest->save_guest($_POST['customer']))
        {
            $guest = $this->guest->get_guest_new();
            if(!empty($guest))
            {
                //Playstation Booking
                $pes     = $session->get('pes');
                $unit    = $session->get('id_unit');
                //-------------------------------------------------------------------------------
                $result      = $this->transaction->get_checkout($pes, $unit);
                $timer_range = $this->timer_range($result['Harga_Per_Hour']);
                //------------------------------------------------------------------
                $tanggal     = date('m'); 
                $count       =  $this->history->get_count();
                $code        =  'TRX.00'.$count['jumlah'].'/'.$tanggal.'/2023';
                $data   = [
                    'Id_Unit'           => $result['Id_Unit'],
                    'Kode_Pemesanan'    => $code,
                    'Tanggal_Pemesanan' => $session->get('startDate'),
                    'Start_Time'        => $session->get('startTime'),
                    'End_Time'          => $session->get('endTime'),
                    'Lama_Bermain'      => $_POST['totalPlays'],
                    'Total_Pembayaran'  => $timer_range['total_price'],
                    'Bayar_Via'         => $_POST['paymentType'],
                    'Status_Order'      => 1,
                    'Id_Guest'          => $guest['Id_Guest'],
                    'Author'            => 0
                    ];
            
               if($this->transaction->save_transaction($data))
               {
                   $startDate = $session->get('startDate');
                   $timestamp = strtotime(str_replace('/', '-', $startDate));
                   $data_sess   = [
                       'Id_Unit'           => $result['Id_Unit'],
                       'Tanggal_Pemesanan' => date('d F Y', $timestamp),
                       'StartTime'         => $session->get('startTime'),
                       'EndTime'           => $session->get('endTime'),
                       'Lama_Bermain'      => $_POST['totalPlays'],
                       'Total_Pembayaran'  => number_format($timer_range['total_price'], 2),
                       'Bayar_Via'         => $_POST['paymentType'],
                       'Status_Order'      => 1,
                       'Id_Guest'          => $guest['Id_Guest'],
                       'Username'          => $guest['Username'],
                       'Bayar'             => number_format($_POST['bayar'], 2),
                       'Kembalian'         => number_format($_POST['kembalian'], 2)
                       ];
       
                       session()->set($data_sess);
                       echo json_encode($data_sess);
              
               }
    
                
            }
        }
    // }
    
   
}

public function sess_checkout_form()
{
    $session = session();
    $pes     = $session->get('pes');
    $unit    = $session->get('id_unit');
    $result  = $this->transaction->get_checkout($pes, $unit);
    $data_sess   = [
        'Id_Unit'           => $session->get('Id_Unit'),
        'Tanggal_Pemesanan' => $session->get('Tanggal_Pemesanan'),
        'StartTime'         => $session->get('StartTime'),
        'EndTime'           => $session->get('EndTime'),
        'Lama_Bermain'      => $session->get('Lama_Bermain'),
        'Total_Pembayaran'  => $session->get('Total_Pembayaran'),
        'Bayar_Via'         => $session->get('Bayar_Via'),
        'Status_Order'      => 1,
        'Id_Guest'          => $guest['Id_Guest'],
        'Username'          => $guest['Username'],
        'Bayar'             => number_format($_POST['bayar'], 2),
        'Kembalian'         => number_format($_POST['kembalian'], 2)
        ];

        session()->set($data_sess);
        echo json_encode($data_sess);

}



public function get_playstation()
{
   $id   = $_POST['id_Pes'];
   $pes  = $this->playstation-> get_pes_where($id);
   $data = [
        'playstationName' => $pes['Nama_Playstation']
   ];

   echo json_encode($data);
    
}



private function timer_range($price)
{
    $startTime = session()->get('startTime');
    $endTime = session()->get('endTime');
    $start_time = strtotime($startTime);
    $end_time = strtotime($endTime);

    // Menghitung selisih waktu dalam detik
    $time_difference = $end_time - $start_time;

    // Menghitung jumlah jam dan menit
    $total_hours = floor($time_difference / 3600);
    $remaining_seconds = $time_difference % 3600;
    $total_minutes = floor($remaining_seconds / 60);

    $total_price = $total_hours * $price;
    $result = [
    'total_hours' => $total_hours,
    'total_price' => $total_price
    ];
    return $result;

}


}