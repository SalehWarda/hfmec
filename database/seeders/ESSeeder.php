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

            'es' => ['en' => 'Write Expertise Summary  Here' , 'ar'=>'يمكنك كتابة تلخيص الخبرة هنا'],
            'image' => 'es.png',
        ]);
    }
}
