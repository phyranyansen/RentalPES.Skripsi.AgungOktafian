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


    function get_trx($id_user = null)
    {
        $sql = "SELECT  a.Id_Unit, 
        a.Nama_Unit, 
        b.Id_Pemesanan,
        b.Kode_Pemesanan,
        b.Tanggal_Pemesanan, 
        b.Start_Time, 
        b.End_Time,
        b.Lama_Bermain,
        b.Total_Pembayaran,
        b.Bayar_Via, 
        b.Id_User, 
        CASE 
            WHEN b.Status_Order = 1 THEN 'Selesai'
            WHEN b.Status_Order = 0 THEN 'Proses'
            ELSE 'Aktif'
        END AS status_order,
        COALESCE(d.Username, e.Username) AS Username,
        f.Bukti,
        c.Id_Playstation, 
        c.Kode_Playstation, 
        c.Nama_Playstation, 
        c.Nama_Alias, 
        c.Harga_Per_Hour
FROM unit_pes a 
INNER JOIN riwayat_pemesanan b ON a.Id_Unit = b.Id_Unit
INNER JOIN playstation c ON a.Id_Playstation = c.Id_Playstation
LEFT JOIN guest d ON d.Id_Guest = b.Id_Guest
LEFT JOIN user e ON e.Id_User = b.Id_User
LEFT JOIN bukti_pembayaran f ON f.Id_Bukti = b.Id_Bukti 
WHERE b.Id_User LIKE '$id_user' 
GROUP BY a.Id_Unit, b.Id_Pemesanan
ORDER BY a.Id_Unit, b.Start_Time;";

        $query = $this->db->query($sql);

        return $query->getResultArray();
    }

    function save_trx($data)
    {
        $query = $this->insertBatch($data);
        return $query;
    }

    function ins_history($data) {
        $query = $this->insert($data);
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
    

    function get_count($table)
    {
        $query = $this->db->query("SELECT COUNT(*) AS jumlah FROM $table");
        return $query->getRowArray();
    }

    
    function get_pendapatan()
    {
        $query = $this->db->query("SELECT SUM(Total_Pembayaran) as pendapatan FROM riwayat_pemesanan;");
        return $query->getRowArray();
    }

    function get_revenue($startDate, $endDate)
    {
        $query = $this->db->query("SELECT SUM(Total_Pembayaran) AS jumlah FROM riwayat_pemesanan WHERE Tanggal_Pemesanan BETWEEN '$startDate' AND '$endDate';");
        return $query->getRowArray();
    }
}