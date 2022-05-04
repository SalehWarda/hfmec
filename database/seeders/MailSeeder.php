<?php

namespace Database\Seeders;

use App\Models\Backend\Mail;
use Illuminate\Database\Seeder;

class MailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Mail::create([

            'full_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'mobile' => '0599123123',
            'subject' => 'subject Here',
            'message' => 'message Here',
        ]);
    }
}
