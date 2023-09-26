<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KlienModel;
use App\Models\LayananModel;
use App\Models\PerusahaanModel;


class Klien extends BaseController
{

    public function __construct()
    {
        $this->KlienModel = new KlienModel();
        $this->PerusahaanModel = new PerusahaanModel();
        $this->LayananModel = new LayananModel();
    }
    public function DaftarKlien()
    {
        $currentPage = $this->request->getVar('page_klien') ? $this->request->getVar('page_klien') : 1;
        // $layanan = $this->LayananModel->findAll();
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $klien = $this->KlienModel->search($keyword);
            # code...
        } else {
            $klien = $this->KlienModel;
        }
        $data = [
            'title' => 'Daftar Klien',
            'isi' => 'admin/v_klien',
            'menu' => 'klien',
            'submenu' => 'daftar_klien',
            'perusahaan' => $this->PerusahaanModel->DetailData(),
            'layanan' => $this->LayananModel->findAll(),
            'klien' => $this->KlienModel->paginate(5, 'klien'),
            'pager' => $this->KlienModel->pager,
            'currentPage' => $currentPage
        ];
        if ($this->request->getVar('aksi') == 'hapus' && $this->request->getVar('id_klien')) {
            $dataPost = $this->KlienModel->getKlien($this->request->getVar('id_klien'));
            if ($dataPost['id_klien']) { #memastikan bahwa ada data di folder uploads
                if ($dataPost['logo_klien'] != 'default.jpeg') {

                    unlink("admin/uploads/" . $dataPost['logo_klien']);
                }
                $this->KlienModel->Delete_klien($this->request->getVar('id_klien'));
            }
            session()->setFlashdata('pesan', 'Data berhasil dihapus');
            return redirect()->to("klien/daftarklien");
        }

        return view('layoutAdmin/v_wrapper', $data);
    }
    public function TambahKlien()
    {
        // session();
        $data = [
            'title' => 'Tambah Klien',
            'isi' => 'admin/v_tambahklien',
            'menu' => 'klien',
            'submenu' => 'tambah_klien',
            'perusahaan' => $this->PerusahaanModel->DetailData(),
            'validation' => \Config\Services::validation(),
            'klien' => $this->KlienModel->getklien()
        ];
        return view('layoutAdmin/v_wrapper', $data);
    }
    public function Save()
    {
        // validasi input
        if (!$this->validate([
            'nama_klien' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Klien harus terisi'
                ]
            ],
            'logo_klien' => [
                'rules' => 'is_image[logo_klien]'
                    . '|mime_in[logo_klien,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[logo_klien,2048]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('klien/tambahklien')->withInput();
        }
        // ambil gambar
        $filegambar = $this->request->getFile('logo_klien');
        // memberikan gambar default bila tidak ada gambar yang diupload
        if ($filegambar->getError() == 4) {
            $namaGambar = 'default.jpeg';
        } else {
            // ambil nama file
            $namaGambar = $filegambar->getRandomName();
            $filegambar->move('admin/uploads', $namaGambar);
        }
        $this->KlienModel->save([
            'nama_klien' => $this->request->getVar('nama_klien'),
            'logo_klien' => $namaGambar
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('klien/daftarklien');
    }
    public function Editklien($id)
    {
        $data = [
            'title' => 'Edit Klien',
            'isi' => 'admin/v_editklien',
            'menu' => 'klien',
            'submenu' => 'edit_klien',
            'perusahaan' => $this->PerusahaanModel->DetailData(),
            'validation' => \Config\Services::validation(),
            'klien' => $this->KlienModel->getKlien($id)
        ];
        return view('layoutAdmin/v_wrapper', $data);
    }
    public function Update($id)
    {
        if (!$this->validate([
            'nama_klien' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama klien harus terisi'
                ]
            ],
            'logo_klien' => [
                'rules' => 'is_image[logo_klien]'
                    . '|mime_in[logo_klien,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[logo_klien,2048]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('klien/editklien')->withInput();
        }

        $fileGambar = $this->request->getFile('logo_klien');
        // cek logo apakah masih memakai gambar lama
        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('logolama');
            # code...
        } else {
            // generate nama file random
            $namaGambar = $fileGambar->getRandomName();
            // pindahkan gambar
            $fileGambar->move('admin/uploads', $namaGambar);
            // hapus file lama
            unlink('admin/uploads/' . $this->request->getVar('logolama'));
        }
        $data = [
            'nama_klien' => $this->request->getVar('nama_klien'),
            'logo_klien' => $namaGambar
        ];
        $this->KlienModel->Update_klien($data, $id);
        session()->setFlashdata('pesan', 'Data berhasil diupdate');
        return redirect()->to(base_url('klien/daftarklien'));
    }
}
