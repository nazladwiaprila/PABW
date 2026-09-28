<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class LaporBanjirController extends Controller
{
    public function create() { return view('lapor-banjir.form'); }
    public function store(Request $request)
    {
        $laporan = $request->validate([
            'nama_pelapor' => ['required', 'string', 'max:100'],
            'lokasi' => ['required', 'string', 'max:150'],
            'tinggi_genangan' => ['required', 'numeric', 'min:0'],
        ]);
        return view('lapor-banjir.konfirmasi', compact('laporan'));
    }
}
