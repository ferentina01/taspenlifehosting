<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //menampilkan surat masuk

    // Menampilkan semua data surat masuk
    // public function index()
    // {
    //     $suratMasuk = SuratMasuk::all(); // Mengambil semua data surat masuk dari database
    //     return view('surat_masuk.index', compact('suratMasuk')); // Mengembalikan view dengan data surat masuk
    // }

    public function index(Request $request)
    {
        $search = $request->input('search');

        // Mengambil data berdasarkan pencarian
        if ($search) {
            $suratMasuk = SuratMasuk::where('perihal', 'LIKE', "%{$search}%")
                ->orWhere('kurir', 'LIKE', "%{$search}%")
                ->orWhere('up', 'LIKE', "%{$search}%")
                ->orderBy('created_at', 'asc')
                ->get();
        } else {
            // Jika tidak ada pencarian, ambil semua data
            $suratMasuk = SuratMasuk::orderBy('created_at', 'asc')->get();
        }

        return view('surat_masuk.index', compact('suratMasuk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('surat_masuk.create'); // Mengembalikan view untuk form tambah surat masuk

    }

    /**
     * Store a newly created resource in storage.
     */
    //simpan data surat masuk baru
    public function store(Request $request)
    {

        // Validasi input
        $validator = Validator::make($request->all(), [
            'perihal' => 'required|string|max:255',
            'kurir' => 'required|string|max:255',
            'up' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'keterangan' => 'required|in:Diterima,Belum Diterima',
        ]);

        // Jika validasi gagal, kembali ke form dengan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Menyimpan data surat masuk ke database
        SuratMasuk::create($request->all());
        // Mengembalikan pesan sukses
        return redirect()->route('surat_masuk.index')->with('success', 'Surat Masuk berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */

    //mengaupdate data surat masuk berdasarkan ID
    public function edit($id)
    {
        //mencari data surat masuk berdasarkan ID
        $suratMasuk = SuratMasuk::findOrFail($id);
        return view('surat_masuk.edit', compact('suratMasuk')); // Mengembalikan view untuk form edit dengan data surat masuk

    }

    /**
     * Update the specified resource in storage.
     */
    // Mengupdate data surat masuk berdasarkan ID
    public function update(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'perihal' => 'required|string|max:255',
            'kurir' => 'required|string|max:255',
            'up' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'tanggal_masuk' => 'required|date',
        ]);

        // Jika validasi gagal, kembali ke form dengan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $suratMasuk = SuratMasuk::findOrFail($id); // Mencari surat masuk berdasarkan ID
        $suratMasuk->update($request->all()); // Mengupdate data surat masuk
        return redirect()->route('surat_masuk.index')->with('success', 'Surat Masuk berhasil diperbarui.'); // Redirect ke index dengan pesan sukses
    }


    /**
     * Remove the specified resource from storage.
     */
    // Menghapus data surat masuk berdasarkan ID
    public function destroy($id)
    {
        // Hapus data
        $suratMasuk = SuratMasuk::findOrFail($id); // Mencari surat masuk berdasarkan ID
        $suratMasuk->delete(); // Menghapus surat masuk
        return redirect()->route('surat_masuk.index')->with('success', 'Surat Masuk berhasil dihapus.'); // Redirect ke index dengan pesan sukses
    }

    public function exportPDF()
    {
        $suratMasuk = SuratMasuk::all(); // Ambil semua data surat masuk
        $pdf = PDF::loadView('surat_masuk.pdf', compact('suratMasuk')); // Load view untuk PDF
        return $pdf->download('surat_masuk.pdf'); // Download file PDF
    }
}
