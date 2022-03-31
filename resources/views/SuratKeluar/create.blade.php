<x-main title="Surat Keluar | Tambah">

    <h1 class="h3 mb-4 text-gray-800">Tambah Surat Keluar</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Surat Keluar</h6>
        </div>
        <div class="card-body">
            <x-form.form-surat-keluar uri="{{ route('surat.keluar.store') }}" :surat-keluar=null />
        </div>
    </div>

</x-main>

