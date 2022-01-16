<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Database\Seeders\SubstandActionSeeder;
// use Database\Seeders\PotentialInjurytoSeeder;
// use Database\Seeders\SubstandConditionSeeder;
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

            // CompanySeeder::class,
            // DepartmentSeeder::class,
            // ProjectsSeeder::class,
            // DefaultdataSeeder::class,
            // DocumentSeeder::class,

            // general data
            RoleSeeder::class,
            ReligionSeeder::class,
            GenderSeeder::class,
            AddresstypeSeeder::class, // *
            DesignationSeeder::class, // *
            LanguageSeeder::class, //*
            NationalitySeeder::class, // **
            OccupationSeeder::class, //*
            RelationtypeSeeder::class, // *
            QualificationSeeder::class, // *

            // command data 
            PotentialInjurytoSeeder::class,
            // form 01 data 
            Activity01Seeder::class,
            SubActivity01::class,
            causes01Seeder::class,
            SubCauses01Seeder::class,
            AdministrativeCtrMitigative::class,
            AdministrativeCtrPreventive::class,
            ConsequenceCtr::class,
            DurationOfExposure::class,
            EngineeringCtr::class,
            PotentialHazard::class,
            PreventiveIncidentCtr::class,
            ProbableConsequence::class,
            RiskConsequence::class,
            RiskProbability::class,
            
            // form 15 data 
            Activity15Seeder::class,
            Cause15Seeder::class,
            ImdActionSeeder::class,
            ContributingCauseSeeder::class,
            ImdCorrectionSeeder::class,
            NatureOfPotentialInjurySeeder::class,
            WhyunsafeactCommittedSeeder::class,
            // form 17 data 
            SubstandActionSeeder::class,
            SubstandConditionSeeder::class,
            // form 22 data 
            TopicDiscussSeeder::class,
            // form 28 data 
            PrioritytimescaleSeeder::class,
            // form 35 data
            Form35CheckpointSeeder::class,
            Form35LabelsSeeder::class,
            // form 16 data 
            Activity66Seeder::class,
            SubActivity66Seeder::class,
            EnvironmentalImpactSeeder::class,
            OrganizationRequirementSeeder::class,
            ScaleOfImpactSeeder::class,
            SevertyOfImpactSeeder::class,
            DurationOfImpactSeeder::class,
            ProbabilitySeeder::class,

            // ConverationSeeder::class,
            // LeadsourceSeeder::class,

            // default 72 forms data 
            DDDSeeder::class,


        ]);
    }
}
