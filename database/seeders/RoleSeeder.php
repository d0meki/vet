<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'adm']);
        $role2 = Role::create(['name'=>'empleado']);
        $role3 = Role::create(['name'=>'cliente']);
      
        //show.mascotas show.usuarios
       Permission::create(['name' => 'show.mascotas'])->assignRole($role3);
       Permission::create(['name' => 'show.usuarios'])->assignRole($role1);
       Permission::create(['name' => 'show.jaulas'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'index.servicios'])->syncRoles([$role1,$role2]);
       /* Permission::create(['name' => 'show.recetas'])->syncRoles([$role1,$role2]); */
       Permission::create(['name' => 'CarnetVacunacion.create'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'CarnetVacunacion.index'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'CarnetVacunacion.edit'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'show.pets'])->syncRoles([$role1,$role2]);       
       Permission::create(['name' => 'show.addservicios'])->syncRoles([$role1,$role2]);     
       Permission::create(['name' => 'show.veterinario'])->syncRoles([$role2]); 
    }
}
