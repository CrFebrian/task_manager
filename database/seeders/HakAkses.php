<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HakAkses extends Seeder
{
    public function run(): void
    {
        app ()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $permission = [
            "Membuat Taks",
            "Melihat Task",
            "Mengubah Task",
            "Menghapus Task"
        ];

        foreach($permission as $n )(
            Permission:: create(["name" => $n])
        );

        $Pengguna = Role::create(attributes: ["name" => "super admin"]);
        $Pengguna ->givePermissionTo(Permission::all());

        $Pengguna = Role:: create(attributes: ["name" => "Pengguna"]);
        $Pengguna ->givePermissionTo(Permission:[$permission[1]]);
    }

}
