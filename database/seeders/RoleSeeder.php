<?php

namespace Database\Seeders;

use App\Models\Backend\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create([
            'name' => ['en' => 'admin', 'ar' => 'الأدمن'],
            'permissions' => json_encode(["services","projects","about","news","teams","careers","mails","roles","users","settings","jobs","mailNotifications","careerNotifications"]) ,
        ]);

        Role::create([
            'name' => ['en' => 'supervisor', 'ar' => 'المشرف'],
            'permissions' =>json_encode(["services","projects","about","news","teams","careers","mails","roles","users","settings","jobs","mailNotifications","careerNotifications"]) ,
        ]);
    }
}
