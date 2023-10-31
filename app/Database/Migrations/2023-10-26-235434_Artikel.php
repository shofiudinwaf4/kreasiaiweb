<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Artikel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_artikel' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'judul_artikel' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'slug_artikel' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'gambar_artikel' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'isi_artikel' => [
                'type'       => 'text',
                'null' => true,
            ],
            'deskripsi_artikel' => [
                'type'       => 'text',
                'null' => true,
            ],
            'id' => [
                'type'       => 'INT',
                'constraint' => '25',
            ],
            'create_at timestamp default now()'
        ]);
        $this->forge->addKey('id_artikel', true);
        $this->forge->createTable('artikel');
    }

    public function down()
    {
        //
        $this->forge->dropTable('artikel');
    }
}
