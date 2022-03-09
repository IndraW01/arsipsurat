<?php

namespace App\View\Components\Form;

use App\Models\Unit;
use Illuminate\View\Component;

class FormSuratKeluar extends Component
{
    public $suratKeluar;
    public $uri;
    public $method;
    public $aksi;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($suratKeluar = null, $uri, $method = null, $aksi = null)
    {
        $this->suratKeluar = $suratKeluar ?? '';
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
        return view('components.form.form-surat-keluar', [
            'units' => Unit::orderBy('nama_unit')->get()
        ]);
    }
}
