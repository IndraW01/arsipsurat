<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class FormUnit extends Component
{
    public $unit;
    public $uri;
    public $method;
    public $aksi;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($unit = null, $uri, $method = null, $aksi = null)
    {
        $this->unit = $unit ?? '';
        $this->uri = $uri;
        $this->method = $method;
        $this->aksi = $aksi ?? "Tambah";
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.form-unit');
    }
}
