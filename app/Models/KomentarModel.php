<?php

namespace App\Models;

use CodeIgniter\Model;

class KomentarModel extends Model
{
    protected $table      = 'komentar';
    protected $primaryKey = 'komentarid';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['fotoid', 'userid', 'isi_komentar', 'tgl_komentar'];


    public function getKomentar($id = false)
    {
        if($id == false){
            return $this->findAll();
        }
        return $this->where(['komentarid' => $id])->first();
    }

}