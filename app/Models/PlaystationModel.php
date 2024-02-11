<?php

namespace App\Models;

use CodeIgniter\Model;

class PlaystationModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'playstation';
    protected $primaryKey       = 'Id_Playstation';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Id_Playstation', 'Kode_Playstation', 'Nama_Playstation', 'Nama_Alias', 'Harga_Per_Hour', 'Keterangan'];

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



    function get()
    {
        $query = $this->db->query("SELECT * FROM playstation");
        return $query->getResultArray();
    }


    function get_pes_where($id)
    {
        $query = $this->db->query("SELECT * FROM playstation WHERE Id_Playstation='$id'");
        return $query->getRowArray();
    }

    function get_monitoring()
    {
        $result = $this->db->query("SELECT
        a.Id_Unit,
        a.Nama_Unit,
        COALESCE(d.Username, e.Username) AS Username,
        b.*,
        -- b.Id_Pemesanan,
        -- b.Kode_Pemesanan,
        -- b.Tanggal_Pemesanan,
        -- b.Start_Time,
        -- b.End_Time,
        -- b.Lama_Bermain,
        -- b.Total_Pembayaran,
        -- b.Bayar_Via,
        -- b.Id_User,
        -- b.Id_Guest,
        c.Id_Playstation,
        c.Kode_Playstation,
        c.Nama_Playstation,
        c.Nama_Alias,
        c.Harga_Per_Hour
    FROM
        unit_pes a
        LEFT JOIN pemesanan b ON a.Id_Unit = b.Id_Unit
        LEFT JOIN playstation c ON a.Id_Playstation = c.Id_Playstation
        LEFT JOIN guest d ON d.Id_Guest = b.Id_Guest
        LEFT JOIN user e ON e.Id_User = b.Id_User
    WHERE
        a.Id_Unit IN (SELECT DISTINCT Id_Unit FROM pemesanan)
    ORDER BY
        a.Id_Unit, b.Start_Time;");
    
      return $result->getResultArray();
        
    }


    function get_monitoring_ById($id)
    {
        $result = $this->db->query("SELECT
        a.Id_Unit,
        a.Nama_Unit,
        COALESCE(d.Username, e.Username) AS Username,
        b.Id_Pemesanan,
        b.Kode_Pemesanan,
        b.Tanggal_Pemesanan,
        b.Start_Time,
        b.End_Time,
        b.Lama_Bermain,
        b.Total_Pembayaran,
        b.Bayar_Via,
        b.Id_User,
        b.Id_Guest,
        b.Status_Order,
        b.Id_Bukti,
        c.Id_Playstation,
        c.Kode_Playstation,
        c.Nama_Playstation,
        c.Nama_Alias,
        c.Harga_Per_Hour
    FROM
        unit_pes a
        LEFT JOIN pemesanan b ON a.Id_Unit = b.Id_Unit
        LEFT JOIN playstation c ON a.Id_Playstation = c.Id_Playstation
        LEFT JOIN guest d ON d.Id_Guest = b.Id_Guest
        LEFT JOIN user e ON e.Id_User = b.Id_User
    WHERE
        a.Id_Unit IN (SELECT DISTINCT Id_Unit FROM pemesanan)
        AND b.Id_Unit = '$id' OR  b.Id_Pemesanan = '$id'
    ORDER BY
        a.Id_Unit, b.Start_Time;");
    
      return $result->getRowArray();
        
    }

    function get_monitoring_ById1($id)
    {
        $result = $this->db->query("SELECT
        a.Id_Unit,
        a.Nama_Unit,
        COALESCE(d.Username, e.Username) AS Username,
        b.Id_Pemesanan,
        b.Kode_Pemesanan,
        b.Tanggal_Pemesanan,
        b.Start_Time,
        b.End_Time,
        b.Lama_Bermain,
        b.Total_Pembayaran,
        b.Bayar_Via,
        b.Id_User,
        b.Id_Guest,
        b.Status_Order,
        b.Id_Bukti,
        c.Id_Playstation,
        c.Kode_Playstation,
        c.Nama_Playstation,
        c.Nama_Alias,
        c.Harga_Per_Hour,
        b.Author
    FROM
        unit_pes a
        LEFT JOIN pemesanan b ON a.Id_Unit = b.Id_Unit
        LEFT JOIN playstation c ON a.Id_Playstation = c.Id_Playstation
        LEFT JOIN guest d ON d.Id_Guest = b.Id_Guest
        LEFT JOIN user e ON e.Id_User = b.Id_User
    WHERE
        a.Id_Unit IN (SELECT DISTINCT Id_Unit FROM pemesanan)
        AND b.Id_Unit = '$id' OR  b.Id_Pemesanan = '$id'
    ORDER BY
        a.Id_Unit, b.Start_Time;");
    
      return $result->getResultArray();
        
    }


    function get_available_unit()
    {
        $result = $this->db->query("SELECT
        a.Id_Unit,
        a.Nama_Unit,
        a.Kode_Unit,
        b.Id_Pemesanan,
        b.Kode_Pemesanan,
        b.Tanggal_Pemesanan,
        b.Start_Time,
        b.End_Time,
        b.Lama_Bermain,
        b.Total_Pembayaran,
        b.Bayar_Via,
        b.Id_User,
        c.Id_Playstation,
        c.Kode_Playstation,
        c.Nama_Playstation,
        c.Nama_Alias,
        c.Harga_Per_Hour,
        CASE
            WHEN a.Id_Unit NOT IN (SELECT DISTINCT Id_Unit FROM pemesanan) THEN 'Tersedia'
            ELSE 'Tidak Tersedia'
        END AS Keterangan,
        CASE
            WHEN Status = 1 THEN 'Maintenance'
            ELSE '-'
        END AS Status_Label
    FROM
        unit_pes a
        LEFT JOIN pemesanan b ON a.Id_Unit = b.Id_Unit
        LEFT JOIN playstation c ON a.Id_Playstation = c.Id_Playstation
    ORDER BY
        a.Id_Unit, b.Start_Time;");

      return $result->getResultArray();
    }


    public function get_user_unit($playstation)
    {
        $query = $this->db->query("SELECT
        a.Id_Unit,
        a.Nama_Unit,
        a.Kode_Unit,
        b.Id_Pemesanan,
        b.Kode_Pemesanan,
        b.Tanggal_Pemesanan,
        b.Start_Time,
        b.End_Time,
        b.Lama_Bermain,
        b.Total_Pembayaran,
        b.Bayar_Via,
        b.Id_User,
        c.Id_Playstation,
        c.Kode_Playstation,
        c.Nama_Playstation,
        c.Nama_Alias,
        c.Harga_Per_Hour,
        CASE
            WHEN a.Id_Unit NOT IN (SELECT DISTINCT Id_Unit FROM pemesanan) THEN 'Tersedia'
            ELSE 'Tidak Tersedia'
        END AS Keterangan
    FROM
        unit_pes a
        LEFT JOIN pemesanan b ON a.Id_Unit = b.Id_Unit
        LEFT JOIN playstation c ON a.Id_Playstation = c.Id_Playstation
      WHERE a.Id_Playstation LIKE '$playstation'
    ORDER BY
        a.Id_Unit, b.Start_Time;");

      return $query->getResultArray();
    }
    
}