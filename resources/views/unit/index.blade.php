<x-main title="Unit Bank">

    <h1 class="h3 mb-4 text-gray-800">Data Unit</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Data Unit</h6>
            <a href="{{ route('unit.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle fa-fw"></i> Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <form action="{{ route('unit.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search Unit">
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text bg-success text-white" id="basic-addon2"><i class="fas fa-search fa-fw"></i></button>
                        </div>
                    </div>
                </form>
                @if (session()->has('success'))
                    <x-alert.alert>
                        @slot('type', 'success')
                        {{ session('success') }}
                    </x-alert.alert>
                @endif
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Unit</th>
                            <th>Nama Unit</th>
                            <th>Detail Unit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($units as $key => $unit)
                            <tr>
                                <th>{{ $key + $units->firstItem() }}</th>
                                <td>{{ $unit->kode_unit }}</td>
                                <td>{{ $unit->nama_unit }}</td>
                                <td>{{ $unit->detail_unit }}</td>
                                <td>
                                    <a href="{{ route('unit.edit', ['unit' => $unit->kode_unit]) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                    <form action="{{ route('unit.destroy', ['unit' => $unit->kode_unit]) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Yakin menghapus Unit ? ')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                {{ $units->links() }}
            </div>
        </div>
    </div>

</x-main>
