@extends('admin.app')
@section('title')
    DASHBOARD
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Kategori</h1>
        <a href="{{ route('kategori.create') }}" class="btn btn-green">
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
                        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="5%" class="text-center">No</th>
                                    <th>Title</th>
                                    <th width="20%" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($kategoris as $kategori)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>{{ $kategori->title }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST"
                                                class="form-inline justify-content-center">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('kategori.edit', $kategori->id) }}"
                                                    class="btn btn-info btn-sm mr-1">
                                                    <i class="fas fa-pen"></i>
                                                    Edit
                                                </a>
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Anda yakin ingin menghapus kategori ini? kategori yang di hapus akan menghapus postingan')">
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
            $('#myTable').DataTable();
        });
    </script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
@endpush
