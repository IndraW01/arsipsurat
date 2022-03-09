<?php

namespace App\Http\Controllers\Surat;

use Exception;
use App\Models\Unit;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SuratMasukRequest;

class SuratMasukController extends Controller
{
    public function index(Request $request)
    {
        return view('SuratMasuk.index', [
            'suratMasuks' => SuratMasuk::latest()->with('unit')->search($request->toArray())
             ->paginate(5)->withQueryString(),
            'units' => Unit::orderBy('nama_unit')->get(),
        ]);
    }

    public function create()
    {
        return view('SuratMasuk.create');
    }

    public function store(SuratMasukRequest $request)
    {
        $validateData = $request->safe()->except('berkas');

        DB::beginTransaction();
        try {
            $berkasValid = $this->upload($request->file('berkas'));
            $validateData['berkas'] = $berkasValid;

            SuratMasuk::create($validateData);

            DB::commit();

        } catch (Exception $exception) {
            return $exception->getMessage();
            DB::rollBack();
        }

        return redirect()->route('surat.masuk.index')->with('success', 'Berhasil Menambah Surat Masuk');

    }

    public function upload($berkas)
    {
        $berkasExtensi = $berkas->getClientOriginalExtension();
        $namaFile = time() . '.' . $berkasExtensi;

        $berkas->storeAs('public/berkas', $namaFile);

        return $namaFile;
    }

    public function show(SuratMasuk $suratMasuk)
    {
        //
    }

    public function edit(SuratMasuk $suratMasuk)
    {
        return view('SuratMasuk.edit', [
            'suratMasuk' => $suratMasuk->load('unit')
        ]);
    }

    public function update(SuratMasukRequest $request, SuratMasuk $suratMasuk)
    {
        $validateData = $request->safe()->except('berkas');

        DB::beginTransaction();
        try {
            if($request->hasFile('berkas')) {
                Storage::delete('public/berkas/' . $suratMasuk->berkas);

                $berkasValid = $this->upload($request->file('berkas'));
            }

            $validateData['berkas'] = $berkasValid ?? $suratMasuk->berkas;

            $suratMasuk->update($validateData);

            DB::commit();

        } catch (Exception $exception) {
            return $exception->getMessage();
            DB::rollBack();
        }

        return redirect()->route('surat.masuk.index')->with('success', 'Berhasil Update Surat Masuk');
    }

    public function destroy(SuratMasuk $suratMasuk)
    {
        Storage::delete('public/berkas/' . $suratMasuk->berkas);

        $suratMasuk->delete();

        return redirect()->route('surat.masuk.index')->with('success', 'Berhasil Menghapus Surat Masuk');
    }

    public function download(SuratMasuk $suratMasuk)
    {
        return Storage::download('public/berkas/' . $suratMasuk->berkas);
    }
}
