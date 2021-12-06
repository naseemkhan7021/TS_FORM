<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\GenderSeeder;
use Database\Seeders\LanguageSeeder;
use Database\Seeders\ReligionSeeder;
use Database\Seeders\SalesunitSeeder;
use Database\Seeders\Activity15Seeder;
use Database\Seeders\LeadsourceSeeder;
use Database\Seeders\OccupationSeeder;
use Database\Seeders\AddresstypeSeeder;
use Database\Seeders\ConverationSeeder;
use Database\Seeders\DesignationSeeder;
use Database\Seeders\NationalitySeeder;
use Database\Seeders\PaymentmodeSeeder;
use Database\Seeders\QualificationSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            Activity15Seeder::class,
            AddresstypeSeeder::class,
            ConverationSeeder::class,
            DesignationSeeder::class,
            GenderSeeder::class,
            LanguageSeeder::class,
            LeadsourceSeeder::class,
            LeadstatusSeeder::class,
            NationalitySeeder::class,
            OccupationSeeder::class,
            PaymentmodeSeeder::class,
            QualificationSeeder::class,
            ReligionSeeder::class,
            RoleSeeder::class,
        ]);
    }
}
