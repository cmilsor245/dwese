<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            'nombre' => 'ropa'
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'comida'
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'test'
        ]);
    }
}
