<x-main title="Unit Bank | Tambah">

    <h1 class="h3 mb-4 text-gray-800">Edit Unit</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Unit</h6>
        </div>
        <div class="card-body">
            <x-form.form-unit method="PUT" uri="{{ route('unit.update', ['unit' => $unit->kode_unit]) }}" aksi="Edit" :unit="$unit"/>
        </div>
    </div>

</x-main>
