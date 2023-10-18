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
            <h6 class="m-0 font-weight-bold">Manage pertemuan</h6>
            <a href="{{ route('pertemuan.create') }}" class="btn btn-add btn-sm shadow-sm" style="color: white">
                <i class="fas fa-plus"> </i>Add Data
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover m-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pertemuan</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->pertemuan }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a href="{{ route('pertemuan.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- @include('sweetalert::alert') --}}
@endsection
