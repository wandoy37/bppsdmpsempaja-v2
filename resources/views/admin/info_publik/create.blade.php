@extends('admin.app')
@section('title')
    Buat Informasi Publik
@endsection

@push('styles')
    <script src="{{ asset('tinymce/js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
@endpush

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-900">Buat Informasi Publik</h1>
        <a href="{{ route('info-publik.index') }}" class="btn btn-secondary">
            <i class="far fa-arrow-alt-circle-left"></i>
            Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4 border-bottom-success shadow">
                <div class="card-body">
                    <form action="{{ route('info-publik.store') }}" method="POST">
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
                            <label class="font-weight-bold text-gray-900">Konten</label>
                            @error('konten')
                                <span class="text-danger font-italic">
                                    <i class="fas fa-exclamation"></i>
                                    {{ $message }}
                                </span>
                            @enderror
                            <textarea id="default" name="konten">{{ old('konten') }}</textarea>
                        </div>
                        <div class="float-right">
                            <button class="btn btn-green" type="submit">
                                <i class="fas fa-plus"></i>
                                Tambah
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        tinymce.init({
            selector: 'textarea#default',
            extended_valid_elements: 'img[class=img-fluid|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name]',
            promotion: false,
            height: 600,
            plugins: [
                'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
                'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen',
                'insertdatetime',
                'media', 'table', 'emoticons', 'help'
            ],
            toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media | forecolor backcolor emoticons',
        });

        // Event Stand alone filemanager
        $('#lfm').filemanager('image');

        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endpush
