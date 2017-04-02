<?php

use Illuminate\Database\Seeder;

class ValoracionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('valoraciones')->truncate();
        DB::table('valoraciones')->insert([
            'id_pelicula' => '3',
            'id_user' => '1',
            'fecha' => '2017-04-02',
            'valoracion' => '0',
        ]);

        DB::table('valoraciones')->insert([
            'id_pelicula' => '5',
            'id_user' => '1',
            'fecha' => '2017-04-02',
            'valoracion' => '6',
        ]);

        DB::table('valoraciones')->insert([
            'id_pelicula' => '2',
            'id_user' => '1',
            'fecha' => '2017-04-02',
            'valoracion' => '5',
        ]);
    }
}
