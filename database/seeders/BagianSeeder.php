<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BagianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bagian = [
            [
                'nama' => 'Kepegawaian',

            ],
            [
                'nama' => 'Keuangan',

            ],
            [
                'nama' => 'Umum',

            ],
            [
                'nama' => 'Perlengkapan',

            ],
            [
                'nama' => 'IT',

            ],


        ];

        DB::table('bagians')->insert($bagian);
    }
}
