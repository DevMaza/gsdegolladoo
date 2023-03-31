<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario=User::create([
            'name'=> 'Elias',
            'apellido'=> 'Lopez Medez',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'grupo_id' => '1',
            
        ]);

      //  $rol = Role::create(['name' => 'Admiistrador']);
      //  $permisos = Permission::pluck('id','id')->all();

      //  $rol->syncPermissions($permisos);

       // $usuario->assignRole([$rol->id]);

       $usuario->assignRole('Administrador');
    }
}
