<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Penilaian;

class Pegawai extends Model
{
    use Sluggable;
    use HasFactory;
    protected $fillable = [
        'nama',
        'bagian',
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
}
