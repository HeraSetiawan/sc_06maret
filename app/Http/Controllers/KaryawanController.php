<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Karyawan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('karyawan.tampil', ['list_karyawan' => $karyawan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawan.buat', [
            'jabatan' => DB::table('jabatan')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $valid = $request->validate(
            [
                'nama' => 'required',
                'nik' => 'required',
                'tgl_lahir' => 'required',
                'user_id' => 'required',
                'jabatan_id' => 'required',
                'kelamin' => 'required',
                'provinsi' => 'required',
                'kota' => 'required',
                'alamat' => 'required',
            ],
            [
                'nama.required' => 'nama wajib di isi',
                'tgl_lahir.required' => 'tanggal lahir wajib di isi',
            ]
        );

        Karyawan::create($valid);

        return redirect('/karyawan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', [
            'karyawan' => $karyawan,
            'jabatan' => \App\Models\Jabatan::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Karyawan::destroy($id);

        return redirect('/karyawan')->with('notif', 'Berhasil Hapus Data');
    }

    public function absen(Request $req)
    {
        // simpan foto
        $foto64 = Str::after($req->foto, ',');
        $foto = base64_decode( $foto64);
        $namaFoto = uniqid().'.jpg';
        Storage::put('Avatars/'.$namaFoto, $foto);

        if ($req->keterangan == "masuk") {
            // absen masuk
            DB::table('absen')->insert(
                [
                    'user_id' => Auth::user()->id,
                    'foto_masuk' => $namaFoto,
                    'lokasi_masuk' => $req->lokasi 
                ]
            );
        } else {
            // absen keluar
            DB::table('absen')->where('user_id', Auth::user()->id)
            ->whereDate('created_at', Carbon::today())
            ->update(
                [
                    'foto_masuk' => $namaFoto,
                    'lokasi_masuk' => $req->lokasi 
                ]
            );
        }
        
        return redirect()->back()->with('pesan', "Berhasil Absen $req->keterangan");
        // lanjutkan dan perbaiki kode hingga berhasil absen masuk dan absen keluar
    }
}

