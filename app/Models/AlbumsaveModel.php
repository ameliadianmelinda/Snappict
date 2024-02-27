<?php

namespace App\Models;

use CodeIgniter\Model;

class AlbumsaveModel extends Model
{
    protected $table      = 'albumsave';

    protected $primaryKey = 'albumsaveid';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $useTimestamps = false;

    protected $allowedFields = ['albumid', 'fotoid', 'userid'];


    public function getFotoAlbum($albumid)
    {
        return $this->db->table('albumsave')
            ->where('albumid', $albumid)
            ->get()
            ->getResultArray();
    }

    public function gethapusAlbums($albumsaveid)
    {
        return $this->where('albumid', $albumsaveid)->delete();
    }
}
