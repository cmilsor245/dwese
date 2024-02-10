<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'product 1',
            'description' => 'description of product 1',
        ]);

        DB::table('products')->insert([
            'name' => 'product 2',
            'description' => 'description of product 2',
        ]);

        DB::table('products')->insert([
            'name' => 'product 3',
            'description' => 'description of product 3',
        ]);
    }
}
