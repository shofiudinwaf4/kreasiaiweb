<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Daftaikon extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ikon' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'tag_ikon' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
            ],
        ]);
        $this->forge->addKey('id_ikon', true);
        $this->forge->createTable('daftarikon');
    }
    public function down()
    {
        $this->forge->dropTable('daftarikon');
    }
}
