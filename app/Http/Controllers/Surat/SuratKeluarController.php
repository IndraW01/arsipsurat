<?php

namespace App\Http\Controllers\Surat;

use Exception;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SuratKeluarRequest;
use App\Models\Unit;

class SuratKeluarController extends Controller
{
    public function index(Request $request)
    {
        return view('SuratKeluar.index', [
            'suratKeluars' => SuratKeluar::latest()->with('unit')->search($request->toArray())
            ->paginate(5)->withQueryString(),
           'units' => Unit::orderBy('nama_unit')->get(),
        ]);
    }

    public function create()
    {
        return view('SuratKeluar.create');
    }

    public function store(SuratKeluarRequest $request)
    {
        $validateData = $request->safe()->except('berkas');

        DB::beginTransaction();
        try {
            $berkasValid = $this->upload($request->file('berkas'));
            $validateData['berkas'] = $berkasValid;

            SuratKeluar::create($validateData);

            DB::commit();

        } catch (Exception $exception) {
            return $exception->getMessage();
            DB::rollBack();
        }

        return redirect()->route('surat.keluar.index')->with('success', 'Berhasil Menambah Surat Keluar');
    }

    public function upload($berkas)
    {
        $berkasExtensi = $berkas->getClientOriginalExtension();
        $namaFile = time() . '.' . $berkasExtensi;

        $berkas->storeAs('public/berkas', $namaFile);

        return $namaFile;
    }

    public function show(SuratKeluar $suratKeluar)
    {
        //
    }

    public function edit(SuratKeluar $suratKeluar)
    {
        return view('SuratKeluar.edit', [
            'suratKeluar' => $suratKeluar->load('unit')
        ]);
    }

    public function update(SuratKeluarRequest $request, SuratKeluar $suratKeluar)
    {
        $validateData = $request->safe()->except('berkas');

        DB::beginTransaction();
        try {
            if($request->hasFile('berkas')) {
                Storage::delete('public/berkas/' . $suratKeluar->berkas);

                $berkasValid = $this->upload($request->file('berkas'));
            }

            $validateData['berkas'] = $berkasValid ?? $suratKeluar->berkas;

            $suratKeluar->update($validateData);

            DB::commit();

        } catch (Exception $exception) {
            return $exception->getMessage();
            DB::rollBack();
        }

        return redirect()->route('surat.keluar.index')->with('success', 'Berhasil Update Surat Keluar');
    }

    public function destroy(SuratKeluar $suratKeluar)
    {
        Storage::delete('public/berkas/' . $suratKeluar->berkas);

        $suratKeluar->delete();

        return redirect()->route('surat.keluar.index')->with('success', 'Berhasil Menghapus Surat Keluar');
    }

    public function download(SuratKeluar $suratKeluar)
    {
        return Storage::download('public/berkas/' . $suratKeluar->berkas);
    }
}
