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

use function PHPUnit\Framework\fileExists;

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

        $userdata = DB::table('users')->get();
        return view('admin.perencanaan', compact('userdata'));
    }

    public function edit($id)
    {
        $analisis = Analisis::where('user_id', $id)->get();
        $matriks = Matriks::where('user_id', $id)->get();
        $proposal = Proposal::where('user_id', $id)->get();
        $rab = RAB::where('user_id', $id)->get();
        $kak = KAK::where('user_id', $id)->get();
        return view('admin.editperencanaan', ['analisis' => $analisis, 'kak' => $kak, 'matriks' => $matriks, 'proposal' => $proposal, 'rab' => $rab]);

        // return view('admin.editperencanaan', compact('title', 'data'));
    }

    public function perencanaan()
    {
        $analisis = Analisis::get();
        $matriks = Matriks::get();
        $proposal = Proposal::get();
        $rab = RAB::get();
        $kak = KAK::get();
        $user = User::get();
        $projek = Projek::all();

        return view('perencanaan', ['analisis' => $analisis, 'kak' => $kak, 'matriks' => $matriks, 'proposal' => $proposal, 'rab' => $rab, 'user' => $user, 'projek' => $projek]);
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
        return redirect()->back();
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
        return redirect()->back();
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
        return redirect()->back();
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
        return redirect()->back();
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
        return redirect()->back();
    }

    public function perencanaan_upload(Request $request)
    {
        $this->validate($request, [
            // 'matriks' => 'required|file|mimes:docx,pdf,|max:15000',
            // 'rab' => 'required|file|mimes:xlsx,xls,|max:15000',
            // 'kak' => 'required|file|mimes:docx,pdf,|max:15000',
            // 'proposal' => 'required|file|mimes:docx,pdf,|max:15000',
            // 'analisis' => 'required|file|mimes:xlsx,xls,|max:15000',
            'matriks' => 'nullable|file|max:15000',
            'rab' => 'nullable|file|max:15000',
            'kak' => 'nullable|file|max:15000',
            'proposal' => 'nullable|file|max:15000',
            'analisis' => 'nullable|file|max:15000',

        ]);

        //get user
        $id = Auth::id();
        $user = User::find($id);
        $projek_id = $request->projek_id;
        $projek = Projek::where('id', $projek_id)->first();
        $path = "public/$projek->name";

        //variable file
        $matriks = $request->file('matriks');
        $rab = $request->file('rab');
        $kak = $request->file('kak');
        $proposal = $request->file('proposal');
        $analisis = $request->file('analisis');

        // upload ke db
        // matriks
        if (file_exists($matriks)) {
            $namaFileMatriks = $matriks->getClientOriginalName();
            $pathMatriks = Storage::putFileAs($path, $matriks, $namaFileMatriks);
            Matriks::create([
                'path' => $pathMatriks,
                'file' => $namaFileMatriks,
                'user_id' => $user->id,
                'projek_id' => $request->projek_id,
                'status' => '1'
            ]);
            $projek->matriks_status = 1;
            $projek->save();
        };
        // rab
        if (file_exists($rab)) {
            $namaFileRab = $rab->getClientOriginalName();
            $pathRab = Storage::putFileAs($path, $rab, $namaFileRab);

            RAB::create([
                'path' => $pathRab,
                'file' => $namaFileRab,
                'user_id' => $user->id,
                'projek_id' => $request->projek_id,
                'status' => '1'
            ]);
            $projek->rab_status = 1;
            $projek->save();
        };
        // kak
        if (file_exists($kak)) {
            $namaFileKak = $kak->getClientOriginalName();
            $pathKak = Storage::putFileAs($path, $kak, $namaFileKak);

            KAK::create([
                'path' => $pathKak,
                'file' => $namaFileKak,
                'user_id' => $user->id,
                'projek_id' => $request->projek_id,
                'status' => '1'
            ]);
            $projek->kak_status = 1;
            $projek->save();
        };
        // proposal
        if (file_exists($proposal)) {
            $namaFileProposal = $proposal->getClientOriginalName();
            $pathProposal = Storage::putFileAs($path, $proposal, $namaFileProposal);
            Proposal::create([
                'path' => $pathProposal,
                'file' => $namaFileProposal,
                'user_id' => $user->id,
                'projek_id' => $request->projek_id,
                'status' => '1'
            ]);
            $projek->proposal_status = 1;
            $projek->save();
        };
        // analisis
        if (file_exists($analisis)) {
            $namaFileAnalisis = $analisis->getClientOriginalName();
            $pathAnalisis = Storage::putFileAs($path, $analisis, $namaFileAnalisis);
            Analisis::create([
                'path' => $pathAnalisis,
                'file' => $namaFileAnalisis,
                'user_id' => $user->id,
                'projek_id' => $request->projek_id,
                'status' => '1'
            ]);
            $projek->analisis_status = 1;
            $projek->save();
        };

        event(new UpdateStatus($projek));
        return redirect()->back();
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
        // return redirect()->back();
    }
}
