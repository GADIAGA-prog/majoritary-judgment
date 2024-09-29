<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'configuration_access',
            ],
            [
                'id'    => 18,
                'title' => 'zone_create',
            ],
            [
                'id'    => 19,
                'title' => 'zone_edit',
            ],
            [
                'id'    => 20,
                'title' => 'zone_show',
            ],
            [
                'id'    => 21,
                'title' => 'zone_delete',
            ],
            [
                'id'    => 22,
                'title' => 'zone_access',
            ],
            [
                'id'    => 23,
                'title' => 'emploi_create',
            ],
            [
                'id'    => 24,
                'title' => 'emploi_edit',
            ],
            [
                'id'    => 25,
                'title' => 'emploi_show',
            ],
            [
                'id'    => 26,
                'title' => 'emploi_delete',
            ],
            [
                'id'    => 27,
                'title' => 'emploi_access',
            ],
            [
                'id'    => 28,
                'title' => 'database_access',
            ],
            [
                'id'    => 29,
                'title' => 'statistique_access',
            ],
            [
                'id'    => 30,
                'title' => 'astreinte_create',
            ],
            [
                'id'    => 31,
                'title' => 'astreinte_edit',
            ],
            [
                'id'    => 32,
                'title' => 'astreinte_show',
            ],
            [
                'id'    => 33,
                'title' => 'astreinte_delete',
            ],
            [
                'id'    => 34,
                'title' => 'astreinte_access',
            ],
            [
                'id'    => 35,
                'title' => 'tableau_debord_create',
            ],
            [
                'id'    => 36,
                'title' => 'tableau_debord_edit',
            ],
            [
                'id'    => 37,
                'title' => 'tableau_debord_show',
            ],
            [
                'id'    => 38,
                'title' => 'tableau_debord_delete',
            ],
            [
                'id'    => 39,
                'title' => 'tableau_debord_access',
            ],
            [
                'id'    => 40,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
