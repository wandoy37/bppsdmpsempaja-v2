@extends('admin.app')
@section('title')
    Pengguna Baru
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-900">Tambah Pengguna Baru</h1>
        <a href="{{ route('pengguna.index') }}" class="btn btn-secondary">
            <i class="far fa-arrow-alt-circle-left"></i>
            Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4 border-bottom-success shadow">
                <div class="card-body">
                    <form action="{{ route('pengguna.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold text-gray-900">Username</label>
                            @error('username')
                                <span class="text-danger font-italic">
                                    <i class="fas fa-exclamation"></i>
                                    {{ $message }}
                                </span>
                            @enderror
                            <input type="text" name="username" class="form-control" placeholder="Username"
                                value="{{ old('username') }}">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-gray-900">Email</label>
                            @error('email')
                                <span class="text-danger font-italic">
                                    <i class="fas fa-exclamation"></i>
                                    {{ $message }}
                                </span>
                            @enderror
                            <input type="email" name="email" class="form-control" placeholder="Email"
                                value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-gray-900">Password</label>
                            @error('password')
                                <span class="text-danger font-italic">
                                    <i class="fas fa-exclamation"></i>
                                    {{ $message }}
                                </span>
                            @enderror
                            <div class="input-group mb-3" id="show_hide_password">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <div class="input-group-append">
                                    <span class="input-group-text" type="button">
                                        <i class="fa fa-eye-slash"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-gray-900">Password Confirmation</label>
                            @error('password_confirmation')
                                <span class="text-danger font-italic">
                                    <i class="fas fa-exclamation"></i>
                                    {{ $message }}
                                </span>
                            @enderror
                            <div class="input-group mb-3" id="show_hide_confirmation">
                                <input type="password" class="form-control" name="password_confirmation"
                                    placeholder="Password Confirmation">
                                <div class="input-group-append">
                                    <span class="input-group-text" type="button">
                                        <i class="fa fa-eye-slash"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-gray-900">Role</label>
                            @error('role')
                                <span class="text-danger font-italic">
                                    <i class="fas fa-exclamation"></i>
                                    {{ $message }}
                                </span>
                            @enderror
                            <select class="form-control" name="role">
                                <option value="">-pilih role-</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>admin</option>
                                <option value="operator" {{ old('role') == 'operator' ? 'selected' : '' }}>operator
                                </option>
                            </select>
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

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#show_hide_confirmation span").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_confirmation input').attr("type") == "text") {
                    $('#show_hide_confirmation input').attr('type', 'password');
                    $('#show_hide_confirmation i').addClass("fa-eye-slash");
                    $('#show_hide_confirmation i').removeClass("fa-eye");
                } else if ($('#show_hide_confirmation input').attr("type") == "password") {
                    $('#show_hide_confirmation input').attr('type', 'text');
                    $('#show_hide_confirmation i').removeClass("fa-eye-slash");
                    $('#show_hide_confirmation i').addClass("fa-eye");
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#show_hide_password span").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("fa-eye-slash");
                    $('#show_hide_password i').removeClass("fa-eye");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("fa-eye-slash");
                    $('#show_hide_password i').addClass("fa-eye");
                }
            });
        });
    </script>
@endpush
