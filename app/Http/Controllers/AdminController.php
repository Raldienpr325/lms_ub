<?php

namespace App\Http\Controllers;

use App\Models\Pertemuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function login_admin()
    {
        return view('admin.login');
    }

    public function handleAdmin(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'is_admin' => 1, // Hanya admin dengan is_admin = 1 yang akan diotentikasi
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard-admin');
        } else {
            return redirect()->route('login_admin')->with('error', 'Email atau Password Salah!');
        }
    }

    public function DashboardAdmin()
    {
        return view('admin.dashboard');
    }

    public function index()
    {
        $data = Pertemuan::all();
        return view('admin.pertemuan.index',compact('data'));
    }


    public function create()
    {
        return view('admin.pertemuan.create-pertemuan');
    }


    public function store(Request $request)
    {
        $pdfFileName = $request->file('pdf_file')->store('public/pdf_files_pertemuan_1');

        $data = [
            'pdf_file' => $pdfFileName,
            'pertemuan' => $request->input('pertemuan'),
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
            'status' => $request->input('status'),
        ];

        Pertemuan::create($data);

        return redirect()->route('pertemuan.index');
    }

    public function edit($id)
    {
        $data = Pertemuan::find($id);
        return view('admin.pertemuan.edit-pertemuan',compact('data'));
    }

    public function update(Request $request, $id)
{
    $pertemuan = Pertemuan::find($id);

    if (!$pertemuan) {
        return redirect('pertemuan')->with('error', 'Data tidak ditemukan.');
    }

    // Periksa apakah ada file PDF baru yang diunggah
    if ($request->hasFile('pdf_file')) {
        // Validasi file baru (opsional)
        $request->validate([
            'pdf_file' => 'nullable|mimes:pdf',
        ]);

        // Simpan file PDF baru
        $newPdfFile = $request->file('pdf_file')->store('public/pdf_files_pertemuan_1');

        // Hapus file PDF lama (jika ada)
        if ($pertemuan->pdf_file) {
            Storage::delete($pertemuan->pdf_file);
        }

        // Update kolom 'pdf_file' dalam basis data
        $pertemuan->update(['pdf_file' => $newPdfFile]);
    }

    // Update data selain file PDF
    $pertemuan->update([
        'pertemuan' => $request->input('pertemuan'),
        'judul' => $request->input('judul'),
        'deskripsi' => $request->input('deskripsi'),
        'status' => $request->input('status'),
    ]);

    return redirect('pertemuan')->with('success', 'Data berhasil diperbarui.');
}


}
