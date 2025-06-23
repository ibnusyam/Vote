<?php

namespace App\Http\Controllers;
use App\Models\Candidate;
use App\Models\Voter;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class VoterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $voters = Voter::with('candidate')->get();
        return view('admin.voters.index', compact('voters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.voters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi awal untuk memastikan textarea tidak kosong
        $request->validate([
            'nims_input' => 'required|string',
        ], [
            'nims_input.required' => 'Daftar NIM tidak boleh kosong.',
            'nims_input.string' => 'Input NIM harus berupa teks.',
        ]);

        // Memecah string NIM menjadi array, menghapus spasi di awal/akhir setiap baris,
        // dan memfilter baris kosong.
        $nims = array_map('trim', explode("\n", $request->input('nims_input')));
        $nims = array_filter($nims); // Menghapus elemen array yang kosong (misal baris kosong)

        $successfulNims = [];
        $failedNims = [];

        foreach ($nims as $nim) {
            // Validasi setiap NIM secara individual
            // Asumsi: 'nim' harus unik, string, dan maks 255 karakter
            $validator = Validator::make(['nim' => $nim], [
                'nim' => 'required|string|max:255|unique:voters,nim',
            ]);

            if ($validator->fails()) {
                // Jika validasi gagal untuk NIM ini, tambahkan ke daftar gagal
                $failedNims[$nim] = $validator->errors()->first('nim');
            } else {
                try {
                    // Buat record voter baru
                    // CATATAN PENTING:
                    // candidate_id dan nama TIDAK diinput dari form ini.
                    // Anda perlu menyesuaikan ini:
                    // 1. Berikan nilai default yang masuk akal (misal: 1 untuk candidate_id)
                    // 2. Atau buat logika untuk mendapatkan nilai ini (misal: dari input tersembunyi, atau dibuat otomatis)
                    // 3. Atau pastikan kolom ini nullable di database jika memang tidak selalu ada.
                    // Berdasarkan tabel Anda, 'candidate_id' dan 'nama' adalah NOT NULL.
                    // Jadi saya akan memberikan nilai placeholder. Sesuaikan ini sesuai kebutuhan Anda.
                    Voter::create([
                        'nim' => $nim,
                    ]);
                    $successfulNims[] = $nim; // Tambahkan ke daftar NIM yang berhasil
                } catch (\Exception $e) {
                    // Tangani error database jika terjadi saat menyimpan voter
                    \Log::error("Gagal menyimpan voter NIM: {$nim}. Error: " . $e->getMessage());
                    $failedNims[$nim] = 'Gagal menyimpan (error database): ' . $e->getMessage();
                }
            }
        }

        // Tangani hasil operasi
        if (!empty($failedNims)) {
            $errorMessage = "Beberapa NIM gagal ditambahkan:\n";
            foreach ($failedNims as $nim => $error) {
                $errorMessage .= "- NIM: {$nim}, Error: {$error}\n";
            }
            // Redirect kembali dengan error dan input lama agar pengguna bisa melihat apa yang salah
            return redirect()->route('voter')
                             ->withErrors(['nims_input' => $errorMessage])
                             ->withInput();
        }

        // Jika semua berhasil atau beberapa berhasil dan sisanya gagal (opsional: bisa juga sukses sebagian)
        if (empty($successfulNims)) {
            return redirect()->route('voter')
                             ->with('error', 'Tidak ada voter yang berhasil ditambahkan. Periksa error di atas.')
                             ->withInput();
        }

        return redirect()->route('voter') // Pastikan 'voter.index' adalah nama route yang benar untuk daftar voter
                         ->with('success', count($successfulNims) . ' voter berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) // Parameter sekarang adalah $id, bukan Voter $voter.
{
    $voter = Voter::findOrFail($id); // Cari model secara manual. Jika tidak ditemukan, akan menghasilkan 404.
    $voter->delete();
    return redirect()->route('voter')->with('success', 'Voter berhasil dihapus.'); // Anda mungkin perlu mengubah ini menjadi 'voters.index' juga, tergantung route index Anda.
}
}
