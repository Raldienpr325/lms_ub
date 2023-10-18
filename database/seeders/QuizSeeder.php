<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Quiz::create([
            'id' => 1,
            'pertemuan_id' => 1,
            'jumlah_soal' => 5,
            'user_id' => 1,
            'soal' => '[{"pertanyaan":"1","opsi_a":"1","opsi_b":"1","opsi_c":"1","opsi_d":"1","kunci_jawaban":"A"},{"pertanyaan":"siapa namamu","opsi_a":"s","opsi_b":"s","opsi_c":"s","opsi_d":"s","kunci_jawaban":"C"},{"pertanyaan":"siapa namamu","opsi_a":"s","opsi_b":"s","opsi_c":"s","opsi_d":"s","kunci_jawaban":"B"},{"pertanyaan":"siapa namamu","opsi_a":"s","opsi_b":"d","opsi_c":"s","opsi_d":"d","kunci_jawaban":"B"},{"pertanyaan":"siapa namamu","opsi_a":"A","opsi_b":"b","opsi_c":"c","opsi_d":"d","kunci_jawaban":"B"}]'
        ]);
    }
}
