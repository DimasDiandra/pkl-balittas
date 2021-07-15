<?php

namespace App\Http\Controllers;

use App\Models\uploadReport;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
    	$title = 'Data peserta';
    	$data = User::orderBy('name','asc')->get();

    	return view('admin.datauser',compact('title','data'));
    }

}