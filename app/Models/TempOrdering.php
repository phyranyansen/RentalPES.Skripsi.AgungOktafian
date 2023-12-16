<?php

namespace App\Models;

use CodeIgniter\Model;

class TempOrdering extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'temp_ordering';
    protected $primaryKey       = 'Id_Temp';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Id_User', 'Id_Unit', 'TimesPlay', 'DateOfOrdering', 'TimeExpired'];

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


    public function simpan($data)
    {
        $result = $this->insert($data);
        return $result;
    }

    public function temp_where($id)
    {
        $result = $this->db->query("SELECT a.*, b.Id_Unit, b.Kode_Unit, b.Nama_Unit, c.Username, c.Email, d.Id_Playstation, d.Kode_Playstation, d.Nama_Playstation, d.Harga_Per_Hour FROM temp_ordering a 
        INNER JOIN unit_pes b ON b.Id_Unit = a.Id_Unit
        INNER JOIN user c ON c.Id_User = a.Id_User  
        INNER JOIN playstation d ON d.Id_Playstation = b.Id_Playstation
        WHERE a.Id_User = '$id'
        ORDER BY a.Id_Temp;");
        return $result->getResultArray();
    }
}