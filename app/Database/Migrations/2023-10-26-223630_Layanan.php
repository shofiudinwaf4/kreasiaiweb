<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Layanan extends Migration
{
    public function up()
    {
        //
        $fields = [
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => '225',
            ],
        ];
        $this->forge->addColumn('layanan', $fields);
    }

    public function down()
    {
        //
    }
}
