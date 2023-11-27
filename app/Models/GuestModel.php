<?php

namespace App\Models;

use CodeIgniter\Model;

class GuestModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'guest';
    protected $primaryKey       = 'Id_Guest';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Id_Guest', 'Username'];

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

    public function save_guest($username)
    {
        $data = [
            'Username'  => $username
        ];

        $save =  $this->insert($data);
        
        return $save;
    }

    public function get_guest_new()
    {
        $query = $this->db->query("SELECT * FROM guest
        WHERE Id_Guest IN (SELECT MAX(Id_Guest) FROM guest)");
        return $query->getRowArray();
    }

    public function get_guest_byName($username)
    {
        $query = $this->db->query("SELECT * FROM guest
        WHERE Username='$username'");
        return $query->getRowArray();
    }
}