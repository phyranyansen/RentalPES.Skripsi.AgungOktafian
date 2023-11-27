<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GameModel;

class Game extends BaseController
{

    function __construct()
    {
        //set Time Indonesia
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'id_ID');
        $this->game = new GameModel();
    }


    public function index()
    {
        $data    = [
            'pagetitle' => 'Game',
        ];
        $content = [
            'title'     => 'Rent',
            'header'    => view('templates/header'),
            'breadcumb' => view('templates/breadcumb', $data),
            'sidebar'   => view('templates/side_bar', $data),
            'page'      => view('pages/game/game_page')
        ];
        return view('index', $content);
    }

    public function game_get()
    {
        $html = '';
        $no=1;
        $data = $this->game->get_game();
        $html.= '
        <table class="table" id="data_game">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Game</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Playstation</th>
                <th scope="col">Gambar</th>
                <th scope="col">#</th>

            </tr>
        </thead>
        <tbody>
           ';
        foreach($data as $row) {
            $html.= "<tr>";
            $html.= "<th scope='row'>".$no."</th>";
            $html.= "<td>".$row['Nama_Game']."</td>";
            $html.= "<td>".$row['Keterangan']."</td>";
            $html.= "<td>".$row['Nama_Alias']."</td>";
            $html.= "<td>".$row['Gambar']."</td>";
            $html.= "<td style='width: 100px; text-align:center'>
                     <a href='javascript:void(0);' class='btn btn-primary btn-sm' data-ancaman='".$row['Id_Game']."' id='id_ancaman_update' data-toggle='modal' data-target='#ancaman-update'><i class='bx bxs-edit'></i></a>
                     <a href='javascript:void(0);' class='btn btn-warning btn-sm' data-ancaman='".$row['Id_Game']."' id='id_ancaman_delete'><i class='bx bxs-trash'></i></a>
                     </td>";
            $html.="</tr>";
            $no++;
        }
        $html.= '</tbody>
                </table>';
        $html.= '<script type="text/javascript">
                $(document).ready(function() {
                    $("#data_game").DataTable();  
                });
            </script>
                ';

        echo $html;
    }

    public function game_insert()
    {

        if ($this->request->getMethod() === 'post' && $this->request->getFile('gambar')) {
            $gambar = $this->request->getFile('gambar');

            // Validasi gambar (jenis, ukuran, dll.)
            $gambar->move(ROOTPATH . 'public/assets/uploads');

            // Simpan path gambar ke database
            $data = [
                'gambar' => 'assets/uploads/' . $gambar->getName(),
            ];

            $this->game->insert($data);

            // Redirect atau tampilkan pesan sukses
            return redirect()->to(base_url());
        } else {
            return view('upload_form');
        }
    }
}