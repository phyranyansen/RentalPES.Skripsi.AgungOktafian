<?php

namespace App\Controllers;
use App\Models\UnitModel;

class Unit extends BaseController
{

    function __construct()
    {
        //set Time Indonesia
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'id_ID');
        $this->unit = new UnitModel();
    }


    public function index(): string
    {
        $data    = [
            'pagetitle' => 'Unit',
        ];
        $content = [
            'title'     => 'Rent',
            'header'    => view('templates/header'),
            'breadcumb' => view('templates/breadcumb', $data),
            'sidebar'   => view('templates/side_bar', $data),
            'page'      => view('pages/unit/unit_page')
        ];
        return view('index', $content);
    }


    public function unit_get()
    {
        $html = '';
        $no=1;
        $data = $this->unit->get_unit();
        $html.= '
        <table class="table" id="data_unit">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kode Unit</th>
                <th scope="col">Nama Unit</th>
                <th scope="col">Alias</th>
                <th scope="col">Harga Per Jam</th>
                <th scope="col">Keterangan</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>';
        foreach($data as $row) {
            $html.= "<tr>";
            $html.= "<th scope='row'>".$no."</th>";
            $html.= "<td>".$row['Kode_Unit']."</td>";
            $html.= "<td>".$row['Nama_Unit']."</td>";
            $html.= "<td>".$row['Nama_Alias']."</td>";
            $html.= "<td>".$row['Harga_Per_Hour']."</td>";
            $html.= "<td>".$row['Status']."</td>";
            $html.= "<td style='width: 100px; text-align:center'>
                     <a href='javascript:void(0);' class='btn btn-primary btn-sm' data-ancaman='".$row['Id_Unit']."' id='id_ancaman_update' data-toggle='modal' data-target='#ancaman-update'><i class='bx bxs-edit'></i></a>
                     <a href='javascript:void(0);' class='btn btn-warning btn-sm' data-ancaman='".$row['Id_Unit']."' id='id_ancaman_delete'><i class='bx bxs-trash'></i></a>
                     </td>";
            $html.="</tr>";
            $no++;
            
        }
        
        $html.= '</tbody>
                </table>';
        $html.= '<script type="text/javascript">
                $(document).ready(function() {
                    $("#data_unit").DataTable();  
                });
            </script>
                ';

        echo $html;
    }


}