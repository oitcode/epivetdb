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
        /* Add first admin user to db. */
        DB::table('users')->insert([
            'name' => 'Admin One',
            'email' => 'admin@epivetdb.gov.np',
            'password' => bcrypt('epivetDbPass12#$'),
            'role' => 'admin',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
