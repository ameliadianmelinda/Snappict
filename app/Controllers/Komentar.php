<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\FotoModel;
use App\Models\KomentarModel;
use App\Models\LikeModel;
use App\Models\AlbumModel;
use App\Models\AlbumsaveModel;

class Komentar extends BaseController
{
    protected $userModel;
    protected $fotoModel;
    protected $likeModel;
    protected $session;
    protected $validation;
    protected $komentarModel;
    protected $albumModel;
    protected $albumsaveModel;

    public function __construct()
    {
        $this->userModel = new UserModel();

        $this->fotoModel = new FotoModel();

        $this->likeModel = new LikeModel();

        $this->komentarModel = new KomentarModel();

        $this->albumModel = new AlbumModel();

        $this->albumsaveModel = new AlbumsaveModel();

        $this->validation = \Config\Services::validation();

        $this->session = \Config\Services::session();
    }

    public function galeri($id)
    {
        // Periksa apakah ada data session untuk user
        if (!session()->get('userid')) {
            // Jika tidak, arahkan ke halaman login
            return redirect()->to('/');
        }

        $foto = $this->fotoModel->find($id);
        $userid = $foto['userid'];

        $komentar = $this->komentarModel->where('fotoid', $id)->findAll();
        $user = $this->userModel->getUser($userid);
        $user_comment = $this->userModel->findAll();

        $ses = session()->get('userid');
        $liked = $this->likeModel->where(['fotoid' => $id, 'userid' => $ses])->first();
        $jumlahlike = $this->likeModel->where('fotoid', $id)->countAllResults();
        $jumlahkomen = $this->komentarModel->where('fotoid', $id)->countAllResults();

        $fotos = $this->albumsaveModel->getFotoAlbum($id);
        $album = $this->albumModel->getAlbumById($_SESSION['userid']);


        $data = [
            'foto' => $foto,
            'user' => $user,
            'komen' => $komentar,
            'user_comment' => $user_comment,
            'liked' => $liked,
            'jumlahlike' => $jumlahlike,
            'jumlahkomen' => $jumlahkomen,
            'album' => $album,
            'fotos' => $fotos,
        ];

        return view('home/komentar', $data);
    }


    public function save($id)
    {
        // buatkan controller untu menyimmpan komentar yang diambil dari form
        $this->komentarModel->save([
            'fotoid' => $id,
            'userid' => session()->get('userid'),
            'isi_komentar' => $this->request->getVar('isi_komentar'),
            'tgl_komentar' => date('Y-m-d'),
        ]);

        return redirect()->to('/galeri/' . $id);
    }


    public function delete($id, $fotoid)
    {
        $this->komentarModel->delete($id);
        session()->setFlashdata('success', 'Komentar telah dihapus');

        return redirect()->to('/galeri/' . $fotoid);
    }
}
