@extends('beranda')
@section('konten')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Form Uppload File</h4>
            <form action="{{ url('profil') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Foto Profil</label>
                    <input type="file" class="form-control" name="avatar" />
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="bi-upload"></i> Upload
                </button>
            </form>
        </div>
    </div>
@endsection
