<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;
    protected $session;
    protected $validation;

    public function __construct()
    {
        //membuat user model untuk konek ke database 
        $this->userModel = new UserModel();

        //meload validation
        $this->validation = \Config\Services::validation();

        //meload session
        $this->session = \Config\Services::session();
    }

    public function login(): string
    {
        return view('auth/login');
    }

    public function register(): string
    {
        return view('auth/register');
    }

    public function valid_register()
    {
        
        // Tangkap data dari form
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'confirm' => $this->request->getVar('confirm_password'),
            'email' => $this->request->getVar('email'),
        ];

        // cek apakah username sudah ada di database
        $user = $this->userModel->where('username', $data['username'])->first();

        // cek apakah email sudah ada di database
        $email = $this->userModel->where('email', $data['email'])->first();

        
        // jalankan validasi email
        if ($email) {
            session()->setFlashdata('email', 'Email sudah dipakai');
            return redirect()->to('/register');
        }
        
        // jalankan validasi username 
        if ($user) {
            session()->setFlashdata('username', 'Username sudah dipakai');
            return redirect()->to('/register');
        }

        // jalankan validasi password yang harus terdiri dari 8 huruf atau angka
        if (strlen($data['password']) < 8) {
            session()->setFlashdata('password', 'Password harus terdiri dari 8 huruf atau angka');
            return redirect()->to('/register');
        }
        
        // jalankan validasi confirm password
        if ($data['password'] != $data['confirm']) {
            session()->setFlashdata('confirm', 'Password tidak sama');
            return redirect()->to('/register');
        }

        $token = bin2hex(random_bytes(10));

        $email = \Config\Services::email();
        $email->setTo($data['email']);
        $email->setFrom('ameliaaamel023@gmail.com', 'SnappictOfficial');
        $email->setSubject('Registrasi Akun');
        $email->setMessage('Selamat Datang ' . $data['username'] . ' di Snappict, akun anda berhasil dibuat. Silahkan Activasi akun anda dengan klik link berikut :' . base_url() . 'auth/activate/' . $token);
        $email->send();

        // Masukkan data ke database
        $this->userModel->save([
            'username' => $data['username'],
            'password' => md5($data['password']),
            'foto_profil' => 'default_profil.jpg',
            'date_created' => date('Y-m-d'),
            'email' => $data['email'],
            'active' => $token,
        ]);

        // Arahkan ke halaman login
        session()->setFlashdata('login', 'Anda berhasil mendaftar, silahkan cek email anda untuk aktivasi akun');
        return redirect()->to('/');
    }

    public function valid_login()
    {
        //ambil data dari form
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
        ];

        //ambil data user di database yang usernamenya sama 
        $user = $this->userModel->where('username', $data['username'])->first();
        // jalankan validasi username
        if (!$user) {
            session()->setFlashdata('username', 'Username tidak ditemukan');
            return redirect()->to('/');
        }

        //cek apakah password benar
        if ($user) {
            if ($user['password'] != md5($data['password'])) {
                session()->setFlashdata('password', 'Password salah');
                return redirect()->to('/');
            } else {

                if ($user['active'] != 'true') {
                    session()->setFlashdata('nonaktif', 'Akun anda belum diaktivasi');
                    return redirect()->to('/');
                }

                $data = [
                    'isLogin' => true,
                    'userid' => $user['userid'],
                    'username' => $user['username'],
                    'foto' => $user['foto_profil']
                ];

                session()->set($data);
                return redirect()->to('/beranda');
            }
        } else {
            //jika username tidak ditemukan, balikkan ke halaman login
            session()->setFlashdata('username', 'Username tidak ditemukan');
            return redirect()->to('/');
        }
    }


    public function activate($token)
    {
        if ($token) {
            $user = $this->userModel->where(['active' => $token])->first();
            if ($user) {
                $this->userModel->save([
                    'userid' => $user['userid'],
                    'active' => 'true'
                ]);

                session()->setFlashdata('aktif', 'Akun berhasil diaktivasi');
                return redirect()->to('/');
            } else {
                session()->setFlashdata('token', 'Token tidak ditemukan');
                return redirect()->to('/');
            }
        } else {
            session()->setFlashdata('token', 'Token tidak ditemukan');
            return redirect()->to('/');
        }
    }



    public function logout()
    {
        //hancurkan session dan arahkan ke halaman login
        $this->session->destroy();
        return redirect()->to('/');
    }
}
