<?php

namespace Database\Seeders;

use App\Models\Backend\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Team::create([

            'name' => ['en' => 'enter name',
                'ar'=>'أدخل الاسم'],
            'job' => ['en' => 'enter job',
                'ar'=>'أدخل الوظيفة'],
            'description' => ['en' => 'enter description', 'ar' => 'ادخل وصف الموظف'],
            'image' => 'team.png'
        ]);
    }
}
