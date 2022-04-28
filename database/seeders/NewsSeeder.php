<?php

namespace Database\Seeders;

use App\Models\Backend\NewCompany;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        NewCompany::create([

            'title' => ['en' => 'write title here ...', 'ar' => 'اكتب العنوان هنا...'],
            'content' => ['en' => 'write content here...', 'ar' => 'اكتب المحتوى هنا...'],
            'image' => 'news.png'

        ]);
    }
}
