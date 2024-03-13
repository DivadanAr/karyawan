<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKaryawanTable extends Migration
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
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'nip' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'unique' => true,
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM',
                'constraint' => ['Laki-laki', 'Perempuan'],
                'default' => 'Laki-laki',
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
            ],
            'nomor_telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
                ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('karyawan');
    }

    public function down()
    {
        $this->forge->dropTable('karyawan');
    }
}
