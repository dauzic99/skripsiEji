<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penilaian;

class Criteria extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'tipe',
    ];

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }
}
