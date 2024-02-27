<?php

namespace App\Controllers;

use App\Models\FotoModel;
use App\Models\UserModel;
use App\Models\LikeModel;
use App\Models\KomentarModel;

class Beranda extends BaseController
{

    protected $fotoModel;
    protected $userModel;
    protected $likeModel;
    protected $komentarModel;

    public function __construct()
    {
        $this->fotoModel = new FotoModel();
        $this->userModel = new UserModel();
        $this->likeModel = new LikeModel();
        $this->komentarModel = new KomentarModel();
    }

    public function index(): string
    {
        // ambil foto
        $foto = $this->fotoModel->findAll();
        $foto = array_reverse($foto);

        $data = [
            'foto' => $foto,
        ];

        return view('home/beranda', $data);
    }

    public function beranda2(): string
    {
        return view('home/beranda2');
    }

    public function modal(): string
    {
        return view('modal/index');
    }
}
