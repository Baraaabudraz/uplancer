<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Permission::Create([
            'role_id'=>1,
            'name'=>[
                'project'=>['can-add'=>'1','can-edit'=>'1','can-delete'=>'1','can-view'=>'1','can-list'=>'1'],
                'role'=>['can-add'=>'1','can-edit'=>'1','can-delete'=>'1','can-view'=>'1','can-list'=>'1'],
                'permission'=>['can-add'=>'1','can-edit'=>'1','can-delete'=>'1','can-view'=>'1','can-list'=>'1'],
                'service'=>['can-add'=>'1','can-edit'=>'1','can-delete'=>'1','can-view'=>'1','can-list'=>'1'],
                'admin'=>['can-add'=>'1','can-edit'=>'1','can-delete'=>'1','can-view'=>'1','can-list'=>'1'],
                'slider'=>['can-add'=>'1','can-edit'=>'1','can-delete'=>'1','can-view'=>'1','can-list'=>'1'],
                'sponsor'=>['can-add'=>'1','can-edit'=>'1','can-delete'=>'1','can-view'=>'1','can-list'=>'1'],
                'setting'=>['can-add'=>'1','can-edit'=>'1','can-delete'=>'1','can-view'=>'1','can-list'=>'1'],
                'blog'=>['can-add'=>'1','can-edit'=>'1','can-delete'=>'1','can-view'=>'1','can-list'=>'1'],
//                'mail'=>['can-add'=>'1','can-view'=>'1'],

            ],


        ]);
    }
}
