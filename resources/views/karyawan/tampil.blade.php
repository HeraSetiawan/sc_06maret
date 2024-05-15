@extends('beranda')
@section('konten')
    @if (session('notif'))
        <div class="alert alert-success mx-3" role="alert">
            <strong><i class="bi bi-bell"></i></strong> {{ session('notif')  }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Data Karyawan</h3>
            <div class="text-end">
                <a href="{{ url('karyawan/buat') }}" class="btn btn-primary">
                    <i class="bi-plus"></i> Buat
                </a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Avatar</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jabatan</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_karyawan as $item)
                            <tr>
                                <td><img src="{{ asset('storage/' . $item->user->avatar) }}" width="45" alt="">
                                </td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->user->email }}</td>
                                <td>{{ $item->jabatan->nama }}</td>
                                <td>
                                    <a href='{{ url("/karyawan/$item->id/edit") }}' class="btn btn-primary"><i
                                            class="bi-pen"></i></a>
                                </td>
                                <td>
                                    <form action='{{ url("/karyawan/$item->id") }}' method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"><i class="bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
