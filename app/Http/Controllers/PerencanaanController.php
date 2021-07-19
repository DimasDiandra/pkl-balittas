<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\Analisis;
use App\Models\KAK;
use App\Models\Matriks;
use App\Models\Proposal;
use App\Models\RAB;

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
        $analisis = Analisis::get();
        $matriks = Matriks::get();
        $proposal = Proposal::get();
        $rab = RAB::get();
        $kak = KAK::get();

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
        return view('perencanaan', ['analisis' => $analisis, 'kak' => $kak, 'matriks' => $matriks, 'proposal' => $proposal, 'rab' => $rab]);
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

        //variable file
        $matriks = $request->file('matriks');
        $rab = $request->file('rab');
        $kak = $request->file('kak');
        $proposal = $request->file('proposal');
        $analisis = $request->file('analisis');

        //nama file
        $namaFileMatriks = $matriks->getClientOriginalName();
        $namaFileRab = $rab->getClientOriginalName();
        $namaFileKak = $kak->getClientOriginalName();
        $namaFileProposal = $proposal->getClientOriginalName();
        $namaFileAnalisis = $analisis->getClientOriginalName();

        //get user
        $id = Auth::id();
        $user = User::find($id);

        //storage
        $pathMatriks = Storage::putFileAs('public/matriks', $matriks, $namaFileMatriks);
        $pathRab = Storage::putFileAs('public/rab', $rab, $namaFileRab);
        $pathKak = Storage::putFileAs('public/kak', $kak, $namaFileKak);
        $pathProposal = Storage::putFileAs('public/proposal', $proposal, $namaFileProposal);
        $pathAnalisis = Storage::putFileAs('public/analisis', $analisis, $namaFileAnalisis);

        //upload ke db
        Matriks::create([
            'path' => $pathMatriks,
            'file' => $namaFileMatriks,
            'keterangan' => $request->keterangan,
            'name' => $user->name,
        ]);
        RAB::create([
            'path' => $pathRab,
            'file' => $namaFileRab,
            'keterangan' => $request->keterangan,
            'name' => $user->name,
        ]);
        KAK::create([
            'path' => $pathKak,
            'file' => $namaFileKak,
            'keterangan' => $request->keterangan,
            'name' => $user->name,
        ]);
        Proposal::create([
            'path' => $pathProposal,
            'file' => $namaFileProposal,
            'keterangan' => $request->keterangan,
            'name' => $user->name,
        ]);
        Analisis::create([
            'path' => $pathAnalisis,
            'file' => $namaFileAnalisis,
            'keterangan' => $request->keterangan,
            'name' => $user->name,
        ]);
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
