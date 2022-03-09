<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d');
    }

    public function getKeteranganAttribute($value)
    {
        return $this->attributes['keterangan'] = Str::limit($value, 25);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function scopeSearch($query, $filter)
    {
        $query->when($filter['search'] ?? false, function($query, $filter) {
            $query->where('judul_suratmasuk', 'like', '%' . $filter . '%');
        });

        $query->when($filter['filter'] ?? false, function($query, $filter) {
            $query->whereHas('unit', function($query) use ($filter) {
                $query->where('nama_unit', $filter);
            });
        });
    }

    static public function suratMasukToday()
    {
        $hari = Carbon::now()->isoFormat('DD');
        $bulan = Carbon::now()->isoFormat('MM');
        $tahun = Carbon::now()->isoFormat('YYYY');

        return self::with('unit')->whereDay('created_at', $hari)->whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->paginate(3)->withQueryString();
    }
}
