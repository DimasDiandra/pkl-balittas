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
        $admin= User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'jabatan' => 'Admin',
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345678'),
            'jabatan' => 'Staff',
            'tempat_lahir' => 'Malang',
            'tanggal_lahir' => '2000-01-01',
            'alamat' => 'Villa Bukit Tidar',
            'no_hp' => '081234567891',
        ]);

        $user->assignRole('user');
    }
}
