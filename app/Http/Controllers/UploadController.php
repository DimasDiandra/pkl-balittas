<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Gambar;

class UploadController extends Controller
{
    public function upload()
    {
        $gambar = Gambar::get();
        return view('upload', ['gambar' => $gambar]);
    }

    public function proses_upload(Request $request)
    {
        $this->validate($request, [
            'matriks' => 'required|file|mimes:docx,pdf,|max:2048',
            'rab' => 'required|file|mimes:docx,pdf,|max:2048',
            'kak' => 'required|file|mimes:docx,pdf,|max:2048',
            'proposal' => 'required|file|mimes:docx,pdf,|max:2048',
            'analisis' => 'required|file|mimes:docx,pdf,|max:2048',
            
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('matriks');
        $file1 = $request->file('rab');
        $file2 = $request->file('kak');
        $file3 = $request->file('proposal');
        $file4 = $request->file('analisis');

        $nama_file = time() . "_" . $file->getClientOriginalName();
        $nama_file1 = time() . "_" . $file1->getClientOriginalName();
        $nama_file2 = time() . "_" . $file2->getClientOriginalName();
        $nama_file3 = time() . "_" . $file3->getClientOriginalName();
        $nama_file4 = time() . "_" . $file4->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload, $nama_file);
        $file1->move($tujuan_upload, $nama_file1);
        $file2->move($tujuan_upload, $nama_file2);
        $file3->move($tujuan_upload, $nama_file3);
        $file4->move($tujuan_upload, $nama_file4);

        Gambar::create([
            'matriks' => $nama_file,
            'rab' => $nama_file1,
            'kak' => $nama_file2,
            'proposal' => $nama_file3,
            'analisis' => $nama_file4,
        ]);

        return redirect()->back();
    }
}
