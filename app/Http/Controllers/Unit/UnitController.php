<?php

namespace App\Http\Controllers\Unit;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Requests\UnitRequest;
use Exception;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('unit.index', [
            'units' => Unit::orderBy('nama_unit')->search($request->search)->paginate(5)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitRequest $request)
    {
        $validateData = $request->validated();

        DB::beginTransaction();

        try {
            Unit::create($validateData);

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }

        return redirect()->route('unit.index')->with('success', 'Berhasil Menambah Unit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        return view('unit.edit', [
            'unit' => $unit
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(UnitRequest $request, Unit $unit)
    {
        $validateData = $request->validated();

        try {
            DB::beginTransaction();
            $unit->update($validateData);

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }

        return redirect()->route('unit.index')->with('success', 'Berhasil Mengupdate Unit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();

        return redirect()->route('unit.index')->with('success', 'Berhasil Menghapus Unit');
    }
}
