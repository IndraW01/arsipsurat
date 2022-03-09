<x-main title="Surat Masuk">

    <h1 class="h3 mb-4 text-gray-800">Data Surat Masuk</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Data Surat Masuk</h6>
            <a href="{{ route('surat.masuk.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle fa-fw"></i> Tambah Surat</a>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="searchSurat d-flex">
                    <form action="{{ route('surat.masuk.index') }}" method="GET" class="mr-3">
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

                    <form action="">
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
                            <th>No Surat Masuk</th>
                            <th>Judul Surat Masuk</th>
                            <th>Unit Masuk</th>
                            <th>Nama Pengirim</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Terima</th>
                            <th>Keterangan</th>
                            <th>Berkas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($suratMasuks as $key => $suratMasuk)
                            <tr>
                                <th>{{ $key + $suratMasuks->firstItem() }}</th>
                                <td>{{ $suratMasuk->no_suratmasuk }}</td>
                                <td>{{ $suratMasuk->judul_suratmasuk }}</td>
                                <td>{{ $suratMasuk->unit->nama_unit }}</td>
                                <td>{{ $suratMasuk->nama_pengirim }}</td>
                                <td>{{ \Carbon\Carbon::create($suratMasuk->tanggal_masuk)->isoFormat('D MMMM YYYY') }}</td>
                                <td>{{ \Carbon\Carbon::create($suratMasuk->tanggal_diterima)->isoFormat('D MMMM YYYY') }}</td>
                                <td>{{ $suratMasuk->keterangan }}</td>
                                <td class="text-center">
                                    <form action="{{ route('surat.masuk.download', ['surat_masuk' => $suratMasuk->judul_suratmasuk]) }}" class="d-inline" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success"><i class="fas fa-download"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('surat.masuk.edit', ['surat_masuk' => $suratMasuk->judul_suratmasuk]) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                    <form action="{{ route('surat.masuk.destroy', ['surat_masuk' => $suratMasuk->judul_suratmasuk]) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Yakin menghapus ? ')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center">Surat Masuk Tidak Ada</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end mt-3">
                {{ $suratMasuks->links() }}
            </div>
        </div>
    </div>

</x-main>
