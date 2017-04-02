<?php

use Illuminate\Database\Seeder;

class PeliculasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('peliculas')->truncate();

        DB::table('peliculas')->insert([
            'titulo' => 'Ghost in the Shell',
            'categoria' => 'Ficcion',
            'imagen' => 'ghost.jpg',
        ]);

        DB::table('peliculas')->insert([
            'titulo' => 'The Boss Baby',
            'categoria' => 'Animacion',
            'imagen' => 'babyboss.jpg',
        ]);

        DB::table('peliculas')->insert([
            'titulo' => 'Bella y la Bestia',
            'categoria' => 'Animacion',
            'imagen' => 'beautyandbeast.jpg',
        ]);

        DB::table('peliculas')->insert([
            'titulo' => 'Logan',
            'categoria' => 'Accion',
            'imagen' => 'logan.jpg',
        ]);

        DB::table('peliculas')->insert([
            'titulo' => 'CHIPS',
            'categoria' => 'Accion',
            'imagen' => 'chips.jpg',
        ]);
    }
}
