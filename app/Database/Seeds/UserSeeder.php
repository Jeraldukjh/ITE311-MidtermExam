<?php

namespace App\Database\Seeds;

use App\Models\User;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name'     => 'Maca',
                'email'    => 'Maca@gmail.com',
                'password' => 'admin123',
                'role'     => 'admin',
            ],
            [
                'name'     => 'Racaza',
                'email'    => 'Xyrl@gmail.com',
                'password' => 'student123',
                'role'     => 'student',
            ]
        ];

        $userModel = new User();
        
        foreach ($users as $user) {
            $userModel->save($user);
        }

        echo "Users seeded successfully!\n";
    }
}
