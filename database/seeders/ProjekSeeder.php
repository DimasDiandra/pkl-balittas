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
            'name' => 'Projek Admin',
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
            'semula_menjadi_status' => '0',
            'revisi_rab_status' => '0',
        ]);

        Projek::create([
            'name' => 'Projek User',
            'all_status' => '11',
            'matriks_status' => '1',
            'rab_status' => '1',
            'kak_status' => '1',
            'proposal_status' => '1',
            'analisis_status' => '1',
            'bulanan_status' => '1',
            'triwulan_status' => '1',
            'tengahtahun_status' => '1',
            'akhirtahun_status' => '1',
            'renaksi_status' => '1',
            'destudi_status' => '1',
            'user_id' => '2',
            'semula_menjadi_status' => '1',
            'revisi_rab_status' => '1',
        ]);
    }
}
