<?php

namespace Database\Seeders;

use App\Models\Backend\Cover;
use Illuminate\Database\Seeder;

class CoverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Cover::create([

            'title' => ['ar' => 'HFMEC للحلول الصناعية',
                'en' => 'HFMEC Industrial Solutions'],
            'description' => [
                'ar' => 'الصناعة هي فن توجيه مصدر عظيم قوة',
                'en' => 'Industry is the art of directing the great source of Power'
            ],

            'image' => 'hfmec-industrial-solutions.jpg',

        ]);

        Cover::create([

            'title' => ['ar' => 'HFMEC أهلا وسهلا بكم في',
                'en' => 'Welcome to HFMEC'],
            'description' => [
                'ar' => 'تبدأ معايير الصناعة بالتقليد ولكنها تنتهي بالابتكار',
                'en' => 'Industry standards begins with imitation but ends in Innovation'
            ],

            'image' => 'welcome-to-hfmec.jpg',

        ]);

        Cover::create([

            'title' => ['ar' => 'نحن مهندسو HFMEC',
                'en' => 'We are HFMEC Engineerngs'],
            'description' => [
                'ar' => 'نحن أكبر مصنع صناعي نقدم منتجات عالية الجودة',
                'en' => 'We are the Top Industrial Manufacturer '
            ],

            'image' => 'we-are-hfmec-engineerngs.jpg',

        ]);
    }
}
