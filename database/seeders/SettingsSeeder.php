<?php

namespace Database\Seeders;

use App\Models\Backend\Settings;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Settings::create([

            'office_name' => 'Hussain F. AlMuhsen Engineering Consultants',
            'office_abbreviation' => 'HFMEC',
            'mobile' => '0592123456789',
            'email' => 'hfmec@gmail.com',
            'address' => 'hfmec Address',
            'logo' => 'logo.png',
            'logo1' => 'hfmec.png',
            'loginImage' => 'login-bg.jpg',
        ]);
    }
}
