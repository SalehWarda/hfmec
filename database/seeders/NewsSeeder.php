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

            'title' => ['en' => 'NEW WEBSITE FOR FAHD ALIREZA ENGINEERING CONSULTANTS (HFMEC)',
                'ar' => 'HFMEC
سنقوم بإعداد رسالة إخبارية محدثة قريبًا ، ولكن في غضون ذلك ، قم بتضمين النشرة الإخبارية السابقة للحصول على معلومات.                   '],

            'content' => ['en' => 'HFMEC is pleased to announce that its new and updated website is now live.  We are pleased to welcome you and invite you to visit HFMEC.com and see the wealth of skill, expertise and experience that we can bring to bear to solve your most difficult and important challenge.
                                  We will be preparing an updated newsletter soon, but in the meantime include our previous newsletter for information.',
                'ar' => 'يسر HFMEC أن تعلن أن موقعها الإلكتروني الجديد والمحدّث أصبح الآن مباشرًا. يسعدنا أن نرحب بكم وندعوكم لزيارة موقع HFMEC.com ورؤية ثروة من المهارات والخبرات والخبرة التي يمكننا تقديمها لحل أصعب التحديات التي تواجهونها.

سنقوم بإعداد رسالة إخبارية محدثة قريبًا ، ولكن في غضون ذلك ، قم بتضمين النشرة الإخبارية السابقة للحصول على معلومات.              '],
            'image' => 'news.png'

        ]);
    }
}
