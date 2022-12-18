<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('items')->insert([
            'name' => 'Chicken',
            'price' => '12',
        ]);
        DB::table('items')->insert([
            'name' => 'Meat',
            'price' => '78',
        ]);  
        DB::table('items')->insert([
            'name' => 'Soup',
            'price' => '45',
        ]);  

        DB::table('tables')->insert([
            'table_number' => '1',
        ]);
        DB::table('tables')->insert([
            'table_number' => '2',
        ]);  

        DB::table('tables')->insert([
            'table_number' => '3',
        ]);  
    }
}
