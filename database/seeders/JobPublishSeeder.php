<?php

namespace Database\Seeders;

use App\Models\Backend\JobPublish;
use Illuminate\Database\Seeder;

class JobPublishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        JobPublish::create([


            'title' => ['en' => 'We are in need of an Architect job with the requirements below.',
                'ar' => 'نحن بحاجة لوظيفة مهندس معماري بالمتطلبات الموجودة أدناه.'],
            'content' => ['en' => 'He holds a certificate
                                   He has 3 or more years of experience
                                   Work under pressure',
                           'ar' => 'حاصل على شهادة
                                   لديه 3 سنوات أو أكثر من الخبرة
عمل تحت الضغط                                      '],
        ]);
        JobPublish::create([


            'title' => ['en' => 'We are in need of an Civil job with the requirements below.',
                'ar' => 'نحن بحاجة لوظيفة مهندس مدني بالمتطلبات الموجودة أدناه.'],
            'content' => ['en' => 'He holds a certificate
                                   He has 3 or more years of experience
                                   Work under pressure',
                           'ar' => 'حاصل على شهادة
                                   لديه 3 سنوات أو أكثر من الخبرة
عمل تحت الضغط                                      '],
        ]);
    }
}
