<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ApiDaerah extends Component
{
    public $provinsiId;

    function provinsi() {
        return Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json")->collect();
    }

    function kota() {
       $id = explode('/',$this->provinsiId)[0];
       $kota = Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/regencies/$id.json")->collect();
       return $kota;
    }

    public function render()
    {
        return view('livewire.api-daerah', [
            'provinsi' => $this->provinsi(),
            'kota'  => $this->kota(),
        ]);
    }
}
