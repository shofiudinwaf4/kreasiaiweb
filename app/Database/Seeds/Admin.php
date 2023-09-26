<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Admin extends Seeder
{
    public function run()
    {
        //
        $data = [
            'username' => 'shofiudin_wafa',
            'password' => password_hash('123456', PASSWORD_DEFAULT),
            'nama_lengkap' => 'Shofiudin Wafa',
            'email' => 'shofiudinwafa@gmail.com'
        ];
        $this->db->table('admin')->insert($data);
    }
}
