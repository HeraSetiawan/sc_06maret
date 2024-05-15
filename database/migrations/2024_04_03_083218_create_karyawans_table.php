<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->char('nik',20);
            $table->date('tgl_lahir');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('jabatan_id')->constrained('jabatan');
            $table->enum('kelamin',['L','P']);
            $table->string('provinsi');
            $table->string('kota');
            $table->text('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawan');
    }
};
