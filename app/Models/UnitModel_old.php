<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'unit_pes';
    protected $primaryKey       = 'Id_Unit';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Id_Unit', 'Kode_Unit', 'Id_Playstation', 'Nama_Unit', 'Keterangan', 'Status'];

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


    public function get_unit()
    {
        $query = $this->db->query("SELECT *,
                CASE
                    WHEN Status = 1 THEN 'Maintenance'
                    ELSE '-'
                END AS Status_Label
            FROM unit_pes;");
        return $query->getResultArray();
    }
}