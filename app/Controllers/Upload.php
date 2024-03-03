<?php

namespace App\Controllers;

use App\Models\FotoModel;
use App\Models\UserModel;
use App\Models\AlbumModel;
use App\Models\AlbumsaveModel;


class Upload extends BaseController
{
    protected $fotoModel;
    protected $userModel;
    protected $albumModel;
    protected $albumsaveModel;

    public function __construct()
    {
        $this->fotoModel = new FotoModel();

        $this->userModel = new UserModel();

        $this->albumModel = new AlbumModel();

        $this->albumsaveModel = new AlbumsaveModel();
    }


    public function index(): string
    {
         // Periksa apakah ada data session untuk user
         if (!session()->get('userid')) {
            // Jika tidak, arahkan ke halaman login
            return redirect()->to('/');
        }


        return view('upload');
    }

    public function save()
    {
        // ambil gambar
        $fileDokumen = $this->request->getFile('foto');
        $newName = $fileDokumen->getRandomName();
        $fileDokumen->move('image_storage', $newName);


        $this->fotoModel->save([
            'judul_foto' => $this->request->getVar('judul_foto'),
            'deskripsi_foto' => $this->request->getVar('deskripsi_foto'),
            'tanggal_unggah' => date('Y-m-d'),
            'foto' => $newName,
            'userid' => session()->get('userid'),
            'albumid' => 1,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/beranda');
    }

    public function search()
    {
         // Periksa apakah ada data session untuk user
         if (!session()->get('userid')) {
            // Jika tidak, arahkan ke halaman login
            return redirect()->to('/');
        }

        $keyword = $this->request->getVar('keyword');
        $foto = $this->fotoModel->getFotoByKeyword($keyword);
        $akun = $this->userModel->getUserByKeyword($keyword);
    
        $fotos = [];
        foreach ($akun as $user) {
            $userFotos = $this->fotoModel->where('userid', $user['userid'])->findAll();
            $fotos = array_merge($fotos, $userFotos);
        }
    
        $data = [
            'validation' => \Config\Services::validation(),
            'foto' => $foto,
            'fotos' => $fotos,
            'akun' => $akun,
            'keyword' => $keyword,
        ];
    
        return view('home/searchresult', $data);
    }
    

    public function edit($id)
    {
        $foto = $this->fotoModel->where('fotoid', $id)->first();
        $data = [
            'foto' => $foto,
        ];

        return view('editupload', $data);
    }


    public function update($id)
    {
        $fotolama = $this->fotoModel->getFoto($id);
        if ("" == $this->request->getFile('foto')) {
            $newname = $fotolama['foto'];
        } else {
            $fileDokumen = $this->request->getFile('foto');
            $newname = $fileDokumen->getRandomName();
            $fileDokumen->move('image_storage', $newname);
        }

        $this->fotoModel->save([
            'fotoid' => $id,
            'judul_foto' => $this->request->getVar('judul_foto'),
            'deskripsi_foto' => $this->request->getVar('deskripsi_foto'),
            'foto' => $newname,
        ]);

        return redirect()->to('/profil-postingan/' . $id);
    }


    public function delete($id)
    {
        //hapus foto
        $this->fotoModel->delete($id);

        return redirect()->to('/beranda');
    }


    public function addfotoalbum($fotoid, $albumid)
    {
        $foto = $this->fotoModel->find($fotoid);
        $albumid = $this->albumModel->find($albumid);
        $userid = session()->get('userid');


        $this->albumsaveModel->save([
            'fotoid' => $foto['fotoid'], 
            'albumid' => $albumid['albumid'], 
            'userid' => $userid
        ]);

        $this->fotoModel->save([
            'fotoid' => $fotoid, 
            'albumid' => $albumid['albumid'], 
        ]);

        session()->setFlashdata('addalbum', 'Foto berhasil ditambahkan ke album');
        return redirect()->back();
    }
}
