<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Freddy Arriaga Cruz',
            'phone' => '75054466',
            'address' => 'Villa 1ro Mayo C/9 #6',
            'email' => 'fac.ficct@uagrm.edu',
            'password' => bcrypt('irascema')
        ])->assignRole('adm');
        $admin->createToken('auth_token')->plainTextToken;

        $admin1 = User::create([
            'name' => 'Marina Mejia',
            'phone' => '69080574',
            'address' => 'Av. Roque Aguilera',
            'email' => 'marinamejj123@gmail.com',
            'password' => bcrypt('password')
        ])->assignRole('adm');
        $admin1->createToken('auth_token')->plainTextToken;

        $admin2 = User::create([
            'name' => 'Jimena Pinaya',
            'phone' => '79023912',
            'address' => 'Av. Colectora',
            'email' => 'c.jimena.pinaya.o@gmail.com',
            'password' => bcrypt('password')
        ])->assignRole('adm');
        $admin2->createToken('auth_token')->plainTextToken;

        $admin3 = User::create([
            'name' => 'Gary Lopez',
            'phone' => '69321242',
            'address' => '6to anillo Calle A',
            'email' => 'Jotagary25@protonmail.com',
            'password' => bcrypt('password')
        ])->assignRole('adm');
        $admin3->createToken('auth_token')->plainTextToken;
        $admin3 = User::create([
            'name' => 'Pedro Esteban Saca',
            'phone' => '69321242',
            'address' => '6to anillo Calle B',
            'email' => 'pedro@gmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('adm');
        $admin3->createToken('auth_token')->plainTextToken;
        $cliente1 = User::create([
            'name' => 'Nazareth Ordoñez',
            'phone' => '72390123',
            'address' => 'Zona Sur Frente al Hipermaxi',
            'email' => 'NazaO@uagrm.edu',
            'password' => bcrypt('password')
        ])->assignRole('empleado');
        $cliente1->createToken('auth_token')->plainTextToken;

        $cliente1 = User::create([
            'name' => 'Limber Llanos',
            'phone' => '74668878',
            'address' => 'Barrio Los Penocos',
            'email' => 'limberLL@uagrm.edu',
            'password' => bcrypt('password')
        ])->assignRole('cliente');
        $cliente1->createToken('auth_token')->plainTextToken;
    }
}
