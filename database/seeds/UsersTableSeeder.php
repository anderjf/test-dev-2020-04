<?php

use Illuminate\Database\Seeder;

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
            'name' => 'Test Dev',
            'email' => 'test@test.com',
            'password' => Hash::make('123456'),
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()'),
        ]);
    }
}
