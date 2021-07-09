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
            // 'matriks' => 'required|file|mimes:docx,pdf,|max:15000',
            // 'rab' => 'required|file|mimes:xlsx,xls,|max:15000',
            // 'kak' => 'required|file|mimes:docx,pdf,|max:15000',
            // 'proposal' => 'required|file|mimes:docx,pdf,|max:15000',
            // 'analisis' => 'required|file|mimes:xlsx,xls,|max:15000',
            'matriks' => 'required|file|max:15000',
            'rab' => 'required|file|max:15000',
            'kak' => 'required|file|max:15000',
            'proposal' => 'required|file|max:15000',
            'analisis' => 'required|file|max:15000',

        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('matriks');
        $file1 = $request->file('rab');
        $file2 = $request->file('kak');
        $file3 = $request->file('proposal');
        $file4 = $request->file('analisis');

        $nama_file = date('Y-m-d H-is') . "_" . $file->getClientOriginalName();
        $nama_file1 = date('Y-m-d H-is') . "_" . $file1->getClientOriginalName();
        $nama_file2 = date('Y-m-d H-is') . "_" . $file2->getClientOriginalName();
        $nama_file3 = date('Y-m-d H-is') . "_" . $file3->getClientOriginalName();
        $nama_file4 = date('Y-m-d H-is') . "_" . $file4->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';
        $file->move('File Matriks/', $nama_file);
        $file1->move('File RAB/', $nama_file1);
        $file2->move('File KAK/', $nama_file2);
        $file3->move('File Proposal/', $nama_file3);
        $file4->move('File Analisis/', $nama_file4);

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
