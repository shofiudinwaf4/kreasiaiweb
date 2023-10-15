<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Daftarikon extends Seeder
{
    public function run()
    {
        $data = [
            [
                'tag_ikon' => '<i class="fas fa-laptop-code"></i>',
            ],
            [
                'tag_ikon' => '<i class="fas fa-palette"></i>',
            ],
            [
                'tag_ikon' => '<i class="fas fa-icons"></i>',
            ],
            [
                'tag_ikon' => '<i class="fas fa-wifi"></i>',
            ],
            [
                'tag_ikon' => '<i class="fas fa-tools"></i>',
            ],

        ];
        $this->db->table('daftarikon')->insertBatch($data);
    }
}
