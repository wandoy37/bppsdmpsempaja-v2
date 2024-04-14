@extends('site.layouts.app')

@section('title')
    Informasi Publik {{ $info_publik->title }}
@endsection

@section('content')
    <section class="breadcrumb-background">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="pt-2 breadcrumb-title">Informasi Publik</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('site.beranda') }}">Beranda</a></li>
                            <li class="breadcrumb-item" style="color: white;">Informasi Publik</li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $info_publik->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding section-bg" id="section_2">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="custom-text-box">
                        {!! $info_publik->konten !!}
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
