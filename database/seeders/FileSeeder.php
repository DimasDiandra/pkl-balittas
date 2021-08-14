<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Matriks;
use App\Models\RAB;
use App\Models\KAK;
use App\Models\Proposal;
use App\Models\Analisis;
use App\Models\laporan_bulanan;
use App\Models\laporan_triwulan;
use App\Models\laporan_tengahtahun;
use App\Models\laporan_akhirtahun;
use App\Models\laporan_renaksi;
use App\Models\laporan_destudi;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Matriks::create([
            'name' => 'Projek User_Matriks',
            'path' => 'placeholder',
            'status' => '1',
            'user_id' => '2',
            'projek_id' => '2',
        ]);
        RAB::create([
            'name' => 'Projek User_RAB',
            'path' => 'placeholder',
            'status' => '1',
            'user_id' => '2',
            'projek_id' => '2',
        ]);
        KAK::create([
            'name' => 'Projek User_KAK',
            'path' => 'placeholder',
            'status' => '1',
            'user_id' => '2',
            'projek_id' => '2',
        ]);
        Proposal::create([
            'name' => 'Projek User_Proposal',
            'path' => 'placeholder',
            'status' => '1',
            'user_id' => '2',
            'projek_id' => '2',
        ]);
        Analisis::create([
            'name' => 'Projek User_Analisis',
            'path' => 'placeholder',
            'status' => '1',
            'user_id' => '2',
            'projek_id' => '2',
        ]);
        laporan_bulanan::create([
            'name' => 'Projek User_laporan_bulanan',
            'path' => 'placeholder',
            'status' => '1',
            'user_id' => '2',
            'projek_id' => '2',
        ]);
        laporan_triwulan::create([
            'name' => 'Projek User_laporan_triwulan',
            'path' => 'placeholder',
            'status' => '1',
            'user_id' => '2',
            'projek_id' => '2',
        ]);
        laporan_tengahtahun::create([
            'name' => 'Projek User_laporan_tengahtahun',
            'path' => 'placeholder',
            'status' => '1',
            'user_id' => '2',
            'projek_id' => '2',
        ]);
        laporan_akhirtahun::create([
            'name' => 'Projek User_laporan__akhirtahun',
            'path' => 'placeholder',
            'status' => '1',
            'user_id' => '2',
            'projek_id' => '2',
        ]);
        laporan_renaksi::create([
            'name' => 'Projek User_laporan__renaksi',
            'path' => 'placeholder',
            'status' => '1',
            'user_id' => '2',
            'projek_id' => '2',
        ]);
        laporan_destudi::create([
            'name' => 'Projek User_laporan__destudi',
            'path' => 'placeholder',
            'status' => '1',
            'user_id' => '2',
            'projek_id' => '2',
        ]);
    }
}
