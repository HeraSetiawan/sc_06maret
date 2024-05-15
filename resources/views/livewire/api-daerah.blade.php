<div class="row">
    <div class="col">
        <div class="mb-3">
            <label for="" class="form-label">Provinsi</label>
            <select wire:model='provinsiId' name="provinsi" id="" class="form-select">
                <option value="null" disabled selected>--Pilih Provinsi--</option>
                @foreach ($provinsi as $prov)
                    <option value="{{ $prov['id'].'/'.$prov['name'] }}">{{ $prov['name'] }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label for="" class="form-label">Kota</label>
            <select name="kota" id="" class="form-select">
                <option disabled selected>--Pilih Kota--</option>
               @foreach ($kota as $k)
                   <option value="{{ $k['name'] }}">{{ $k['name'] }}</option>
               @endforeach
            </select>
        </div>
    </div>
</div>