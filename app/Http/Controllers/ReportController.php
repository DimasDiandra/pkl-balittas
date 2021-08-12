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
use App\Notifications\StatusNotification;
use Illuminate\Support\Facades\Notification;
use App\Events\UpdateStatus;
use App\Notifications\UploadNotification;

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

    public function viewbulanan($id)
    {
        $data = laporan_bulanan::find($id);
        $projek = projek::where('id', $data->projek_id)->first();
        $user = User::where('id', $data->user_id)->first();
        return view('admin.ReportEdit', compact('data', 'projek', 'user'));
    }
    public function viewtriwulan($id)
    {
        $data = laporan_triwulan::find($id);
        $projek = projek::where('id', $data->projek_id)->first();
        $user = User::where('id', $data->user_id)->first();
        return view('admin.ReportEdit', compact('data', 'projek', 'user'));
    }
    public function viewtengah($id)
    {
        $data = laporan_tengahtahun::find($id);
        $projek = projek::where('id', $data->projek_id)->first();
        $user = User::where('id', $data->user_id)->first();
        return view('admin.ReportEdit', compact('data', 'projek', 'user'));
    }
    public function viewakhir($id)
    {
        $data = laporan_akhirtahun::find($id);
        $projek = projek::where('id', $data->projek_id)->first();
        $user = User::where('id', $data->user_id)->first();
        return view('admin.ReportEdit', compact('data', 'projek', 'user'));
    }
    public function viewrenaksi($id)
    {
        $data = laporan_renaksi::find($id);
        $projek = projek::where('id', $data->projek_id)->first();
        $user = User::where('id', $data->user_id)->first();
        return view('admin.ReportEdit', compact('data', 'projek', 'user'));
    }
    public function viewdestudi($id)
    {
        $data = laporan_destudi::find($id);
        $projek = projek::where('id', $data->projek_id)->first();
        $user = User::where('id', $data->user_id)->first();
        return view('admin.ReportEdit', compact('data', 'projek', 'user'));
    }

    public function statusbulanan($id, Request $request)
    {
        $status = $request->status;
        $data = laporan_bulanan::find($id);
        $data->status = $status;
        $data->save();

        $projek = Projek::where('id', $data->projek_id)->first();
        $projek->bulanan_status = $data->status;
        $projek->save();

        event(new UpdateStatus($projek));
        // $data->notify(new StatusNotification($data));
        $user = User::where('id', $data->user_id)->get('id');
        Notification::send($user, new StatusNotification($data));
        return redirect()->back()->with('success', 'Berhasil Mengubah Data');
    }

    public function statustriwulan($id, Request $request)
    {
        $status = $request->status;
        $data = laporan_triwulan::find($id);
        $data->status = $status;
        $data->save();

        $projek = Projek::where('id', $data->projek_id)->first();
        $projek->triwulan_status = $data->status;
        $projek->save();
        event(new UpdateStatus($projek));

        $user = User::where('id', $data->user_id)->get('id');
        Notification::send($user, new StatusNotification($data));
        return redirect()->back()->with('success', 'Berhasil Mengubah Data');
    }

    public function statustengah($id, Request $request)
    {
        $status = $request->status;
        $data = laporan_tengahtahun::find($id);
        $data->status = $status;
        $data->save();

        $projek = Projek::where('id', $data->projek_id)->first();
        $projek->tengahtahun_status = $data->status;
        $projek->save();
        event(new UpdateStatus($projek));

        $user = User::where('id', $data->user_id)->get('id');
        Notification::send($user, new StatusNotification($data));
        return redirect()->back()->with('success', 'Berhasil Mengubah Data');
    }

    public function statusakhir($id, Request $request)
    {
        $status = $request->status;
        $data = laporan_akhirtahun::find($id);
        $data->status = $status;
        $data->save();

        $projek = Projek::where('id', $data->projek_id)->first();
        $projek->akhirtahun_status = $data->status;
        $projek->save();
        event(new UpdateStatus($projek));

        $user = User::where('id', $data->user_id)->get('id');
        Notification::send($user, new StatusNotification($data));
        return redirect()->back()->with('success', 'Berhasil Mengubah Data');
    }

    public function statusdestudi($id, Request $request)
    {
        $status = $request->status;
        $data = laporan_destudi::find($id);
        $data->status = $status;
        $data->save();

        $projek = Projek::where('id', $data->projek_id)->first();
        $projek->destudi_status = $data->status;
        $projek->save();
        event(new UpdateStatus($projek));

        $user = User::where('id', $data->user_id)->get('id');
        Notification::send($user, new StatusNotification($data));
        return redirect()->back()->with('success', 'Berhasil Mengubah Data');
    }

    public function statusrenaksi($id, Request $request)
    {
        $status = $request->status;
        $data = laporan_renaksi::find($id);
        $data->status = $status;
        $data->save();

        $projek = Projek::where('id', $data->projek_id)->first();
        $projek->renaksi_status = $data->status;
        $projek->save();
        event(new UpdateStatus($projek));

        $user = User::where('id', $data->user_id)->get('id');
        Notification::send($user, new StatusNotification($data));
        return redirect()->back()->with('success', 'Berhasil Mengubah Data');
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


        //Projek
        $projek_id = $request->projek_id;
        $projek = Projek::where('id', $projek_id)->first();

        //nama file
        $namafile = $projek->name . "_" . $file->getClientOriginalName();


        //get user
        $id = Auth::id();
        $user = User::find($id);
        $admin = User::where('id', 1)->get('id');

        //Path
        $path = "public/$projek->name";
        $pathFile = Storage::putFileAs($path, $file, $namafile);

        //upload ke db
        if ($jenis == 1) {
            $projek->bulanan_status = 1;
            $projek->save();
            $data = laporan_bulanan::create([
                'path' => $pathFile,
                'name' => $namafile,
                'user_id' => $user->id,
                'projek_id' => $projek_id,
                'status' => '1'
            ]);
            $projek->bulanan_status = 1;
            $projek->save();
        } else if ($jenis == 2) {
            $data = laporan_triwulan::create([
                'path' => $path,
                'name' => $namafile,
                'user_id' => $user->id,
                'projek_id' => $projek_id,
                'status' => '1'
            ]);
            $projek->triwulan_status = 1;
            $projek->save();
        } else if ($jenis == 3) {
            $data = laporan_tengahtahun::create([
                'path' => $path,
                'name' => $namafile,
                'user_id' => $user->id,
                'projek_id' => $projek_id,
                'status' => '1'
            ]);
            $projek->tengahtahun_status = 1;
            $projek->save();
        } else if ($jenis == 4) {
            $data = laporan_akhirtahun::create([
                'path' => $path,
                'name' => $namafile,
                'user_id' => $user->id,
                'projek_id' => $projek_id,
                'status' => '1'
            ]);
            $projek->akhirtahun_status = 1;
            $projek->save();
        } else if ($jenis == 5) {
            $data = laporan_destudi::create([
                'path' => $path,
                'name' => $namafile,
                'user_id' => $user->id,
                'projek_id' => $projek_id,
                'status' => '1'
            ]);
            $projek->destudi_status = 1;
            $projek->save();
        } else if ($jenis == 6) {
            $data = laporan_renaksi::create([
                'path' => $path,
                'name' => $namafile,
                'user_id' => $user->id,
                'projek_id' => $projek_id,
                'status' => '1'
            ]);
            $projek->renaksi_status = 1;
            $projek->save();
        };

        Notification::send($admin, new UploadNotification($data));
        event(new UpdateStatus($projek));
        return redirect()->back()->with('success', 'Berhasil Menambahkan Data');
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
        // return redirect()->back()->with('success', 'Berhasil Mengubah Data');
    }

    public function admin_view()
    {
        // $title = 'Data peserta';
        // $data = User::orderBy('name','asc')->get();
        // return view('admin.datauser',compact('title','data'));

        $userdata = DB::table('users')->get();
        $projekdata = Projek::all();
        return view('admin.ReportViewUser', compact('userdata', 'projekdata'));
    }

    public function admin_update($id)
    {
        $bulanan = laporan_bulanan::where('user_id', $id)->get();
        $triwulan = laporan_triwulan::where('user_id', $id)->get();
        $tengahTahun = laporan_tengahtahun::where('user_id', $id)->get();
        $akhirTahun = laporan_akhirtahun::where('user_id', $id)->get();
        $destudi = laporan_destudi::where('user_id', $id)->get();
        $renaksi = laporan_renaksi::where('user_id', $id)->get();
        $user = User::find($id);
        $projek = Projek::all();
        return view('admin.ReportViewFile', [
            'bulanan' => $bulanan, 'triwulan' => $triwulan, 'tengahTahun' => $tengahTahun, 'akhirTahun' => $akhirTahun, 'destudi' => $destudi,
            'renaksi' => $renaksi, 'projek' => $projek, 'user' => $user
        ]);
    }
}
