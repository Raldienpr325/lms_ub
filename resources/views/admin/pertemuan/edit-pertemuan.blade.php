@extends('admin.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            Input Pertemuan
        </div>
        <div class="card-body">
            <form action="{{ route('pertemuan.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="pertemuan">Pertemuan</label>
                    <input type="text" id="pertemuan" name="pertemuan"
                        class="form-control @error('pertemuan') is-invalid @enderror" placeholder="Pertemuan ke"
                        required autofocus value="{{ $data->pertemuan }}">
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
                           class="form-control @error('pdf_file') is-invalid @enderror">
                    @error('pdf_file')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                @if ($data->pdf_file)
                <div class="form-group">
                    <label>Current PDF File:</label>
                    <embed src="{{ asset('storage/' . $data->pdf_file) }}" type="application/pdf" width="100%" height="100%">
                </div>
                @endif




                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" id="judul" name="judul"
                        class="form-control @error('judul') is-invalid @enderror" placeholder="judul"
                        required autofocus value="{{ $data->judul }}">
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
                        required autofocus value="{{ $data->deskripsi }}">
                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" class="form-control">
                        <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Non-Aktif</option>
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

