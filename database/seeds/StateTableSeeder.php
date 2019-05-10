<?php

use Illuminate\Database\Seeder;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Add states to db.
         */
        DB::table('state')->insert([
            'name' => 'State 1',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'comment' => 'State number 1',
        ]);
        DB::table('state')->insert([
            'name' => 'State 2',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'comment' => 'State number 2',
        ]);
        DB::table('state')->insert([
            'name' => 'State 3',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'comment' => 'State number 3',
        ]);
        DB::table('state')->insert([
            'name' => 'State 4',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'comment' => 'State number 4',
        ]);
        DB::table('state')->insert([
            'name' => 'State 5',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'comment' => 'State number 5',
        ]);
        DB::table('state')->insert([
            'name' => 'State 6',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'comment' => 'State number 6',
        ]);
        DB::table('state')->insert([
            'name' => 'State 7',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'comment' => 'State number 7',
        ]);
    }
}
