<?php

namespace Database\Seeders;

use App\Models\Backend\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = Admin::create([

            'name' => ['ar' => 'أدمن', 'en'=>'Admin'] ,
            'email'  => 'Admin@gmail.com',
            'mobile' => '0592123456',
            'role_id' => '1',
            'password' => bcrypt('123123123'),
            'user_image' => 'admin.jpg'
        ]);

        $user = Admin::create([

            'name' => ['ar' => 'مشرف', 'en'=>'SuperVisor'] ,
            'email'  => 'Supervisor@gmail.com',
            'mobile' => '0592123453',
            'role_id' => '2',
            'password' => bcrypt('123123123'),
            'user_image' => 'admin.jpg'
        ]);
    }
}
