<?php

namespace Database\Seeders;

use App\Models\Backend\About\VV;
use Illuminate\Database\Seeder;

class VVSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VV::create([

            'vv' => ['en' => 'Write Vision and Value Here' , 'ar'=>'يمكنك كتابة الرؤيا هنا'],
            'image' => 'vv.png',
        ]);
    }
}
