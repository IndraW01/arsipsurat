<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $unitEdit = $this->route('unit');

        if($this->method() == 'POST') {
            return [
                'kode_unit' => 'required|max:50|unique:units',
                'nama_unit' => 'required|string|max:255',
                'detail_unit' => 'required'
            ];
        } else {
            return [
                'kode_unit' => 'required|max:50|unique:units,kode_unit,' . $unitEdit->id,
                'nama_unit' => 'required|string|max:255',
                'detail_unit' => 'required'
            ];
        }
    }
}
