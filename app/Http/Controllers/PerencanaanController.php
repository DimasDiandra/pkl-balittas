<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use App\Models\Analisis;
use App\Models\KAK;
use App\Models\Matriks;
use App\Models\Proposal;
use App\Models\RAB;
use App\Models\Projek;

use App\Notifications\StatusNotification;
use Illuminate\Support\Facades\Notification;
use App\Events\UpdateStatus;
use App\Notifications\UploadNotification;

use RealRashid\SweetAlert\Facades\Alert;

class PerencanaanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $title = 'Data peserta';
        // $data = User::orderBy('name','asc')->get();
        // return view('admin.datauser',compact('title','data'));
        if (session('success')) {
            Alert::success('Sukses!', session('success'));
        }
        $userdata = DB::table('users')->get();
        return view('admin.PerencanaanViewUser', compact('userdata'));
    }

    public function edit($id)
    {
        $analisis = Analisis::where('user_id', $id)->get();
        $matriks = Matriks::where('user_id', $id)->get();
        $proposal = Proposal::where('user_id', $id)->get();
        $rab = RAB::where('user_id', $id)->get();
        $kak = KAK::where('user_id', $id)->get();
        $user = User::find($id);
        return view('admin.PerencanaanViewFile', ['analisis' => $analisis, 'kak' => $kak, 'matriks' => $matriks, 'proposal' => $proposal, 'rab' => $rab, 'user' => $user]);

        // return view('admin.editperencanaan', compact('title', 'data'));
    }

    public function semuafile()
    {
        $analisis = Analisis::orderBy('created_at', 'ASC')->get();
        $matriks = Matriks::orderBy('created_at', 'ASC')->get();
        $proposal = Proposal::orderBy('created_at', 'ASC')->get();
        $rab = RAB::orderBy('created_at', 'ASC')->get();
        $kak = KAK::orderBy('created_at', 'ASC')->get();
        return view('admin.PerencanaanSemuaFile', ['analisis' => $analisis, 'kak' => $kak, 'matriks' => $matriks, 'proposal' => $proposal, 'rab' => $rab]);

        // return view('admin.editperencanaan', compact('title', 'data'));
    }

    public function perencanaan()
    {
        $analisis = Analisis::where('user_id', Auth::user()->id)->get();
        $matriks = Matriks::where('user_id', Auth::user()->id)->get();
        $proposal = Proposal::where('user_id', Auth::user()->id)->get();
        $rab = RAB::where('user_id', Auth::user()->id)->get();
        $kak = KAK::where('user_id', Auth::user()->id)->get();
        $user = User::get();
        $projek = Projek::where('user_id', Auth::user()->id)->get();
        if (session('success')) {
            Alert::success('Sukses!', session('success'));
        }
        return view('perencanaan', ['analisis' => $analisis, 'kak' => $kak, 'matriks' => $matriks, 'proposal' => $proposal, 'rab' => $rab, 'user' => $user, 'projek' => $projek]);
    }

    public function perencanaan_status($id)
    {
        $projek = Projek::find($id);

        return $projek;
    }

    public function viewmatriks($id, Request $request)
    {
        $data = Matriks::find($id);
        $projek = projek::where('id', $data->projek_id)->first();
        $user = User::where('id', $data->user_id)->first();
        $jenis = $request->jenis;
        if (session('success')) {
            Alert::success('Sukses!', session('success'));
        }
        return view('admin.PerencanaanEdit', compact('data', 'projek', 'user', 'jenis'));
    }

    public function viewrab($id, Request $request)
    {
        $data = RAB::find($id);
        $projek = projek::where('id', $data->projek_id)->first();
        $user = User::where('id', $data->user_id)->first();
        $jenis = $request->jenis;
        if (session('success')) {
            Alert::success('Sukses!', session('success'));
        }
        return view('admin.PerencanaanEdit', compact('data', 'projek', 'user', 'jenis'));
    }

    public function viewkak($id, Request $request)
    {
        $data = KAK::find($id);
        $projek = projek::where('id', $data->projek_id)->first();
        $user = User::where('id', $data->user_id)->first();
        $jenis = $request->jenis;
        if (session('success')) {
            Alert::success('Sukses!', session('success'));
        }
        return view('admin.PerencanaanEdit', compact('data', 'projek', 'user', 'jenis'));
    }

    public function viewproposal($id, Request $request)
    {
        $data = Proposal::find($id);
        $projek = projek::where('id', $data->projek_id)->first();
        $user = User::where('id', $data->user_id)->first();
        $jenis = $request->jenis;
        if (session('success')) {
            Alert::success('Sukses!', session('success'));
        }
        return view('admin.PerencanaanEdit', compact('data', 'projek', 'user', 'jenis'));
    }

    public function viewanalisis($id, Request $request)
    {
        $data = Analisis::find($id);
        $projek = projek::where('id', $data->projek_id)->first();
        $user = User::where('id', $data->user_id)->first();
        $jenis = $request->jenis;
        if (session('success')) {
            Alert::success('Sukses!', session('success'));
        }
        return view('admin.PerencanaanEdit', compact('data', 'projek', 'user', 'jenis'));
    }
    public function statusmatriks($id, Request $request)
    {
        $status = $request->status;
        $data = Matriks::find($id);
        $data->status = $status;
        $data->save();

        $projek = Projek::where('id', $data->projek_id)->first();
        $projek->matriks_status = $data->status;
        $projek->save();

        event(new UpdateStatus($projek));
        // $data->notify(new StatusNotification($data));
        $user = User::where('id', $data->user_id)->get('id');
        Notification::send($user, new StatusNotification($data));
        return redirect()->back()->with('success', 'Data Berhasil Diperbarui');
    }

    public function statusrab($id, Request $request)
    {
        $status = $request->status;
        $data = RAB::find($id);
        $data->status = $status;
        $data->save();

        $projek = Projek::where('id', $data->projek_id)->first();
        $projek->rab_status = $data->status;
        $projek->save();

        event(new UpdateStatus($projek));
        // $data->notify(new StatusNotification($data));
        $user = User::where('id', $data->user_id)->get('id');
        Notification::send($user, new StatusNotification($data));
        return redirect()->back()->with('success', 'Data Berhasil Diperbarui');
    }

    public function statuskak($id, Request $request)
    {
        $status = $request->status;
        $data = KAK::find($id);
        $data->status = $status;
        $data->save();

        $projek = Projek::where('id', $data->projek_id)->first();
        $projek->kak_status = $data->status;
        $projek->save();

        event(new UpdateStatus($projek));
        // $data->notify(new StatusNotification($data));
        $user = User::where('id', $data->user_id)->get('id');
        Notification::send($user, new StatusNotification($data));
        return redirect()->back()->with('success', 'Data Berhasil Diperbarui');
    }

    public function statusanalisis($id, Request $request)
    {
        $status = $request->status;
        $data = Analisis::find($id);
        $data->status = $status;
        $data->save();

        $projek = Projek::where('id', $data->projek_id)->first();
        $projek->analisis_status = $data->status;
        $projek->save();

        event(new UpdateStatus($projek));
        // $data->notify(new StatusNotification($data));
        $user = User::where('id', $data->user_id)->get('id');
        Notification::send($user, new StatusNotification($data));
        return redirect()->back()->with('success', 'Data Berhasil Diperbarui');
    }

    public function statusproposal($id, Request $request)
    {
        $status = $request->status;
        $data = Proposal::find($id);
        $data->status = $status;
        $data->save();

        $projek = Projek::where('id', $data->projek_id)->first();
        $projek->proposal_status = $data->status;
        $projek->save();

        event(new UpdateStatus($projek));
        // $data->notify(new StatusNotification($data));
        $user = User::where('id', $data->user_id)->get('id');
        Notification::send($user, new StatusNotification($data));
        return redirect()->back()->with('success', 'Data Berhasil Diperbarui');
    }

    public function deletematriks($id)
    {
        try {
            $data = Matriks::find($id);
            $projek = Projek::where('id', $data->projek_id)->first();
            $projek->bulanan_status = '0';
            $projek->save();
            $data->delete();
            event(new UpdateStatus($projek));
        } catch (\Exception $e) {
        }
        return redirect('admin/perencanaan')->with('success', 'Data Berhasil Terhapus');
    }

    public function deleterab($id)
    {
        try {
            $data = RAB::find($id);
            $projek = Projek::where('id', $data->projek_id)->first();
            $projek->bulanan_status = '0';
            $projek->save();
            $data->delete();
            event(new UpdateStatus($projek));
        } catch (\Exception $e) {
        }
        return redirect('admin/perencanaan')->with('success', 'Data Berhasil Terhapus');
    }

    public function deletekak($id)
    {
        try {
            $data = KAK::find($id);
            $projek = Projek::where('id', $data->projek_id)->first();
            $projek->bulanan_status = '0';
            $projek->save();
            $data->delete();
            event(new UpdateStatus($projek));
        } catch (\Exception $e) {
        }
        return redirect('admin/perencanaan')->with('success', 'Data Berhasil Terhapus');
    }

    public function deleteproposal($id)
    {
        try {
            $data = Proposal::find($id);
            $projek = Projek::where('id', $data->projek_id)->first();
            $projek->bulanan_status = '0';
            $projek->save();
            $data->delete();
            event(new UpdateStatus($projek));
        } catch (\Exception $e) {
        }
        return redirect('admin/perencanaan')->with('success', 'Data Berhasil Terhapus');
    }

    public function deleteanalisis($id)
    {
        try {
            $data = Analisis::find($id);
            $projek = Projek::where('id', $data->projek_id)->first();
            $projek->bulanan_status = '0';
            $projek->save();
            $data->delete();
            event(new UpdateStatus($projek));
        } catch (\Exception $e) {
        }
        return redirect('admin/perencanaan')->with('success', 'Data Berhasil Terhapus');
    }

    public function perencanaan_upload(Request $request)
    {
        $this->validate($request, [
            // 'matriks' => 'required|file|mimes:docx,pdf,|max:15000',
            // 'rab' => 'required|file|mimes:xlsx,xls,|max:15000',
            // 'kak' => 'required|file|mimes:docx,pdf,|max:15000',
            // 'proposal' => 'required|file|mimes:docx,pdf,|max:15000',
            // 'analisis' => 'required|file|mimes:xlsx,xls,|max:15000',
            'matriks' => 'nullable|file|mimes:docx,pdf|max:15000',
            'rab' => 'nullable|file|mimes:xlsx,xls,|max:15000',
            'kak' => 'nullable|file|mimes:docx,pdf,|max:15000',
            'proposal' => 'nullable|file|mimes:docx,pdf,|max:15000',
            'analisis' => 'nullable|file|mimes:xlsx,xls,|max:15000',

        ]);

        //get user
        $id = Auth::id();
        $user = User::find($id);
        $projek_id = $request->projek_id;
        $projek = Projek::where('id', $projek_id)->first();
        $path = "public/$projek->name";
        $admin = User::where('id', 1)->get('id');

        //variable file
        $matriks = $request->file('matriks');
        $rab = $request->file('rab');
        $kak = $request->file('kak');
        $proposal = $request->file('proposal');
        $analisis = $request->file('analisis');

        // upload ke db
        // matriks
        if (file_exists($matriks)) {
            $namaFileMatriks = $projek->name . "_" . $matriks->getClientOriginalName();
            $pathMatriks = Storage::putFileAs($path, $matriks, $namaFileMatriks);
            $data = Matriks::create([
                'path' => $pathMatriks,
                'name' => $namaFileMatriks,
                'user_id' => $user->id,
                'projek_id' => $request->projek_id,
                'status' => '1'
            ]);
            Notification::send($admin, new UploadNotification($data));
            $projek->matriks_status = 1;
            $projek->save();
            event(new UpdateStatus($projek));
        };
        // rab
        if (file_exists($rab)) {
            $namaFileRab = $projek->name . "_" . $rab->getClientOriginalName();
            $pathRab = Storage::putFileAs($path, $rab, $namaFileRab);

            $data = RAB::create([
                'path' => $pathRab,
                'name' => $namaFileRab,
                'user_id' => $user->id,
                'projek_id' => $request->projek_id,
                'status' => '1'
            ]);
            Notification::send($admin, new UploadNotification($data));
            $projek->rab_status = 1;
            $projek->save();
            event(new UpdateStatus($projek));
        };
        // kak
        if (file_exists($kak)) {
            $namaFileKak = $projek->name . "_" . $kak->getClientOriginalName();
            $pathKak = Storage::putFileAs($path, $kak, $namaFileKak);

            $data = KAK::create([
                'path' => $pathKak,
                'name' => $namaFileKak,
                'user_id' => $user->id,
                'projek_id' => $request->projek_id,
                'status' => '1'
            ]);
            Notification::send($admin, new UploadNotification($data));
            $projek->kak_status = 1;
            $projek->save();
            event(new UpdateStatus($projek));
        };
        // proposal
        if (file_exists($proposal)) {
            $namaFileProposal = $projek->name . "_" . $proposal->getClientOriginalName();
            $pathProposal = Storage::putFileAs($path, $proposal, $namaFileProposal);
            $data = Proposal::create([
                'path' => $pathProposal,
                'name' => $namaFileProposal,
                'user_id' => $user->id,
                'projek_id' => $request->projek_id,
                'status' => '1'
            ]);
            Notification::send($admin, new UploadNotification($data));
            $projek->proposal_status = 1;
            $projek->save();
            event(new UpdateStatus($projek));
        };
        // analisis
        if (file_exists($analisis)) {
            $namaFileAnalisis = $projek->name . "_" . $analisis->getClientOriginalName();
            $pathAnalisis = Storage::putFileAs($path, $analisis, $namaFileAnalisis);
            $data = Analisis::create([
                'path' => $pathAnalisis,
                'name' => $namaFileAnalisis,
                'user_id' => $user->id,
                'projek_id' => $request->projek_id,
                'status' => '1'
            ]);
            Notification::send($admin, new UploadNotification($data));
            $projek->analisis_status = 1;
            $projek->save();
            event(new UpdateStatus($projek));
        };
        // Notification::send($admin, new UploadNotification($data));

        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan');
    }

    public function perencanaan_download(Request $request)
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
}
