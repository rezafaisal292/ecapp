<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Route;

class masterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->delete();
        DB::table('roles')->delete();
        DB::table('permissions')->delete();
        DB::table('master_page')->delete();
        DB::table('master_option_group')->delete();
        DB::table('master_option_value')->delete();

        $listUsers = [
            [
                'id' => Uuid::uuid4(),
                'username' => 'admin',
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'role' => 'admin',
            ]
        ];
        DB::table('roles')->insert([
            'name' => 'admin',
            'display_name' => 'Admin',
            'description' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $listroute = [];
        $used = ['index', 'create', 'show', 'edit', 'destroy'];
        foreach (Route::getRoutes()->getRoutes() as $route) {
            $action = $route->getAction();
            if (array_key_exists('as', $action)) {
                // You can also use explode('@', $action['controller']); here
                // to separate the class name from the method

                foreach ($used as $u) {
                    if (preg_match("/" . $u . "/i", $action['as'])) {
                        $listroute[] = $action['as'];
                    }
                }
            }
        }
        foreach ($listroute as $lr) {

            DB::table('permissions')->insert([
                'name' => $lr,
                'display_name' =>  ucfirst(substr($lr, strpos($lr, '.') + 1)),
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        $roles = Role::get();
        $permissions = Permission::get();
        foreach ($listUsers as $lu) {
            $role = $lu['role'];
            unset($lu['role']);
            DB::table('users')->insert($lu);
            foreach ($roles as $r) {
                foreach ($permissions as $p) {
                    $r->attachPermission($p->name);
                }
                if ($role == $r->name) {
                    $user = User::FindByName($lu['name']);
                    $user->attachRole($r->name);

                    $permission_role = DB::table('permission_role')->where('role_id',$r->id)->get();
                    foreach ($permission_role as $pr)
                    {
                        $permission = Permission::findById($pr->permission_id);
                        $user->attachPermission($permission);
                    }
                }
               
            }
        }

     

        $mstPage = [
            [
                'id' => Uuid::uuid4(), 'nama' => 'Settings', 'url' => '#', 'icon' => 'fas fa-fw fa-cogs', 'parent' => null,
                'urutan' => 1, 'status' => '1', 'childs' => [
                    [
                        'id' => Uuid::uuid4(),
                        'nama' => 'Master Page',
                        'url' => 'masterpage',
                        'icon' => null,
                        'urutan' => 1,
                        'status' => '1',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],

                    [
                        'id' => Uuid::uuid4(),
                        'nama' => 'Opsi',
                        'url' => 'opsi',
                        'icon' => null,
                        'urutan' => 2,
                        'status' => '1',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]
                ],
            ],
            [
                'id' => Uuid::uuid4(), 'nama' => 'User', 'url' => '#', 'icon' => 'fas fa-fw fa-users', 'parent' => null,
                'urutan' => 2, 'status' => '1', 'childs' => [
                    [
                        'id' => Uuid::uuid4(),
                        'nama' => 'Master Role',
                        'url' => 'masterrole',
                        'icon' => null,
                        'urutan' => 1,
                        'status' => '1',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'nama' => 'Master User',
                        'url' => 'masteruser',
                        'icon' => null,
                        'urutan' => 2,
                        'status' => '1',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]
                ],
            ],
            [
                'id' => Uuid::uuid4(), 'nama' => 'Log', 'url' => 'log', 'icon' => 'fas fa-fw fa-book', 'parent' => null,
                'urutan' => 3, 'status' => '1', 'childs' => [],
            ],
        ];

        foreach ($mstPage as $page) {
            $childs = $page['childs'];

            unset($page['childs']);
            \Modules\MasterPage\Entities\MasterPage::create($page);

            if (!empty($childs)) {
                $pageId = \Modules\MasterPage\Entities\MasterPage::findByName($page['nama']);

                foreach ($childs as $child) {
                    $child['parent'] = $pageId->id;
                    \Modules\MasterPage\Entities\MasterPage::create($child);
                }
            }
        }




        $now = now();
        $options = [
            [
                'id' => Str::uuid(), 'name' => 'display_per_page', 'created_at' => $now, 'updated_at' => $now,
                'values' => [
                    [
                        'id' => Str::uuid(), 'key' => '5', 'value' => '5', 'sequence' => 1,
                        'created_at' => $now, 'updated_at' => $now
                    ],
                    [
                        'id' => Str::uuid(), 'key' => '10', 'value' => '10', 'sequence' => 2,
                        'created_at' => $now, 'updated_at' => $now
                    ],
                    [
                        'id' => Str::uuid(), 'key' => '15', 'value' => '15', 'sequence' => 3,
                        'created_at' => $now, 'updated_at' => $now
                    ],
                    [
                        'id' => Str::uuid(), 'key' => '25', 'value' => '25', 'sequence' => 4,
                        'created_at' => $now, 'updated_at' => $now
                    ],
                    [
                        'id' => Str::uuid(), 'key' => '50', 'value' => '50', 'sequence' => 5,
                        'created_at' => $now, 'updated_at' => $now
                    ],
                    [
                        'id' => Str::uuid(), 'key' => '100', 'value' => '100', 'sequence' => 6,
                        'created_at' => $now, 'updated_at' => $now
                    ],
                    [
                        'id' => Str::uuid(), 'key' => 'All', 'value' => 'All', 'sequence' => 7,
                        'created_at' => $now, 'updated_at' => $now
                    ],
                ]
            ],


            [
                'id' => Str::uuid(), 'name' => 'status', 'created_at' => $now, 'updated_at' => $now,
                'values' => [
                    [
                        'id' => Str::uuid(), 'key' => '1', 'value' => 'Aktif', 'sequence' => 1,
                        'created_at' => $now, 'updated_at' => $now
                    ],
                    [
                        'id' => Str::uuid(), 'key' => '2', 'value' => 'Tidak Aktif', 'sequence' => 2,
                        'created_at' => $now, 'updated_at' => $now
                    ],
                ]
            ],

        ];

        foreach ($options as $option) {
            $values = $option['values'];
            \Illuminate\Support\Arr::forget($option, 'values');

            DB::table('master_option_group')->insert($option);

            foreach ($values as $value) {
                $value['option_group_id'] = $option['id'];
                DB::table('master_option_value')->insert($value);
            }
        }
    }
}
