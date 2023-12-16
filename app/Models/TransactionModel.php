<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pemesanan';
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

    public function get_order($playstation)
    {
        $query = $this->db->query("SELECT a.Id_Unit, a.Nama_Unit,
        b.Id_Pemesanan, b.Tanggal_Pemesanan, b.Start_Time, b.End_Time,
        b.Lama_Bermain, b.Total_Pembayaran, b.Bayar_Via, 
        b.Id_User, c.Id_Playstation, c.Kode_Playstation, c.Nama_Playstation, 
        c.Nama_Alias, c.Harga_Per_Hour
        FROM unit_pes a
        LEFT JOIN pemesanan b ON a.Id_Unit = b.Id_Unit
        LEFT JOIN playstation c ON a.Id_Playstation = c.Id_Playstation
        WHERE a.Id_Unit NOT IN (SELECT DISTINCT Id_Unit FROM pemesanan) AND a.Id_Playstation LIKE '$playstation'
        ORDER BY a.Id_Unit, b.Start_Time;
        ");
        
        return $query->getResultArray();
    }

    public function get_checkout($playstation, $unit)
    {
        $query = $this->db->query("SELECT a.Id_Unit, a.Nama_Unit,
        b.Id_Pemesanan, b.Tanggal_Pemesanan, b.Start_Time, b.End_Time,
        b.Lama_Bermain, b.Total_Pembayaran, b.Bayar_Via, 
        b.Id_User, c.Id_Playstation, c.Kode_Playstation, c.Nama_Playstation, 
        c.Nama_Alias, c.Harga_Per_Hour
        FROM unit_pes a
        LEFT JOIN pemesanan b ON a.Id_Unit = b.Id_Unit
        LEFT JOIN playstation c ON a.Id_Playstation = c.Id_Playstation
        WHERE a.Id_Unit NOT IN (SELECT DISTINCT Id_Unit FROM pemesanan) 
            AND a.Id_Playstation like '$playstation'
            AND a.Id_Unit = '$unit'
        ORDER BY a.Id_Unit, b.Start_Time;
        ");
        
        return $query->getRowArray();
    }

    public function get_checkout_byId($playstation, $unit, $date)
    {
        $query = $this->db->query("SELECT a.Id_Unit, a.Nama_Unit,
        b.Id_Pemesanan, b.Tanggal_Pemesanan, b.Start_Time, b.End_Time,
        b.Lama_Bermain, b.Total_Pembayaran, b.Bayar_Via, 
        b.Id_User, c.Id_Playstation, c.Kode_Playstation, c.Nama_Playstation, 
        c.Nama_Alias, c.Harga_Per_Hour
        FROM unit_pes a
        LEFT JOIN pemesanan b ON a.Id_Unit = b.Id_Unit
        LEFT JOIN playstation c ON a.Id_Playstation = c.Id_Playstation
        WHERE a.Id_Playstation = '$playstation'
            AND a.Id_Unit = '$unit'
        ORDER BY a.Id_Unit, b.Start_Time;
        ");
        
        return $query->getRowArray();
    }


    public function get_history()
    {
        $query = $this->db->query("SELECT a.Id_Unit, a.Nama_Unit, b.Id_Pemesanan, 
        b.Tanggal_Pemesanan, b.Start_Time, b.End_Time,
        b.Lama_Bermain, b.Total_Pembayaran, b.Bayar_Via, 
        CASE 
            WHEN b.Status_Order = 1 THEN 'Booked'
            ELSE 'Available'
        END AS Status_Order, 
        b.Id_User, c.Id_Playstation, c.Kode_Playstation, c.Nama_Playstation, 
        c.Nama_Alias, c.Harga_Per_Hour
        FROM unit_pes a
        INNER JOIN pemesanan b ON a.Id_Unit = b.Id_Unit
        INNER JOIN playstation c ON a.Id_Playstation = c.Id_Playstation
        GROUP BY b.Id_Pemesanan
        ORDER BY a.Id_Unit, b.Start_Time;
        ");
        
        return $query->getResultArray();
    }

    public function save_transaction($data)
    {
        $query = $this->insert($data);
        return $query;
    }


  
}