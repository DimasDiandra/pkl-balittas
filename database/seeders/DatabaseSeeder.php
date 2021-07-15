<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        'role'=>1,
		'name'=>'admin2',
		'email'=>'admin2@balittas.com',
		'password'=>bcrypt('123')
        ]);
    }
}
