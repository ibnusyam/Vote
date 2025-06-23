<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Voter;

class AdminController extends Controller
{
    public function index(){
        $candidate = Candidate::all();
        $jumlahKandidat = Candidate::count();
        $jumlahPemilih = Voter::count();
        $sudahMemilih = Voter::where('status', 'sudah')->count();
        $belumMemilih = Voter::where('status', 'belum')->count();
        $voteCounts = Voter::select('candidate_id')
        ->whereIn('candidate_id', [1, 2, 3])
        ->selectRaw('COUNT(*) as total')
        ->groupBy('candidate_id')
        ->pluck('total', 'candidate_id'); // hasil: [1 => 5, 2 => 7, 3 => 3]

        return view('admin', compact(
            'jumlahKandidat',
            'jumlahPemilih',
            'sudahMemilih',
            'belumMemilih',
            'candidate',
            'voteCounts'
        ));
    }

     // Menampilkan semua kandidat
    public function candidates()
    {
        $candidates = Candidate::all();
        return view('admin.candidates.index', compact('candidates'));
    }

    // Menampilkan form tambah kandidat
    public function createCandidate()
    {
        return view('admin.candidates.create');
    }

    public function storeCandidate(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama'     => 'required|string|max:255',
            'npm'      => 'required|string|max:255',
            'umur'     => 'required|integer',
            'fakultas' => 'required|string|max:255',
            'prodi'    => 'required|string|max:255',
            'moto'     => 'nullable|string|max:255',
            'misi'     => 'nullable|string',
            'visi'     => 'nullable|string',
            'photo'    => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Ambil semua data yang divalidasi
        $data = $request->only([
            'nama', 'npm', 'umur', 'fakultas', 'prodi', 'moto', 'misi', 'visi'
        ]);

        // Simpan foto dengan nama asli + timestamp
        if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $filename = $file->getClientOriginalName(); // Misal: sarjono.jpg
        $file->move(public_path('photos'), $filename); // Simpan ke public/photos
        $data['photo'] = $filename;
        }


        // Simpan ke database
        Candidate::create($data);

        return redirect()->route('candidate')->with('success', 'Kandidat berhasil disimpan.');
    }

    public function editCandidate($id)
{
    $candidate = Candidate::findOrFail($id);
    return view('admin.candidates.edit', compact('candidate'));
}

public function updateCandidate(Request $request, $id)
{
    $candidate = Candidate::findOrFail($id);

    // Validasi input
    $request->validate([
        'nama'     => 'required|string|max:255',
        'npm'      => 'required|string|max:255',
        'umur'     => 'required|integer',
        'fakultas' => 'required|string|max:255',
        'prodi'    => 'required|string|max:255',
        'moto'     => 'nullable|string|max:255',
        'misi'     => 'nullable|string',
        'visi'     => 'nullable|string',
        'photo'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Ambil input yang valid
    $data = $request->only([
        'nama', 'npm', 'umur', 'fakultas', 'prodi', 'moto', 'misi', 'visi'
    ]);

    // Jika ada file foto baru diunggah
    if ($request->hasFile('photo')) {
        // Hapus foto lama
        if ($candidate->photo && file_exists(public_path($candidate->photo))) {
            unlink(public_path($candidate->photo));
        }

        // Simpan foto baru
        $file = $request->file('photo');
        $filename = $file->getClientOriginalName(); // pakai nama asli
        $path = $filename;
        $file->move(public_path('photos'), $filename);

        $data['photo'] = $path;
    }

    // Update data
    $candidate->update($data);

    return redirect()->route('candidate')->with('success', 'Kandidat berhasil diperbarui.');
}



    public function deleteCandidate($id)
{
    $candidate = Candidate::findOrFail($id);

    if ($candidate->photo) {
        $photoPath = public_path($candidate->photo);
        if (file_exists($photoPath)) {
            unlink($photoPath);
        }
    }

    $candidate->delete();

    return redirect()->route('candidate')->with('success', 'Kandidat berhasil dihapus.');
}

    public function voters(){

        $voters = Candidate::all();
        return view('admin.voters.index', compact('voters'));

    }

}
