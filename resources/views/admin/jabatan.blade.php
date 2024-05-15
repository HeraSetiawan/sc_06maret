@extends('beranda')
@section('konten')
    <div class="col-6 mx-auto mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Jabatan</h4>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Gaji</th>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($jabatan as $jb)
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $jb->nama }}</td>
                                    <td>{{ $jb->status }}</td>
                                    <td>{{ $jb->gaji }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection