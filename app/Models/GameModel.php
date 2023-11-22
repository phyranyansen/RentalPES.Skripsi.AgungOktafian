<?php

namespace App\Models;

use CodeIgniter\Model;

class GameModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'game';
    protected $primaryKey       = 'Id_Game';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Id_Game', 'Id_Playstation', 'Nama_Game', 'Keterangan', 'Gambar'];

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


    public function get_game()
    {
        $query = $this->db->query("SELECT a.*, b.Nama_Playstation, b.Nama_Alias
            FROM game a JOIN playstation b ON a.Id_Playstation = b.Id_Playstation
            ORDER BY a.Id_Game;");
        return $query->getResultArray();
    }
}