<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@inky.com',
                'password'       => bcrypt(app()->environment('local') ? 'password' : Uuid::uuid4()),
                'remember_token' => null,
                'locale'         => '',
            ],
            [
                'id'             => 2,
                'name'           => 'API Consumer',
                'email'          => 'api@inky.com',
                'password'       => bcrypt(app()->environment('local') ? 'password' : Uuid::uuid4()),
                'remember_token' => null,
                'locale'         => '',
            ],
        ];

        User::insert($users);
    }
}
