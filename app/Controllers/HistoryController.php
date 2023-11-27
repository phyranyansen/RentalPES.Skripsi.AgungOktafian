<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class HistoryController extends BaseController
{

    function __construct()
    {
        //set Time Indonesia
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'id_ID');
        $this->playstation = new PlaystationModel();
        $this->transaction = new RiwayatTransactionModel();
    }

    public function index()
    {
        
    }
}