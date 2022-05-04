<?php

namespace Database\Seeders;

use App\Models\Backend\Career;
use Illuminate\Database\Seeder;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Career::create([

            'full_name' => 'Admin',
            'email' => 'Admin@gmail.com',
            'message' => 'Hi, I need this Career',
            'attachment' => 'admin.png'
        ]);
    }
}
