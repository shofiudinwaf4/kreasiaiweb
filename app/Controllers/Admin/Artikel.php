<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KlienModel;
use App\Models\LayananModel;
use App\Models\PerusahaanModel;
use App\Models\ArtikelModel;
use App\Models\AdminModel;


class Artikel extends BaseController
{

    public function __construct()
    {
        $this->KlienModel = new KlienModel();
        $this->PerusahaanModel = new PerusahaanModel();
        $this->LayananModel = new LayananModel();
        $this->AdminModel = new AdminModel();
        $this->ArtikelModel = new ArtikelModel();
    }
    public function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    public function Artikel()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $artikel = $this->ArtikelModel->search($keyword);
            # code...
        } else {
            $artikel = $this->ArtikelModel;
        }
        $data = [
            'title' => 'Artikel',
            'isi' => 'admin/v_artikel',
            'judul' => 'Artikel',
            'subjudul' => 'Kelola Artikel',
            'menu' => 'artikel',
            'submenu' => 'kelola_artikel',
            'admin' => session()->get(),
            'perusahaan' => $this->PerusahaanModel->DetailData(),
            'layanan' => $this->LayananModel->findAll(),
            'artikel' => $this->ArtikelModel->allData(),
            'pager' => $this->LayananModel->pager,
            // 'currentPage' => $currentPage
        ];
        if ($this->request->getVar('aksi') == 'hapus' && $this->request->getVar('id_artikel')) {
            $dataPost = $this->ArtikelModel->getArtikel($this->request->getVar('id_artikel'));
            if ($dataPost['id_artikel']) { #memastikan bahwa ada data di folder uploads
                if ($dataPost['gambar_artikel'] != 'default.jpeg') {

                    unlink("admin/uploads/artikel" . $dataPost['gambar_artikel']);
                }
                $this->ArtikelModel->Delete_artikel($this->request->getVar('id_artikel'));
            }
            session()->setFlashdata('pesan', 'Data berhasil dihapus');
            return redirect()->to("homeadmin/artikel");
        }
        return view('layoutAdmin/v_wrapper', $data);
    }
    public function TambahArtikel()
    {
        // session();
        $data = [
            'title' => 'Tambah Artikel',
            'isi' => 'admin/v_tambahartikel',
            'judul' => 'Artikel',
            'subjudul' => 'Tambah Artikel',
            'menu' => 'artikel',
            'submenu' => 'tambah_artikel',
            'admin' => session()->get(),
            'perusahaan' => $this->PerusahaanModel->DetailData(),
            'validation' => \Config\Services::validation(),
            'klien' => $this->KlienModel->getklien(),
            'artikel' => $this->ArtikelModel->allData(),
            'layanan' => $this->LayananModel->findAll(),
        ];
        return view('layoutAdmin/v_wrapper', $data);
    }
    public function Save()
    {
        // validasi input
        if (!$this->validate([
            'judul_artikel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama artikel harus terisi'
                ]
            ],
            'isi_artikel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi artikel harus terisi'
                ]
            ],
            'gambar_artikel' => [
                'rules' => 'is_image[gambar_artikel]'
                    . '|mime_in[gambar_artikel,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[gambar_artikel,2048]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('artikel/tambahartikel')->withInput();
        }
        // ambil gambar
        $filegambar = $this->request->getFile('gambar_artikel');
        // memberikan gambar default bila tidak ada gambar yang diupload
        if ($filegambar->getError() == 4) {
            $namaGambar = 'default.jpeg';
        } else {
            // ambil nama file
            $namaGambar = $filegambar->getRandomName();
            $filegambar->move('uploads/artikel', $namaGambar);
        }
        // $this->ArtikelModel->save([
        //     'judul_artikel' => $this->request->getVar('judul_artikel'),
        //     'slug_artikel' => url_title($this->request->getPost('judul_artikel'), '-', true),
        //     'id' => session()->get('id'),
        //     'deskripsi_artikel' => $this->request->getVar('deskripsi_artikel'),
        //     'isi_artikel' => $this->request->getVar('isi_artikel'),
        //     'gambar_artikel' => $namaGambar
        // ]);
        $data = [
            'judul_artikel' => $this->request->getVar('judul_artikel'),
            'slug_artikel' => url_title($this->request->getPost('judul_artikel'), '-', true),
            'id_user' => session()->get('id_user'),
            'deskripsi_artikel' => $this->request->getVar('deskripsi_artikel'),
            'isi_artikel' => $this->test_input($this->request->getVar('isi_artikel')),
            'gambar_artikel' => $namaGambar
        ];
        $this->ArtikelModel->InsertData($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('artikel/kelolaartikel');
    }
    public function DetailArtikel($id_artikel)
    {
        $data = [
            'title' => 'Detail Artikel',
            'isi' => 'admin/v_detailartikel',
            'judul' => 'Artikel',
            'subjudul' => 'Detail Artikel',
            'menu' => 'artikel',
            'submenu' => 'detail_artikel',
            'admin' => session()->get(),
            'perusahaan' => $this->PerusahaanModel->DetailData(),
            'validation' => \Config\Services::validation(),
            'artikel' => $this->ArtikelModel->DetailData($id_artikel),
            'layanan' => $this->LayananModel->findAll(),
        ];
        return view('layoutAdmin/v_wrapper', $data);
    }
    public function EditArtikel($id)
    {
        $data = [
            'title' => 'Edit Artikel',
            'isi' => 'admin/v_editartikel',
            'judul' => 'Artikel',
            'subjudul' => 'Edit Artikel',
            'menu' => 'artikel',
            'submenu' => 'edit_artikel',
            'admin' => session()->get(),
            'perusahaan' => $this->PerusahaanModel->DetailData(),
            'validation' => \Config\Services::validation(),
            'artikel' => $this->ArtikelModel->DetailData($id),
            'layanan' => $this->LayananModel->findAll(),
        ];
        return view('layoutAdmin/v_wrapper', $data);
    }
    public function Update($id_artikel)
    {
        if (!$this->validate([
            'judul_artikel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama artikel harus terisi'
                ]
            ],
            'isi_artikel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi artikel harus terisi'
                ]
            ],
            'gambar_artikel' => [
                'rules' => 'is_image[gambar_artikel]'
                    . '|mime_in[gambar_artikel,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[gambar_artikel,2048]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('artikel/editartikel' . $id_artikel)->withInput();
        }

        $artikel = $this->ArtikelModel->DetailData($id_artikel);
        $fileGambar = $this->request->getFile('gambar_artikel');
        // cek logo apakah masih memakai gambar lama
        if ($fileGambar->getError() == 4) {
            $namaGambar = $artikel['gambar_artikel'];
            # code...
        } else {
            // generate nama file random
            $namaGambar = $fileGambar->getRandomName();
            // pindahkan gambar
            $fileGambar->move('uploads/artikel', $namaGambar);
        }
        if ($this->request->getPost('judul_lama') == $this->request->getPost('judul_artikel')) {
            # code...
            $data = [
                'id_artikel' => $id_artikel,
                'id_user' => session()->get('id_user'),
                'deskripsi_artikel' => $this->request->getPost('deskripsi_artikel'),
                'isi_artikel' => $this->request->getPost('isi_artikel'),
                'gambar_artikel' => $namaGambar
            ];
        } else {
            # code...
            $data = [
                'id_artikel' => $id_artikel,
                'judul_artikel' => $this->request->getPost('judul_artikel'),
                'slug_artikel' => url_title($this->request->getPost('judul_artikel'), '-', true),
                'id_user' => session()->get('id_user'),
                'deskripsi_artikel' => $this->request->getPost('deskripsi_artikel'),
                'isi_artikel' => $this->request->getPost('isi_artikel'),
                'gambar_artikel' => $namaGambar
            ];
        }
        $this->ArtikelModel->update_artikel($data, $id_artikel);
        session()->setFlashdata('pesan', 'Data berhasil diupdate');
        return redirect()->to('artikel/kelolaartikel');
    }
}
