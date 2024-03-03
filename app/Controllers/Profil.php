<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\FotoModel;
use App\Models\KomentarModel;
use App\Models\AlbumModel;
use App\Models\AlbumsaveModel;
use App\Models\LikeModel;

class Profil extends BaseController
{
    protected $userModel;
    protected $fotoModel;
    protected $session;
    protected $validation;
    protected $komentarModel;
    protected $albumModel;
    protected $albumsaveModel;
    protected $likeModel;

    public function __construct()
    {
        //membuat user model untuk konek ke database 
        $this->userModel = new UserModel();

        //membuat foto model untuk konek ke database 
        $this->fotoModel = new FotoModel();

        $this->komentarModel = new KomentarModel();

        $this->albumModel = new AlbumModel();

        $this->albumsaveModel = new AlbumsaveModel();

        $this->likeModel = new LikeModel();

        //meload validation
        $this->validation = \Config\Services::validation();

        //meload session
        $this->session = \Config\Services::session();
    }

    public function index($id)
    {
         // Periksa apakah ada data session untuk user
         if (!session()->get('userid')) {
            // Jika tidak, arahkan ke halaman login
            return redirect()->to('/');
        }

        //menampilkan username sesuai session login
        $user = $this->userModel->where('userid', session()->get('userid'))->first();
        $userid = $user['userid'];
        $foto = $this->fotoModel->where('userid', $userid)->findAll();
        $foto = array_reverse($foto);
        $ses = session()->get('userid');
        $liked = $this->likeModel->where(['fotoid' => $id, 'userid' => $ses])->first();
        $jumlahlike = $this->likeModel->where('fotoid', $id)->countAllResults();
        $jumlahkomen = $this->komentarModel->where('fotoid', $id)->countAllResults();

        $data = [
            'user' => $user,
            'foto' => $foto,
            'liked' => $liked,
            'jumlahlike' => $jumlahlike,
            'jumlahkomen' => $jumlahkomen,
        ];

        return view('pribadi/postingan', $data);
    }

    public function album()
    {
         // Periksa apakah ada data session untuk user
         if (!session()->get('userid')) {
            // Jika tidak, arahkan ke halaman login
            return redirect()->to('/');
        }

        //menampilkan username sesuai session login
        $user = $this->userModel->where('userid', session()->get('userid'))->first();
        $userid = $user['userid'];
        $album = $this->albumModel->where('userid', $userid)->findAll();

        $data = [
            'user' => $user,
            'album' => $album,
        ];

        return view('pribadi/album', $data);
    }

    public function createalbum()
    {
         // Periksa apakah ada data session untuk user
         if (!session()->get('userid')) {
            // Jika tidak, arahkan ke halaman login
            return redirect()->to('/');
        }


        return view('pribadi/createalbum');
    }

