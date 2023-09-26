<?php


namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LayananModel;
use App\Models\PerusahaanModel;
use CodeIgniter\Config\Config;


class Setting extends BaseController
{
    public function __construct()
    {
        $this->LayananModel = new LayananModel();
        $this->PerusahaanModel = new PerusahaanModel();
    }
    public function Perusahaan()
    {
        $layanan = $this->LayananModel->findAll();
        $data = [
            'title' => 'Perusahaan',
            'isi' => 'admin/v_settingPerusahaan',
            'menu' => 'setting',
            'submenu' => 'perusahaan',
            'validation' => \Config\Services::validation(),
            'perusahaan' => $this->PerusahaanModel->DetailData(),
            'layanan' => $layanan,
        ];

        echo view('layoutAdmin/v_wrapper', $data);
    }
    public function UpdatePerusahaan()
    {
        // validasi input
        if (!$this->validate([
            'nama_perusahaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama perusahaan harus terisi'
                ]
            ],
            'alamat_perusahaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat perusahaan harus terisi'
                ]
            ],
            'tentang_kami' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'harus terisi'
                ]
            ],
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('setting/perusahaan')->withInput();
        }
        $this->PerusahaanModel->updateData([
            'id_perusahaan' => 1,
            'nama_perusahaan' => $this->request->getVar('nama_perusahaan'),
            'alamat_perusahaan' => $this->request->getVar('alamat_perusahaan'),
            'tentang_kami' => $this->request->getVar('tentang_kami'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');

        return redirect()->to('setting/perusahaan');
    }
}
