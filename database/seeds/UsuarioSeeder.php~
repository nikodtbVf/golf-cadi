<?php

use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
				'name' => "administrador",
				'email' => "admin@admin.com",
				'rol' => 1,
				'password' => bcrypt('1234'),       
        ]);
    }
}
