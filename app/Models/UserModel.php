<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'userid';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['username', 'password', 'email', 'namalengkap', 'alamat', 'foto_profil', 'active'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    public function getUser($id = false)
    {
        if($id == false){
            return $this->findAll();
        }
        return $this->where(['userid' => $id])->first();
    }

    public function getUserByKeyword($keyword)
    {
        return $this->like('username', $keyword)->orLike('namalengkap', $keyword)->findAll();
    }
    //buatkan getUserById
    public function getUserById($id)
    {
        return $this->where(['userid' => $id])->first();
    }
}