<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Penilaian;
use App\Models\Bagian;

class Pegawai extends Model
{
    use Sluggable;
    use HasFactory;
    protected $fillable = [
        'nama',
        'bagian_id',
        'cover',
    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }

    public function bagian()
    {
        return $this->belongsTo(Bagian::class);
    }
}
