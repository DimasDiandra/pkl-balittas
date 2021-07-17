<?php

namespace App\Http\Controllers;

use App\Models\uploadReport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
    	// $title = 'Data peserta';
    	// $data = User::orderBy('name','asc')->get();
    	// return view('admin.datauser',compact('title','data'));

		$userdata = DB::table('users')->get();
		return view ('admin.datauser', compact('userdata'));
    }

}