<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $criterion = [
            [
                'nama' => 'Disiplin',
                'tipe' => 'Benefit',
                'rank' => 1,
            ],
            
            [
                'nama' => 'Kejujuran',
                'tipe' => 'Benefit',
                'rank' => 2,
            ],
            [
                'nama' => 'Kerapian',
                'tipe' => 'Benefit',
                'rank' => 3,
            ],
            [
                'nama' => 'Absensi',
                'tipe' => 'Cost',
                'rank' => 4,
            ],
            [
                'nama' => 'Kesopanan',
                'tipe' => 'Benefit',
                'rank' => 5,
            ],
            [
                'nama' => 'Prestasi',
                'tipe' => 'Benefit',
                'rank' => 6,
            ],
            
            [
                'nama' => 'Loyalitas',
                'tipe' => 'Benefit',
                'rank' => 7,
            ],
            [
                'nama' => 'Komitmen',
                'tipe' => 'Benefit',
                'rank' => 8,
            ],
            [
                'nama' => 'Komunikasi',
                'tipe' => 'Benefit',
                'rank' => 9,
            ],
            [
                'nama' => 'Tanggung Jawab',
                'tipe' => 'Benefit',
                'rank' => 10,
            ],
            [
                'nama' => 'Kemampuan dan Keterampilan',
                'tipe' => 'Benefit',
                'rank' => 11,
            ],
            [
                'nama' => 'Pelanggaran',
                'tipe' => 'Cost',
                'rank' => 12,
            ],

        ];

        DB::table('criterias')->insert($criterion);
    }
}
