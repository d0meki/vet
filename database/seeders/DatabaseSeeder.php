<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

        DB::table('mascotas')->insert([
            ['nombre' => 'pulguitas', 'tipo' => 'perro', 'raza' => 'caniche', 'sexo' => 'hembra', 'caracteristicas' => 'descripcion de pulguita', 'user_id' => 7],
            ['nombre' => 'rambo', 'tipo' => 'perro', 'raza' => 'doberman', 'sexo' => 'macho', 'caracteristicas' => 'descripcion de rambo', 'user_id' => 7],
            ['nombre' => 'neron', 'tipo' => 'perro', 'raza' => 'shnauzer', 'sexo' => 'macho', 'caracteristicas' => 'descripcion de neron', 'user_id' => 7]
        ]);

        DB::table('tipos')->insert([
            ['nombre' => 'Vacunación', 'descripcion' => 'esto es vacunación', 'costo' => 50.00, 'imagenurl' => '/ejeje', 'status' => true],
            ['nombre' => 'limpieza', 'descripcion' => 'esto es limpieza', 'costo' => 150.00, 'imagenurl' => '/ejeje', 'status' => true],
            ['nombre' => 'cirugia', 'descripcion' => 'esto es cirugia', 'costo' => 300.00, 'imagenurl' => '/ejeje', 'status' => true],
        ]);

        DB::table('servicios')->insert([
            ['nombre' => 'vacunación antirabica,vitamina A, antigarrapata', 'tipo_id' => 1, 'personal' => 'Freddy Arriaga Cruz', 'user_id' => 7, 'costo' => 125.50, 'mascota_id' => 1],
            ['nombre' => 'baño y peinado especial', 'tipo_id' => 1, 'personal' => 'Freddy Arriaga Cruz', 'user_id' => 7, 'costo' => 125.50, 'costo' => 187.00, 'mascota_id' => 1],
            ['nombre' => 'operación, transfusión sanguinea', 'tipo_id' => 1, 'personal' => 'Freddy Arriaga Cruz', 'user_id' => 7, 'costo' => 125.50, 'costo' => 268.00, 'mascota_id' => 2],
            ['nombre' => 'Parto via cesarea', 'tipo_id' => 1, 'personal' => 'Freddy Arriaga Cruz', 'user_id' => 7, 'costo' => 125.50, 'costo' => 340.30, 'mascota_id' => 3],
            ['nombre' => 'vacunacion antirabica', 'tipo_id' => 1, 'personal' => 'Freddy Arriaga Cruz', 'user_id' => 7, 'costo' => 125.50, 'costo' => 85.00, 'mascota_id' => 3],
        ]);

        DB::table('detalle_historials')->insert([
            ['temperatura_cent' => 36.00, 'peso_gramos' => 5230.00, 'sintomas' => 'sintomas1,1', 'diagnostico' => 'diagnostico1,1', 'mascota_id' => 1, 'servicio_id' => 1],
            ['temperatura_cent' => 37.40, 'peso_gramos' => 5230.00, 'sintomas' => 'sintomas1,2', 'diagnostico' => 'diagnostico1,2', 'mascota_id' => 1, 'servicio_id' => 2],
            ['temperatura_cent' => 36.80, 'peso_gramos' => 3400.00, 'sintomas' => 'sintomas2,3', 'diagnostico' => 'diagnostico2,3', 'mascota_id' => 2, 'servicio_id' => 3],
            ['temperatura_cent' => 37.10, 'peso_gramos' => 2500.00, 'sintomas' => 'sintomas3,4', 'diagnostico' => 'diagnostico3,4', 'mascota_id' => 3, 'servicio_id' => 4],
            ['temperatura_cent' => 36.20, 'peso_gramos' => 2643.00, 'sintomas' => 'sintomas3,5', 'diagnostico' => 'diagnostico3,5', 'mascota_id' => 3, 'servicio_id' => 5],
        ]);

        DB::table('recursos')->insert([
            ['nombre' => 'antirabia1', 'serie' => '11111', 'tipo' => 'vacuna', 'costo' => 40.00, 'servicio_id' => 1],
            ['nombre' => 'vitapet1', 'serie' => '11112', 'tipo' => 'vacuna', 'costo' => 50.00, 'servicio_id' => 1],
            ['nombre' => 'garraticida1', 'serie' => '11113', 'tipo' => 'vacuna', 'costo' => 45.00, 'servicio_id' => 1],
            ['nombre' => 'shampo veteria', 'serie' => '22221', 'tipo' => 'material estetico', 'costo' => 30.00, 'servicio_id' => 2],
            ['nombre' => 'gasa', 'serie' => '33331', 'tipo' => 'material quirurgico', 'costo' => 20.00, 'servicio_id' => 3],
            ['nombre' => 'Hilo', 'serie' => '44441', 'tipo' => 'material quirurgico', 'costo' => 20.00, 'servicio_id' => 4],
            ['nombre' => 'antirabia1', 'serie' => '11113', 'tipo' => 'vacuna', 'costo' => 65.00, 'servicio_id' => 5],
        ]);
    }
}
