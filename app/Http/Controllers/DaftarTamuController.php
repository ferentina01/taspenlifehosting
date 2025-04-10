<?php

namespace App\Http\Controllers;

use App\Models\DaftarTamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class DaftarTamuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Mengambil data berdasarkan pencarian
        if ($search) {
            $daftarTamu = DaftarTamu::where('nama_tamu', 'LIKE', "%{$search}%")
                ->orWhere('instansi', 'LIKE', "%{$search}%")
                ->orderBy('tanggal', 'desc') // Atur urutan sesuai kebutuhan
                ->get();
        } else {
            // Jika tidak ada pencarian, ambil semua data
            $daftarTamu = DaftarTamu::orderBy('tanggal', 'desc')->get();
        }

        return view('daftar_tamu.index', compact('daftarTamu'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //mengembalikan view untuk membuat data baru
        return view('daftar_tamu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /// Validasi input
        $validator = Validator::make($request->all(), [
            'barcode' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'nama_tamu' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'pic' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'jam_kedatangan' => 'required|date_format:H:i',
        ]);
        // Jika validasi gagal, kembali ke form dengan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Menyimpan data daftar tamu ke database
        DaftarTamu::create($request->all());
        // Redirect ke index dengan pesan sukses
        return redirect()->route('daftar_tamu.index')->with('success', 'Daftar Tamu berhasil ditambahkan.'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(DaftarTamu $daftarTamu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $daftarTamu = DaftarTamu::findOrFail($id); // Mencari daftar tamu berdasarkan ID
        return view('daftar_tamu.edit', compact('daftarTamu')); // Mengembalikan view untuk form edit dengan data daftar tamu
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'nama_tamu' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'pic' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'jam_kedatangan' => 'required|date_format:H:i',
            
        ]);

        // Jika validasi gagal, kembali ke form dengan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $daftarTamu = DaftarTamu::findOrFail($id); // Mencari daftar tamu berdasarkan ID
        $daftarTamu->update($request->all()); // Mengupdate data daftar tamu
        return redirect()->route('daftar_tamu.index')->with('success', 'Daftar Tamu berhasil diperbarui.'); // Redirect ke index dengan pesan sukses
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $daftarTamu = DaftarTamu::findOrFail($id); // Mencari daftar tamu berdasarkan ID
        $daftarTamu->delete(); // Menghapus daftar tamu
        return redirect()->route('daftar_tamu.index')->with('success', 'Daftar Tamu berhasil dihapus.'); // Redirect ke index dengan pesan sukses
    }

    public function exportPDF()
    {
        $daftarTamu = DaftarTamu::all(); // Ambil semua data daftar tamu
        $pdf = PDF::loadView('daftar_tamu.pdf', compact('daftarTamu')); // Load view untuk PDF
        return $pdf->download('daftar_tamu.pdf'); // Download file PDF
    }
}
