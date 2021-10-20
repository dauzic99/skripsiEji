<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pegawai;
use App\Models\Criteria;

class Penilaian extends Model
{
    use HasFactory;
    protected $fillable = [
        'pegawai_id',
        'criteria_id',
        'nilai',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }
}
