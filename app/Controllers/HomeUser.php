<?php

namespace App\Controllers;

use App\Models\GuestModel;
use App\Models\PlaystationModel;
use App\Models\RekeningModel;
use App\Models\RiwayatTransactionModel;
use App\Models\TempOrdering;
use App\Models\TransactionModel;


class HomeUser extends BaseController
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
        $this->temp        = new TempOrdering();
        $this->bank        = new RekeningModel();

        //controller
      
    }

    public function index()
    {
        $pes['pes']      = $this->playstation->findAll();
        $data = [
            'form'      => view('templates/frontEnd/user_form', $pes),
          
        ];
         $content = [
            'title'     => 'Gamebox',
            'banner'    => view('templates/frontEnd/banner', $data),
            'footer'    => view('templates/frontEnd/footer'),
            'page'      => view('front/home/home_page')
        ];
        
        return view('templates/frontEnd/index', $content);
    }

    public function unit_available()
    {
        $html = '';
        $no=1;
        $session = session();
        $pes = $session->get('pes_user') ?? '%';
        $jam = $session->get('jam_user') ?? 1;
        $data = $this->playstation->get_user_unit($pes);
        if(!empty($data))
        {
            foreach($data as $row) {
                $timer_range = $this->timer_range($row['Harga_Per_Hour'], $jam);
                $html.= "<tr>";
                // $html.= "<td scope='row' >".$no.".</td>";
                $html.= "<td >".$row['Nama_Unit']."</td>";
                $html.= "<td >Rp ".number_format($row['Harga_Per_Hour'], 2)." <b>x <b>".$timer_range['total_hours']."</td>";
                $html.= "<td >Rp ".number_format($timer_range['total_price'], 2)."</td>";
                $html.= "<td >";
                $status = null;
                $click  = null;
                if($row['Keterangan']=='Tersedia') {
                    
                    $html.= "<span class='text-primary'>";
                    $html.= "".$row['Keterangan']."";
                    $html.= "</span>";
                    
                    $status = null;
                    $click  = "order";
                }else{
                    $html.= "<span class='text-secondary'>";
                    $html.= "".$row['Keterangan']."";
                    $html.= "</span>";
                    
                    $click  = null;
                    $status ='disabled';

                }
                $html.= "</td>";
                $html.= '<td style="whitesmoke; text-align:center">
                            <div class="col-md-7"> 
                            
                            <button type="button" class="button pt-3 pb-3 d-block btn-sm" id="'.$click.'"  data-unit="'.$row['Id_Unit'].'" ' .$status.'>Order Now</button>
                            
                            </div>
                        </td>';
              
            $html.= "</td>";

            $no++;
            $html.= '</tr>';
            }

         } else {
            $html.= "<tr>";
                $html.= '<td colspan="5" style=" border-bottom: 1px solid whitesmoke; border-top: 1px solid whitesmoke; text-align:center; color:grey">
                <br> <b>Tidak Tersedia</b> <br> </td>';
                $html.= '</tr>';
            }


            echo $html;
    }


    public function checkout_get()
    {
       $session = session()->get('konfirmCheckout');
        $content = [
            'title'     => $session == null ?  'Gamebox | Checkout' : 'Gamebox | Pembayaran',
            'banner'    => null,
            'footer'    => null,
            'page'      => $session == null ? view('front/transaksi/checkout_page') :  view('front/transaksi/payment_page')
        ];
        
        return view('templates/frontEnd/index', $content);
    }


    public function unit_order()
    {
        $data = [
        'startDate_user'  => $_POST['startDate_user'],
        'startTime_user'  => $_POST['startTime_user'],
        'endTime_user'    => $_POST['endTime_user'],
        'pes_user'        => $_POST['pes_user'],
        'jam_user'        => $_POST['jam_user']
        ];

        session()->set($data);
        echo json_encode($data);
    }



    public function get_checkout()
    {
            
        $html = '';
        $no=1;
        $user   = session()->get('id_user') ?? 1;
        $date   = date('d M Y');
        $data   = $this->temp->temp_where($user);
        $count       =  $this->history->get_count();
        $tanggal     = date('m'); 
        $code        =  'TRX.00'.$count['jumlah'].'/'.$tanggal.'/2023';
        $total = 0;
        foreach ($data as $result)
        {
            $timer_range = $this->timer_range($result['Harga_Per_Hour']);     
            $total = $timer_range['total_price'] + $total;
            
                 $html.= "<tr>";
                 $html.= "<td scope='row'>".$code."</td>";
                 $html.= "<td>".$result['Nama_Unit']."</td>";
                 $html.= "<td>".$result['Nama_Playstation']."</td>";
                 $html.= "<td>".$result['DateOfOrdering']."</td>";
                 $html.= "<td>".$timer_range['total_hours']." Jam</td>";
                 $html.= "<td>Rp ".number_format($result['Harga_Per_Hour'], 2)." <b>x <b>".$timer_range['total_hours']."</td>";
                 $html.= "<td>Rp ".number_format($timer_range['total_price'], 2)."</td>";
                 $html.= "<td><i class='fa fa-close text-danger'></i></td>";
                 $html.= '</tr>';
                }
                $html.= '<tr>';
                    $html.= "<th colspan='8' style='text-align:right'> Total : Rp ".number_format($total, 2)."</th>";
                $html.= '</tr>';
        echo $html;
          
     }

     
    public function get_payment()
    {
            
        $html = '';
        $no=1;
        $user   = session()->get('id_user') ?? 1;
        $date   = date('d M Y');
        $data   = $this->temp->temp_where($user);
        $count       =  $this->history->get_count();
        $tanggal     = date('m'); 
        $code        =  'TRX.00'.$count['jumlah'].'/'.$tanggal.'/2023';
        $total = 0;
        foreach ($data as $result)
        {
            $timer_range = $this->timer_range($result['Harga_Per_Hour']);     
            $total = $timer_range['total_price'] + $total;
            
                 $html.= "<tr>";
                 $html.= "<td scope='row'>".$code."</td>";
                 $html.= "<td>".$result['Nama_Unit']."</td>";
                 $html.= "<td>".$result['Nama_Playstation']."</td>";
                 $html.= "<td>".$result['DateOfOrdering']."</td>";
                 $html.= "<td>".$timer_range['total_hours']." Jam</td>";
                 $html.= "<td>Rp ".number_format($result['Harga_Per_Hour'], 2)." <b>x <b>".$timer_range['total_hours']."</td>";
                 $html.= "<td>Rp ".number_format($timer_range['total_price'], 2)."</td>";
                 $html.= "<td>";
                 $html.= "<form action='payment-save' method='post'>";
                 $html.= '<input type="file" name="bukti" accept=".jpg,.jpeg,.png" id="formFile">';
                 $html.= "<input type='text' name='id_unit' value='".$result['Id_Playstation']."'>
                            <input type='text' name='id_pes' value='".$result['Id_Playstation']."'>
                            <button type='submit' class='btn btn-primary btn-sm' id='btnUpload'><i class='fa fa-upload'></i></button>
                        </form>
                        </td>";
                 $html.= '</tr>';
                }
                $html.= '<tr>';
                    $html.= "<th colspan='8' style='text-align:right'> Total : Rp ".number_format($total, 2)."</th>";
                $html.= '</tr>';
        echo $html;
          
     }


     public function process_pembayaran()
     {
        $data['bank'] = $this->bank->find();
        $content = [
            'title'     => 'Gamebox | Pembayaran',
            'banner'    => null,
            'footer'    => null,
            'page'      => view('front/transaksi/payment_page', $data)
        ];
        
        return view('templates/frontEnd/index', $content);
     }

     public function process_pembayaran_sess()
     {
        $result = [
            'konfirmCheckout'   => $_POST['konfirm']
        ];
        session()->set($result);
        echo json_encode($result);
     }

    public function transaction_checkout_bank_form()
    {
        $pes         = $_POST['id_pes'];
        $unit        = $_POST['id_unit'];
        $session     = session();
        $result      = $this->transaction->get_checkout($pes, $unit);
        $timer_range = $this->timer_range($result['Harga_Per_Hour']);
        $tanggal     = date('m'); 
        $count       =  $this->history->get_count();
        $code        =  'TRX.00'.$count['jumlah'].'/'.$tanggal.'/2023';

        //Class Bukti
        $buktiPembayaran = new BuktiPembayaran();
        $bukti           = $buktiPembayaran->uploadFile($this->request);

        $startDate   = date('d-m-Y');
        $timestamp   = strtotime(str_replace('/', '-', $startDate));
                $data   = [
                    'Id_Unit'           => $result['Id_Unit'],
                    'Kode_Pemesanan'    => $code,
                    'Tanggal_Pemesanan' => $startDate,
                    'Start_Time'        => $session->get('startTime_user'),
                    'End_Time'          => $session->get('endTime_user'),
                    'Lama_Bermain'      => $session->get('TimesPlay'),
                    'Total_Pembayaran'  => $timer_range['total_price'],
                    'Bayar_Via'         => 'Transfer Bank',
                    'Status_Order'      => 1,
                    'Id_User'           => session()->get('id_user'),
                    'Id_Bukti'          => $bukti['id_bukti'],
                    'Author'            => 0
                    ];
        
                if($this->transaction->save_transaction($data))
                {
                        $data_sess   = [
                            // 'Id_Unit'           => $result['Id_Unit'],
                            'Tanggal_Pemesanan' => date('d F Y', $timestamp),
                            'StartTime'         => $session->get('startTime_user'),
                            'EndTime'           => $session->get('endTime_user'),
                            'Lama_Bermain'      => $session->get('TimesPlay'),
                            'Total_Pembayaran'  => number_format($timer_range['total_price'], 2),
                            'Bayar_Via'         => 'Transfer Bank',
                            'Status_Order'      => 1,
                            'Bukti'             => $bukti['id_bukti'],
                            'Id_User'           => session()->get('id_user'),
                            'Username'          => $guest['Username'],
                            'Bayar'             => number_format($timer_range['total_price'], 2),
                            'Kembalian'         => number_format(0, 2)
                            ];
                    
                            session()->set($data_sess);
                            echo json_encode($data_sess);
                    
                }

          
        
    }

 
    public function sess_order_form()
    {
        $pes    = session()->get('pes_user') ?? '%';
        $unit   = $this->request->getVar('id_unit');
        $result = $this->transaction->get_checkout($pes, $unit);
        $timer_range = $this->timer_range($result['Harga_Per_Hour']);
        $data = [
            'Id_Unit'        => $result['Id_Unit'],
            'Id_User'        => 1,
            'TimesPlay'      => $timer_range['total_hours'],
            'DateOfOrdering' => date('d M Y'),
            'TimeExpired'    => strtotime('+30 minutes', time()),
        ];
        
            
            if($this->temp->save($data))
            {
                $response = [  
                    'statusCode' => 200,
                    'data'       => $data
                ];
                session()->set($data);
                echo json_encode($response);
                
            }
    }

    

    private function sess_delete()
    {
        $keysToDelete = [
            'Tanggal_Pemesanan_user',
            'StartTime_user',
            'EndTime_user',
            'Lama_Bermain_user',
            'Total_Pembayaran_user',
            'Bayar_Via_user',
            'Status_Order_user',
            'Bukti_user',
            'Id_Guest_user',
            'Username_user',
            'Bayar_user',
            'Kembalian_user',
            'jam_user'
        ];
        
        foreach ($keysToDelete as $key) {
            session()->remove($key);
        }
    }


    private function timer_range($price)
    {
        
        $jam     = session()->get('jam') ?? 1;
    
        $total_price = $jam * $price;
        $result = [
        'total_hours' => $jam,
        'total_price' => $total_price
        ];
        return $result;
    
    }

}