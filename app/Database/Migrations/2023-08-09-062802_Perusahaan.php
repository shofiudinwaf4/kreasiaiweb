<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Perusahaan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_perusahaan' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'logo_header' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'logo' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nama_perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'telp_perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'email_perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'alamat_perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'tentang_kami' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_perusahaan', true);
        $this->forge->createTable('perusahaan');
    }

    public function down()
    {
        $this->forge->dropTable('perusahaan');
    }
}
