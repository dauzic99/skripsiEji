<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_kelamin',
        'usia',
        'pendapatan',
        'pengeluaran',
        'tinggi_badan',
        'berat_badan',
        'pekerjaan',
        'riwayat',
        'status_nikah',
        'perokok',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
