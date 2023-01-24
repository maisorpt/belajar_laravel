<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelajarController extends Controller
{
    public function index($nama){
        $pelajar = DB::table('pelajar')->get();
        return view('index', ['pelajar'=> $pelajar]);
    }
    public function formulir(){
        return view('formulir');
    }
    public function proses(Request $request){
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        return "Nama :".$nama.", Alamat: ".$alamat;
    }
}
