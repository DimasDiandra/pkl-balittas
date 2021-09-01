<?php

namespace App\Http\Controllers;

use App\Models\uploadReport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
		if(session('success')){
            Alert::success('Sukses!', session('success'));
        }
		$userdata = DB::table('users')->get();
		return view('admin.datauser', compact('userdata'));
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
			$user['jabatan'] = $request->jabatan;
			$user['tempat_lahir'] = $request->tempat_lahir;
			$user['tanggal_lahir'] = $request->tanggal_lahir;
			$user['alamat'] = $request->alamat;
			$user['no_hp'] = $request->no_hp;
			$user['updated_at'] = date('Y-m-d H:i:s');

			User::where('id', $id)->update($user);
		} catch (\Exception $e) {
		}

		return redirect('admin/user')->with('success', 'Data Berhasil Diperbarui');
	}

	public function delete($id)
	{
		// $emp= User::find($id);
		// $emp->delete();
		try {
			User::where('id', $id)->delete();
		} catch (\Exception $e) {			
		}
		return redirect('admin/user')->with('success', 'Data Berhasil Terhapus');
	}
	public function profile($id)
	{
		$data = User::find($id);

		if(session('success')){
            Alert::success('Sukses!', session('success'));
        }
		return view(('profile'), compact('data'));
		// return redirect('admin/user')->with('success', 'Data Berhasil Terhapus');
	}

	public function profile_admin($id)
	{
		$data = User::find($id);

		if(session('success')){
            Alert::success('Sukses!', session('success'));
        }
		return view(('admin/profile'), compact('data'));
		// return redirect('admin/user')->with('success', 'Data Berhasil Terhapus');
	}

	public function updateprofile(Request $request, $id)
	{
		try {
			// update data kedalam table users
			$user['email'] = $request->email;
			$user['name'] = $request->name;
			$user['jabatan'] = $request->jabatan;
			$user['tempat_lahir'] = $request->tempat_lahir;
			$user['tanggal_lahir'] = $request->tanggal_lahir;
			$user['alamat'] = $request->alamat;
			$user['no_hp'] = $request->no_hp;
			$user['updated_at'] = date('Y-m-d H:i:s');

			User::where('id', $id)->update($user);
		} catch (\Exception $e) {
		}

		return redirect()->back()->with('success', 'Data Berhasil Diperbarui');
	}

	public function change_password(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
		return redirect()->back()->with('success', 'Password Berhasil Diperbarui');
    }
}
