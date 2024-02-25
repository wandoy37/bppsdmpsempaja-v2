@extends('admin.app')
@section('title')
    Qrcode
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-900">Buat Qrcode Baru</h1>
        <a href="{{ route('qrcode.index') }}" class="btn btn-secondary">
            <i class="far fa-arrow-alt-circle-left"></i>
            Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4 border-bottom-success shadow">
                <div class="card-body">
                    <form action="{{ route('qrcode.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold text-gray-900">Title</label>
                            @error('title')
                                <span class="text-danger font-italic">
                                    <i class="fas fa-exclamation"></i>
                                    {{ $message }}
                                </span>
                            @enderror
                            <input type="text" name="title" class="form-control" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-gray-900">Link</label>
                            @error('link')
                                <span class="text-danger font-italic">
                                    <i class="fas fa-exclamation"></i>
                                    {{ $message }}
                                </span>
                            @enderror
                            <input type="text" name="link" class="form-control" placeholder="https://. . . .">
                        </div>
                        <button type="submit" class="btn btn-green float-right">
                            <i class="fas fa-plus-circle"></i>
                            Tambah
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
