<div>
    <div class="mb-3">
        <label class="form-label">NIK</label>
        <input value="{{ $nik }}" readonly required type="text" class="form-control-plaintext" name="nik">
    </div>
    <div class="row mb-3">
        <div class="col">
            <label class="form-label">Email</label>
            <select wire:model='user_id' name="user_id" class="form-select @error('user_id') is-invalid @enderror">
                <option value="null" disabled selected>--Pilih Satu--</option>
                @foreach ($users as $item)
                    <option value="{{ $item->id }}">{{ $item->email }}</option>
                @endforeach
            </select>
            @error('user_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col">
            <label for="" class="form-label">Tanggal Lahir</label>
            <input wire:model='tgl_lahir' type="date" name="tgl_lahir" id=""
                class="form-control  @error('tgl_lahir') is-invalid @enderror">
             @error('tgl_lahir')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>
