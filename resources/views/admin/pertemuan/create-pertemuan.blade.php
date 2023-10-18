@extends('admin.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            Input Pertemuan
        </div>
        <div class="card-body">
            <form action="{{ route('pertemuan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="pertemuan">Pertemuan</label>
                    <input type="text" id="pertemuan" name="pertemuan"
                        class="form-control @error('pertemuan') is-invalid @enderror" placeholder="Pertemuan ke"
                        required autofocus>
                    @error('pertemuan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="video_file">Video File</label>
                    <input type="file" id="video_file" name="video_file"
                           class="form-control @error('video_file') is-invalid @enderror">
                    @error('video_file')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div> --}}
                <div class="form-group">
                    <label for="pdf_file">PDF File</label>
                    <input type="file" id="pdf_file" name="pdf_file"
                           class="form-control @error('pdf_file') is-invalid @enderror" accept=".pdf">
                    @error('pdf_file')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" id="judul" name="judul"
                        class="form-control @error('judul') is-invalid @enderror" placeholder="judul"
                        required autofocus>
                    @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" id="deskripsi" name="deskripsi"
                        class="form-control @error('deskripsi') is-invalid @enderror" placeholder="deskripsi"
                        required autofocus >
                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" class="form-control">
                        <option value="1">Aktif</option>
                        <option value="0">Non-Aktif</option>
                    </select>
                </div>

                <div class="form-group text-right">
                    <button class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
    {{-- @include('sweetalert::alert') --}}
@endsection
