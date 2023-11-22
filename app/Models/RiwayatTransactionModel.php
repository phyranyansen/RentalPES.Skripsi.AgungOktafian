<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatTransactionModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'riwayat_pemesanan';
    protected $primaryKey       = 'Id_Pemesanan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Id_Pemesanan', 
    'Id_Unit', 'Kode_Pemesanan', 'Tanggal_Pemesanan',
    'Start_Time', 'End_Time', 'Lama_Bermain', 'Total_Pembayaran', 'Bayar_Via', 'Status_Order', 'Id_User', 'Id_Guest', 'Id_Bukti', 'Author'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    function get_trx()
    {
        
    }

    function save_trx($data)
    {
        $query = $this->insertBatch($data);
        return $query;
    }

    public function delete_trx()
    {
         $query = $this->db->query("DELETE
         FROM `pemesanan`
         WHERE (Id_Unit, Tanggal_Pemesanan, Start_Time, End_Time) IN (SELECT DISTINCT Id_Unit, Tanggal_Pemesanan, Start_Time, End_Time FROM riwayat_pemesanan);
         ");
         return $query;
    }


    function get_riwayat_where($id, $date, $startTime, $endTime)
    {
        $query = $this->db->query("SELECT * FROM `riwayat_pemesanan` WHERE   a.Id_Unit IN (SELECT DISTINCT Id_Unit FROM pemesanan) Id_Unit='$id' AND 
        Tanggal_Pemesanan = '$date' AND Start_Time = '$startTime' AND End_Time = '$endTime';");
        return $query->getRowArray();
    }
    

    function get_count()
    {
        $query = $this->db->query("SELECT COUNT(*) AS jumlah FROM riwayat_pemesanan");
        return $query->getRowArray();
    }
}