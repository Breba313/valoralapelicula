<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'name' => 'Brenda',
            'lastname' => 'Batista',
            'email' => 'Brebatista@gmail.com',
            'password' => bcrypt('secreta'),
        ]);

        DB::table('users')->insert([
            'name' => 'Brelio',
            'lastname' => 'Varela',
            'email' => 'Brelio@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        DB::table('users')->insert([
            'name' => 'Breiden Vitelio',
            'lastname' => 'Varela',
            'email' => 'breidenv@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
