<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
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
        $report = Report::orderBy('created_at', 'DESC')->get();
        return view('report', ['report' => $report]);
    }

    public function report_upload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required',
            'keterangan' => 'required',
        ]);

        //variable file
        $file = $request->file('file');

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
        Report::create([
            'path' => $path,
            'file' => $namafile,
            'keterangan' => $request->keterangan,
            'name' => $user->name,
        ]);

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
}
