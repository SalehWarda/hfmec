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

            'first_name' => 'Saleh',
            'last_name'  => ' AbuWarda',
            'email'  => 'salehwarda6@gmail.com',
            'mobile' => '0592123456',
            'user_image' =>public_path('assets/images/avatar.png'),
            'password' => bcrypt('123123123')
        ]);
    }
}
