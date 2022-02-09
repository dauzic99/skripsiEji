<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=1; $i <= 37 ; $i++) { 
    		$penilaian = [
            [
                'pegawai_id' => 'Lisa Paramita',
                'criteria_id' => Str::criteria_id('Lisa Paramita', '-'),
                'nilai' => 3,
            ],
            [
                'pegawai_id' => 'Rahmi',
                'criteria_id' => Str::criteria_id('Rahmi', '-'),
                'nilai' => 3,
            ],
            [
                'pegawai_id' => 'Siti Zulaeha',
                'criteria_id' => Str::criteria_id('Siti Zulaeha', '-'),
                'nilai' => 3,
            ],
            [
                'pegawai_id' => 'Wahyudi Bayu',
                'criteria_id' => Str::criteria_id('Wahyudi Bayu', '-'),
                'nilai' => 1,
            ],
            [
                'pegawai_id' => 'Windra Wijaya',
                'criteria_id' => Str::criteria_id('Windra Wijaya', '-'),
                'nilai' => 4,
            ],
            [
                'pegawai_id' => 'Aan Setiawan',
                'criteria_id' => Str::criteria_id('Aan Setiawan', '-'),
                'nilai' => 4,
            ],
            [
                'pegawai_id' => 'Jumry',
                'criteria_id' => Str::criteria_id('Jumry', '-'),
                'nilai' => 4,
            ],
            [
                'pegawai_id' => 'H. Misran',
                'criteria_id' => Str::criteria_id('H. Misran', '-'),
                'nilai' => 5,
            ],
            [
                'pegawai_id' => 'Meryanto',
                'criteria_id' => Str::criteria_id('Meryanto', '-'),
                'nilai' => 1,
            ],
            [
                'pegawai_id' => 'Alamsah',
                'criteria_id' => Str::criteria_id('Alamsah', '-'),
                'nilai' => 1,
            ],
            [
                'pegawai_id' => 'Arni',
                'criteria_id' => Str::criteria_id('Arni', '-'),
                'nilai' => 1,
            ],
            [
                'pegawai_id' => 'Baderi Lamberie',
                'criteria_id' => Str::criteria_id('Baderi Lamberi', '-'),
                'nilai' => 4,
            ],
            


        ];

        DB::table('penilaians')->insert($penilaian);
    	}
        
    }
}
