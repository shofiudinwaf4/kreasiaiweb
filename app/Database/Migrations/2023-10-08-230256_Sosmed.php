<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sosmed extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_sosmed' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_sosmed' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'alamat_sosmed' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'logo_sosmed' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id_sosmed', true);
        $this->forge->createTable('sosmed');
    }

    public function down()
    {
        $this->forge->dropTable('sosmed');
    }
}
