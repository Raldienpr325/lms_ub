@extends('admin.dashboard')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .soal-kunci-opsi-container {
        margin-bottom: 20px; /* Atur margin bawah antara setiap elemen soal */
        padding: 10px;
        border: 1px solid #ccc; /* Tambahkan border untuk tampilan yang lebih jelas */
    }

    .hapus-soal {
        margin-top: 10px; /* Atur margin atas untuk tombol "Hapus Soal" */
    }
</style>
@endpush

@section('content')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('quiz.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="pertemuan">Pertemuan</label>
                    <select id="pertemuan" name="pertemuan" class="form-control select2 @error('pertemuan') is-invalid @enderror" required>
                        <option value="">Pilih Pertemuan</option>
                        @foreach ($data as $pertemuan)
                            <option value="{{ $pertemuan->id }}">{{ $pertemuan->pertemuan }}</option>
                        @endforeach
                    </select>
                    @error('pertemuan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div id="soal-container">
                    <!-- Kontainer untuk soal -->
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Save
                </button>
            </form>

            <div class="form-group text-right">
                <button class="btn btn-success mt-2" id="tambah-soal">
                    <i class="fas fa-plus"></i> Tambah Soal
                </button>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        $(document).ready(function() {
            // Inisialisasi select2
            $('.select2').select2();

            // Handler untuk menambahkan soal
            $('#tambah-soal').click(function(e) {
                e.preventDefault();
                tambahSoal();
            });

            function tambahSoal() {
                // Generate a unique name for the radio button group
                var kunciJawabanName = 'kunci_jawaban[' + $('.soal-kunci-opsi-container').length + ']';

                // Create the input elements for the question
                var soalInput = '<div class="soal-kunci-opsi-container form-group"><label for="soal">Soal</label><textarea name="soal[]" class="form-control" required></textarea>';

                // Create the input elements for the answer key (now as radio buttons in a separate div)
                var kunciJawabanInput = '<div class="kunci-jawaban-container"><label>Kunci Jawaban</label>' +
                    '<div class="radio"><input type="radio" name="' + kunciJawabanName + '" value="A" required> A</div>' +
                    '<div class="radio"><input type="radio" name="' + kunciJawabanName + '" value="B" required> B</div>' +
                    '<div class="radio"><input type="radio" name="' + kunciJawabanName + '" value="C" required> C</div>' +
                    '<div class="radio"><input type="radio" name="' + kunciJawabanName + '" value="D" required> D</div></div>';
                var garisPembatas = '<hr>';

                // Create the input elements for options A, B, C, and D
                var opsiAInput = '<label for="opsi_a">Opsi A</label><input type="text" name="opsi_a[]" class="form-control" required>';
                var opsiBInput = '<label for="opsi_b">Opsi B</label><input type="text" name="opsi_b[]" class="form-control" required>';
                var opsiCInput = '<label for="opsi_c">Opsi C</label><input type="text" name="opsi_c[]" class="form-control" required>';
                var opsiDInput = '<label for="opsi_d">Opsi D</label><input type="text" name="opsi_d[]" class="form-control" required>';

                // "Delete Question" button
                var hapusSoalButton = '<button class="btn btn-danger mt-2 hapus-soal"><i class="fas fa-trash"></i> Hapus Soal</button>';

                // Combine question, answer key, options A, B, C, D, and "Delete Question" button elements
                var soalKunciOpsiContainer = soalInput + kunciJawabanInput + garisPembatas + opsiAInput + opsiBInput + opsiCInput + opsiDInput + hapusSoalButton;

                // Add the question, answer key, options, and "Delete Question" button elements to the question container
                $('#soal-container').append(soalKunciOpsiContainer);

                // Add a handler for the "Delete Question" button
                $('.hapus-soal').click(function(e) {
                    e.preventDefault();
                    $(this).parent().remove();
                });
            }



        });
    </script>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush
