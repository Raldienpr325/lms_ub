<?php

namespace App\Http\Controllers;

use App\Models\Pertemuan;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $data = Quiz::all();
        return view('admin.quiz.index',compact('data'));
    }

    public function create()
    {
        $data = Pertemuan::where('status','=','1')->get();
        return view('admin.quiz.create',compact('data'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $pertanyaan = $request->input('soal');
        $opsi_a = $request->input('opsi_a');
        $opsi_b = $request->input('opsi_b');
        $opsi_c = $request->input('opsi_c');
        $opsi_d = $request->input('opsi_d');
        $kunci_jawaban = $request->input('kunci_jawaban');
        $soalData = [];

        // Loop melalui data pertanyaan dan format data sebelum menyimpannya
        foreach ($pertanyaan as $key => $pertanyaanItem) {
            $soalData[] = [
                'pertanyaan' => $pertanyaanItem,
                'opsi_a' => $opsi_a[$key],
                'opsi_b' => $opsi_b[$key],
                'opsi_c' => $opsi_c[$key],
                'opsi_d' => $opsi_d[$key],
                'kunci_jawaban' => $kunci_jawaban[$key]
            ];
        }

        // // Konversi array soalData menjadi JSON
        // $soalDataJSON = json_encode($soalData);

        // // Menggunakan base64_encode untuk mengonversi ke format yang lebih singkat
        // $soalDataEncoded = base64_encode($soalDataJSON);

        // Simpan data soal dalam bentuk JSON ke dalam field database
        $data = [
            'pertemuan_id' => $request->input('pertemuan'),
            'soal' => json_encode($soalData), // Konversi ke JSON
            'created_at' => now(),
            'updated_at' => now(),
            'jumlah_soal' => count($request->input('soal'))

        ];

        $operation = Quiz::create($data);


        Pertemuan::find($request->input('pertemuan'))->update([
            'status' => 0
        ]);

        if ($operation) {
            return redirect()->route('quiz.index');
        }


    }


    public function destroy($id)
    {

    }
}
