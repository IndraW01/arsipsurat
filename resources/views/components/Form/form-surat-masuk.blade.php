<form action="{{ $uri }}" method="POST" enctype="multipart/form-data">
    @csrf

    @isset($method)
        @method( $method )
    @endisset

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="no_suratmasuk">No Surat</label>
            <input type="text" class="form-control @error('no_suratmasuk') is-invalid @enderror" name="no_suratmasuk" id="no_suratmasuk" value="{{ old('no_suratmasuk', $suratMasuk->no_suratmasuk ?? '') }}">
            @error('no_suratmasuk')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="judul_suratmasuk">Judul Surat</label>
            <input type="text" class="form-control @error('judul_suratmasuk') is-invalid @enderror" name="judul_suratmasuk" id="judul_suratmasuk" value="{{ old('judul_suratmasuk', $suratMasuk->judul_suratmasuk ?? '') }}">
            @error('judul_suratmasuk')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nama_pengirim">Nama Pengirim</label>
            <input type="text" class="form-control @error('nama_pengirim') is-invalid @enderror" name="nama_pengirim" id="nama_pengirim" value="{{ old('nama_pengirim', $suratMasuk->nama_pengirim ?? '') }}">
            @error('nama_pengirim')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="unit_id">Unit</label>
            <select class="form-control @error('unit_id') is-invalid @enderror" name="unit_id" id="unit_id">
                @foreach ($units as $unit)
                    @if (old('unit_id', $suratMasuk->unit_id ?? '') == $unit->id)
                        <option value="{{ $unit->id }}" selected>{{ $unit->nama_unit }}</option>
                    @else
                        <option value="{{ $unit->id }}">{{ $unit->nama_unit }}</option>
                    @endif
                @endforeach
            </select>
            @error('unit')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="tanggal_masuk">Tanggal Masuk</label>
            <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" name="tanggal_masuk" id="tanggal_masuk" value="{{  old('tanggal_masuk', $suratMasuk->tanggal_masuk ?? Carbon\Carbon::now()->isoFormat('YYYY-MM-DD')) }}">
            @error('tanggal_masuk')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="tanggal_diterima">Tanggal Diterima</label>
            <input type="date" class="form-control @error('tanggal_diterima') is-invalid @enderror" name="tanggal_diterima" id="tanggal_diterima" value="{{ old('tanggal_diterima', $suratMasuk->tanggal_diterima ?? Carbon\Carbon::now()->isoFormat('YYYY-MM-DD')) }}">
            @error('tanggal_diterima')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" rows="3">{{ old('keterangan', $suratMasuk->keterangan ?? '') }}</textarea>
        @error('keterangan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Upload Berkas</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input @error('berkas') is-invalid @enderror" name="berkas" id="myInput" aria-describedby="myInput">
            <label class="custom-file-label" for="myInput">Choose file</label>
            @error('berkas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        </div>

    <button type="submit" class="btn btn-primary">{{ $aksi }}</button>
    <a href="{{ route('surat.masuk.index') }}" class="btn btn-success">Kembali</a>
</form>

@push('my-script')
    <script>

        document.querySelector('.custom-file-input').addEventListener('change',function(e){
            var fileName = document.getElementById("myInput").files[0].name;
            var nextSibling = e.target.nextElementSibling
            nextSibling.innerText = fileName
        })
    </script>
@endpush
