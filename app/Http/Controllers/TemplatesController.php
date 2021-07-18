<?php

namespace App\Http\Controllers;

use App\Models\Templates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TemplatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.datatemplate');
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
        $request->validate([
            'nama_file' => 'required|file|max:15000'
        ]);

        if ($request->hasfile('nama_file')) {            
            $nama_file = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('nama_file')->getClientOriginalName());
            $request->file('nama_file')->move(public_path('data_template'), $nama_file);
             Templates::create(
                    [                        
                        'nama_file' =>$nama_file
                    ]
                );
                return redirect('admin/template')->with('success','Template Ditambahkan');
        }else{
            echo'Gagal';
        }
        

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Templates  $templates
     * @return \Illuminate\Http\Response
     */
    public function show(Templates $templates)
    {
        $file = DB::table('templates')->get();
		return view ('admin.datatemplate', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Templates  $templates
     * @return \Illuminate\Http\Response
     */
    public function edit(Templates $templates)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Templates  $templates
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Templates $templates)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Templates  $templates
     * @return \Illuminate\Http\Response
     */
    public function destroy(Templates $templates)
    {
        //
    }

    public function delete($id)
	{
		try {
			Templates::where('id', $id)->delete();
		} catch (\Exception $e) {
		}
		return redirect('admin/template');
	}
}
