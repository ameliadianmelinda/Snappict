<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\FotoModel;
use App\Models\KomentarModel;
use App\Models\LikeModel;

class Like extends BaseController
{
    protected $userModel;
    protected $fotoModel;
    protected $likeModel;
    protected $session;
    protected $validation;
    protected $komentarModel;

    public function __construct()
    {
        $this->userModel = new UserModel();

        $this->fotoModel = new FotoModel();

        $this->likeModel = new LikeModel();

        $this->komentarModel = new KomentarModel();

        $this->validation = \Config\Services::validation();

        $this->session = \Config\Services::session();

    }

    public function like($id)
    {
        $userid = session('userid');
        $this->likeModel->save([
            'fotoid' => $id,
            'userid' => $userid,
            'tanggal_like' => date('Y-m-d'),
        ]);
        return redirect()->to('/galeri/' . $id);
    }

    public function unlike($id)
    {
        $userid = session('userid');
        $this->likeModel->where('fotoid', $id)->where('userid', $userid)->delete();
        return redirect()->to('/galeri/' . $id);
    }

}
