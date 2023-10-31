<?php


namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LayananModel;
use App\Models\PerusahaanModel;
use App\Models\AdminModel;
use CodeIgniter\Config\Config;


class Setting extends BaseController
{
    public function __construct()
    {
        $this->LayananModel = new LayananModel();
        $this->PerusahaanModel = new PerusahaanModel();
        $this->AdminModel = new AdminModel();
    }
    public function Perusahaan()
    {
        $layanan = $this->LayananModel->findAll();
        $data = [
            'title' => 'Perusahaan',
            'isi' => 'admin/v_settingPerusahaan',
            'judul' => 'Setting',
            'subjudul' => 'Perusahaan',
            'menu' => 'setting',
            'submenu' => 'perusahaan',
            'admin' => session()->get(),
            'perusahaan' => $this->PerusahaanModel->DetailData(),
            'layanan' => $layanan,
        ];

        echo view('layoutAdmin/v_wrapper', $data);
    }
    public function UpdatePerusahaan()
    {
        if ($this->validate([
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
            'telp_perusahaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Telphone perusahaan harus terisi'
                ]
            ],
            'email_perusahaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email perusahaan harus terisi'
                ]
            ],
            'tentang_kami' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'harus terisi'
                ]
            ],
            'logo_header' => [
                'label' => 'File',
                'rules' => 'max_size[logo_header,2048]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Maksimal 2084 KB',
                ]
            ],
            // 'logo' => [
            //     'label' => 'File',
            //     'rules' => 'max_size[logo,2048]',
            //     'errors' => [
            //         'max_size' => 'Ukuran {field} Maksimal 2084 KB',
            //     ]
            // ],
        ])) {
            $perusahaan = $this->PerusahaanModel->DetailData();
            $logo_header = $this->request->getFile('logo_header');
            $logo = $this->request->getFile('logo');
            if ($logo->getError() == 4) {
                $nama_logo = $perusahaan['logo'];
            } else {
                $nama_logo = $logo->getRandomName();
                $logo->move('uploads', $nama_logo);
            }
            if ($logo_header->getError() == 4) {
                # code...
                $nama_logo_header = $perusahaan['logo_header'];
            } else {
                $nama_logo_header = $logo_header->getRandomName();
                $logo_header->move('uploads', $nama_logo_header);
            }
            $this->PerusahaanModel->updateData([
                'id_perusahaan' => 1,
                'nama_perusahaan' => $this->request->getVar('nama_perusahaan'),
                'alamat_perusahaan' => $this->request->getVar('alamat_perusahaan'),
                'telp_perusahaan' => $this->request->getVar('telp_perusahaan'),
                'email_perusahaan' => $this->request->getVar('email_perusahaan'),
                'tentang_kami' => $this->request->getVar('tentang_kami'),
                'logo' => $nama_logo,
                'logo_header' => $nama_logo_header
            ]);
            session()->setFlashdata('pesan', 'Data berhasil diubah');

            return redirect()->to('setting/perusahaan');
        } else {

            return redirect()->to('setting/perusahaan')->withInput();
        }
        // $validation = \Config\Services::validation();
    }
    public function Sosmed()
    {
        $layanan = $this->LayananModel->findAll();
        $data = [
            'title' => 'Sosmed Perusahaan',
            'isi' => 'admin/v_sosmedPerusahaan',
            'judul' => 'Setting',
            'subjudul' => 'Sosmed Perusahaan',
            'menu' => 'setting',
            'submenu' => 'sosmed_perusahaan',
            'admin' => session()->get(),
            'perusahaan' => $this->PerusahaanModel->DetailData(),
            'layanan' => $layanan,
            'sosmed' => $this->PerusahaanModel->AllSosmed(),
        ];

        echo view('layoutAdmin/v_wrapper', $data);
    }
    public function TambahSosmed()
    {
        // session();
        $data = [
            'title' => 'Tambah Sosial Media',
            'isi' => 'admin/v_tambahsosmed',
            'judul' => 'Sosial Media',
            'subjudul' => 'Tambah Sosial Media',
            'menu' => 'Setting',
            'submenu' => 'tambah_sosmed',
            'admin' => session()->get(),
            'perusahaan' => $this->PerusahaanModel->DetailData(),
            'validation' => \Config\Services::validation(),
            'tambahlayanan' => $this->LayananModel->getLayanan(),
            'layanan' => $this->LayananModel->findAll(),
            'sosmed' => $this->PerusahaanModel->AllSosmed(),
        ];
        return view('layoutAdmin/v_wrapper', $data);
    }
    public function SaveSosmed()
    {
        if ($this->validate([
            'nama_sosmed' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama sosial media harus terisi'
                ]
            ],
            'alamat_sosmed' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat sosial media harus terisi'
                ]
            ],
        ])) {

            $data = ([
                'nama_sosmed' => $this->request->getVar('nama_sosmed'),
                'alamat_sosmed' => $this->request->getVar('alamat_sosmed'),
                'logo_sosmed' => $this->request->getVar('logo_sosmed')
            ]);
            $this->PerusahaanModel->InsertData($data);
            session()->setFlashdata('pesan', 'Data berhasil diubah');

            return redirect()->to('setting/sosmed');
        } else {

            return redirect()->to('setting/tambahsosmed')->withInput();
        }
        // $validation = \Config\Services::validation();
    }
    public function EditSosmed($id)
    {
        $data = [
            'title' => 'Edit Sosmed',
            'isi' => 'admin/v_editsosmed',
            'judul' => 'Sosial Media',
            'subjudul' => 'Tambah Sosial Media',
            'menu' => 'Setting',
            'submenu' => 'edit_sosmed',
            'admin' => session()->get(),
            'perusahaan' => $this->PerusahaanModel->DetailData(),
            'validation' => \Config\Services::validation(),
            'tambahlayanan' => $this->LayananModel->getLayanan(),
            'layanan' => $this->LayananModel->findAll(),
            'sosmed' => $this->PerusahaanModel->EditSosmed($id),
        ];
        return view('layoutAdmin/v_wrapper', $data);
    }
    public function UpdateSosmed($id)
    {
        if (!$this->validate([
            'nama_sosmed' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama sosial media harus terisi'
                ]
            ],
            'alamat_sosmed' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat sosial media harus terisi'
                ]
            ],
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('setting/editsosmed')->withInput();
        }
        $data = ([
            'id_sosmed' => $id,
            'nama_sosmed' => $this->request->getVar('nama_sosmed'),
            'alamat_sosmed' => $this->request->getVar('alamat_sosmed'),
            'logo_sosmed' => $this->request->getVar('logo_sosmed')
        ]);
        $this->PerusahaanModel->UpdateSosmed($data);
        session()->setFlashdata('pesan', 'Data berhasil diupdate');
        return redirect()->to(base_url('setting/sosmed'));
    }
    public function DeleteSosmed($id_sosmed)
    {
        $data = [
            'id_sosmed' => $id_sosmed
        ];
        $this->PerusahaanModel->DeleteSosmed($data);
        session()->setFlashdata('delete', 'Data berhasil dihapus');
        return redirect()->to('setting/sosmed');
    }
}
