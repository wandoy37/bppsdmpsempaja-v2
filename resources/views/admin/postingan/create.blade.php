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
                                {{-- <div class="form-group">
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
                                </div> --}}
                                <div class="form-group">
                                    <label class="font-weight-bold text-gray-900">Thumbnail</label>
                                    @error('filepath')
                                        <span class="text-danger font-italic">
                                            <i class="fas fa-exclamation"></i>
                                            {{ $message }}
                                        </span>
                                    @enderror
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button id="lfm" type="button" data-input="data_lfm"
                                                data-preview="holder" class="btn btn-primary">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </button>
                                        </span>
                                        <input id="data_lfm" class="form-control" type="text" name="filepath"
                                            value="{{ old('filepath') }}">
                                    </div>
                                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
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
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        tinymce.init({
            selector: 'textarea#default',
            extended_valid_elements: 'img[class=img-fluid|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name]',
            promotion: false,
            plugins: [
                'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
                'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen',
                'insertdatetime',
                'media', 'table', 'emoticons', 'help'
            ],
            toolbar: 'insertfile undo redo | styles | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media',
            relative_urls: false,
            file_picker_callback: function(callback, value, meta) {
                var x = window.innerWidth || document.documentElement.clientWidth || document
                    .getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document
                    .getElementsByTagName('body')[0].clientHeight;

                var cmsURL = '/filemanager?editor=' + meta.fieldname;
                if (meta.filetype == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.openUrl({
                    url: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.9,
                    height: y * 0.9,
                    resizable: 'yes',
                    close_previous: 'no',
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            }
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
