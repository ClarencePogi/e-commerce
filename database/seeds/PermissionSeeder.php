<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
          ['name' => 'privilege-create', 'display_name' => 'Create privilege', 'description' => 'create', 'created_at' => now(), 'updated_at' => now()],
          ['name' => 'privilege-read', 'display_name' => 'Read privilege', 'description' => 'read', 'created_at' => now(), 'updated_at' => now()],  
          ['name' => 'privilege-edit', 'display_name' => 'Edit privilege', 'description' => 'edit', 'created_at' => now(), 'updated_at' => now()],  
          ['name' => 'privilege-delete', 'display_name' => 'Delete privilege', 'description' => 'delete', 'created_at' => now(), 'updated_at' => now()]
        ];
        
        Permission::insert($list);
    }
}
