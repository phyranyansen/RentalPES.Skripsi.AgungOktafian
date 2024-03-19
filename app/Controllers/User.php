<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\UnitModel;
use App\Models\PlaystationModel;

class User extends BaseController
{

    function __construct()
    {
        //set Time Indonesia
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'id_ID');
        $this->user = new LoginModel();
        // $this->playstation = new PlaystationModel();
    }


    public function index(): string
    {
        $data    = [
            'pagetitle'   => 'User',
            // 'playstation' => $this->playstation->get(),
        ];
        $content = [
            'title'     => 'Rent',
            'header'    => view('templates/header'),
            'breadcumb' => view('templates/breadcumb', $data),
            'sidebar'   => view('templates/side_bar', $data),
            'page'      => view('pages/user/user_page')
        ];
        return view('index', $content);
    }

    
    public function edit_user()
    {
        $where = $_POST['id_user'];
        if(!empty($id_unit))
        {
        
            $data    = [
                'Id_User'        => $result['id_user'],
                'Username'       => $result['username'],
                'Email'          => $result['email'],
                'Alamat'         => $result['alamat'],
                'No_Telp'        => $result['no_telp'],
                'Status'         => $result['status']
            ];

            if($this->user->save_edit($where, $data))
            {
                $msg = [
                    'save'    => true,
                    'code'    => 200
                ];

                echo json_encode($msg);
            }
        }
        
    }


    public function user_get()
    {
        $html = '';
        $no=1;
        $data = $this->user->findAll();
        $html.= '
        <table class="table" id="data_unit">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Alamat</th>
                <th scope="col">Status</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>';
        foreach($data as $row) {
            $html.= "<tr>";
            $html.= "<th scope='row'>".$no."</th>";
            $html.= "<td>".$row['Username']."</td>";
            $html.= "<td>".$row['Email']."</td>";
            $html.= "<td>".$row['Alamat']."</td>";
            if($row['Status'] == 1)
            { 
                $html.= "<td><span class='badge bg-success'>Aktif</span></td>";

            }else{
                $html.= "<td><span class='badge bg-danger'>Tidak Aktif</span></td>";
            }
            $html.= "<td style='width: 100px; text-align:center'>
                     <a href='javascript:void(0);' class='btn btn-primary btn-sm' data-unit='".$row['Id_User']."' data-toggle='modal' data-target='#edit-Unit' id='unit_id'><i class='bx bxs-edit'></i></a>
                     <a href='javascript:void(0);' class='btn btn-warning btn-sm' data-unit='".$row['Id_User']."' id='id_ancaman_delete'><i class='bx bxs-trash'></i></a>
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
        $where = $_POST['id_user'];
        if(!empty($where))
        {
            $result = $this->user-> get_user_where($where);
            $data = [
                'Id_User'        => $result['Id_User'],
                'Username'       => $result['Username'],
                'Email'          => $result['Email'],
                'Alamat'         => $result['Alamat'],
                'No_Telp'        => $result['No_Telp'],
                'Status'         => $result['Status']
            ];

            echo json_encode($data);
        }
    }


}