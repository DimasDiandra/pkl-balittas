<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Projek;
use RealRashid\SweetAlert\Facades\Alert;

class ProjekController extends Controller
{
    public function show()
    {
        // $title = 'Data peserta';
        // $data = User::orderBy('name','asc')->get();
        // return view('admin.datauser',compact('title','data'));
        if(session('success')){
            Alert::success('Sukses!', session('success'));
        }
        $userdata = DB::table('users')->get();
        $projekdata = DB::table('projek')->get();
        return view('admin.projekUser', compact('userdata', 'projekdata'));
    }

    public function create(Request $request)
    {

        $this->validate($request, [
            'projek_name' => 'required',
            'user_id' => 'required'
        ]);

        $name = $request->projek_name;
        $user_id = $request->user_id;

        Projek::create([
            'name' => $name,
            'user_id' => $user_id,
            'all_status' => 0
        ]);

        return redirect()->back()->with('success', 'Projek Berhasil Diperbarui');
    }

    public function edit($id)
    {
        $title = 'Edit Data peserta';
        $projekdata = Projek::find($id);
        $userdata = DB::table('users')->get();

        return view('admin.editProjek', compact('title', 'userdata', 'projekdata'));
    }

    public function update(Request $request, $id)
    {
        try {
            // update data kedalam table users
            $user['user_id'] = $request->user_id;
            $user['updated_at'] = date('Y-m-d H:i:s');
            // dd($request->user_id);

            Projek::where('id', $id)->update($user);
        } catch (\Exception $e) {
        }

        return redirect('admin/projek')->with('success', 'Projek Berhasil Diperbarui');
    }

    public function delete($id)
    {
        try {
            User::where('id', $id)->delete();
        } catch (\Exception $e) {
        }
        return redirect('admin/user')->with('success', 'Projek Berhasil Terhapus');
    }
}
