<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pengumuman;
use App\Models\laporan_akhirtahun;
use App\Models\laporan_bulanan;
use App\Models\laporan_destudi;
use App\Models\laporan_renaksi;
use App\Models\laporan_tengahtahun;
use App\Models\laporan_triwulan;
use App\Models\Projek;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd(session()->all());
        $file = DB::table('templates')->get();
        $projek = Projek::Orderby('all_status', 'DESC')->get();
        $user = User::find(Auth::user()->id);
        $pengumuman = Pengumuman::orderBy('created_at', 'DESC')->get();

        $userdata = User::join('projek', 'user_id', 'users.id')->select('users.name','bulanan_status','triwulan_status','tengahtahun_status','akhirtahun_status','renaksi_status','destudi_status','projek.name as projek_name')->get();

        $bulanan = laporan_bulanan::orderBy('created_at', 'DESC')->get();
        $triwulan = laporan_triwulan::orderBy('created_at', 'DESC')->get();
        $tengahTahun = laporan_tengahtahun::orderBy('created_at', 'DESC')->get();
        $akhirTahun = laporan_akhirtahun::orderBy('created_at', 'DESC')->get();
        $destudi = laporan_destudi::orderBy('created_at', 'DESC')->get();
        $renaksi = laporan_renaksi::orderBy('created_at', 'DESC')->get();
        $projek = Projek::all();

        if(session('success')){
            Alert::success('Sukses!', session('success'));
        }

        return view('home', 
        [
            'file' => $file, 'pengumuman'=> $pengumuman,'user'=>$user,'projek'=>$projek,'bulanan' => $bulanan, 'triwulan' => $triwulan, 'tengahTahun' => $tengahTahun, 'akhirTahun' => $akhirTahun, 'destudi' => $destudi,
            'renaksi' => $renaksi, 'projek' => $projek, 'userdata'=>$userdata,
        ]);
    }

    public function admin()
    {
        // dd(session()->all());
        $file = DB::table('templates')->get();
        $projek = Projek::Orderby('all_status', 'DESC')->get();
        $user = User::find(Auth::user()->id);
        $pengumuman = Pengumuman::orderBy('created_at', 'DESC')->get();
        return view('admin.home', compact('file', 'pengumuman', 'user', 'projek'));
    }

    public function show_pengumuman($id)
    {
        return Pengumuman::find($id);
    }
}
