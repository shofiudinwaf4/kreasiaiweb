<?php


namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\LayananModel;
use App\Models\PerusahaanModel;
use CodeIgniter\Config\Config;


class HomeAdmin extends BaseController
{
    public function __construct()
    {
        $this->PerusahaanModel = new PerusahaanModel();
        $this->LayananModel = new LayananModel();
        $this->AdminModel = new AdminModel();
    }
    public function index()
    {
        $layanan = $this->LayananModel->findAll();
        $currentPage = $this->request->getVar('page_layanan') ? $this->request->getVar('page_layanan') : 1;
        // $layanan = $this->LayananModel->findAll();
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $layanan = $this->LayananModel->search($keyword);
            # code...
        } else {
            $layanan = $this->LayananModel;
        }
        $data = [
            'title' => 'Dashboard',
            'isi' => 'admin/v_home',
            'judul' => 'Dashboard',
            'subjudul' => 'Dashboard',
            'menu' => 'dashboard',
            'submenu' => 'dashboard',
            'admin' => session()->get(),
            'perusahaan' => $this->PerusahaanModel->DetailData(),
            'layanan' => $this->LayananModel->paginate(5, 'layanan'),
            'pager' => $this->LayananModel->pager,
            'currentPage' => $currentPage,
        ];
        if ($this->request->getVar('aksi') == 'hapus' && $this->request->getVar('id_layanan')) {
            $dataPost = $this->LayananModel->getLayanan($this->request->getVar('id_layanan'));
            if ($dataPost['id_layanan']) { #memastikan bahwa ada data di folder uploads
                if ($dataPost['gambar_layanan'] != 'default.jpeg') {

                    unlink("admin/uploads/" . $dataPost['gambar_layanan']);
                }
                $this->LayananModel->Delete_layanan($this->request->getVar('id_layanan'));
            }
            session()->setFlashdata('pesan', 'Data berhasil dihapus');
            return redirect()->to("homeadmin/layanan");
        }
        echo view('layoutAdmin/v_wrapper', $data);
    }
    public function Layanan()
    {
        $currentPage = $this->request->getVar('page_layanan') ? $this->request->getVar('page_layanan') : 1;
        // $layanan = $this->LayananModel->findAll();
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $layanan = $this->LayananModel->search($keyword);
            # code...
        } else {
            $layanan = $this->LayananModel;
        }
        $data = [
            'title' => 'Layanan',
            'isi' => 'admin/v_layanan',
            'judul' => 'Layanan',
            'subjudul' => 'Daftar Layanan',
            'menu' => 'layanan',
            'submenu' => 'kelola_layanan',
            'admin' => session()->get(),
            'perusahaan' => $this->PerusahaanModel->DetailData(),
            'layanan' => $this->LayananModel->findAll(),
            'pager' => $this->LayananModel->pager,
            'currentPage' => $currentPage
        ];
        if ($this->request->getVar('aksi') == 'hapus' && $this->request->getVar('id_layanan')) {
            $dataPost = $this->LayananModel->getLayanan($this->request->getVar('id_layanan'));
            if ($dataPost['id_layanan']) { #memastikan bahwa ada data di folder uploads
                if ($dataPost['gambar_layanan'] != 'default.jpeg') {

                    unlink("admin/uploads/" . $dataPost['gambar_layanan']);
                }
                $this->LayananModel->Delete_layanan($this->request->getVar('id_layanan'));
            }
            session()->setFlashdata('pesan', 'Data berhasil dihapus');
            return redirect()->to("homeadmin/layanan");
        }

        return view('layoutAdmin/v_wrapper', $data);
    }
    public function DetailLayanan($id)
    {
        $data = [
            'title' => 'Detail Layanan',
            'isi' => 'admin/v_detaillayanan',
            'judul' => 'Layanan',
            'subjudul' => $this->LayananModel->getLayanan($id),
            'menu' => 'layanan',
            'submenu' => 'daftar_layanan',
            'admin' => session()->get(),
            'perusahaan' => $this->PerusahaanModel->DetailData(),
            'layanan' => $this->LayananModel->findAll(),
            'detail_layanan' => $this->LayananModel->getLayanan($id)
        ];

        return view('layoutAdmin/v_wrapper', $data);
    }
    public function TambahLayanan()
    {
        // session();
        $data = [
            'title' => 'Tambah Layanan',
            'isi' => 'admin/v_tambahlayanan',
            'judul' => 'Layanan',
            'subjudul' => 'Tambah Layanan',
            'menu' => 'layanan',
            'submenu' => 'tambah_layanan',
            'admin' => session()->get(),
            'perusahaan' => $this->PerusahaanModel->DetailData(),
            'validation' => \Config\Services::validation(),
            'tambahlayanan' => $this->LayananModel->getLayanan(),
            'layanan' => $this->LayananModel->findAll()
        ];
        return view('layoutAdmin/v_wrapper', $data);
    }
    public function Save()
    {
        // validasi input
        if (!$this->validate([
            'nama_layanan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama layanan harus terisi'
                ]
            ],
            'gambar_layanan' => [
                'rules' => 'is_image[gambar_layanan]'
                    . '|mime_in[gambar_layanan,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[gambar_layanan,2048]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('homeadmin/tambahlayanan')->withInput();
        }
        $this->LayananModel->save([
            'nama_layanan' => $this->request->getVar('nama_layanan'),
            'detail_layanan' => $this->request->getVar('detail_layanan'),
            'deskripsi_layanan' => $this->request->getVar('deskripsi_layanan'),
            'gambar_layanan' => $this->request->getVar('gambar_layanan'),
            'slug' => url_title($this->request->getPost('nama_layanan'), '-', true),

        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('homeadmin/layanan');
    }
    public function EditLayanan($id)
    {
        $data = [
            'title' => 'Edit Layanan',
            'isi' => 'admin/v_editlayanan',
            'judul' => 'Layanan',
            'subjudul' => 'Edit Layanan',
            'menu' => 'layanan',
            'submenu' => 'edit_layanan',
            'admin' => session()->get(),
            'perusahaan' => $this->PerusahaanModel->DetailData(),
            'validation' => \Config\Services::validation(),
            'editlayanan' => $this->LayananModel->getLayanan($id),
            'layanan' => $this->LayananModel->findAll()
        ];
        return view('layoutAdmin/v_wrapper', $data);
    }
    public function Update($id)
    {
        if (!$this->validate([
            'nama_layanan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama layanan harus terisi'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('homeadmin/editlayanan/' . $id)->withInput();
        }
        $data = [
            'nama_layanan' => $this->request->getVar('nama_layanan'),
            'deskripsi_layanan' => $this->request->getVar('deskripsi_layanan'),
            'detail_layanan' => $this->request->getPost('detail_layanan'),
            'gambar_layanan' => $this->request->getVar('gambar_layanan')
        ];
        $this->LayananModel->Update_layanan($data, $id);
        session()->setFlashdata('pesan', 'Data berhasil diupdate');
        return redirect()->to(base_url('homeadmin'));
    }
    public function GaleriLayanan($id)
    {
        $data = [
            'title' => 'Galeri Layanan',
            'isi' => 'admin/v_galerilayanan',
            'judul' => 'Layanan',
            'subjudul' => 'Galeri Layanan',
            'menu' => 'layanan',
            'submenu' => 'daftar_layanan',
            'admin' => session()->get(),
            'perusahaan' => $this->PerusahaanModel->DetailData(),
            'galerilayanan' => $this->LayananModel->getLayanan($id),
            'layanan' => $this->LayananModel->findAll(),
            'galeri_layanan' => $this->LayananModel->getGaleri($id)
        ];
        return view('layoutAdmin/v_wrapper', $data);
    }
    public function TambahGaleriLayanan()
    {

        $data = [
            'title' => 'Tambah Galeri Layanan',
            'isi' => 'admin/v_tambahgalerilayanan',
            'judul' => 'Layanan',
            'subjudul' => 'Tambah Galeri Layanan',
            'menu' => 'layanan',
            'submenu' => 'tg_layanan',
            'admin' => session()->get(),
            'perusahaan' => $this->PerusahaanModel->DetailData(),
            'tambahgalerilayanan' => $this->LayananModel->getLayanan(),
            'layanan' => $this->LayananModel->findAll(),
        ];
        return view('layoutAdmin/v_wrapper', $data);
    }
    public function SaveGaleri()
    {
        $namalayanan = $this->request->getPost('nama_layanan');
        $files = $this->request->getFiles();

        if ($files) {

            // $data = [
            //     'id_layanan' =>$random,
            //     'nama_layanan'=> $namalayanan
            // ];
            // $this->LayananModel->GaleriInsert($data);

            foreach ($files['nama_gambar'] as $img) {
                $namaGambar = $img->getRandomName();
                $data_galeri = [
                    'id_layanan' => $namalayanan,
                    'nama_gambar' => $namaGambar
                ];
                $this->LayananModel->GaleriInsert($data_galeri);
                $img->move('admin/uploads', $namaGambar);
            }
            session()->setFlashdata('pesan', 'Data galeri berhasil ditambahkan');

            return redirect()->to('homeadmin/layanan');
        }
    }
    public function DaftarPaket($id)
    {
        $currentPage = $this->request->getVar('page_layanan') ? $this->request->getVar('page_layanan') : 1;
        $data = [
            'title' => 'Paket Layanan',
            'isi' => 'admin/v_daftarpaketlayanan',
            'judul' => 'Layanan',
            'subjudul' => 'Daftar Paket',
            'menu' => 'layanan',
            'submenu' => 'daftar_layanan',
            'admin' => session()->get(),
            'perusahaan' => $this->PerusahaanModel->DetailData(),
            'daftarpaket' => $this->LayananModel->getLayanan($id),
            'layanan' => $this->LayananModel->findAll(),
            'paket_layanan' => $this->LayananModel->getPaket($id),
            'detail_layanan' => $this->LayananModel->getLayanan($id)
        ];
        if ($this->request->getVar('aksi') == 'hapus' && $this->request->getVar('id_paket')) {
            $dataPost = $this->LayananModel->getPaket($this->request->getVar('id_paket'));
            if ($dataPost['id_paket']) { #memastikan bahwa ada data di folder uploads

                $this->LayananModel->Delete_paket($this->request->getVar('id_paket'));
            }
            session()->setFlashdata('pesan', 'Data berhasil dihapus');
            return redirect()->to("homeadmin/layanan");
        }

        return view('layoutAdmin/v_wrapper', $data);
    }
    public function TambahPaketLayanan()
    {

        $data = [
            'title' => 'Tambah Paket Layanan',
            'isi' => 'admin/v_tambahpaketlayanan',
            'judul' => 'Layanan',
            'subjudul' => 'Tambah Paket Layanan',
            'menu' => 'layanan',
            'submenu' => 'tp_layanan',
            'admin' => session()->get(),
            'perusahaan' => $this->PerusahaanModel->DetailData(),
            'validation' => \Config\Services::validation(),
            'tambahpaketlayanan' => $this->LayananModel->getLayanan(),
            'layanan' => $this->LayananModel->findAll(),
        ];
        return view('layoutAdmin/v_wrapper', $data);
    }
    public function SavePaket()
    {
        $namalayanan = $this->request->getPost('nama_layanan');
        // validasi input
        if (!$this->validate(
            [
                'nama_paket' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Paket harus terisi'
                    ]
                ]
            ]
        )) {
            // $validation = \Config\Services::validation();
            return
                redirect()->to('homeadmin/tambahpaketlayanan')->withInput();
        }
        // // ambil gambar
        // $filegambar = $this->request->getFile('gambar_layanan');
        // // memberikan gambar default bila tidak ada gambar yang diupload
        // if ($filegambar->getError() == 4) {
        //     $namaGambar = 'default.jpeg';
        // } else {
        //     // ambil nama file
        //     $namaGambar = $filegambar->getRandomName();
        //     $filegambar->move('admin/uploads', $namaGambar);
        // }
        $data_paket = [
            'id_layanan' => $namalayanan,
            'nama_paket' => $this->request->getVar('nama_paket'),
            'detail_paket' => $this->request->getVar('detail_paket'),
            'harga_paket' => $this->request->getVar('harga_paket'),
            'diskon' => $this->request->getVar('diskon')
        ];
        $this->LayananModel->PaketInsert($data_paket);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('homeadmin/layanan');
    }
    // public function DaftarPaket()
    // {
    //     $currentPage = $this->request->getVar('page_paket') ? $this->request->getVar('page_paket') : 1;
    //     // $layanan = $this->LayananModel->findAll();
    //     $keyword = $this->request->getVar('keyword');
    //     if ($keyword) {
    //         $paket = $this->LayananModel->search($keyword);
    //         # code...
    //     } else {
    //         $paket = $this->LayananModel;
    //     }
    //     $data = [
    //         'title' => 'Daftar Paket',
    //         'isi' => 'admin/v_daftarpaketlayanan',
    //         'menu' => 'layanan',
    //         'submenu' => 'daftar_paket',
    //         'paket' => $this->LayananModel->paginate(5, 'paket'),
    //         'pager' => $this->LayananModel->pager,
    //         'currentPage' => $currentPage,
    //         'paket_layanan' => $this->LayananModel->getAllPaket(),
    //         'layanan' => $this->LayananModel->getLayanan(),
    //     ];
    //     if ($this->request->getVar('aksi') == 'hapus' && $this->request->getVar('id_paket')) {
    //         $dataPost = $this->LayananModel->getAllPaket($this->request->getVar('id_paket'));
    //         if ($dataPost['id_paket']) { #memastikan bahwa ada data di folder uploads

    //             $this->LayananModel->Delete_paket($this->request->getVar('id_paket'));
    //         }
    //         session()->setFlashdata('pesan', 'Data berhasil dihapus');
    //         return redirect()->to("homeadmin/daftarpaket");
    //     }

    //     return view('layoutAdmin/v_wrapper', $data);
    // }
    public function EditPaket($id)
    {
        $data = [
            'title' => 'Edit Paket',
            'isi' => 'admin/v_editpaketlayanan',
            'judul' => 'Layanan',
            'subjudul' => 'Edit Paket Layanan',
            'menu' => 'layanan',
            'submenu' => 'daftar_paket',
            'admin' => session()->get(),
            'perusahaan' => $this->PerusahaanModel->DetailData(),
            'validation' => \Config\Services::validation(),
            'layanan' => $this->LayananModel->getLayanan($id),
            'paket' => $this->LayananModel->getEditPaket($id)
        ];
        return view('layoutAdmin/v_wrapper', $data);
    }
    public function UpdatePaket($id)
    {
        $namalayanan = $this->request->getPost('nama_layanan');
        if (!$this->validate([
            'nama_paket' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama layanan harus terisi'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('homeadmin/editpaket')->withInput();
        }

        $data = [
            'id_layanan' => $namalayanan,
            'nama_paket' => $this->request->getVar('nama_paket'),
            'detail_paket' => $this->request->getVar('detail_paket'),
            'harga_paket' => $this->request->getVar('harga_paket'),
            'diskon' => $this->request->getVar('diskon')
        ];
        $this->LayananModel->UpdatePaket($data, $id);
        session()->setFlashdata('pesan', 'Data berhasil diupdate');
        return redirect()->to(base_url('homeadmin/layanan'));
    }
}
