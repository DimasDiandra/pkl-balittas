<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Projek;

class ProjekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Projek::create([
            'name' => 'Projek Test',
            'status' => '1',
            'user_id' => '1',
        ]);
    }
}
