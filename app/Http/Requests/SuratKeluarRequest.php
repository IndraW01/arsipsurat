<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SuratKeluarRequest extends FormRequest
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
            'no_suratkeluar' => Str::upper($this->no_suratkeluar),
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
                'no_suratkeluar' => 'required|max:50|unique:surat_keluars',
                'judul_suratkeluar' => 'required',
                'nama_penerima' => 'required|string|max:100',
                'unit_id' => 'required',
                'tujuan' => 'required',
                'tanggal_keluar' => 'required|date',
                'keterangan' => 'required|max:255',
                'berkas' => 'required|file|mimes:png,jpg,jpeg,pdf,doc,docx'
            ];
        } else {
            return [
                'no_suratkeluar' => 'required|max:50|' .  Rule::unique('surat_keluars')->ignore($this->route('surat_keluar')->id),
                'judul_suratkeluar' => 'required',
                'nama_penerima' => 'required|string|max:100',
                'unit_id' => 'required',
                'tujuan' => 'required',
                'tanggal_keluar' => 'required|date',
                'keterangan' => 'required|max:255',
                'berkas' => 'file|mimes:png,jpg,jpeg,pdf,doc,docx'
            ];
        }

    }
}
