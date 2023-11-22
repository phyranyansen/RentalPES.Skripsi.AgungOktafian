<?php

namespace App\Controllers;
use App\Models\PlaystationModel;

class Playstation extends BaseController
{

    function __construct()
    {
        //set Time Indonesia
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'id_ID');
        $this->playstation = new PlaystationModel();
    }


    public function index(): string
    {
        $data    = [
            'pagetitle' => 'Playstation',
        ];
        $content = [
            'title'     => 'Rent',
            'header'    => view('templates/header'),
            'breadcumb' => view('templates/breadcumb', $data),
            'sidebar'   => view('templates/side_bar', $data),
            'page'      => view('pages/playstation/playstation_page')
        ];
        return view('index', $content);
    }


    public function playstation_get()
    {
        $html = '';
        $no=1;
        $data = $this->playstation->get();
        $html.= '
        <table class="table" id="data_playstation">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kode Playstation</th>
                <th scope="col">Nama Playstation</th>
                <th scope="col">Alias</th>
                <th scope="col">Harga Per Jam</th>
                <th scope="col">Keterangan</th>
                <th scope="col">#</th>

            </tr>
        </thead>
        <tbody>
           ';
        foreach($data as $row) {
            $html.= "<tr>";
            $html.= "<th scope='row'>".$no."</th>";
            $html.= "<td>".$row['Kode_Playstation']."</td>";
            $html.= "<td>".$row['Nama_Playstation']."</td>";
            $html.= "<td>".$row['Nama_Alias']."</td>";
            $html.= "<td>".$row['Harga_Per_Hour']."</td>";
            $html.= "<td>".$row['Keterangan']."</td>";
            $html.= "<td style='width: 100px; text-align:center'>
                     <a href='javascript:void(0);' class='btn btn-primary btn-sm' data-ancaman='".$row['Id_Playstation']."' id='id_ancaman_update' data-toggle='modal' data-target='#ancaman-update'><i class='bx bxs-edit'></i></a>
                     <a href='javascript:void(0);' class='btn btn-warning btn-sm' data-ancaman='".$row['Id_Playstation']."' id='id_ancaman_delete'><i class='bx bxs-trash'></i></a>
                     </td>";
            $html.="</tr>";
            $no++;
        }
        $html.= '</tbody>
                </table>';
        $html.= '<script type="text/javascript">
                $(document).ready(function() {
                    $("#data_playstation").DataTable();  
                });
            </script>
                ';

        echo $html;
    }

    public function game(): string
    {
        $data    = [
            'pagetitle' => 'Transaction',
        ];
        $content = [
            'title'     => 'Rent',
            'header'    => view('templates/header'),
            'breadcumb' => view('templates/breadcumb', $data),
            'sidebar'   => view('templates/side_bar', $data),
            'page'      => view('pages/transaction/transaction_game')
        ];
        return view('index', $content);
    }
}