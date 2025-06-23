<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Voter;
use App\Models\Dashboard;

class DashboardController extends Controller
{
    public function index(){
        $candidate = Candidate::all();
        $dashboard = Dashboard::first();

        return view('dashboard', compact('candidate', 'dashboard'));
    }

    public function about(){

        return view('about');
    }

    public function vote(Request $request)
    {
        $request->validate([
            'candidate' => 'required|exists:candidates,id',
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50',
        ]);

        // Cari voter berdasarkan NIM
        $voter = Voter::where('nim', $request->nim)->first();


        // Jika tidak ditemukan
        if (!$voter) {
            return redirect()->route('dashboard')->with('error', 'NIM tidak ditemukan. Anda belum terdaftar sebagai pemilih.');
        }

        // Jika sudah pernah voting
        if ($voter->status == 'sudah') {
            return redirect()->route('dashboard')->with('error', 'NIM sudah digunakan untuk voting.');
        }

        // Update data voter
            $voter->update([
            'candidate_id' => $request->candidate,
            'nama' => $request->nama,
            'status' => 'sudah',
        ]);



        return redirect()->route('dashboard')->with('success', 'Vote berhasil disimpan.');
    }


}
