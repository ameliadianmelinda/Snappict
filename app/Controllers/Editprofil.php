<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\FotoModel;

class Editprofil extends BaseController
{
    protected $userModel;
    protected $fotoModel;
    protected $session;

    public function __construct()
    {
        $this->userModel = new UserModel();

        $this->fotoModel = new FotoModel();

        $this->session = \Config\Services::session();
    }

    public function index(): string
    {
        //menampikan username sesuai session login
        $user = $this->userModel->getUser(session()->get('userid'));

        $data = [
            'user' => $user,
        ];

        return view('pribadi/editprofil' , $data);
    }



    public function update($id)
    { 
        $user = $this->userModel->where('userid', $id)->first();

        $fileFoto = $user['foto_profil'];
        
        $fileDokumen = $this->request->getFile('foto_profil');
        if ($fileDokumen == "") {
            $nameFoto = $fileFoto;
        } else {
            if ($fileFoto != 'default_profil.jpg') {
                unlink('profil_storage/' . $user['foto_profil']);
            }
            $nameFoto = $fileDokumen->getRandomName();
            $fileDokumen->move('profil_storage', $nameFoto);

            $session_Login = [
                'isLogin' => true,
                'userid' => $user['userid'],
                'foto' => $nameFoto,
            ];
            $this->session->set($session_Login);
        }


        $this->userModel->save([
            "userid" => $id,
            "username" => $user['username'],
            'email' =>  $user['email'],
            'namalengkap' =>  $user['namalengkap'],
            'alamat' =>  $user['alamat'],
            'foto_profil' => $nameFoto,
        ]);
        return redirect()->to('/profil-postingan/' . $id);

    }
}