<?php

namespace Database\Seeders;

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
        $this->call([
            // AddresstypeSeeder::class,
            // ConverationSeeder::class,
            // DesignationSeeder::class,
            // GenderSeeder::class,
            // LanguageSeeder::class,
            // LeadsourceSeeder::class,
            // LeadstatusSeeder::class,
            // NationalitySeeder::class,
            // OccupationSeeder::class,
            // PaymentmodeSeeder::class,
            // QualificationSeeder::class,
            // ReligionSeeder::class,
            // RoleSeeder::class,
            // SalesunitSeeder::class,
            Activity15Seeder::class,
            Cause15Seeder::class,
            ContributingCauseSeeder::class,
            ImdActionSeeder::class,
            ImdCorrectionSeeder::class,
            NatureOfPotentialInjurySeeder::class,
            WhyunsafeactCommittedSeeder::class,
        ]);
    }
}
