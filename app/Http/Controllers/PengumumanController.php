<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PengumumanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tambahpengumuman');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul'=> 'required',
            'isi_pengumuman' => 'required'
        ]);
        $pengumuman= new Pengumuman;
        $pengumuman->judul = $request->input('judul');
        $pengumuman->isi_pengumuman = $request->input('isi_pengumuman');
        $pengumuman->save();

        return redirect('admin/pengumuman')->with('success','Pengumuman Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $pengumuman = DB::table('pengumumans')->get();
		return view ('admin.tambahpengumuman', compact('pengumuman'));
    }

    public function edit($id)
	{
		$title = 'Edit ';
		$data = Pengumuman::find($id);

		return view('admin.editpengumuman', compact('title', 'data'));
	}

	public function update(Request $request, $id)
	{
		try {
			// update data kedalam table users
			$pengumuman['judul'] = $request->judul;
			$pengumuman['isi_pengumuman'] = $request->isi_pengumuman;
			$pengumuman['updated_at'] = date('Y-m-d H:i:s');

			Pengumuman::where('id', $id)->update($pengumuman);
		} catch (\Exception $e) {
		}

		return redirect('admin/pengumuman');
	}

	public function delete($id)
	{
		try {
			Pengumuman::where('id', $id)->delete();
		} catch (\Exception $e) {
		}
		return redirect('admin/pengumuman');
	}

}
