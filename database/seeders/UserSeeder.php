<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'User Doe',
            'email' => 'user@doe.com',
            'phone' => '998901002030',
            'password' => bcrypt("user123"),
        ]);

        $admin = User::create([
            'name' => 'Admin Doe',
            'email' => 'admin@doe.com',
            'phone' => '998991112233',
            'password' => bcrypt("admin123"),
        ]);

        $admin->is_admin = true;
        $admin->save();
    }
}
