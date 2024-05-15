@extends('beranda')
@section('konten')
    <div class="col-8 mx-auto mt-3">
        <div class="card shadow">
            <div class="card-body">
                <div class="card-title fs-3 fw-bold">Form Tambah Karyawan</div>
                <form action="{{ url('/karyawan') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="masukan nama karyawan">
                        @error('nama')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <livewire:nik-otomatis />
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Jabatan</label>
                                <select name="jabatan_id" id="" class="form-select">
                                    <option disabled selected>--Pilih Jabatan--</option>
                                    @foreach ($jabatan as $jb)
                                        <option value="{{ $jb->id }}">{{ $jb->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Jenis Kelamin</label>
                                <select name="kelamin" id="" class="form-select">
                                    <option disabled selected>--Pilih Jabatan--</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <livewire:api-daerah />
                    <div class="mb-3">
                        <label for="" class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" id="" rows="5"></textarea>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-dark"><i class="bi-plus"></i> Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection