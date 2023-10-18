<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::Create([
            'name' => "admin",
            'email' => "admin@example.com",
            'is_admin' => 1,
            'password' => bcrypt('1234567890')
        ]);


    }
}
