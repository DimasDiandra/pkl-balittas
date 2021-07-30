<?php

namespace App\Http\Controllers;

use App\Models\laporan_akhirtahun;
use App\Models\laporan_bulanan;
use App\Models\laporan_destudi;
use App\Models\laporan_renaksi;
use App\Models\laporan_tengahtahun;
use App\Models\laporan_triwulan;
use App\Models\Projek;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function report()
    {
        $bulanan = laporan_bulanan::orderBy('created_at', 'DESC')->get();
        $triwulan = laporan_triwulan::orderBy('created_at', 'DESC')->get();
        $tengahTahun = laporan_tengahtahun::orderBy('created_at', 'DESC')->get();
        $akhirTahun = laporan_akhirtahun::orderBy('created_at', 'DESC')->get();
        $destudi = laporan_destudi::orderBy('created_at', 'DESC')->get();
        $renaksi = laporan_renaksi::orderBy('created_at', 'DESC')->get();
        $projek = Projek::all();
        return view('report', [
            'bulanan' => $bulanan, 'triwulan' => $triwulan, 'tengahTahun' => $tengahTahun, 'akhirTahun' => $akhirTahun, 'destudi' => $destudi,
            'renaksi' => $renaksi, 'projek' => $projek
        ]);
    }

    public function report_upload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required',
            'keterangan' => 'required',
            'projek_id' => 'required'
        ]);

        //variable file
        $file = $request->file('file');
        $jenis = $request->keterangan;
        $projek_id = $request->projek_id;

        //nama file
        $namafile = $file->getClientOriginalName();

        //get user
        $id = Auth::id();
        $user = User::find($id);

        // // isi dengan nama folder tempat kemana file diupload
        // $tujuan_upload = 'ReportUpload';

        // // upload file
        // $file->move($tujuan_upload, $file->getClientOriginalName());
        $path = Storage::putFileAs('public/report', $file, $namafile);

        //upload ke db
        if ($jenis == 1) {

            laporan_bulanan::create([
                'path' => $path,
                'name' => $namafile,
                'user_id' => $user->id,
                'projek_id' => $projek_id,
                'status' => '0'
            ]);
        } else if ($jenis == 2) {
            laporan_triwulan::create([
                'path' => $path,
                'name' => $namafile,
                'user_id' => $user->id,
                'projek_id' => $projek_id,
                'status' => '0'
            ]);
        } else if ($jenis == 3) {
            laporan_tengahtahun::create([
                'path' => $path,
                'name' => $namafile,
                'user_id' => $user->id,
                'projek_id' => $projek_id,
                'status' => '0'
            ]);
        } else if ($jenis == 4) {
            laporan_akhirtahun::create([
                'path' => $path,
                'name' => $namafile,
                'user_id' => $user->id,
                'projek_id' => $projek_id,
                'status' => '0'
            ]);
        } else if ($jenis == 5) {
            laporan_destudi::create([
                'path' => $path,
                'name' => $namafile,
                'user_id' => $user->id,
                'projek_id' => $projek_id,
                'status' => '0'
            ]);
        } else if ($jenis == 6) {
            laporan_renaksi::create([
                'path' => $path,
                'name' => $namafile,
                'user_id' => $user->id,
                'projek_id' => $projek_id,
                'status' => '0'
            ]);
        }

        return redirect()->back();
    }

    public function report_download(Request $request)
    {
        $this->validate($request, [
            'path' => 'required'
        ]);
        $path = $request->path;

        try {
            // return $path;
            return Storage::disk('local')->download($path);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        // return redirect()->back();
    }

    public function admin_view()
    {
        // $title = 'Data peserta';
        // $data = User::orderBy('name','asc')->get();
        // return view('admin.datauser',compact('title','data'));

        $userdata = DB::table('users')->get();
        $projekdata = Projek::all();
        return view('admin.Report', compact('userdata', 'projekdata'));
    }

    public function admin_update($id)
    {
        $bulanan = laporan_bulanan::orderBy('created_at', 'DESC')->get();
        $triwulan = laporan_triwulan::orderBy('created_at', 'DESC')->get();
        $tengahTahun = laporan_tengahtahun::orderBy('created_at', 'DESC')->get();
        $akhirTahun = laporan_akhirtahun::orderBy('created_at', 'DESC')->get();
        $destudi = laporan_destudi::orderBy('created_at', 'DESC')->get();
        $renaksi = laporan_renaksi::orderBy('created_at', 'DESC')->get();
        $projek = Projek::all();
        return view('admin.editreport', [
            'bulanan' => $bulanan, 'triwulan' => $triwulan, 'tengahTahun' => $tengahTahun, 'akhirTahun' => $akhirTahun, 'destudi' => $destudi,
            'renaksi' => $renaksi, 'projek' => $projek
        ]);

        // return view('admin.editperencanaan', compact('title', 'data'));
    }
}
