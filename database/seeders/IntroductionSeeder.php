<?php

namespace Database\Seeders;

use App\Models\Backend\About\Introduction;
use Illuminate\Database\Seeder;

class IntroductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Introduction::create([

            'description' => ['en' => 'Write Introduction Here' , 'ar'=>'يمكنك كتابة المقدمة هنا'],
            'image' => 'introduction.png',
        ]);
    }
}
