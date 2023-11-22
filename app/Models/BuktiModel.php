<?php

namespace App\Models;

use CodeIgniter\Model;

class BuktiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'bukti_pembayaran';
    protected $primaryKey       = 'Id_Bukti';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Id_Bukti', 'Bukti'];

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


    public function get_bukti_where($name)
    {
        $query = $this->db->query("SELECT * FROM bukti_pembayaran WHERE Bukti = '$name'");
        return $query->getRowArray();
    }

    
}