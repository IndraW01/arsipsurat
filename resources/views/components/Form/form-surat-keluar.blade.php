<form action="{{ $uri }}" method="POST" enctype="multipart/form-data">
    @csrf

    @isset($method)
        @method( $method )
    @endisset

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="no_suratkeluar">No Surat</label>
            <input type="text" class="form-control @error('no_suratkeluar') is-invalid @enderror" name="no_suratkeluar" id="no_suratkeluar" value="{{ old('no_suratkeluar', $suratKeluar->no_suratkeluar ?? '') }}">
            @error('no_suratkeluar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="judul_suratkeluar">Judul Surat</label>
            <input type="text" class="form-control @error('judul_suratkeluar') is-invalid @enderror" name="judul_suratkeluar" id="judul_suratkeluar" value="{{ old('judul_suratkeluar', $suratKeluar->judul_suratkeluar ?? '') }}">
            @error('judul_suratkeluar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nama_penerima">Nama Penerima</label>
            <input type="text" class="form-control @error('nama_penerima') is-invalid @enderror" name="nama_penerima" id="nama_penerima" value="{{ old('nama_penerima', $suratKeluar->nama_penerima ?? '') }}">
            @error('nama_penerima')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="unit_id">Unit</label>
            <select class="form-control @error('unit_id') is-invalid @enderror" name="unit_id" id="unit_id">
                @foreach ($units as $unit)
                    @if (old('unit_id', $suratKeluar->unit_id ?? '') == $unit->id)
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
            <label for="tujuan">Tujuan</label>
            <input type="text" class="form-control @error('tujuan') is-invalid @enderror" name="tujuan" id="tujuan" value="{{ old('tujuan', $suratKeluar->tujuan ?? '') }}">
            @error('tujuan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="tanggal_keluar">Tanggal Keluar</label>
            <input type="date" class="form-control @error('tanggal_keluar') is-invalid @enderror" name="tanggal_keluar" id="tanggal_keluar" value="{{ old('tanggal_keluar', $suratKeluar->tanggal_keluar ?? Carbon\Carbon::now()->isoFormat('YYYY-MM-DD') ?? '') }}">
            @error('tanggal_keluar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" rows="3">{{ old('keterangan', $suratKeluar->keterangan ?? '') }}</textarea>
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
    <a href="{{ route('surat.keluar.index') }}" class="btn btn-success">Kembali</a>
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
