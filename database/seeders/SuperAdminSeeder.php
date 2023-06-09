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
        // $usuario=User::create([
        //     'name'=> 'Administrador',
        //     'apellido'=> 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('12345678'),
        //     'grupo_id' => '1',
        // ])->assignRole('Administrador');
        $user2 = User::where('email', 'admin2@gmail.com')->first();
        $user2->password = bcrypt('12345678');
        $user2->save();

      //  $rol = Role::create(['name' => 'Admiistrador']);
      //  $permisos = Permission::pluck('id','id')->all();

      //  $rol->syncPermissions($permisos);

       // $usuario->assignRole([$rol->id]);

       
        }
}