    public function savealbum()
    {
        // ambil gambar
        $fileDokumen = $this->request->getFile('cover_album');
        $newName = $fileDokumen->getRandomName();
        $fileDokumen->move('image_storage', $newName);

        $this->albumModel->save([
            'cover_album' => $newName,
            'nama_album' => $this->request->getVar('nama_album'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'userid' => session()->get('userid'),
            'tanggal_dibuat' => date('Y-m-d'),
        ]);

        return redirect()->to('/profil-album');
    }


    public function galerialbum($id)
    {
         // Periksa apakah ada data session untuk user
         if (!session()->get('userid')) {
            // Jika tidak, arahkan ke halaman login
            return redirect()->to('/');
        }


        // ambil data album sesuai dengan id
        $dataalbum = $this->albumModel->where('albumid', $id)->findAll();


        $album = $this->albumModel->getAlbumById($id);
        $albumfoto = $this->albumsaveModel->getFotoAlbum($id);
        $foto = [];
        foreach ($albumfoto as $af) {
            $foto[] = $this->fotoModel->getFoto($af['fotoid']);
        }
        $foto = array_reverse($foto);
        $jumlahfoto = count($foto);

        $data = [
            'album' => $album,
            'foto' => $foto,
            'jumlahfoto' => $jumlahfoto,
            'dataalbum' => $dataalbum,
        ];

        return view('pribadi/detailalbum', $data);
    }

    public function editalbum($id)
    {
        // ambil data album sesuai dengan id
        $dataalbum = $this->albumModel->where('albumid', $id)->findAll();

        $data = [
            'dataalbum' => $dataalbum,
        ];

        return view('pribadi/editalbum', $data);
    }

   
    public function updatealbum($id)
    {
        // Ambil data album sesuai dengan id
        $dataalbum = $this->albumModel->where('albumid', $id)->first();

        // Ambil nama file foto lama dari data album
        $fotolama = $dataalbum['cover_album'];

        if ("" == $this->request->getFile('cover_album')) {
            // Jika tidak ada file baru yang diunggah, gunakan nama foto lama
            $newname = $fotolama;
        } else {
            // Jika ada file baru yang diunggah, simpan file baru dan gunakan nama baru
            $fileDokumen = $this->request->getFile('cover_album');
            $newname = $fileDokumen->getRandomName();
            $fileDokumen->move('image_storage', $newname);
        }

        // Simpan data album yang diperbarui
        $this->albumModel->update($id, [
            'cover_album' => $newname,
            'nama_album' => $this->request->getVar('nama_album'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'tanggal_dibuat' => date('Y-m-d'),
        ]);

        return redirect()->to('/galeri-album/' . $id);
    }


    public function deletealbum($id)
    {
        // Hapus album dari tabel albumModel berdasarkan albumid
        $this->albumModel->where('albumid', $id)->delete();

        // Hapus foto dari tabel albumsaveModel berdasarkan albumid
        $this->albumsaveModel->where('albumid', $id)->delete();

        return redirect()->to('/profil-album');
    }


    public function deletefoto($fotoid, $albumid)
    {
        // Hapus foto dari tabel albumsaveModel berdasarkan fotoid dan albumid
        $this->albumsaveModel->where('fotoid', $fotoid)->where('albumid', $albumid)->delete();

        // Hapus albumid dari tabel fotoModel berdasarkan albumid
        $this->fotoModel->where('albumid', $albumid)->set(['albumid' => null])->update();

        
        session()->setFlashdata('hpsfoto', 'Foto telah dihapus dari album');
        return redirect()->back();
    }


    public function suka($id)
    {
         // Periksa apakah ada data session untuk user
         if (!session()->get('userid')) {
            // Jika tidak, arahkan ke halaman login
            return redirect()->to('/');
        }

        //menampilkan foto yang disukai oleh user yang login 
        $user = $this->userModel->getUser($id);
        $liked = $this->likeModel->getLikedFoto($id);
        $foto = [];
        foreach ($liked as $like) {
            $foto[] = $this->fotoModel->getFoto($like['fotoid']);
        }
        $foto = array_reverse($foto);

        $data = [
            'user' => $user,
            'foto' => $foto,
        ];

        return view('pribadi/suka', $data);
    }

    public function settings()
    {
         // Periksa apakah ada data session untuk user
         if (!session()->get('userid')) {
            // Jika tidak, arahkan ke halaman login
            return redirect()->to('/');
        }

        //menampikan username sesuai session login
        $user = $this->userModel->getUser(session()->get('userid'));

        $data = [
            'user' => $user,
        ];

        return view('pribadi/settings', $data);
    }

    public function updatesettings($id)
    {
        // ambiil datanya
        $data = $this->request->getPost();
        $user = $this->userModel->getUser($id);
        $this->validation->run($data, 'changepassword');
        $errors = $this->validation->getErrors();

        if ($errors) {
            session()->setFlashdata('pwnew', $this->validation->getError('pwnew'));
            session()->setFlashdata('confirm', $this->validation->getError('confirm'));
            return redirect()->to('/setting-akun');
        }

        // ambil password dari id di session
        if (md5($data['pwnow']) != $user['password']) {
            session()->setFlashdata('pwnow', 'Kata sandi saat ini tidak sesuai');
            return redirect()->to('/setting-akun');
        }

        $this->userModel->save([
            'userid' => $id,
            'password' => md5($data['pwnew']),
        ]);

        return redirect()->to('/profil-postingan/' . $id);
    }
}
