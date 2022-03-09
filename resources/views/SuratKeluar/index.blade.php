<x-main title="Surat Keluar">

    <h1 class="h3 mb-4 text-gray-800">Data Surat Keluar</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Data Surat Keluar</h6>
            <a href="{{ route('surat.keluar.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle fa-fw"></i> Tambah Surat</a>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="searchSurat d-flex">
                    <form action="{{ route('surat.keluar.index') }}" method="GET" class="mr-3">
                        @if (request('filter'))
                            <input type="hidden" name="filter" value="{{ request('filter') }}">
                        @endif
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search Judul Surat Masuk" value="{{ request('search') }}">
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text bg-success text-white" id="basic-addon2"><i class="fas fa-search fa-fw"></i></button>
                            </div>
                        </div>
                    </form>

                    <form action="{{ route('surat.keluar.index') }}" method="GET">
                        @if (request('search'))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif
                        <div class="input-group">
                            <select class="custom-select" name="filter" id="filter" aria-label="Example select with button addon">
                                <option value="">Filter Unit</option>
                                @foreach ($units as $unit)
                                    @if (request('filter') == $unit->nama_unit)
                                        <option value="{{ $unit->nama_unit }}" selected>{{ $unit->nama_unit }}</option>
                                    @else
                                        <option value="{{ $unit->nama_unit }}">{{ $unit->nama_unit }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button class="input-group-text bg-success text-white" type="submit"><i class="fas fa-search fa-fw"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                @if (session()->has('success'))
                    <x-alert.alert>
                        @slot('type', 'success')
                        {{ session('success') }}
                    </x-alert.alert>
                @else
                    <a href="{{ route('surat.keluar.index') }}" class="btn btn-primary"><i class="fas fa-fw fa-undo"></i></a>
                @endif
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Surat Keluar</th>
                            <th>Judul Surat Keluar</th>
                            <th>Unit Pengirim</th>
                            <th>Nama Penerima</th>
                            <th>Tujuan</th>
                            <th>Tanggal Keluar</th>
                            <th>Keterangan</th>
                            <th>Berkas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suratKeluars as $key => $suratKeluar)
                            <tr>
                                <th>{{ $key + $suratKeluars->firstItem() }}</th>
                                <td>{{ $suratKeluar->no_suratkeluar }}</td>
                                <td>{{ $suratKeluar->judul_suratkeluar }}</td>
                                <td>{{ $suratKeluar->unit->nama_unit }}</td>
                                <td>{{ $suratKeluar->nama_penerima }}</td>
                                <td>{{ $suratKeluar->tujuan }}</td>
                                <td>{{ \Carbon\Carbon::create($suratKeluar->tanggal_keluar)->isoFormat('D MMMM YYYY') }}</td>
                                <td>{{ $suratKeluar->keterangan }}</td>
                                <td class="text-center">
                                    <form action="{{ route('surat.keluar.download', ['surat_keluar' => $suratKeluar->judul_suratkeluar]) }}" class="d-inline" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success"><i class="fas fa-download"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('surat.keluar.edit', ['surat_keluar' => $suratKeluar->judul_suratkeluar]) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                    <form action="{{ route('surat.keluar.destroy', ['surat_keluar' => $suratKeluar->judul_suratkeluar]) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Yakin menghapus ? ')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end mt-3">
                {{ $suratKeluars->links() }}
            </div>
        </div>
    </div>

</x-main>
