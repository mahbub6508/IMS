<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create Roles

		$roleAdmin = Role::create(['name' => 'admin']);
		$roleManager = Role::create(['name' => 'manager']);
		// $roleAccountant = Role::create(['name' => 'accountant']);
		// $roleSalesMan = Role::create(['name' => 'salesman']);

        //Permission List as array
        $permissions = [

            [
                'group_name' =>'dashboard',
                'permissions' => [
                    'dashboard.view',
                ]
            ],
            [
                'group_name' =>'admin',
                'permissions' => [
                    'admin.create',
                    'admin.view',
                    'admin.edit',
                    'admin.delete',
                ]
            ],
            [
                'group_name' =>'role',
                'permissions' => [
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete',
                    'role.approve',
                ]
            ],
            [
                'group_name' =>'category',
                'permissions' => [
                    'category.create',
                    'category.view',
                    'category.delete',
                    'category.edit',
                    'category.approve',
                ]
            ],
            [
                'group_name' =>'product',
                'permissions' => [
                    'product.create',
                    'product.index',
                    'product.show',
                    'product.edit',
                    'product.delete',
                    'product.approve',

                ]
            ],
            [
                'group_name' =>'brand',
                'permissions' => [
                    'brand.create',
                    'brand.index',
                    'brand.edit',
                    'brand.delete',
                    'brand.approve',
                ]
            ],
            [
                'group_name' =>'warehouse',
                'permissions' => [
                    'warehouse.create',
                    'warehouse.index',
                    'warehouse.edit',
                    'warehouse.delete',
                    'warehouse.approve',
                ]
            ],
        ];
        //Create & Assign Permission
        for ($i=0; $i < count($permissions); $i++) { 
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j=0; $j < count($permissions[$i]['permissions']); $j++) { 
            
        	$permission = Permission::create(['name' => $permissions[$i]['permissions'][$j],'group_name' => $permissionGroup]);
        	$roleAdmin->givePermissionTo($permission);
        	$permission->assignRole($roleAdmin);
        }
        }
       
    }

}
