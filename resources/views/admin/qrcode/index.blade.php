@extends('admin.app')
@section('title')
    Qrcode
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Qrcode</h1>
        <a href="{{ route('qrcode.create') }}" class="btn btn-green">
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
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
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
                                    <th class="text-center">Title</th>
                                    <th width="30%" class="text-center">Link</th>
                                    <th width="10%" class="text-center">QRCODE</th>
                                    <th width="20%" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($qrcodes as $qr)
                                    <tr>
                                        <td class="align-middle text-center">{{ $no++ }}</td>
                                        <td class="align-middle">{{ $qr->title }}</td>
                                        <td class="align-middle">
                                            <a href="{{ $qr->link }}">
                                                {{ $qr->title }}
                                            </a>
                                        </td>
                                        <td class="align-middle">
                                            <img src="{{ asset('qrcode/' . $qr->qrcode) }}" class="img-fluid"
                                                alt="">
                                        </td>
                                        <td class="align-middle" class="text-center">
                                            <form action="{{ route('qrcode.destroy', $qr->id) }}" method="POST"
                                                class="form-inline justify-content-center">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Anda yakin ingin menghapus QRCODE ini?')">
                                                    <i class="fas fa-trash"></i>
                                                    Hapus
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
