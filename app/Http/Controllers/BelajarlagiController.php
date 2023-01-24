<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BelajarlagiController extends Controller
{
    public function index(){
        $nama = "Budiman";
        $pelajaran = ["Algoritma & Pemrograman","Kalkulus","Pemrograman Web"];
        return view('biodata', ['nama' => $nama, 'matkul' => $pelajaran]);
    }
}
