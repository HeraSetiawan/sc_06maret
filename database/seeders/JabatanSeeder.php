<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jabatan')->insert(
            [
                'nama' => 'Direktur',
                'status' => 'Tetap',
                'gaji' => 15000000,
            ]
        );
        DB::table('jabatan')->insert(
            [
                'nama' => 'Manager',
                'status' => 'Tetap',
                'gaji' => 8000000,
            ]
        );
        DB::table('jabatan')->insert(
            [
                'nama' => 'Staff',
                'status' => 'Kontrak',
                'gaji' => 5500000,
            ]
        );
    }
}
