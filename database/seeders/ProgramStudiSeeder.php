<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramStudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fakultas Teknologi Informasi dan Komunikasi
        DB::table('program_studi')->insert([
            'nama_program_studi'        => 'Teknik Elektronika',
            'fakultas_jurusan_id'       => 1,
            'created_at'                => now(),
            'updated_at'                => now()
        ]);

        DB::table('program_studi')->insert([
            'nama_program_studi'        => 'Sistem Informasi',
            'fakultas_jurusan_id'       => 1,
            'created_at'                => now(),
            'updated_at'                => now()
        ]);

        DB::table('program_studi')->insert([
            'nama_program_studi'        => 'Jaringan Komputer',
            'fakultas_jurusan_id'       => 1,
            'created_at'                => now(),
            'updated_at'                => now()
        ]);

        DB::table('program_studi')->insert([
            'nama_program_studi'        => 'Keamanan Cyber',
            'fakultas_jurusan_id'       => 1,
            'created_at'                => now(),
            'updated_at'                => now()
        ]);

        // Fakultas Pertanian dan Sumber Daya Alam
        DB::table('program_studi')->insert([
            'nama_program_studi'        => 'Pertanian',
            'fakultas_jurusan_id'       => 2,
            'created_at'                => now(),
            'updated_at'                => now()
        ]);

        DB::table('program_studi')->insert([
            'nama_program_studi'        => 'Kehutanan',
            'fakultas_jurusan_id'       => 2,
            'created_at'                => now(),
            'updated_at'                => now()
        ]);

        DB::table('program_studi')->insert([
            'nama_program_studi'        => 'Peternakan',
            'fakultas_jurusan_id'       => 2,
            'created_at'                => now(),
            'updated_at'                => now()
        ]);

        DB::table('program_studi')->insert([
            'nama_program_studi'        => 'Perikanan',
            'fakultas_jurusan_id'       => 2,
            'created_at'                => now(),
            'updated_at'                => now()
        ]);

        DB::table('program_studi')->insert([
            'nama_program_studi'        => 'Ilmu Tanah',
            'fakultas_jurusan_id'       => 2,
            'created_at'                => now(),
            'updated_at'                => now()
        ]);

        // Fakultas Ilmu Sosial dan Politik
        DB::table('program_studi')->insert([
            'nama_program_studi'        => 'Hubungan Internasional',
            'fakultas_jurusan_id'       => 3,
            'created_at'                => now(),
            'updated_at'                => now()
        ]);

        DB::table('program_studi')->insert([
            'nama_program_studi'        => 'Administrasi Publik',
            'fakultas_jurusan_id'       => 3,
            'created_at'                => now(),
            'updated_at'                => now()
        ]);

        DB::table('program_studi')->insert([
            'nama_program_studi'        => 'Ilmu Keamanan',
            'fakultas_jurusan_id'       => 3,
            'created_at'                => now(),
            'updated_at'                => now()
        ]);

        DB::table('program_studi')->insert([
            'nama_program_studi'        => 'Studi Pembangunan',
            'fakultas_jurusan_id'       => 3,
            'created_at'                => now(),
            'updated_at'                => now()
        ]);

        // Fakultas Seni dan Desain
        DB::table('program_studi')->insert([
            'nama_program_studi'        => 'Hukum Umum',
            'fakultas_jurusan_id'       => 4,
            'created_at'                => now(),
            'updated_at'                => now()
        ]);

        DB::table('program_studi')->insert([
            'nama_program_studi'        => 'Hukum Bisnis',
            'fakultas_jurusan_id'       => 4,
            'created_at'                => now(),
            'updated_at'                => now()
        ]);

        DB::table('program_studi')->insert([
            'nama_program_studi'        => 'Hukum Internasional',
            'fakultas_jurusan_id'       => 4,
            'created_at'                => now(),
            'updated_at'                => now()
        ]);

        DB::table('program_studi')->insert([
            'nama_program_studi'        => 'Hukum Lingkungan',
            'fakultas_jurusan_id'       => 4,
            'created_at'                => now(),
            'updated_at'                => now()
        ]);

        DB::table('program_studi')->insert([
            'nama_program_studi'        => 'Hukum Kesehatan',
            'fakultas_jurusan_id'       => 4,
            'created_at'                => now(),
            'updated_at'                => now()
        ]);
    }
}
