<?php

namespace App\Controllers;
use App\Models\UnitModel;
use App\Models\PlaystationModel;

class Unit extends BaseController
{

    function __construct()
    {
        //set Time Indonesia
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'id_ID');
        $this->unit = new UnitModel();
        $this->playstation = new PlaystationModel();
    }


    public function index(): string
    {
        $data    = [
            'pagetitle'   => 'Unit',
            'playstation' => $this->playstation->get(),
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

    
    public function edit_unit()
    {
        $id_unit = $_POST['id_unit'];
        if(!empty($id_unit))
        {
            $data    = [
                'Kode_Unit'      => $_POST['kode_unit'],
                'Id_Playstation' => $_POST['id_playstation'],
                'Nama_Unit'      => $_POST['nama_unit'],
                'Keterangan'     => $_POST['keterangan'],
                'Status'         => $_POST['status']
            ];

            if($this->unit->save_edit($id_unit, $data))
            {
                $msg = [
                    'save'    => true,
                    'code'    => 200
                ];

                echo json_encode($msg);
            }
        }
        
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
            if($row['Status_Label'] == '-')
            { 
                $html.= "<td>".$row['Status_Label']."</td>";

            }else{
                $html.= "<td><span class='badge bg-danger'>".$row['Status_Label']."</span></td>";
            }
            $html.= "<td style='width: 100px; text-align:center'>
                     <a href='javascript:void(0);' class='btn btn-primary btn-sm' data-unit='".$row['Id_Unit']."' data-toggle='modal' data-target='#edit-Unit' id='unit_id'><i class='bx bxs-edit'></i></a>
                     <a href='javascript:void(0);' class='btn btn-warning btn-sm' data-unit='".$row['Id_Unit']."' id='id_ancaman_delete'><i class='bx bxs-trash'></i></a>
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


    public function get_data()
    {
        $id_unit = $_POST['id_unit'];
        if(!empty($id_unit))
        {
            $result = $this->unit->get_where($id_unit);
            $data = [
                'Id_Unit'        => $result['Id_Unit'],
                'Kode_Unit'      => $result['Kode_Unit'],
                'Id_Playstation' => $result['Id_Playstation'],
                'Nama_Unit'      => $result['Nama_Unit'],
                'Keterangan'     => $result['Keterangan'],
                'Status'         => $result['Status']
            ];

            echo json_encode($data);
        }
    }


}