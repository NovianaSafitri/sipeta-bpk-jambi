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

    // --- FUNGSI UNTUK MENAMPILKAN HALAMAN ADMIN ---
    public function adminIndex() {
        // Mengambil semua data tamu dan diurutkan dari yang terbaru (latest)
        $daftarTamu = Guest::latest()->get();
        
        // Mengirim data tamu ke view admin.blade.php
        return view('admin', compact('daftarTamu'));
    }

    // --- FUNGSI UNTUK SIMPAN DATA DARI FORM TAMU ---
    public function store(Request $request) 
    {
        // 1. Validasi data agar tidak ada yang kosong
        $request->validate([
            'nik' => 'required',
            'nama_lengkap' => 'required',
            'no_whatsapp' => 'required',
            'foto_tamu' => 'required', 
        ]);

        // 2. Proses simpan ke database menggunakan Model Guest
        Guest::create([
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,
            'asal_instansi' => $request->asal_instansi,
            'alamat' => $request->alamat,
            'no_whatsapp' => $request->no_whatsapp,
            'keperluan' => $request->keperluan,
            'pegawai_tujuan' => $request->pegawai_tujuan,
            'unit_kerja' => $request->unit_kerja,
            'foto_tamu' => $request->foto_tamu, // Menyimpan string Base64 dari kamera
        ]);

        // 3. Kembali ke halaman utama dengan pesan sukses
        return redirect('/')->with('success', 'Data tamu dan foto berhasil dikirim ke BPK Jambi!');
    }

    // --- FUNGSI UNTUK MENGHAPUS DATA TAMU (TAMBAHAN BARU) ---
    public function destroy($id)
    {
        // Mencari data tamu berdasarkan ID, jika tidak ketemu akan error 404
        $tamu = Guest::findOrFail($id);
        
        // Menghapus data dari database
        $tamu->delete();

        // Kembali ke halaman admin dengan pesan sukses hapus
        return redirect()->back()->with('success', 'Data tamu berhasil dihapus dari sistem!');
    }
}