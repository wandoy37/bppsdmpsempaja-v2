@extends('admin.app')
@section('title')
    Buat Postingan Baru
@endsection

@push('styles')
    <script src="{{ asset('tinymce/js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
@endpush

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-900">Buat Postingan Baru</h1>
        <a href="{{ route('postingan.index') }}" class="btn btn-secondary">
            <i class="far fa-arrow-alt-circle-left"></i>
            Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4 border-bottom-success shadow">
                <div class="card-body">
                    <form action="{{ route('postingan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold text-gray-900">Title</label>
                            @error('title')
                                <span class="text-danger font-italic">
                                    <i class="fas fa-exclamation"></i>
                                    {{ $message }}
                                </span>
                            @enderror
                            <input type="text" name="title" class="form-control" placeholder="Title"
                                value="{{ old('title') }}" required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-gray-900">Kategori</label>
                            @error('kategori')
                                <span class="text-danger font-italic">
                                    <i class="fas fa-exclamation"></i>
                                    {{ $message }}
                                </span>
                            @enderror
                            <select class="custom-select custom-select mb-3" name="kategori" required>
                                <option value="">-pilih kategori-</option>
                                @foreach ($kategoris as $kategori)
                                    @if (old('kategori') == $kategori->id)
                                        <option value="{{ $kategori->id }}" selected>{{ $kategori->title }}</option>
                                    @else
                                        <option value="{{ $kategori->id }}">{{ $kategori->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-gray-900">Konten</label>
                            @error('konten')
                                <span class="text-danger font-italic">
                                    <i class="fas fa-exclamation"></i>
                                    {{ $message }}
                                </span>
                            @enderror
                            <textarea id="default" name="konten">{{ old('konten') }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="font-weight-bold text-gray-900">thumbnail</label>
                                    @error('thumbnail')
                                        <span class="text-danger font-italic">
                                            <i class="fas fa-exclamation"></i>
                                            {{ $message }}
                                        </span>
                                    @enderror
                                    <div class="custom-file">
                                        <input type="file" name="thumbnail" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="font-weight-bold text-gray-900">Tanggal</label>
                                    @error('created_at')
                                        <span class="text-danger font-italic">
                                            <i class="fas fa-exclamation"></i>
                                            {{ $message }}
                                        </span>
                                    @enderror
                                    <input type="date" name="created_at" class="form-control" placeholder="created_at"
                                        value="{{ old('created_at') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="float-right">
                            <input type="submit" class="btn btn-info" name="status" value="draft">
                            <input type="submit" class="btn btn-green" name="status" value="publish">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        tinymce.init({
            selector: 'textarea#default',
            promotion: false
        });

        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endpush
