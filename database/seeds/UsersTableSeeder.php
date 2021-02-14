<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name'              => 'user',
            'email'             => 'test@test',
            'password'          => Hash::make('00000000'),
            'remember_token'    => Str::random(10),
        ]);
    }
}
