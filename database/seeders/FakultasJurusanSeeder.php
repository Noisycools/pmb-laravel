<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FakultasJurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fakultas_jurusan')->insert([
            'nama_fakultas_jurusan'     => 'Fakultas Teknologi Informasi dan Komunikasi',
            'created_at'                => now(),
            'updated_at'                => now()
        ]);

        DB::table('fakultas_jurusan')->insert([
            'nama_fakultas_jurusan'     => 'Fakultas Pertanian dan Sumber Daya Alam',
            'created_at'                => now(),
            'updated_at'                => now()
        ]);

        DB::table('fakultas_jurusan')->insert([
            'nama_fakultas_jurusan'     => 'Fakultas Ilmu Sosial dan Politik',
            'created_at'                => now(),
            'updated_at'                => now()
        ]);

        DB::table('fakultas_jurusan')->insert([
            'nama_fakultas_jurusan'     => 'Fakultas Seni dan Desain',
            'created_at'                => now(),
            'updated_at'                => now()
        ]);
    }
}
