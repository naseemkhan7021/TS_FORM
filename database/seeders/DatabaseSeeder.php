<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Database\Seeders\CompanySeeder;
// use Database\Seeders\ProjectsSeeder;
// use Database\Seeders\DepartmentSeeder;
// use Database\Seeders\DefaultdataSeeder;
// use Database\Seeders\RoleSeeder;
// use Database\Seeders\GenderSeeder;
// use Database\Seeders\LanguageSeeder;
// use Database\Seeders\ReligionSeeder;
// use Database\Seeders\SalesunitSeeder;
// use Database\Seeders\Activity15Seeder;
// use Database\Seeders\LeadsourceSeeder;
// use Database\Seeders\OccupationSeeder;
// use Database\Seeders\AddresstypeSeeder;
// use Database\Seeders\ConverationSeeder;
// use Database\Seeders\DesignationSeeder;
// use Database\Seeders\NationalitySeeder;
// use Database\Seeders\PaymentmodeSeeder;
// use Database\Seeders\QualificationSeeder;

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
            // Activity15Seeder::class,
            // Cause15Seeder::class,
            // ContributingCauseSeeder::class,
            // ImdActionSeeder::class,
            // ImdCorrectionSeeder::class,
            // NatureOfPotentialInjurySeeder::class,
            // WhyunsafeactCommittedSeeder::class,

            // CompanySeeder::class,
            // DepartmentSeeder::class,
            // ProjectsSeeder::class,
            // DefaultdataSeeder::class,
            // DocumentSeeder::class,
            // PotentialInjurytoSeeder::class,
            Activity15Seeder::class,
            Cause15Seeder::class,
            // CompanySeeder::class,
            ContributingCauseSeeder::class,
            // ConverationSeeder::class,
            DefaultdataSeeder::class,
            DepartmentSeeder::class,
            DocumentSeeder::class,
            GenderSeeder::class,
            ImdActionSeeder::class,
            ImdCorrectionSeeder::class,
            RoleSeeder::class,
            // LeadsourceSeeder::class,
            NatureOfPotentialInjurySeeder::class,
            PotentialInjurytoSeeder::class,
            ProjectsSeeder::class,
            WhyunsafeactCommittedSeeder::class,
            AddresstypeSeeder::class, // *
            DesignationSeeder::class, // *
            LanguageSeeder::class, //*
            NationalitySeeder::class, // **
            OccupationSeeder::class, //*
            QualificationSeeder::class, //*
            RelationtypeSeeder::class, // *

        ]);
    }
}
