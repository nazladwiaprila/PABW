<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class MahasiswaController extends Controller {


    public function formmahasiswa(){
        return view('formmahasiswa');
    }

    public function prosesmahasiswa(Request $request){
        $nim = $request->input('nim');
        $nama = $request->input('nama');
        $program_studi = $request->input('program_studi');
        $semester = $request->input('semester');
        
        return view('hasilmahasiswa', ['nim' => $nim, 'nama' => $nama, 'program_studi' => $program_studi, 'semester' => $semester]);
    }
        
}