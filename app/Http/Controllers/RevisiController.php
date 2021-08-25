<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use App\Models\Revisi_RAB;
use App\Models\Semula_Menjadi;
use App\Models\Projek;

use App\Notifications\StatusNotification;
use Illuminate\Support\Facades\Notification;
use App\Events\UpdateStatus;
use App\Notifications\UploadNotification;

use RealRashid\SweetAlert\Facades\Alert;

class RevisiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (session('success')) {
            Alert::success('Sukses!', session('success'));
        }
        $userdata = DB::table('users')->get();
        return view('admin.PerencanaanViewUser', compact('userdata'));
    }

    public function revisi()
    {
        // $semula_menjadi = Semula_Menjadi::where('user_id', Auth::user()->id)->get();
        // $revisi_rab = Revisi_RAB::where('user_id', Auth::user()->id)->get();
        // $user = User::get();
        $semula_menjadi = Semula_Menjadi::orderBy('created_at', 'DESC')->get();
        $revisi_rab = Revisi_RAB::orderBy('created_at', 'DESC')->get();
        $projek = Projek::all();
        if (session('success')) {
            Alert::success('Sukses!', session('success'));
        }

        return view('revisi', ['revisi_rab' => $revisi_rab, 'semula_menjadi' => $semula_menjadi, 'projek' => $projek]);
    }

    public function revisi_status($id)
    {
        $projek = Projek::find($id);

        return $projek;
    }

    public function edit($id)
    {
        $semula_menjadi = Semula_Menjadi::where('user_id', $id)->get();
        $revisi_rab = Revisi_RAB::where('user_id', $id)->get();

        return view('admin.RevisiViewFile', ['revisi_rab' => $revisi_rab, 'semula_menjadi' => $semula_menjadi]);
    }

    public function revisi_upload(Request $request)
    {
        // $this->validate($request, [
        //     'semula_menjadi' => 'nullable|file|mimes:docx,pdf|max:15000',
        //     'revisi_rab' => 'nullable|file|mimes:docx,pdf|max:15000',

        // ]);

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
        // upload ke db
        if ($jenis == 1) {
            $projek->semula_menjadi_status = 1;
            $projek->save();
            $data = Semula_Menjadi::create([
                'path' => $pathFile,
                'name' => $namafile,
                'user_id' => $user->id,
                'projek_id' => $projek_id,
                'status' => '1'
            ]);
            $projek->semula_menjadi_status = 1;
            $projek->save();
        } else if ($jenis == 2) {
            $data = Revisi_RAB::create([
                'path' => $path,
                'name' => $namafile,
                'user_id' => $user->id,
                'projek_id' => $projek_id,
                'status' => '1'
            ]);
            $projek->revisi_rab_status = 1;
            $projek->save();
        };
        if (session('success')) {
            Alert::success('Sukses!', session('success'));
        }

        Notification::send($admin, new UploadNotification($data));
        event(new UpdateStatus($projek));
        return redirect()->back()->with('success', 'Berhasil Menambahkan Data');
    }

    public function viewsemula_menjadi($id, Request $request)
    {
        $data = Semula_Menjadi::find($id);
        $projek = projek::where('id', $data->projek_id)->first();
        $user = User::where('id', $data->user_id)->first();
        $jenis = $request->jenis;
        if (session('success')) {
            Alert::success('Sukses!', session('success'));
        }

        return view('admin.RevisiEdit', compact('data', 'projek', 'user', 'jenis'));
    }

    public function viewrevisi_rab($id, Request $request)
    {
        $data = Revisi_RAB::find($id);
        $projek = projek::where('id', $data->projek_id)->first();
        $user = User::where('id', $data->user_id)->first();
        $jenis = $request->jenis;
        if (session('success')) {
            Alert::success('Sukses!', session('success'));
        }

        return view('admin.RevisiEdit', compact('data', 'projek', 'user', 'jenis'));
    }
    public function statussemula_menjadi($id, Request $request)
    {
        $status = $request->status;
        $data = Semula_Menjadi::find($id);
        $data->status = $status;
        $data->save();

        $projek = Projek::where('id', $data->projek_id)->first();
        $projek->semula_menjadi_status = $data->status;
        $projek->save();

        event(new UpdateStatus($projek));
        // $data->notify(new StatusNotification($data));
        $user = User::where('id', $data->user_id)->get('id');
        Notification::send($user, new StatusNotification($data));
        return redirect()->back()->with('success', 'Data Berhasil Diperbarui');
    }

    public function statusrevisi_rab($id, Request $request)
    {
        $status = $request->status;
        $data = Revisi_RAB::find($id);
        $data->status = $status;
        $data->save();

        $projek = Projek::where('id', $data->projek_id)->first();
        $projek->revisi_rab_status = $data->status;
        $projek->save();

        event(new UpdateStatus($projek));
        // $data->notify(new StatusNotification($data));
        $user = User::where('id', $data->user_id)->get('id');
        Notification::send($user, new StatusNotification($data));
        return redirect()->back()->with('success', 'Data Berhasil Diperbarui');
    }

    public function deletesemula_menjadi($id)
    {
        try {
            $data = Semula_Menjadi::find($id);
            $projek = Projek::where('id', $data->projek_id)->first();
            $projek->semula_menjadi_status = '0';
            $projek->save();
            $data->delete();
            event(new UpdateStatus($projek));
        } catch (\Exception $e) {
        }
        return redirect()->back()->with('success', 'Data Berhasil Terhapus');
    }
    public function deleterevisi_rab($id)
    {
        try {
            $data = Revisi_RAB::find($id);
            $projek = Projek::where('id', $data->projek_id)->first();
            $projek->revisi_rab_status = '0';
            $projek->save();
            $data->delete();
            event(new UpdateStatus($projek));
        } catch (\Exception $e) {
        }
        return redirect()->back()->with('success', 'Data Berhasil Terhapus');
    }

    public function revisi_download(Request $request)
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
        if(session('success')){
            Alert::success('Sukses!', session('success'));
        }

        $userdata = DB::table('users')->get();
        $projekdata = Projek::all();
        
        return view('admin.RevisiViewUser', compact('userdata', 'projekdata'));
    }

    public function admin_update($id)
    {
        $semula_menjadi = Semula_Menjadi::where('user_id', $id)->get();
        $revisi_rab = Revisi_RAB::where('user_id', $id)->get();
        $user = User::find($id);
        $projek = Projek::all();
        if (session('success')) {
            Alert::success('Sukses!', session('success'));
        }

        return view('admin.RevisiViewFile', ['revisi_rab' => $revisi_rab, 'semula_menjadi' => $semula_menjadi, 'projek' => $projek, 'user' => $user]);
    }
}
