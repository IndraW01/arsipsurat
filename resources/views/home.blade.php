<x-main>
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

    <div class="row mb-3">
        <!-- Surat Masuk Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Surat Masuk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $suratMasukCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Surat Keluar Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Surat Keluar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $suratKeluarCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Unit Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Unit
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $unitCount }}</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Data Surat Masuk Hari Ini</h6>
                    <a href="{{ route('surat.masuk.index') }}" class="btn btn-primary">Lihat Semua</a>
                </div>
                <div class="card-body">
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
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">Surat Masuk Tidak Ada</td>
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
        </div>
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Data Surat Keluar Hari ini</h6>
                    <a href="{{ route('surat.keluar.index') }}" class="btn btn-primary">Lihat Semua</a>
                </div>
                <div class="card-body">
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
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($suratKeluars as $key => $suratKeluar)
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
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">Surat Keluar Tidak Ada</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        {{ $suratKeluars->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>


