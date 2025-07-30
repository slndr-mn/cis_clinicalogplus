<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Clear cached permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Define permissions
        $permissions = [
            'create patient', 'read patient', 'update patient', 'delete patient',
            'create medicine', 'read medicine', 'update medicine', 'delete medicine',
            'create stock', 'issue medicine', 'prescribe medicine',
            'view consult', 'upload record', 'view record',
            'send notification', 'view notification',
            'create user', 'view logs'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Define roles
        $roles = ['SuperAdmin', 'Admin', 'Staff', 'Student'];

        foreach ($roles as $roleName) {
            $role = Role::firstOrCreate(['name' => $roleName]);

            switch ($roleName) {
                case 'SuperAdmin':
                    $role->syncPermissions(Permission::all());
                    break;

                case 'Admin':
                    $role->syncPermissions([
                        'create patient', 'read patient', 'update patient',
                        'create medicine', 'read medicine',
                        'view consult', 'view record',
                        'send notification', 'view notification',
                        'create user', 'view logs'
                    ]);
                    break;

                case 'Staff':
                    $role->syncPermissions([
                        'read patient',
                        'read medicine', 'issue medicine', 'prescribe medicine',
                        'upload record', 'view record',
                        'send notification', 'view notification',
                    ]);
                    break;

                case 'Student':
                    $role->syncPermissions([
                        'view consult', 'view record', 'view notification'
                    ]);
                    break;
            }
        }
    }
}
