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
                'nama' => 'Kerja Sama',
                'tipe' => 'Benefit',
                'rank' => 2,
            ],
            [
                'nama' => 'Kejujuran',
                'tipe' => 'Benefit',
                'rank' => 3,
            ],
            [
                'nama' => 'Kerapian',
                'tipe' => 'Benefit',
                'rank' => 4,
            ],
            [
                'nama' => 'Absensi',
                'tipe' => 'Cost',
                'rank' => 5,
            ],
            [
                'nama' => 'Kesopanan',
                'tipe' => 'Benefit',
                'rank' => 6,
            ],
            [
                'nama' => 'Prestasi',
                'tipe' => 'Benefit',
                'rank' => 7,
            ],
            [
                'nama' => 'Etika dan Prilaku',
                'tipe' => 'Benefit',
                'rank' => 8,
            ],
            [
                'nama' => 'Loyalitas',
                'tipe' => 'Benefit',
                'rank' => 9,
            ],
            [
                'nama' => 'Komitmen',
                'tipe' => 'Benefit',
                'rank' => 10,
            ],
            [
                'nama' => 'Komunikasi',
                'tipe' => 'Benefit',
                'rank' => 11,
            ],
            [
                'nama' => 'Tanggung Jawab',
                'tipe' => 'Benefit',
                'rank' => 12,
            ],
            [
                'nama' => 'Kemampuan dan Keterampilan',
                'tipe' => 'Benefit',
                'rank' => 13,
            ],
            [
                'nama' => 'Pelanggaran',
                'tipe' => 'Cost',
                'rank' => 14,
            ],

        ];

        DB::table('criterias')->insert($criterion);
    }
}
