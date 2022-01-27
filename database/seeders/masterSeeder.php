<?php

namespace Database\Seeders;

use DB;
use Hash;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class masterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => Uuid::uuid4(),
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('mst_menu')->insert(
            array(
                [
                    'id' => Uuid::uuid4(),
                    'name' => 'Home',
                    'url' => 'home',
                    'icon' => 'fas fa-fw fa-user',
                    'child' => null,
                    'aktif' => true,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ], 
                [
                    'id' => Uuid::uuid4(),
                    'name' => 'Dashboard',
                    'url' => 'home',
                    'icon' => 'fas fa-fw fa-user',
                    'child' => null,
                    'aktif' => true,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ),
        );
    }
}
