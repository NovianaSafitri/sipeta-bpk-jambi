<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest; // Memastikan Model Guest dipanggil

class TamuController extends Controller
{
    public function index() {
        return view('index');
    }

    public function alur() {
        return view('alur');
    }

    public function create() {
        return view('form');
    }

    // --- FUNGSI UNTUK MENAMPILKAN HALAMAN ADMIN (DENGAN FITUR REKAP/FILTER) ---
    public function adminIndex(Request $request) {
        $bulan = $request->get('bulan', date('m'));
        $tahun = $request->get('tahun', date('Y'));

        $daftarTamu = Guest::whereMonth('created_at', $bulan)
                            ->whereYear('created_at', $tahun)
                            ->latest()
                            ->get();
        
        return view('admin', compact('daftarTamu', 'bulan', 'tahun'));
    }

    // --- FUNGSI UNTUK SIMPAN DATA DARI FORM TAMU ---
    public function store(Request $request) 
    {
        // 1. Validasi: NIK dihapus, foto_tamu dibuat tidak wajib (nullable)
        $request->validate([
            'nama_lengkap' => 'required',
            'no_whatsapp'  => 'required',
            'asal_instansi'=> 'required',
            'alamat'       => 'required',
            'keperluan'    => 'required',
        ]);

        // 2. Proses simpan: Menghapus kolom 'nik' agar tidak error saat query
        Guest::create([
            'nama_lengkap'   => $request->nama_lengkap,
            'asal_instansi'  => $request->asal_instansi,
            'alamat'         => $request->alamat,
            'no_whatsapp'    => $request->no_whatsapp,
            'keperluan'      => $request->keperluan,
            'pegawai_tujuan' => $request->pegawai_tujuan,
            'unit_kerja'     => $request->unit_kerja,
            'foto_tamu'      => $request->foto_tamu, // Tetap disimpan jika ada, null jika tidak ada
        ]);

        // 3. Kembali ke halaman utama
        return redirect('/')->with('success', 'Data tamu berhasil terkirim ke BPK Jambi!');
    }

    // --- FUNGSI UNTUK MENGHAPUS DATA TAMU ---
    public function destroy($id)
    {
        $tamu = Guest::findOrFail($id);
        $tamu->delete();

        return redirect()->back()->with('success', 'Data tamu berhasil dihapus dari sistem!');
    }
}