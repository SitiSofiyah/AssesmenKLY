<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use DB;
class AccountController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$users = User::all();
        return view('account',compact('users'));
    }

    public function delete($id)
    {
    	DB::table('users')->where('id',$id)->delete();
		
		// alihkan halaman ke halaman pegawai
		return redirect('/account');
    }

    public function update_form($id)
    {
    	$users = DB::table('users')->where('id',$id)->get();
		// alihkan halaman ke halaman pegawai
		return view('edit_account',['users'=>$users]);
    }

    public function update($id, Request $request)
    {
    	echo $request->password;

    	if($request->password != "pass"){
    		DB::table('users')->where('id',$id)->update([
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password)
		]);
    	}else{
    		DB::table('users')->where('id',$id)->update([
			'name' => $request->name,
			'email' => $request->email
			]);
    	}
    	
		return redirect('/home');
    }
}
