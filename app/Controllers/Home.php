<?php

namespace App\Controllers;

use App\Models\LayananModel;

use App\Models\KlienModel;
use App\Models\PerusahaanModel;

class Home extends BaseController
{

    public function __construct()
    {
        $this->LayananModel = new LayananModel();
        $this->KlienModel = new KlienModel();
        $this->PerusahaanModel = new PerusahaanModel();
    }
    public function index()
    {
        $data = [
            'menu' => 'Home',
            'title' => 'Selamat datang di <strong> Kreasi AI </strong>',
            'isi' => 'user/v_home',
            'subtitle' => 'home',
            'stlayanan' => 'Kami Siap Melayani Anda',
            'perusahaan' => $this->PerusahaanModel->DetailData(),
            'sosmed' => $this->PerusahaanModel->AllSosmed(),
            'layanan' => $this->LayananModel->getLayanan(),
            'klien' => $this->KlienModel->getKlien()
        ];

        echo view('layoutUser/v_wrapper', $data);
    }
    public function Layanan($id)
    {
        $data = [
            'menu' => 'Home',
            'submenu' => 'Layanan',
            'title' => 'Selamat datang di <br> Kreasi AI <br> Kami siap Melayani!',
            'isi' => 'user/v_layanan',
            'subtitle' => 'layanan',
            'titlelayanan' => 'layanan',
            'stlayanan' => 'Kami Siap Melayani Anda',
            'perusahaan' => $this->PerusahaanModel->DetailData(),
            'layanan' => $this->LayananModel->getLayanan($id),
            'galeri_layanan' => $this->LayananModel->getGaleri($id),
            'paket_layanan' => $this->LayananModel->getPaket($id)
        ];

        echo view('layoutUser/v_wrapper', $data);
    }
    // public function Klien($id)
    // {

    //     $data = [
    //         'title' => 'Daftar Klien',
    //         'isi' => 'admin/v_klien',
    //         // 'menu' => 'klien',
    //         // 'submenu' => 'daftar_klien',
    //         'klien' => $this->KlienModel->getKlien($id)
    //         // 'pager' => $this->KlienModel->pager,
    //         // 'currentPage' => $currentPage
    //     ];

    //     echo view('layoutUser/v_wrapper', $data);
    // }
}
