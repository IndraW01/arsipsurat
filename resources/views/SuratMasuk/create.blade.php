<x-main title="Surat Masuk | Tambah">

    <h1 class="h3 mb-4 text-gray-800">Tambah Surat Masuk</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Surat Masuk</h6>
        </div>
        <div class="card-body">
            <x-form.form-surat-masuk uri="{{ route('surat.masuk.store') }}" :surat-masuk=null />
        </div>
    </div>

</x-main>

