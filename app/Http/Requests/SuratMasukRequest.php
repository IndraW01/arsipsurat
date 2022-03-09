<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SuratMasukRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'no_suratmasuk' => Str::upper($this->no_suratmasuk),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->method() == 'POST') {
            return [
                'no_suratmasuk' => 'required|max:50|unique:surat_masuks',
                'judul_suratmasuk' => 'required',
                'nama_pengirim' => 'required|string|max:100',
                'unit_id' => 'required',
                'tanggal_masuk' => 'required|date|before:tanggal_diterima',
                'tanggal_diterima' => 'required|date|after:tanggal_masuk',
                'keterangan' => 'required|max:255',
                'berkas' => 'required|file|mimes:png,jpg,jpeg,pdf,doc,docx'
            ];
        } else {
            return [
                'no_suratmasuk' => 'required|max:50|' .  Rule::unique('surat_masuks')->ignore($this->route('surat_masuk')->id),
                'judul_suratmasuk' => 'required',
                'nama_pengirim' => 'required|string|max:100',
                'unit_id' => 'required',
                'tanggal_masuk' => 'required|date|before:tanggal_diterima',
                'tanggal_diterima' => 'required|date|after:tanggal_masuk',
                'keterangan' => 'required|max:255',
                'berkas' => 'file|mimes:png,jpg,jpeg,pdf,doc,docx'
            ];
        }

    }
}
