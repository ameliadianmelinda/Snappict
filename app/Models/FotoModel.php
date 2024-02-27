<?php

namespace App\Models;

use CodeIgniter\Model;

class FotoModel extends Model
{
    protected $table      = 'foto';

    protected $primaryKey = 'fotoid';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $useTimestamps = false;

    protected $allowedFields = ['judul_foto', 'deskripsi_foto', 'tanggal_unggah', 'foto', 'lokasi_file', 'albumid', 'userid'];



    public function getFoto($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['fotoid' => $id])->first();
    }


    public function getFotoByKeyword($keyword)
    {
        return $this->like('judul_foto', $keyword)->orLike('deskripsi_foto', $keyword)->findAll();
    }

    public function getHapusAlbums($albumId)
    {
        return $this->where('albumid', $albumId)->delete();
    }
}
