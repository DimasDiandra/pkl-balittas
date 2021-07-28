<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Projek;

class ProjekController extends Controller
{
    public function show()
    {
        // $title = 'Data peserta';
        // $data = User::orderBy('name','asc')->get();
        // return view('admin.datauser',compact('title','data'));

        $userdata = DB::table('users')->get();
        $projekdata = DB::table('projek')->get();
        return view('admin.projekUser', compact('userdata', 'projekdata'));
    }

    public function edit($id)
    {
        $title = 'Edit Data peserta';
        $data = User::find($id);

        return view('admin.editdatauser', compact('title', 'data'));
    }

    public function update(Request $request, $id)
    {
        try {
            // update data kedalam table users
            $user['email'] = $request->email;
            $user['name'] = $request->name;
            $user['updated_at'] = date('Y-m-d H:i:s');

            User::where('id', $id)->update($user);
        } catch (\Exception $e) {
        }

        return redirect('admin/user');
    }

    public function delete($id)
    {
        try {
            User::where('id', $id)->delete();
        } catch (\Exception $e) {
        }
        return redirect('admin/user');
    }
}
