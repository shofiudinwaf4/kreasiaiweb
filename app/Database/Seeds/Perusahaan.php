<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Perusahaan extends Seeder
{
    public function run()
    {
        $data = [
            'logo_header' => 'kreasilogo.png',
            'logo' => 'logo nama trans.png',
            'nama_perusahaan' => 'Kreasi AI',
            'alamat_perusahaan' => 'Jl. xxx no.11, xxxxxxxxx',
            'tentang_kami' => 'kami merupakan perusahaan'
        ];
        $this->db->table('perusahaan')->insert($data);
    }
}
