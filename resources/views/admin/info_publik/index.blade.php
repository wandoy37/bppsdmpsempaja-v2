@extends('admin.app')
@section('title')
    Kelola Informasi Publik
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Informasi Publik</h1>
        <a href="{{ route('info-publik.create') }}" class="btn btn-green">
            <i class="fas fa-plus-circle"></i>
            Tambah
        </a>
    </div>

    <div class="row">
        <div class="col-lg-12">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('fails'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle"></i>
                    {{ session('fails') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="myTables" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="5%" class="text-center">No</th>
                                    <th>Title</th>
                                    <th width="10%" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($info_publiks as $info_publik)
                                    <tr>
                                        <td class="text-center align-middle">{{ $no++ }}</td>
                                        <td class="align-middle">{{ $info_publik->title }}</td>
                                        <td class="text-center align-middle">
                                            <form action="{{ route('info-publik.destroy', $info_publik->id) }}"
                                                method="POST" class="form-inline justify-content-center">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('info-publik.edit', $info_publik->id) }}"
                                                    class="btn btn-info btn-sm mr-1">
                                                    <i class="fas fa-pen"></i>
                                                    Edit
                                                </a>
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Anda yakin ingin menghapus informasi publik ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css" />
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#myTables').DataTable();
        });
    </script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
@endpush
