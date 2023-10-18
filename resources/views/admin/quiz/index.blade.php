@extends('admin.dashboard')

@section('content')

    <style>
        th {
            text-align: center;
            vertical-align: middle;
            font-size: 12px;
            background-color: #1d3557;
            color: #fff;
        }

        td {
            text-align: center;
            vertical-align: middle;
            font-size: 12px;
        }

        .table-actions {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .table-actions a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-delete {
            background-color: #e63946;
            color: #fff;
            border: none;
            padding: 5px 10px;
            font-size: 12px;
            transition: background-color 0.3s ease;
        }

        .btn-delete:hover {
            background-color: #c62828;
        }

        .btn-delete i {
            margin-right: 5px;
        }

        .btn-edit {
            background-color: #457b9d;
            font-size: 12px;
        }

        .btn-add {
            background-color: #2a9d8f;
        }

        .btn-add:hover {
            background-color: #1d3557;
        }

        .card-header {
            background-color: #457b9d;
            color: #fff;
            font-weight: bold;
        }

        .btn-add i,
        .btn-edit i {
            margin-right: 5px;
        }
    </style>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold">Manage Quiz</h6>
            <a href="{{ route('quiz.create') }}" class="btn btn-add btn-sm shadow-sm" style="color: white">
                <i class="fas fa-plus"> </i>Add Data
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover m-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Parent</th>
                            <th>Jumlah Soal</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->pertemuan->pertemuan }}</td>
                                <td>{{ $item->jumlah_soal }}</td>
                                <td>
                                    <a href="{{ route('quiz.edit', $item->id) }}" class="btn btn-primary">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$item->id}}">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                    <button class="btn btn-info" data-toggle="modal" data-target="#detailModal{{ $item->id }}">
                                        <i class="fas fa-info"></i> Detail
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @foreach ($data as $item)
        <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel">Detail Quiz</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Pertemuan: {{ $item->pertemuan->pertemuan }}</p>
                        <p>Jumlah Soal: {{ $item->jumlah_soal }}</p>
                        <!-- Tambahkan informasi lain yang ingin ditampilkan di sini -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
