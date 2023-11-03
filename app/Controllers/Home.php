<?php

namespace App\Controllers;

use App\Controllers\Admin\Artikel;
use App\Models\LayananModel;

use App\Models\KlienModel;
use App\Models\PerusahaanModel;
use App\Models\ArtikelModel;

class Home extends BaseController
{

    public function __construct()
    {
        $this->LayananModel = new LayananModel();
        $this->KlienModel = new KlienModel();
        $this->ArtikelModel = new ArtikelModel();
        $this->PerusahaanModel = new PerusahaanModel();
    }
    public function index()
    {
        $data = [
            'menu' => 'Home',
            'submenu' => 'Home',
            'title' => 'Selamat datang di <strong> Kreasi AI </strong>',
            'isi' => 'user/v_home',
            'subtitle' => 'home',
            'stlayanan' => 'Kami Siap Melayani Anda',
            'perusahaan' => $this->PerusahaanModel->DetailData(),
            'sosmed' => $this->PerusahaanModel->AllSosmed(),
            'artikel' => $this->ArtikelModel->DataLimit(),
            'layanan' => $this->LayananModel->getLayanan(),
            'klien' => $this->KlienModel->getKlien()
        ];

        echo view('layoutUser/v_wrapper', $data);
    }
    public function Layanan($slug)
    {
        $layanan = $this->LayananModel->getLayanan($slug);
        $id = $layanan['id_layanan'];
        $data = [
            'menu' => 'Home',
            'submenu' => 'Layanan',
            'title' => 'Selamat datang di <br> Kreasi AI <br> Kami siap Melayani!',
            'isi' => 'user/v_layanan',
            'subtitle' => 'layanan',
            'titlelayanan' => 'layanan',
            'stlayanan' => 'Kami Siap Melayani Anda',
            'perusahaan' => $this->PerusahaanModel->DetailData(),
            'layanan' => $layanan,
            'galeri_layanan' => $this->LayananModel->getGaleri($id),
            'paket_layanan' => $this->LayananModel->getPaket($id)
        ];

        echo view('layoutUser/v_wrapper', $data);
    }
    public function Artikel()
    {
        $data = [
            'menu' => 'Home',
            'submenu' => 'Artikel',
            'title' => 'Selamat datang di <br> Kreasi AI <br> Kami siap Melayani!',
            'isi' => 'user/v_artikel',
            'subtitle' => 'artikel',
            'titleartikel' => 'artikel',
            'startikel' => 'Lebih dekat dengan kami melalui artikel yang kami berikan',
            'artikel' => $this->ArtikelModel->paginate(5, 'artikel'),
            'pager' => $this->ArtikelModel->pager,
            'perusahaan' => $this->PerusahaanModel->DetailData(),
            'artikelbaru' => $this->ArtikelModel->DataLimit(),
        ];

        echo view('layoutUser/v_wrapper', $data);
    }
    public function SingleArtikel($slug)
    {
        $data = [
            'menu' => 'Home',
            'submenu' => 'Artikel',
            'title' => 'Selamat datang di <br> Kreasi AI <br> Kami siap Melayani!',
            'isi' => 'user/v_singleartikel',
            'subtitle' => 'artikel',
            'titleartikel' => 'artikel',
            'startikel' => 'Lebih dekat dengan kami melalui artikel yang kami berikan',
            'artikel' => $this->ArtikelModel->DetailDataArtikel($slug),
            'pager' => $this->ArtikelModel->pager,
            'perusahaan' => $this->PerusahaanModel->DetailData(),
            'artikelbaru' => $this->ArtikelModel->DataLimit(),
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
