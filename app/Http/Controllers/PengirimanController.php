<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {
    //     // //// Mengambil semua data pengiriman dan mengurutkannya
    //     $pengiriman = Pengiriman::orderBy('created_at', 'asc')->get();
    //     // // Mengembalikan view dengan data pengiriman
    //     return view('pengiriman.index', compact('pengiriman'));

    //     $search = $request->input('search');

    //     // Mengambil data berdasarkan pencarian
    //     if ($search) {
    //         $pengiriman = Pengiriman::where('nama_penerima', 'LIKE', "%{$search}%")
    //             ->orWhere('nama_instansi', 'LIKE', "%{$search}%")
    //             ->orWhere('alamat_penerima', 'LIKE', "%{$search}%")
    //             ->orWhere('jenis_barang', 'LIKE', "%{$search}%")
    //             ->orderBy('created_at', 'desc')
    //             ->get();
    //     } else {
    //         // Jika tidak ada pencarian, kembalikan data kosong
    //         $pengiriman = collect();
    //     }

    //     return view('pengiriman.index', compact('pengiriman'));// Mengembalikan view dengan data pengiriman
    // }

    public function index(Request $request)
    {
        $search = $request->input('search');

        // Mengambil data berdasarkan pencarian
        if ($search) {
            $pengiriman = Pengiriman::where('nama_penerima', 'LIKE', "%{$search}%")
                ->orWhere('nama_instansi', 'LIKE', "%{$search}%")
                ->orWhere('alamat_penerima', 'LIKE', "%{$search}%")
                ->orWhere('jenis_barang', 'LIKE', "%{$search}%")
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            // Jika tidak ada pencarian, ambil semua data
            $pengiriman = Pengiriman::orderBy('created_at', 'asc')->get();
        }

        return view('pengiriman.index', compact('pengiriman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengiriman.create'); // Mengembalikan view untuk form tambah pengiriman

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_penerima' => 'required|string|max:255',
            'nama_instansi' => 'required|string|max:255',
            'alamat_penerima' => 'required|string|max:255',
            'no_tlp' => 'required|string|max:15',
            'jenis_barang' => 'required|string|max:255',
            'keterangan' => 'required|in:Yes,Reg',
            'pic' => 'required|string|max:255',
            'berat' => 'required|numeric',
        ]);

        // Jika validasi gagal, kembali ke form dengan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Menyimpan data pengiriman ke database
        Pengiriman::create($request->all());
        return redirect()->route('pengiriman.index')->with('success', 'Pengiriman berhasil ditambahkan.'); // Redirect ke index dengan pesan sukses
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengiriman $pengiriman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pengiriman = Pengiriman::findOrFail($id); // Mencari pengiriman berdasarkan ID
        return view('pengiriman.edit', compact('pengiriman')); // Mengembalikan view untuk form edit dengan data pengiriman
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //validasi input
        $validator = Validator::make($request->all(), [
            'nama_penerima' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_tlp' => 'required|string|max:15',
            'jenis_barang' => 'required|string|max:255',
            'keterangan' => 'required|in:Yes,Reg',
            'pic' => 'required|string|max:255',
            'berat' => 'required|numeric',
        ]);

        // Jika validasi gagal, kembali ke form dengan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pengiriman = Pengiriman::findOrFail($id); // Mencari pengiriman berdasarkan ID
        $pengiriman->update($request->all()); // Mengupdate data pengiriman
        return redirect()->route('pengiriman.index')->with('success', 'Pengiriman berhasil diperbarui.'); // Redirect ke index dengan pesan sukses
    }

    /**
     * Remove the specified resource from storage.
     */

    //mengahpus data pengiriman berdasarkan ID
    public function destroy($id)
    {

        $pengiriman = Pengiriman::findOrFail($id); // Mencari pengiriman berdasarkan ID
        $pengiriman->delete(); // Menghapus pengiriman
        return redirect()->route('pengiriman.index')->with('success', 'Pengiriman berhasil dihapus.'); // Redirect ke index dengan pesan sukses
    }

    public function exportPDF()
    {
        $pengiriman = Pengiriman::all(); // Ambil semua data pengiriman
        $pdf = PDF::loadView('pengiriman.pdf', compact('pengiriman')); // Load view untuk PDF
        return $pdf->download('pengiriman.pdf'); // Download file PDF
    }
}
