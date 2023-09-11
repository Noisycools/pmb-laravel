<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name'              => 'Calon Mahasiswa',
            'created_at'        => now(),
            'updated_at'        => now()
        ]);

        DB::table('roles')->insert([
            'name'              => 'Staf Penerimaan',
            'created_at'        => now(),
            'updated_at'        => now()
        ]);

        DB::table('roles')->insert([
            'name'              => 'Administrator',
            'created_at'        => now(),
            'updated_at'        => now()
        ]);

        DB::table('roles')->insert([
            'name'              => 'Dosen',
            'created_at'        => now(),
            'updated_at'        => now()
        ]);

        DB::table('roles')->insert([
            'name'              => 'Pegawai Administrasi',
            'created_at'        => now(),
            'updated_at'        => now()
        ]);

        DB::table('roles')->insert([
            'name'              => 'Mahasiswa',
            'created_at'        => now(),
            'updated_at'        => now()
        ]);
    }
}
