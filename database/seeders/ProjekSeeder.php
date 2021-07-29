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
            'all_status' => '0',
            'matriks_status' => '0',
            'rab_status' => '0',
            'kak_status' => '0',
            'proposal_status' => '0',
            'analisis_status' => '0',
            'bulanan_status' => '0',
            'triwulan_status' => '0',
            'tengahtahun_status' => '0',
            'akhirtahun_status' => '0',
            'renaksi_status' => '0',
            'destudi_status' => '0',

            'user_id' => '1',
        ]);
    }
}
