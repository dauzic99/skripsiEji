<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pegawai;

class Bagian extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
    ];

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }
}
