<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//agregamos el modelo de permisos de spatie
use Spatie\Permission\Models\Permission;


class SeederTablePermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
          //Operacions sobre tabla actividade
           'ver-actividade',
           'crear-actividade',
           'editar-actividade',
           'borrar-actividade',
           'calificar-actividade',    
          //Operacions sobre tabla contenido
           'ver-grupo',
           'crear-grupo',
           'editar-grupo',
           'borrar-grupo',
            //Operaciones sobre tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //Operacions sobre tabla contenido
            'ver-contenido',
            'crear-contenido',
            'editar-contenido',
            'borrar-contenido',

     


        ];

        foreach($permisos as $permiso) {
            Permission::create(['name'=>$permiso]);
        }
    }
}
