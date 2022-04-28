<?php

namespace Database\Seeders;

use App\Models\Backend\Project;
use App\Models\Backend\Service;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $faker = Factory::create();

        $services = Service::whereStatus(1)->pluck('id');


            $projects = Project::create([

                'name' => ['en' =>  $faker->sentence(2,true), 'ar'=> $faker->sentence(2,true)] ,
                'slug' =>$faker->unique()->slug(2,true),
                'description' => ['en' =>  $faker->paragraph, 'ar'=> $faker->paragraph],
                'client' =>$faker->sentence(2,true),
                'service_id' =>$services->random(),
                'location' => $faker->address,
                'commencement_date' => $faker->date,
                'status' =>true,
                'created_at' =>now(),
                'updated_at' =>now(),


            ]) ;


            $projects = Project::create([

                'name' => ['en' =>  $faker->sentence(2,true), 'ar'=> $faker->sentence(2,true)] ,
                'slug' =>$faker->unique()->slug(2,true),
                'description' => ['en' =>  $faker->paragraph, 'ar'=> $faker->paragraph],
                'client' =>$faker->sentence(2,true),
                'service_id' =>$services->random(),
                'location' => $faker->address,
                'commencement_date' => $faker->date,
                'status' =>true,
                'created_at' =>now(),
                'updated_at' =>now(),


            ]) ;


            $projects = Project::create([

                'name' => ['en' =>  $faker->sentence(2,true), 'ar'=> $faker->sentence(2,true)] ,
                'slug' =>$faker->unique()->slug(2,true),
                'description' => ['en' =>  $faker->paragraph, 'ar'=> $faker->paragraph],
                'client' =>$faker->sentence(2,true),
                'service_id' =>$services->random(),
                'location' => $faker->address,
                'commencement_date' => $faker->date,
                'status' =>true,
                'created_at' =>now(),
                'updated_at' =>now(),


            ]) ;


        for ($i=0; $i<=20;$i++){
             Project::create([

                'name' => ['en' =>  $faker->sentence(2,true), 'ar'=> $faker->sentence(2,true)] ,
                'slug' =>$faker->unique()->slug(2,true),
                'description' => ['en' =>  $faker->paragraph, 'ar'=> $faker->paragraph],
                'client' =>$faker->sentence(2,true),
                'service_id' =>$services->random(),
                'location' => $faker->address,
                'commencement_date' => $faker->dateTimeBetween('-7 months', 'now'),
                'status' =>true,
                'created_at' =>now(),
                'updated_at' =>now(),


            ]) ;

        }


    }
}
