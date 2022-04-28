<?php

namespace Database\Seeders;

use App\Models\Backend\About\IsoCertificate;
use Illuminate\Database\Seeder;

class IsoCertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IsoCertificate::create([

            'iso' => ['en' => 'Write Iso Certificate  Here' , 'ar'=>'يمكنك كتابة وصف الشهادة هنا'],
            'image' => 'ims.png',
        ]);
    }
}
