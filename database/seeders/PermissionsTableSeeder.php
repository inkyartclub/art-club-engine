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
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'team_create',
            ],
            [
                'id'    => 19,
                'title' => 'team_edit',
            ],
            [
                'id'    => 20,
                'title' => 'team_show',
            ],
            [
                'id'    => 21,
                'title' => 'team_delete',
            ],
            [
                'id'    => 22,
                'title' => 'team_access',
            ],
            [
                'id'    => 23,
                'title' => 'pass_create',
            ],
            [
                'id'    => 24,
                'title' => 'pass_edit',
            ],
            [
                'id'    => 25,
                'title' => 'pass_show',
            ],
            [
                'id'    => 26,
                'title' => 'pass_delete',
            ],
            [
                'id'    => 27,
                'title' => 'pass_access',
            ],
            [
                'id'    => 28,
                'title' => 'collection_create',
            ],
            [
                'id'    => 29,
                'title' => 'collection_edit',
            ],
            [
                'id'    => 30,
                'title' => 'collection_show',
            ],
            [
                'id'    => 31,
                'title' => 'collection_delete',
            ],
            [
                'id'    => 32,
                'title' => 'collection_access',
            ],
            [
                'id'    => 33,
                'title' => 'metadata_create',
            ],
            [
                'id'    => 34,
                'title' => 'metadata_edit',
            ],
            [
                'id'    => 35,
                'title' => 'metadata_show',
            ],
            [
                'id'    => 36,
                'title' => 'metadata_delete',
            ],
            [
                'id'    => 37,
                'title' => 'metadata_access',
            ],
            [
                'id'    => 38,
                'title' => 'nft_create',
            ],
            [
                'id'    => 39,
                'title' => 'nft_edit',
            ],
            [
                'id'    => 40,
                'title' => 'nft_show',
            ],
            [
                'id'    => 41,
                'title' => 'nft_delete',
            ],
            [
                'id'    => 42,
                'title' => 'nft_access',
            ],
            [
                'id'    => 43,
                'title' => 'claim_show',
            ],
            [
                'id'    => 44,
                'title' => 'claim_delete',
            ],
            [
                'id'    => 45,
                'title' => 'claim_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
