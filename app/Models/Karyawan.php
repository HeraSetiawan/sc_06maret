<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'karyawan';

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function jabatan() {
        return $this->belongsTo(Jabatan::class);
    }

}
