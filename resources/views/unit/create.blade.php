<x-main title="Unit Bank | Tambah">

    <h1 class="h3 mb-4 text-gray-800">Tambah Unit</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Unit</h6>
        </div>
        <div class="card-body">
            <x-form.form-unit uri="{{ route('unit.store') }}" :unit=null />
        </div>
    </div>

</x-main>
