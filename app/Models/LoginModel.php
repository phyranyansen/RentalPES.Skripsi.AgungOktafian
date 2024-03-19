<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'user';
    protected $primaryKey       = 'Id_User';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Id_User', 'Username', 'Email', 'Password', 'Status', 'Level'];

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


    public function add_user($data)
    {
        $save = $this->insert($data);
        return $save;
    }
    
    public function add_user_group($data)
    {  
        $table = $this->db->table('user_group');
         $save = $table->insertBatch($data);
        return $save;
    }

    public function update_user($id, $data)
    {
        $query = $this->update($id, $data);
        return $query;
    }
    
    public function delete_user($table, $id)
    {
        $query = $this->db->query("DELETE FROM $table WHERE Id_User = '$id' ");
        return $query;
    }

    public function get_id_user()
    {
        $query = $this->db->query("SELECT * FROM user 
        WHERE Id_User IN (SELECT MAX(Id_User) FROM user)");

        return $query->getRowArray();
    }

    public function get_where($id)
    {
        $query = $this->db->query("SELECT Id_User, Username, Email, Password, CASE 
        WHEN Status = 1 THEN 'Aktif'
            ELSE 'Tidak Aktif'
            END AS Status,
        CASE 
            WHEN Level = 1 THEN 'Administrator'
            ELSE 'Public'
        END AS Level
     FROM user WHERE Id_User='$id' OR Username = '$id' OR Email = '$id'");
        return $query->getRowArray();
    }

    public function get_user()
    {
        $query = $this->db->query("SELECT Id_User, Username, CASE 
                WHEN Status = 1 THEN 'Aktif'
                    ELSE 'Tidak Aktif'
                    END AS Status,
                CASE 
                    WHEN Level = 1 THEN 'Administrator'
                    ELSE 'Public'
                END AS Level
            FROM user");

        return $query->getResultArray();
    }


   public function get_group_user()
   {
        $query = $this->db->query("SELECT
        Id_User, Username,                 
        MAX(CASE WHEN MenuId = 1 THEN Status END) AS aset_id,
        MAX(CASE WHEN MenuId = 2 THEN Status END) AS ancaman_id,
        MAX(CASE WHEN MenuId = 3 THEN Status END) AS kemungkinan_id,
        MAX(CASE WHEN MenuId = 4 THEN Status END) AS dampak_id,
        MAX(CASE WHEN MenuId = 5 THEN Status END) AS kategori_id,
        
        MAX(CASE WHEN MenuNumber = 1 THEN Status END) AS aset,
        MAX(CASE WHEN MenuNumber = 2 THEN Status END) AS ancaman,
        MAX(CASE WHEN MenuNumber = 3 THEN Status END) AS kemungkinan,
        MAX(CASE WHEN MenuNumber = 4 THEN Status END) AS dampak,
        MAX(CASE WHEN MenuNumber = 5 THEN Status END) AS kategori,
        CreateStatus,
        UpdateStatus, 
        DeleteStatus
    FROM (
        SELECT
            a.Id_User,
            c.Username,
            b.Nama_Menu,
            a.Status,
            a.CreateStatus,
            a.UpdateStatus,
            a.DeleteStatus,
            ROW_NUMBER() OVER (PARTITION BY a.Id_User ORDER BY a.Id_Menu) AS MenuNumber,
            ROW_NUMBER() OVER (PARTITION BY a.Id_Menu ORDER BY a.Id_Menu) AS MenuId
        FROM user_group a
        LEFT JOIN menu b ON b.Id_Menu = a.Id_Menu
        LEFT JOIN user c ON c.Id_User = a.Id_User
    ) AS SourceTable
    GROUP BY Username;");
       return $query->getResultArray();
   }

   public function edit_user_group($data, $idMenu, $idUser)
   {
       // Combine the data with Id_Menu and Id_User
       $data['Id_Menu'] = $idMenu;
       $data['Id_User'] = $idUser;
       
       // Use the query builder to perform the update
       $this->db->table('user_group')
                ->where('Id_Menu', $idMenu)
                ->where('Id_User', $idUser)
                ->update($data);
   
       // Return the update status
       return $this->db->affectedRows() > 0;
   }
   
   public function get_menu($id)
   {
        $query = $this->db->query("SELECT a.Id_Menu, b.Nama_Menu, b.Link  
        FROM user_group a JOIN menu b ON b.Id_Menu = a.Id_Menu WHERE a.Id_User = '$id';");
        return $query->getResultArray();
   }

    public function get_data($table)
    {
        $query = $this->db->query("SELECT count(*) as $table FROM $table");
        return $query->getRowArray();
    }

    public function save_edit($id, $data)
    {
        $query = $this->update($id, $data);
        return $query;
    }


    public function get_user_where($where)
    {
        $query = $this->db->query("SELECT * FROM user WHERE Id_User='$where'");
        return $query->getRowArray();
    }
    
}