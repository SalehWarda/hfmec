<?php

namespace Database\Seeders;

use App\Models\Backend\About\IMSPolicy;
use Illuminate\Database\Seeder;

class IMSPlicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        IMSPolicy::create([

            'imsPolicy' => ['en' => 'Write IMS Policy  Here' , 'ar'=>'يمكنك كتابة سياسةIMS هنا'],
            'image' => 'ims.png',
        ]);
    }
}
