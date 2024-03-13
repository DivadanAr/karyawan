<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOlahragaFavoritTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'olahraga_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'karyawan_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
                ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('olahraga_id', 'olahraga', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('karyawan_id', 'karyawan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('olahraga_favorit');
    }

    public function down()
    {
        $this->forge->dropTable('olahraga_favorit');
    }
}
