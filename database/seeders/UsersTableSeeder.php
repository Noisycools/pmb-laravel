<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'              => 'Administrator',
            'email'             => 'admin@mail.com',
            'no_telp'           => '081122334455',
            'email_verified_at' => now(),
            'password'          => Hash::make('secret'),
            'active'            => 'active',
            'roles_id'          => 3,
            'created_at'        => now(),
            'updated_at'        => now()
        ]);

        DB::table('users')->insert([
            'name'              => 'Aditya Nur Huda',
            'email'             => 'adityanh1604@gmail.com',
            'no_telp'           => '086677889910',
            'email_verified_at' => now(),
            'password'          => Hash::make('asdqwe123'),
            'active'            => 'active',
            'roles_id'          => 1,
            'created_at'        => now(),
            'updated_at'        => now()
        ]);

        DB::table('users')->insert([
            'name'              => 'Staf Penerimaan',
            'email'             => 'staf_penerimaan@mail.com',
            'no_telp'           => '081112131415',
            'email_verified_at' => now(),
            'password'          => Hash::make('asdqwe123'),
            'active'            => 'active',
            'roles_id'          => 2,
            'created_at'        => now(),
            'updated_at'        => now()
        ]);

        DB::table('users')->insert([
            'name'              => 'Pegawai Administrasi',
            'email'             => 'pegawai_administrasi@mail.com',
            'no_telp'           => '081617181920',
            'email_verified_at' => now(),
            'password'          => Hash::make('asdqwe123'),
            'active'            => 'active',
            'roles_id'          => 5,
            'created_at'        => now(),
            'updated_at'        => now()
        ]);
    }
}
