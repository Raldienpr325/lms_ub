<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quizzes';

    protected $fillable = [
        'pertemuan_id',
        'jumlah_soal',
        'soal',
        'jumlah_benar',
        'jumlah_salah',
        'nilai'
    ];

    public function pertemuan()
    {
        return $this->belongsTo(Pertemuan::class,'pertemuan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
