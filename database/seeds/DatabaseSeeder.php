<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        \DB::table('pais')->insert(['id'=>'1', 'pais'=>'Argentina']);
        \DB::table('pais')->insert(['id'=>'2', 'pais'=>'Bolivia']);

        \DB::table('departamentos')->insert(['id'=>'1', 'id_pais'=>'2', 'departamento'=>'Potosi']);
        \DB::table('departamentos')->insert(['id'=>'2', 'id_pais'=>'2', 'departamento'=>'Oruro']);

        \DB::table('provincias')->insert(['id'=>'1', 'id_pais'=>'2', 'id_departamento'=>'1', 'provincia'=>'Tomas Frias']);
        \DB::table('provincias')->insert(['id'=>'2', 'id_pais'=>'2', 'id_departamento'=>'1', 'provincia'=>'Saavedra']);


        \DB::table('localidads')->insert(['id'=>'1', 'id_pais'=>'2', 'id_departamento'=>'1', 'id_provincia'=>'1', 'localidad'=>'POTOSI']);
        \DB::table('localidads')->insert(['id'=>'2', 'id_pais'=>'2', 'id_departamento'=>'1', 'id_provincia'=>'1', 'localidad'=>'OCORURO']);

        \DB::table('users')->insert([ 'id'=>'1', 'name'=>'gamp', 'email'=>'Adminsitrador', 'password'=> \bcrypt('123'), 'grupo'=>'Administrador']);
        \DB::table('users')->insert([ 'id'=>'2', 'name'=>'rocio', 'email'=>'Rocio ', 'password'=> \bcrypt('bellaFlor'), 'grupo'=>'Administrador']);

    }
}
