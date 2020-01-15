<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

class DataController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('insert_data');
    }

    public function create(Request $request)
    { 
    	date_default_timezone_set("Asia/Bangkok");
    	$namaFile = $request->input('name').'-'.date('dmYHis').'.txt';
    	$name = $request->input('name');
    	$email = $request->input('email');
    	$date = $request->input('date');
    	$telp = $request->input('telp');
    	$gender = $request->input('gender');
    	$foto = 'account.png';

    	if($request->hasFile('foto')){
	    	$file = $request->file('foto');
	    	$foto = $this->upload($file);
    	}
    	

        Storage::disk('local')->put('data/'.$namaFile, $name.','.$email.','.$date.','.$telp.','.$gender.','.$foto);

        return view('success_add');

    }

    public function delete($namaFile,$image)
    {
    	if($image!='account.png'){
    		File::delete('image/'.$image);
    	}
    	Storage::disk('local')->delete('data/'.$namaFile);
    	
        return redirect()->route('home');
    }

    public function form_edit($namaFile)
    {    	
    	$file = Storage::disk('local')->get('data/'.$namaFile);
        $arr = explode(",", $file);
        return view('edit_data',['data'=>$arr,'file'=>$namaFile]);
    }

    public function edit($namaFile,Request $request)
    { 
    	$name = $request->input('name');
    	$email = $request->input('email');
    	$date = $request->input('date');
    	$telp = $request->input('telp');
    	$gender = $request->input('gender');
    	$foto = $request->input('pic');

    	if($request->hasFile('foto')){
    		$this->delete($namaFile,$foto);
    		$file = $request->file('foto');
	    	$foto = $this->upload($file);
	    	
    	}
    	
        Storage::disk('local')->put('data/'.$namaFile, $name.','.$email.','.$date.','.$telp.','.$gender.','.$foto);

        return redirect()->route('home');

    }

    private function upload($file){
    	$foto = $file->getClientOriginalName();
	    $tujuan = 'image';
	    $file->move($tujuan,$file->getClientOriginalName());
	    return $foto;
    }


    


}
