<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'     => 'Administrator',
                'username' => 'admin',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'role'     => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'     => 'User Default',
                'username' => 'user',
                'password' => password_hash('user123', PASSWORD_DEFAULT),
                'role'     => 'user',
                'created_at' => date('Y-m-d H:i:s'),
            ]
        ];

        // Insert multiple data sekaligus
        $this->db->table('users')->insertBatch($data);
    }
}
