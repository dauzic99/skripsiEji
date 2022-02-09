<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pegawai = [
            [
                'nama' => 'Lisa Paramita',
                'slug' => Str::slug('Lisa Paramita', '-'),
                'bagian_id' => 3,
            ],
            [
                'nama' => 'Rahmi',
                'slug' => Str::slug('Rahmi', '-'),
                'bagian_id' => 3,
            ],
            [
                'nama' => 'Siti Zulaeha',
                'slug' => Str::slug('Siti Zulaeha', '-'),
                'bagian_id' => 3,
            ],
            [
                'nama' => 'Wahyudi Bayu',
                'slug' => Str::slug('Wahyudi Bayu', '-'),
                'bagian_id' => 1,
            ],
            [
                'nama' => 'Windra Wijaya',
                'slug' => Str::slug('Windra Wijaya', '-'),
                'bagian_id' => 4,
            ],
            [
                'nama' => 'Aan Setiawan',
                'slug' => Str::slug('Aan Setiawan', '-'),
                'bagian_id' => 4,
            ],
            [
                'nama' => 'Jumry',
                'slug' => Str::slug('Jumry', '-'),
                'bagian_id' => 4,
            ],
            [
                'nama' => 'H. Misran',
                'slug' => Str::slug('H. Misran', '-'),
                'bagian_id' => 5,
            ],
            [
                'nama' => 'Meryanto',
                'slug' => Str::slug('Meryanto', '-'),
                'bagian_id' => 1,
            ],
            [
                'nama' => 'Alamsah',
                'slug' => Str::slug('Alamsah', '-'),
                'bagian_id' => 1,
            ],
            [
                'nama' => 'Arni',
                'slug' => Str::slug('Arni', '-'),
                'bagian_id' => 1,
            ],
            [
                'nama' => 'Baderi Lamberie',
                'slug' => Str::slug('Baderi Lamberi', '-'),
                'bagian_id' => 4,
            ],
            [
                'nama' => 'Bagas Pangestu',
                'slug' => Str::slug('Bagas Pangestu', '-'),
                'bagian_id' => 2,
            ],
            [
                'nama' => 'Erisandi Saputra',
                'slug' => Str::slug('Erisandi Saputra', '-'),
                'bagian_id' => 1,
            ],
            [
                'nama' => 'Firdaus',
                'slug' => Str::slug('Firdaus', '-'),
                'bagian_id' => 4,
            ],
            [
                'nama' => 'Hendra Asmara',
                'slug' => Str::slug('Hendra Asmara', '-'),
                'bagian_id' => 3,
            ],
            [
                'nama' => 'Muhammad Jalaluddin',
                'slug' => Str::slug('Muhammad Jalaluddin', '-'),
                'bagian_id' => 5,
            ],
            [
                'nama' => 'Samsul',
                'slug' => Str::slug('Samsul', '-'),
                'bagian_id' => 4,
            ],
            [
                'nama' => 'Sukirno',
                'slug' => Str::slug('Sukirno', '-'),
                'bagian_id' => 1,
            ],
            [
                'nama' => 'Suratno',
                'slug' => Str::slug('Suratno', '-'),
                'bagian_id' => 5,
            ],
            [
                'nama' => 'Zulkifli Ghazali',
                'slug' => Str::slug('Zulkifli Ghazali', '-'),
                'bagian_id' => 4,
            ],
            [
                'nama' => 'Regina Apriani Saputri',
                'slug' => Str::slug('Regina Apriani Saputri', '-'),
                'bagian_id' => 1,
            ],
            [
                'nama' => 'Yuda Aprilianto',
                'slug' => Str::slug('Yuda Aprilianto', '-'),
                'bagian_id' => 2,
            ],
            [
                'nama' => 'Helda Rahmah',
                'slug' => Str::slug('Helda Rahmah', '-'),
                'bagian_id' => 3,
            ],
            [
                'nama' => 'Dewi Wahyuni',
                'slug' => Str::slug('Dewi Wahyuni', '-'),
                'bagian_id' => 3,
            ],
            [
                'nama' => 'Fadil Hidayatu Fajri',
                'slug' => Str::slug('Fadil Hidayatu Fajri', '-'),
                'bagian_id' => 1,
            ],
            [
                'nama' => 'Miftahul Arif Hidayah',
                'slug' => Str::slug('Miftahul Arif Hidayah', '-'),
                'bagian_id' => 2,
            ],
            [
                'nama' => 'Muhammad Hidayat',
                'slug' => Str::slug('Muhammad Hidayat', '-'),
                'bagian_id' => 5,
            ],
            [
                'nama' => 'Umardin',
                'slug' => Str::slug('Umardin', '-'),
                'bagian_id' => 4,
            ],

            [
                'nama' => 'Herlinasari',
                'slug' => Str::slug('Herlinasari', '-'),
                'bagian_id' => 3,
            ],
             
            [
                'nama' => 'Muhammad Istianto Yusuf',
                'slug' => Str::slug('Muhammad Istianto Yusuf', '-'),
                'bagian_id' => 3,
            ],
            [
                'nama' => 'Riska',
                'slug' => Str::slug('Riskaf', '-'),
                'bagian_id' => 5,
            ],
            [
                'nama' => 'Zaira Adriani',
                'slug' => Str::slug('Zaira Adriani', '-'),
                'bagian_id' => 4,
            ],
            [
                'nama' => 'Mochammad Ridwan',
                'slug' => Str::slug('Mochammad Ridwan', '-'),
                'bagian_id' => 1,
            ],
            [
                'nama' => 'Eva Indah Purnama',
                'slug' => Str::slug('Eva Indah Purnama', '-'),
                'bagian_id' => 5,
            ],
            [
                'nama' => 'Dini Saputri',
                'slug' => Str::slug('Dini Saputri', '-'),
                'bagian_id' => 3,
            ],
             [
                'nama' => 'Ahmad Muzzaki',
                'slug' => Str::slug('Ahmad Muzzaki', '-'),
                'bagian_id' => 3,
            ],


        ];

        DB::table('pegawais')->insert($pegawai);
    }
}
