<?php

namespace Database\Seeders;

use App\Models\Backend\About\ES;
use Illuminate\Database\Seeder;

class ESSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ES::create([

            'es' => ['en' => 'HFMECs head office in Al-Khobar and branch offices in Yanbu and Jeddah provide the following
services to our clients in the Kingdom of Saudi Arabia:
• Architectural Design
• Landscape Architecture
• Interior Design
• Graphics and Visualization
• Engineering Design
• Telecommunication Engineering
•  Quantity Surveying and Cost Management
• Quality Health and Safety
• Construction Services' ,

                'ar'=>'يقدم المكتب الرئيسي لـ HFMEC في الخبر والمكاتب الفرعية في ينبع وجدة ما يلي
خدمات لعملائنا في المملكة العربية السعودية:
• التصميم المعماري
• هندسة المناظر الطبيعية
• تصميم داخلي
• الرسومات والتصور
• التصميم الهندسي
• هندسة الاتصالات
• مسح الكميات وإدارة التكاليف
• جودة الصحة والسلامة
• خدمات البناء'],
            'image' => 'es.png',
        ]);
    }
}
