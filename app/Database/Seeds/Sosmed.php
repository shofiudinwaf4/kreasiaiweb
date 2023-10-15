<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Sosmed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_sosmed' => 'Instagram',
                'logo_sosmed' => 'fa-instagram',
                'alamat_sosmed' => 'Kreasi_AI',
            ],
            [
                'nama_sosmed' => 'Facebook',
                'logo_sosmed' => 'fa-facebook',
                'alamat_sosmed' => 'Kreasi AI',
            ],
            [
                'nama_sosmed' => 'twitter',
                'logo_sosmed' => 'fa-twitter',
                'alamat_sosmed' => '@Kreasi_AI',
            ],
        ];
        $this->db->table('sosmed')->insertBatch($data);
    }
}
