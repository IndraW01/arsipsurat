<?php

namespace App\View\Components\Form;

use App\Models\Unit;
use Illuminate\View\Component;

class FormSuratMasuk extends Component
{
    public $suratMasuk;
    public $uri;
    public $method;
    public $aksi;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($suratMasuk = null, $uri, $method = null, $aksi = null)
    {
        $this->suratMasuk = $suratMasuk ?? '';
        $this->uri = $uri;
        $this->method = $method ?? 'POST';
        $this->aksi = $aksi ?? "Tambah";
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // dd(request()->route('surat_masuk'));
        return view('components.form.form-surat-masuk', [
            'units' => Unit::orderBy('nama_unit')->get()
        ]);
    }
}
