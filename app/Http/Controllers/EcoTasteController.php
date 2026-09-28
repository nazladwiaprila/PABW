<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class EcoTasteController extends Controller
{
    public function showLogin()
    {
        if (session()->has('ecotaste_user')) {
            return redirect()->route('ecotaste.home');
        }

        return view('ecotaste.login');
    }

    public function showSignup()
    {
        if (session()->has('ecotaste_user')) {
            return redirect()->route('ecotaste.home');
        }

        return view('ecotaste.signup');
    }

    public function signup(Request $request)
    {
        $data = $request->validate([
            'username' => ['required', 'string', 'max:60'],
            'email' => ['required', 'email', 'max:120'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        session(['ecotaste_account' => [
            'username' => $data['username'],
            'email' => strtolower($data['email']),
            'password' => Hash::make($data['password']),
        ]]);

        return redirect()->route('ecotaste.login')->with('status', 'Akun berhasil dibuat. Silakan masuk.');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'identity' => ['required', 'string', 'max:120'],
            'password' => ['required', 'string'],
        ]);

        $account = session('ecotaste_account');
        $identity = strtolower(trim($data['identity']));
        $emailMatches = $account && $identity === strtolower($account['email']);
        $usernameMatches = $account && $identity === strtolower($account['username']);

        if (!$account || (!$emailMatches && !$usernameMatches) || !Hash::check($data['password'], $account['password'])) {
            throw ValidationException::withMessages(['identity' => 'Username/email atau kata sandi tidak cocok.']);
        }

        $request->session()->regenerate();
        session(['ecotaste_user' => ['username' => $account['username'], 'email' => $account['email']]]);

        return redirect()->route('ecotaste.home');
    }
    public function home()
    {
        if (!session()->has('ecotaste_user')) {
            return redirect()->route('ecotaste.login')->with('status', 'Masuk terlebih dahulu untuk membuka Beranda.');
        }

        return view('ecotaste.homee');
    }

    public function reports()
    {
        if (!session()->has('ecotaste_user')) {
            return redirect()->route('ecotaste.login');
        }

        return view('ecotaste.laporan', ['reports' => session('ecotaste_reports', [])]);
    }

    public function saveReport(Request $request)
    {
        if (!session()->has('ecotaste_user')) {
            return redirect()->route('ecotaste.login');
        }

        $data = $request->validate([
            'tanggal' => ['required', 'date'],
            'jenis_limbah' => ['required', 'in:Organik,Anorganik,Minyak Jelantah'],
            'berat' => ['required', 'numeric', 'min:0.1', 'max:10000'],
            'metode' => ['required', 'string', 'max:100'],
            'catatan' => ['nullable', 'string', 'max:250'],
        ]);
        $data['status'] = 'Tercatat';
        $reports = session('ecotaste_reports', []);
        array_unshift($reports, $data);
        session(['ecotaste_reports' => $reports]);

        return redirect()->route('ecotaste.laporan')->with('status', 'Laporan limbah berhasil disimpan.');
    }

    public function ratings()
    {
        if (!session()->has('ecotaste_user')) {
            return redirect()->route('ecotaste.login');
        }

        return view('ecotaste.rating', ['ratings' => session('ecotaste_ratings', [])]);
    }

    public function saveRating(Request $request)
    {
        if (!session()->has('ecotaste_user')) {
            return redirect()->route('ecotaste.login');
        }

        $data = $request->validate([
            'restoran' => ['required', 'string', 'max:100'],
            'rating' => ['required', 'integer', 'between:1,5'],
            'ulasan' => ['nullable', 'string', 'max:300'],
        ]);
        $data['username'] = session('ecotaste_user.username');
        $ratings = session('ecotaste_ratings', []);
        array_unshift($ratings, $data);
        session(['ecotaste_ratings' => $ratings]);

        return redirect()->route('ecotaste.rating')->with('status', 'Rating konsumen berhasil dikirim.');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('ecotaste_user');
        $request->session()->regenerateToken();

        return redirect()->route('ecotaste.login');
    }
}
