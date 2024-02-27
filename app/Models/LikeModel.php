<?php

namespace App\Models;

use CodeIgniter\Model;

class LikeModel extends Model
{
    protected $table      = 'like';

    protected $primaryKey = 'likeid';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['fotoid', 'userid', 'tanggal_like'];


    public function hasUserLikedPost($userid, $fotoid)
    {
        return $this->where(['userid' => $userid, 'fotoid' => $fotoid])->countAllResults() > 0;
    }

    public function getLikeByPost($id)
    {
        return $this->where(['fotoid' => $id])->findAll();
    }

    public function getLikedFoto($id = false)
    {
        if($id == false){
            return $this->findAll();
        }
        $liked = $this->where('userid', $id)->findAll();
        return $liked;
    }
}
