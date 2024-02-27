<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\FotoModel;
use App\Models\KomentarModel;
use App\Models\AlbumModel;
use App\Models\LikeModel;

class User extends BaseController
{
    protected $userModel;
    protected $fotoModel;
    protected $session;
    protected $validation;
    protected $komentarModel;
    protected $albumModel;
    protected $likeModel;

    public function __construct()
    {
        //membuat user model untuk konek ke database 
        $this->userModel = new UserModel();

        //membuat foto model untuk konek ke database 
        $this->fotoModel = new FotoModel();

        $this->komentarModel = new KomentarModel();

        $this->albumModel = new AlbumModel();

        $this->likeModel = new LikeModel();

        //meload validation
        $this->validation = \Config\Services::validation();

        //meload session
        $this->session = \Config\Services::session();
    }

    public function index($userid)
    {
        // get data user berdasarkan id
        $user = $this->userModel->getUserById($userid);
        $userid = $user['userid'];

        $data = [
            'user' => $user,
        ];

        return view('templates/userprofil', $data);
    }

    public function userpostingan($userid)
    {
        // get data user berdasarkan id
        $user = $this->userModel->getUserById($userid);
        $userid = $user['userid'];
        //ambil data foto beradasarkan id user
        $foto = $this->fotoModel->where('userid', $userid)->findAll();

        $data = [
            'user' => $user,
            'foto' => $foto,
        ];

        return view('user/userpostingan', $data);
    }


    public function useralbum($userid)
    {
        // get data user berdasarkan id
        $user = $this->userModel->getUserById($userid);
        $userid = $user['userid'];
        //ambil data album beradasarkan id user
        $album = $this->albumModel->where('userid', $userid)->findAll();

        $data = [
            'user' => $user,
            'album' => $album,
        ];

        return view('user/useralbum', $data);
    }


    // buat controller untuk menampilkan like yang dilakukan user berdasarkan id user
    public function usersuka($userid)
    {
        // get data user berdasarkan id
        $user = $this->userModel->getUserById($userid);
        $userid = $user['userid'];

        //ambil data foto yang di like beradasarkan id user

        $liked = $this->likeModel->getLikedFoto($userid);
        $foto = [];
        foreach ($liked as $like) {
            $foto[] = $this->fotoModel->getFoto($like['fotoid']);    
        }
        $foto = array_reverse($foto);
        
    

        $data = [
            'user' => $user,
            'foto' => $foto,
        ];

        return view('user/usersuka', $data);
    }
    // {
        
    //     // get data user berdasarkan id
    //     $user = $this->userModel->getUserById($userid);
    //     $userid = $user['userid'];

    //     //ambil data foto yang di like beradasarkan id user

    //     $liked = $this->likeModel->getLikedFoto($userid);
    //     $foto = [];
    //     foreach ($liked as $like) {
    //         $foto[] = $this->fotoModel->getFoto($like['fotoid']);    
    //     }
    //     $foto = array_reverse($foto);
        
    

    //     $data = [
    //         'user' => $user,
    //         'foto' => $foto,
    //     ];

    //     return view('user/usersuka', $data);
    // }
}
