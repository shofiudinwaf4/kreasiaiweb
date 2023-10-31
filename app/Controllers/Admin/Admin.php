<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use CodeIgniter\Config\Config;

// class untuk login akun
class Admin extends BaseController
{
    function __construct()
    {
        // memanggil kelas admin
        $this->m_admin = new AdminModel();
        $this->validation = \Config\Services::validation();
        helper("cookie");
        helper("global_fungsi_helper");
    }
    public function login()
    {
        // session()->destroy();
        if (get_cookie('cookie_username') && get_cookie('cookie_password')) {
            $username = get_cookie('cookie_username');
            $password = get_cookie('cookie_password');

            $dataAkun = $this->m_admin->getData($username);
            if ($password != $dataAkun['password']) {
                $err[] = "akun yang kamu masukkan tidak sesuai";
                session()->setFlashdata('username', $username);
                session()->setFlashdata('warning', $err);

                delete_cookie('cookie_username');
                delete_cookie('cookie_password');
                return redirect()->to('admin/login');
                # code...
            }
            $akun = [
                'akun_username' => $username,
                'akun_nama_lengkap' => $dataAkun, ['nama_lengkap'],
                'akun_email' => $dataAkun['email']
            ];
            session()->set($akun);
            return redirect()->to('admin/sukses');
        }
        $data = [];
        // pengecekan apakah ada function/method post yang melakukan posting data dibagian form
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Username belum diisi'
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password belum diisi'
                    ]
                ]
            ];
            if (!$this->validate($rules)) {
                // $validation = \Config\Services::validation();
                session()->setFlashdata("warning", $this->validation->getErrors());
                return redirect()->to("admin/login");
            }
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            // $remember_me = $this->request->getVar('remember_me');

            $dataAkun = $this->m_admin->getData($username);
            if (!password_verify($password, $dataAkun['password'])) {
                $err[] = "akun yang anda masukkan tidak sesuai.";
                session()->setFlashdata('username', $username);
                session()->setFlashdata('warning', $err);
                return redirect()->to("admin/login");
            }

            // set remember me
            // if ($remember_me == '1') {
            //     set_cookie("cookie_username", $username, 3600 * 24 * 30);
            //     set_cookie("cookie_username", $dataAkun['password'], 3600 * 24 * 30);
            // }
            // session
            $akun = [
                'id_user' => $dataAkun['id_user'],
                'akun_username' => $dataAkun['username'],
                'akun_nama_lengkap' => $dataAkun['nama_lengkap'],
                'akun_email' => $dataAkun['email']
            ];
            session()->set($akun);
            return redirect()->to("admin/sukses")->withCookies();
        }


        echo view("admin/v_login", $data);
    }
    function sukses()
    {
        return redirect()->to('homeadmin');
    }
    function logout()
    {
        delete_cookie("cookie_username");
        delete_cookie("cookie_password");
        session()->destroy();
        // if (session()->get('akun_username') != '') {
        //     session()->setFlashdata("success", "anda berhasil logout");
        // }
        return redirect()->to('admin/login');
        // echo view("admin/v_login");
    }
    function lupapassword()
    {
        $err = [];
        if ($this->request->getMethod() == 'post') {
            $username = $this->request->getVar('username');
            if ($username == '') {
                $err[] = "Silakan masukkan Username atau Email yang anda punya";
            }
            if (empty($err)) {
                $data = $this->m_admin->getData($username);
                if (empty($data)) {
                    $err[] = "Akun yang kamu masukkan tidak terdaftar";
                }
            }
            if (empty($err)) {
                $email = $data['email'];
                $token = md5(date('ymdhis'));

                $link = site_url("admin/resetpassword/?email=$email&token=$token");
                $attachment = "";
                $to = $email;
                $tittle = "Reset Password";
                $message = "Di bawah ini adalah link untuk melakukan reset password anda.";
                $message .= "Silahkan klik link berikut ini $link";

                kirim_email($attachment, $to, $tittle, $message);


                $dataUpdate = [
                    'email' => $email,
                    'token' => $token
                ];
                $this->m_admin->updateData($dataUpdate);
                session()->setFlashdata("success", "Email untuk recovery sudah kami kirim ke Email anda");
            }
            if ($err) {
                session()->setFlashdata("username", $username);
                session()->setFlashdata("warning", $err);
            }
            return redirect()->to("admin/lupapassword");
        }
        echo view("admin/v_lupapassword");
    }
    function resetpassword()
    {
        $err = [];
        $email = $this->request->getVar('email');
        $token = $this->request->getVar('token');
        if ($email != '' and $token != '') {
            $dataAkun = $this->m_admin->getData($email); //cek di tabel admin
            if ($dataAkun['token'] != $token) {
                $err[] = "Token tidak valid";
            }
        } else {
            $err[] = "Parameter yang dikirimkan tidak valid";
        }
        if ($err) {
            session()->setFlashdata('warning', $err);
        }

        if ($this->request->getMethod() == 'post') {
            $aturan = [
                'password' => [
                    'rules' => 'required|min_length[8]',
                    'errors' => [
                        'required' => 'Password harus diisi',
                        'min_length' => 'Minimal password 8 karakter'
                    ]
                ],
                'KonfirmasiPassword' => [
                    'rules' => 'required|min_length[8]|matches[password]',
                    'errors' => [
                        'required' => 'Konfirmasi Password harus diisi',
                        'min_length' => 'Minimal konfirmasi password 8 karakter',
                        'matches' => 'Password tidak sesuai dengan yang diisikan'
                    ]
                ]
            ];

            if (!$this->validate($aturan)) {
                session()->setFlashdata('warning', $this->validation->getErrors());
            } else {
                $dataUpdate = [
                    'email' => $email,
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    'token' => null
                ];
                $this->m_admin->updateData($dataUpdate);
                session()->setFlashdata('success', 'Password berhasil direset');
                delete_cookie('cookie_username');
                delete_cookie('cookie_password');
                return redirect()->to('admin/login')->withCookies();
            }
        }
        echo view("admin/v_resetpassword");
    }
}
