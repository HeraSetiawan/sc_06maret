@extends('beranda')
@section('konten')
    <div class="row justify-content-center mt-5">
        <div class="col-5">
            <h1>Aplikasi Presensi</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Assumenda ea et voluptates deleniti dolores quam suscipit distinctio. Dolor, officia nesciunt?</p>
            <a href="" class="btn btn-primary btn-lg">
                <i class="bi-camera"></i>
            </a>
        </div>
        <div class="col-4">
            <img src="{{ asset('beranda_img.png') }}" alt="">
        </div>
    </div>
@endsection