<?php

namespace Database\Seeders;

use App\Models\Backend\About\Introduction;
use App\Models\Backend\About\IsoCertificate;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(AdminSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(IntroductionSeeder::class);
        $this->call(VVSeeder::class);
        $this->call(ESSeeder::class);
        $this->call(IMSPlicySeeder::class);
        $this->call(IsoCertificateSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(TeamSeeder::class);
    }
}
