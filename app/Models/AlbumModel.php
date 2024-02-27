<?php

namespace App\Models;

use CodeIgniter\Model;

class AlbumModel extends Model
{
    protected $table      = 'album';

    protected $primaryKey = 'albumid';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $useTimestamps = false;

    protected $allowedFields = ['cover_album', 'nama_album', 'deskripsi', 'tanggal_dibuat', 'userid'];


    public function getAlbumById($id)
    {
        return $this->where('userid', $id)->findAll();
    }

    public function getAlbumByIdAlbum($id)
    {
        return $this->where('albumid', $id)->first();
    }
}
