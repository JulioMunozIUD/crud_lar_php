<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permisos=[

            //tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            //tabla post
            'ver-posts',
            'crear-posts',
            'editar-posts',
            'borrar-posts',
            //tabla categorias
           'ver-categories',
           'crear-categories',
           'editar-categories',
           'borrar-categories',
           // Administrar roles
           'ver-usuarios',
           'crear-usuarios',
           'editar-usuarios',
           'borrar-usuarios',

        ];
        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
        
    }
}
