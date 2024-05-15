<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class NikOtomatis extends Component
{

    public $tgl_lahir;
    public $user_id;

    public function nikOtomatis(){
        $nik = str_replace('-','', $this->tgl_lahir).$this->user_id;
        return $nik;
    }

    public function render()
    {
        return view('livewire.nik-otomatis', [
            'users' => User::all(),
            'nik' => $this->nikOtomatis(),
        ]);
    }
}
