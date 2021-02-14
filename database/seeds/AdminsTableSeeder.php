<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admins')->insert([
            'name'              => 'admin',
            'email'             => 'test@test',
            'password'          => Hash::make('00000000'),
            'remember_token'    => Str::random(10),
        ]);
    }
}
