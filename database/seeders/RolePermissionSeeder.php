<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{

    public function run()
    {
        // Permission List as array
        $permissions = [

            [
                'group_name' => 'dashboard',
                'permissions' => [
                    'dashboard.view',
                    'dashboard.edit',
                ]
            ],
            [
                'group_name' => 'role',
                'permissions' => [
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete',
                    'role.approve',
                ]
            ],
            [
                'group_name' => 'page-view-visitor',
                'permissions' => [
                    'page-view-visitor.view',
                ]
            ],
            [
                'group_name' => 'admin',
                'permissions' => [
                    'admin.create',
                    'admin.view',
                    'admin.edit',
                    'admin.delete',
                    'admin.approve',
                ]
            ],
            [
                'group_name' => 'user-review',
                'permissions' => [
                    'user-review.create',
                    'user-review.view',
                    'user-review.edit',
                    'user-review.delete',
                    'user-review.view-trash',
                    'user-review.restore',
                    'user-review.force-delete',
                ]
            ],
            [
                'group_name' => 'review-dispute',
                'permissions' => [
                    'review-dispute.view',
                    'review-dispute.edit',
                    'review-dispute.delete',
                ]
            ],
            [
                'group_name' => 'company',
                'permissions' => [
                    'company.create',
                    'company.view',
                    'company.edit',
                    'company.delete',
                ]
            ],
            [
                'group_name' => 'company-faq',
                'permissions' => [
                    'company-faq.create',
                    'company-faq.view',
                    'company-faq.edit',
                    'company-faq.delete',
                ]
            ],
            [
                'group_name' => 'company-live-calls',
                'permissions' => [
                    'company-live-calls.create',
                    'company-live-calls.view',
                    'company-live-calls.delete',
                ]
            ],
            [
                'group_name' => 'checklist-category',
                'permissions' => [
                    'checklist-category.create',
                    'checklist-category.view',
                    'checklist-category.edit',
                    'checklist-category.delete',
                ]
            ],
            [
                'group_name' => 'checklist',
                'permissions' => [
                    'checklist.create',
                    'checklist.view',
                    'checklist.edit',
                    'checklist.delete',
                ]
            ],
            [
                'group_name' => 'state-cost-page',
                'permissions' => [
                    'state-cost-page.create',
                    'state-cost-page.view',
                    'state-cost-page.edit',
                    'state-cost-page.delete',
                ]
            ],
            [
                'group_name' => 'state-cost-top-mover',
                'permissions' => [
                    'state-cost-top-mover.create',
                    'state-cost-top-mover.view',
                    'state-cost-top-mover.edit',
                    'state-cost-top-mover.delete',
                ]
            ],
            [
                'group_name' => 'state-cost-faq',
                'permissions' => [
                    'state-cost-faq.create',
                    'state-cost-faq.view',
                    'state-cost-faq.edit',
                    'state-cost-faq.delete',
                ]
            ],
            [
                'group_name' => 'best-state-page',
                'permissions' => [
                    'best-state-page.create',
                    'best-state-page.view',
                    'best-state-page.edit',
                    'best-state-page.delete',
                ]
            ],
            [
                'group_name' => 'best-state-top-mover',
                'permissions' => [
                    'best-state-top-mover.create',
                    'best-state-top-mover.view',
                    'best-state-top-mover.edit',
                    'best-state-top-mover.delete',
                ]
            ],
            [
                'group_name' => 'best-state-faq',
                'permissions' => [
                    'best-state-faq.create',
                    'best-state-faq.view',
                    'best-state-faq.edit',
                    'best-state-faq.delete',
                ]
            ],
            [
                'group_name' => 'quotation',
                'permissions' => [
                    'quotation.view',
                    'quotation.edit',
                    'quotation.delete',
                ]
            ],
            [
                'group_name' => 'comment',
                'permissions' => [
                    'comment.view',
                    'comment.edit',
                    'comment.delete',
                ]
            ],
            [
                'group_name' => 'post-category',
                'permissions' => [
                    'post-category.view',
                    'post-category.create',
                    'post-category.edit',
                    'post-category.delete',
                ]
            ],
            [
                'group_name' => 'post',
                'permissions' => [
                    'post.create',
                    'post.view',
                    'post.edit',
                    'post.delete',
                    'post.view-trash',
                    'post.restore',
                    'post.force-delete',
                ]
            ],
            [
                'group_name' => 'post-faq',
                'permissions' => [
                    'post-faq.view',
                    'post-faq.create',
                    'post-faq.edit',
                    'post-faq.delete',
                ]
            ],
            [
                'group_name' => 'product',
                'permissions' => [
                    'product.view',
                    'product.create',
                    'product.edit',
                    'product.delete',
                ]
            ],

            [
                'group_name' => 'order',
                'permissions' => [
                    'order.view',
                    'order.delete',
                ]
            ],
            [
                'group_name' => 'city-to-city-route',
                'permissions' => [
                    'city-to-city-route.view',
                    'city-to-city-route.create',
                    'city-to-city-route.edit',
                    'city-to-city-route.delete',
                    'city-to-city-route.view-trash',
                    'city-to-city-route.restore',
                    'city-to-city-route.force-delete',
                ]
            ],
            [
                'group_name' => 'state-to-state-route',
                'permissions' => [
                    'state-to-state-route.view',
                    'state-to-state-route.create',
                    'state-to-state-route.edit',
                    'state-to-state-route.delete',
                    'state-to-state-route.view-trash',
                    'state-to-state-route.restore',
                    'state-to-state-route.force-delete',
                ]
            ],
            [
                'group_name' => 'state-to-city-route',
                'permissions' => [
                    'state-to-city-route.view',
                    'state-to-city-route.create',
                    'state-to-city-route.edit',
                    'state-to-city-route.delete',
                    'state-to-city-route.view-trash',
                    'state-to-city-route.restore',
                    'state-to-city-route.force-delete',
                ]
            ],
            [
                'group_name' => 'city-to-state-route',
                'permissions' => [
                    'city-to-state-route.view',
                    'city-to-state-route.create',
                    'city-to-state-route.edit',
                    'city-to-state-route.delete',
                    'city-to-state-route.view-trash',
                    'city-to-state-route.restore',
                    'city-to-state-route.force-delete',
                ]
            ],
            [
                'group_name' => 'city-page',
                'permissions' => [
                    'city-page.view',
                    'city-page.create',
                    'city-page.edit',
                    'city-page.delete',
                    'city-page.view-trash',
                    'city-page.restore',
                    'city-page.force-delete',
                ]
            ],
            [
                'group_name' => 'city-cost-of-living',
                'permissions' => [
                    'city-cost-of-living.view',
                    'city-cost-of-living.create',
                    'city-cost-of-living.edit',
                    'city-cost-of-living.delete',
                ]
            ],
            [
                'group_name' => 'city-avg-cost',
                'permissions' => [
                    'city-avg-cost.view',
                    'city-avg-cost.create',
                    'city-avg-cost.edit',
                    'city-avg-cost.delete',
                ]
            ],
            [
                'group_name' => 'city-route-cost',
                'permissions' => [
                    'city-route-cost.view',
                    'city-route-cost.create',
                    'city-route-cost.edit',
                    'city-route-cost.delete',
                ]
            ],
            [
                'group_name' => 'city-life-style',
                'permissions' => [
                    'city-life-style.view',
                    'city-life-style.create',
                    'city-life-style.edit',
                    'city-life-style.delete',
                ]
            ],
            [
                'group_name' => 'state-cost-of-living',
                'permissions' => [
                    'state-cost-of-living.view',
                    'state-cost-of-living.create',
                    'state-cost-of-living.edit',
                    'state-cost-of-living.delete',
                ]
            ],
            [
                'group_name' => 'state-life-style',
                'permissions' => [
                    'state-life-style.view',
                    'state-life-style.create',
                    'state-life-style.edit',
                    'state-life-style.delete',
                ]
            ],
            [
                'group_name' => 'state-pros-cons',
                'permissions' => [
                    'state-pros-cons.view',
                    'state-pros-cons.create',
                    'state-pros-cons.edit',
                    'state-pros-cons.delete',
                ]
            ],
            [
                'group_name' => 'resource-page',
                'permissions' => [
                    'resource-page.view',
                    'resource-page.create',
                    'resource-page.edit',
                    'resource-page.delete',
                ]
            ],
            [
                'group_name' => 'resource-top-mover',
                'permissions' => [
                    'resource-top-mover.view',
                    'resource-top-mover.create',
                    'resource-top-mover.edit',
                    'resource-top-mover.delete',
                ]
            ],
            [
                'group_name' => 'resource-bottom-mover',
                'permissions' => [
                    'resource-bottom-mover.view',
                    'resource-bottom-mover.create',
                    'resource-bottom-mover.edit',
                    'resource-bottom-mover.delete',
                ]
            ],
            [
                'group_name' => 'resource-other-mover',
                'permissions' => [
                    'resource-other-mover.view',
                    'resource-other-mover.create',
                    'resource-other-mover.edit',
                    'resource-other-mover.delete',
                ]
            ],
            [
                'group_name' => 'resource-faq',
                'permissions' => [
                    'resource-faq.view',
                    'resource-faq.create',
                    'resource-faq.edit',
                    'resource-faq.delete',
                ]
            ],
            [
                'group_name' => 'contact-us',
                'permissions' => [
                    'contact-us.view',
                    'contact-us.show',
                    'contact-us.delete',
                ]
            ],
            [
                'group_name' => 'user-contact-us',
                'permissions' => [
                    'user-contact-us.view',
                    'user-contact-us.delete',
                ]
            ],
            [
                'group_name' => 'cost-estimate',
                'permissions' => [
                    'cost-estimate.view',
                    'cost-estimate.show',
                    'cost-estimate.delete',
                ]
            ],
            [
                'group_name' => 'calculator-estimate',
                'permissions' => [
                    'calculator-estimate.view',
                    'calculator-estimate.show',
                    'calculator-estimate.delete',
                ]
            ],
            [
                'group_name' => 'estimate-crud',
                'permissions' => [
                    'estimate-crud.view',
                    'estimate-crud.create',
                    'estimate-crud.edit',
                    'estimate-crud.delete',
                ]
            ],
            [
                'group_name' => 'city-living-expense',
                'permissions' => [
                    'city-living-expense.view',
                    'city-living-expense.create',
                    'city-living-expense.edit',
                    'city-living-expense.delete',
                ]
            ],
        ];

        $allPermissionNames = collect($permissions)
            ->flatMap(fn($group) => $group['permissions'])
            ->unique()
            ->toArray();


        DB::transaction(function () use ($permissions, $allPermissionNames) {
            // Create or get Super Admin role
            $roleSuperAdmin = Role::firstOrCreate(['name' => 'superadmin', 'guard_name' => 'admin']);

            // Create or Update new permissions and assign to Super Admin
            foreach ($permissions as $group) {
                foreach ($group['permissions'] as $permissionName) {
                    $permission = Permission::updateOrCreate(
                        ['name' => $permissionName, 'guard_name' => 'admin'],
                        ['group_name' => $group['group_name']]
                    );

                    if (!$roleSuperAdmin->hasPermissionTo($permission)) {
                        $roleSuperAdmin->givePermissionTo($permission);
                    }
                }
            }

            // Delete Unused Permissions (and detach from roles first)
            $unusedPermissions = Permission::where('guard_name', 'admin')
                ->whereNotIn('name', $allPermissionNames)
                ->get();

            foreach ($unusedPermissions as $permission) {
                // Detach from all roles
                $permission->roles()->detach();
                // Now delete the permission
                $permission->delete();
            }

            // Assign role to superadmin 
            $admin = Admin::where('username', 'superadmin')->first();
            if ($admin && !$admin->hasRole($roleSuperAdmin)) {
                $admin->assignRole($roleSuperAdmin);
            }
        });
    }
}
