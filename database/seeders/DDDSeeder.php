<?php

namespace Database\Seeders;

use App\Models\common_forms\Dept_Default_Docs;
use Illuminate\Database\Seeder;

class DDDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Dept_Default_Docs::truncate();

        $ddd_data = [
            ['document_name' => 'Hazard Analysis & Risk Assessment', 'document_code' => 'EHS-F-01' ,] ,
            ['document_name' => 'Master List of Documents', 'document_code' => 'EHS-F-02',] ,
            ['document_name' => 'List of External Origin Documents', 'document_code' => 'EHS-F-03',] ,
            ['document_name' => 'Change Management Checklist', 'document_code' => 'EHS-F-04',] ,
            ['document_name' => 'Management Review Meeting Agenda', 'document_code' => 'EHS-F-05',] ,
            ['document_name' => 'Management Review Meeting Minutes ', 'document_code' => 'EHS-F-06',] ,
            ['document_name' => 'Objectives & Programme ', 'document_code' => 'EHS-F-07',] ,
            ['document_name' => 'Safety Meeting Agenda', 'document_code' => 'EHS-F-08',] ,
            ['document_name' => 'Safety Meeting Minutes', 'document_code' => 'EHS-F-09',] ,
            ['document_name' => 'Monthly Statistics Report', 'document_code' => 'EHS-F-10',] ,

            ['document_name' => 'Monthly Safety Objectives Achieved', 'document_code' => 'EHS-F-11',] ,
            ['document_name' => 'Monthly Specialized Training Summary', 'document_code' => 'EHS-F-12',] ,
            ['document_name' => 'EHS Weekly Mass Toolbox Meeting / Talk', 'document_code' => 'EHS-F-13',] ,
            ['document_name' => 'First Aid Register', 'document_code' => 'EHS-F-14',] ,
            ['document_name' => 'Nearmiss Reporting Format', 'document_code' => 'EHS-F-15',] ,
            ['document_name' => 'Incident Report Form', 'document_code' => 'EHS-F-16',] ,
            ['document_name' => 'Incident Investigation Report ', 'document_code' => 'EHS-F-17',] ,
            ['document_name' => 'Fire Extinguisher Inspection Report ', 'document_code' => 'EHS-F-18',] ,
            ['document_name' => 'Illumination Level Survey Report', 'document_code' => 'EHS-F-19',] ,
            ['document_name' => 'Noise Level Survey Report ', 'document_code' => 'EHS-F-20',] ,


            ['document_name' => 'Environment Health And Safety Inspection Report ', 'document_code' => 'EHS-F-21',] ,
            ['document_name' => 'Environment Health and Safety Induction Training', 'document_code' => 'EHS-F-22',] ,
            ['document_name' => 'EH&S Declaration by Visitors ', 'document_code' => 'EHS-F-23',] ,
            ['document_name' => 'EH&S Complaint Register', 'document_code' => 'EHS-F-24',] ,
            ['document_name' => 'Document Change Note', 'document_code' => 'EHS-F-25',] ,
            ['document_name' => 'EHS Training Feedback Form', 'document_code' => 'EHS-F-26',] ,
            ['document_name' => 'EHS Violation Notice', 'document_code' => 'EHS-F-27',] ,
            ['document_name' => 'EHS Observation Report', 'document_code' => 'EHS-F-28',] ,
            ['document_name' => 'EHS Attendance Sheet', 'document_code' => 'EHS-F-29',] ,
            ['document_name' => 'Mock Drill Record', 'document_code' => 'EHS-F-30',] ,


            ['document_name' => 'Status of LR Compliance', 'document_code' => 'EHS-F-31',] ,
            ['document_name' => 'Format for Internal Audit Schedule', 'document_code' => 'EHS-F-32',] ,
            ['document_name' => 'Internal Audit Summary Report ', 'document_code' => 'EHS-F-33',] ,
            ['document_name' => 'Format for Non-Conformity', 'document_code' => 'EHS-F-34',] ,
            ['document_name' => 'Work Permit for Working at Height ', 'document_code' => 'EHS-F-35',] ,
            ['document_name' => 'Work Permit for Hot Work ', 'document_code' => 'EHS-F-36',] ,
            ['document_name' => 'Work Permit for Electrical Work', 'document_code' => 'EHS-F-37',] ,
            ['document_name' => 'Work Permit for Confined Space Entry', 'document_code' => 'EHS-F-38',] ,
            ['document_name' => 'Work Permit for Excavation', 'document_code' => 'EHS-F-39',] ,
            ['document_name' => 'Check List for Tower Crane Erection', 'document_code' => 'EHS-F-40',] ,


            ['document_name' => 'Check List for Tower Crane Dismantling ', 'document_code' => 'EHS-F-41',] ,
            ['document_name' => 'Checklist for Tower Crane Operation', 'document_code' => 'EHS-F-42',] ,
            ['document_name' => 'Tower Crane Operator Competency Checklist', 'document_code' => 'EHS-F-43',] ,
            ['document_name' => 'Checklist for Erection of Passenger & Material Lift', 'document_code' => 'EHS-F-44',] ,
            ['document_name' => 'Checklist for Operation of Passenger & Material Lift', 'document_code' => 'EHS-F-45',] ,
            ['document_name' => 'Checklist for Hydra ', 'document_code' => 'EHS-F-46',] ,
            ['document_name' => 'Checklist for Inspection of Equipments & Vehicles ', 'document_code' => 'EHS-F-47',] ,
            ['document_name' => 'Checklist for Safety Officer', 'document_code' => 'EHS-F-48',] ,
            ['document_name' => 'Checklist for Inspection of Cutouts and Openings ', 'document_code' => 'EHS-F-49',] ,
            ['document_name' => 'Checklist for Safety Screen activities', 'document_code' => 'EHS-F-50',] ,


            ['document_name' => 'Checklist for Hydraulic Safety Screen activities', 'document_code' => 'EHS-F-51',] ,
            ['document_name' => 'Checklist for Cradle activities', 'document_code' => 'EHS-F-52',] ,
            ['document_name' => 'Checklist for First Aid Box Contents', 'document_code' => 'EHS-F-53',] ,
            ['document_name' => 'Checklist for Electrical Panel and Wiring', 'document_code' => 'EHS-F-54',] ,
            ['document_name' => 'Checklist for Fire Prevention', 'document_code' => 'EHS-F-55',] ,
            ['document_name' => 'Checklist for Scaffolding ', 'document_code' => 'EHS-F-56',] ,
            ['document_name' => 'Checklist for Portable Power Tool ', 'document_code' => 'EHS-F-57',] ,
            ['document_name' => 'Checklist for Welding Machine ', 'document_code' => 'EHS-F-58',] ,
            ['document_name' => 'Checklist for Gas Cutting Equipment', 'document_code' => 'EHS-F-59',] ,
            ['document_name' => 'Checklist for Formwork', 'document_code' => 'EHS-F-60',] ,

            ['document_name' => 'Checklist for Chain Blocks', 'document_code' => 'EHS-F-61',] ,
            ['document_name' => 'Check List for Labour Camp / Canteen ', 'document_code' => 'EHS-F-62',] ,
            ['document_name' => 'Checklist For Dust Control In Batching Plant', 'document_code' => 'EHS-F-63',] ,
            ['document_name' => 'Checklist for Portable Step Ladder ', 'document_code' => 'EHS-F-64',] ,
            ['document_name' => 'Checklist for Working Platform', 'document_code' => 'EHS-F-65',] ,
            ['document_name' => 'Environmental Risk Assessment', 'document_code' => 'EHS-F-66',] ,
            ['document_name' => 'Checklist Post COVID-19 Activities', 'document_code' => 'EHS-F-67',] ,
            ['document_name' => 'Environment Complaint Register', 'document_code' => 'EHS-F-68',] ,
            ['document_name' => 'Master List of Records ', 'document_code' => 'EHS-F-69',] ,
            ['document_name' => 'List of Internal Auditors', 'document_code' => 'EHS-F-70',] ,

            ['document_name' => 'NC Monitoring Format', 'document_code' => 'EHS-F-71',] ,
            ['document_name' => 'Training Format HRD', 'document_code' => 'EHS-F-72',],

        ];

        Dept_Default_Docs::insert($ddd_data);


    }
}
