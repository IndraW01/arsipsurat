<form action="{{ $uri }}" method="POST">
    @csrf

    @isset($method)
        @method( $method )
    @endisset

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="kode_unit">Kode Unit</label>
            <input type="text" class="form-control @error('kode_unit') is-invalid @enderror" name="kode_unit" id="kode_unit" value="{{ old('kode_unit', $unit->kode_unit ?? '') }}">
            @error('kode_unit')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="nama_unit">Nama Unit</label>
            <input type="text" class="form-control @error('nama_unit') is-invalid @enderror" name="nama_unit" id="nama_unit" value="{{ old('nama_unit', $unit->nama_unit ?? '') }}">
            @error('nama_unit')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="detail_unit">Detail Unit</label>
        <textarea class="form-control @error('detail_unit') is-invalid @enderror" name="detail_unit" id="detail_unit" rows="3">{{ old('detail_unit', $unit->detail_unit ?? '') }}</textarea>
        @error('detail_unit')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">{{ $aksi }}</button>
    <a href="{{ route('unit.index') }}" class="btn btn-success">Kembali</a>
</form>
