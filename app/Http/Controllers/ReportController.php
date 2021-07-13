<?php

namespace App\Http\Controllers;

use App\Models\uploadReport;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function report()
    {
        $report = uploadReport::get();
        return view('report', ['report' => $report]);
    }

    public function report_upload(Request $request)
    {
        $this->validate($request, [
            // 'name ' => 'required',
            'file' => 'required',
            'keterangan' => 'required',
        ]);

        //variable file
        $file = $request->file('file');

        //nama file
        $namafile = $file->getClientOriginalName();



        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'ReportUpload';

        // upload file
        $file->move($tujuan_upload, $file->getClientOriginalName());

        //upload ke db
        uploadReport::create([
            // 'name' => $request->name,
            'file' => $namafile,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->back();
    }
}
