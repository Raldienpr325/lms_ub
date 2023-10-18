<?php

namespace App\Http\Controllers;

use App\Models\Pertemuan;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeatureController extends Controller
{
    public function index()
    {
        $count = User::all()->count();
        return view('dashboard.index',compact('count'));
    }

    public function materi_1()
    {
        $data_1 = Pertemuan::where('pertemuan','=','Pertemuan 1')->get();
        return view('materi.index',compact('data_1'));
    }

    public function quiz_1()
    {

        $data = Quiz::where('pertemuan_id','=','1')->get();
        return view('quiz.index',compact('data'));
    }

    public function nilai_1()
    {
        $data = Quiz::where('pertemuan_id','=','1')->get();
        return view('nilai.index',compact('data'));
    }

    public function soal_quiz_1()
    {
        $data = Quiz::where('pertemuan_id','=','1')->get();
        $list_soal = json_decode($data[0]['soal']);
        return view('quiz.soal-quiz-1',compact('data'));
    }

    public function get_data_quiz_1(){
        $data = Quiz::where('pertemuan_id','=','1')->get();
        $list_soal = json_decode($data[0]['soal']);
        return $list_soal;
    }

    public function submit_data_quiz_1(Request $request)
    {
        $operation['data'] = Quiz::where('pertemuan_id','=','1')->update([
            'jumlah_benar' => $request->jumlah_benar,
            'jumlah_salah' => $request->jumlah_salah,
            'nilai' => ($request->jumlah_benar/($request->jumlah_benar+$request->jumlah_salah))*100,
            'user_id' => Auth::user()->id
        ]);

        return $operation;
    }

}
