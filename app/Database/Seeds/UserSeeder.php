<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user1 = array(
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => password_hash('12345678', PASSWORD_BCRYPT),
        );
        $user2 = array(
            'name' => 'user',
            'email' => 'user@email.com',
            'password' => password_hash('abcd', PASSWORD_BCRYPT),
        );
        $user3 = array(
            'name' => 'docho',
            'email' => 'docho@email.com',
            'password' => password_hash('12345678', PASSWORD_BCRYPT),
        );
        $this->db->table('user')->insert($user1);
        $this->db->table('user')->insert($user2);
        $this->db->table('user')->insert($user3);
    }
}
