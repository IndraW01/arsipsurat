<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeSearch($query, $filter)
    {
        return $query->where('nama_unit', 'like', "%$filter%")->orWhere('kode_unit', $filter);
    }
}
