<?php

namespace Database\Seeders;

use App\Models\forms_66\SubActivity66;
use Illuminate\Database\Seeder;

class SubActivity66Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            ['sub_activity_description'=>'Marking','sub_activity_abbr' => 'MG'],
            ['sub_activity_description'=>'Demarcation of points by  paints','sub_activity_abbr' => 'DOP'],
            ['sub_activity_description'=>'Survey in barren area or in jungle area','sub_activity_abbr' => 'SIB'],
            ['sub_activity_description'=>'Levelling of land by machinery','sub_activity_abbr' => 'LOL'],
            ['sub_activity_description'=>'In Public','sub_activity_abbr' => 'IP'],
            ['sub_activity_description'=>'Material handling ','sub_activity_abbr' => 'MH'],
            ['sub_activity_description'=>'Ground levelling ','sub_activity_abbr' => 'GL'],
            ['sub_activity_description'=>'Excavation ','sub_activity_abbr' => 'E'],
            ['sub_activity_description'=>'MS angles penetration into ground & MS sheet fixing','sub_activity_abbr' => 'MAP'],
            ['sub_activity_description'=>'Hot work ','sub_activity_abbr' => 'HW'],
            ['sub_activity_description'=>'Equipment mobilization ','sub_activity_abbr' => 'EM'],
            ['sub_activity_description'=>'Loading & unloading ','sub_activity_abbr' => 'L&U'],
            ['sub_activity_description'=>'Movement of transit mixture ','sub_activity_abbr' => 'MOT'],
            ['sub_activity_description'=>'Concrete pouring ','sub_activity_abbr' => 'CP'],
            ['sub_activity_description'=>'Equipment mobilization','sub_activity_abbr' => 'EM'],
            ['sub_activity_description'=>'Use of excavator','sub_activity_abbr' => 'UOE'],
            ['sub_activity_description'=>'Removal of earth','sub_activity_abbr' => 'ROE'],
            ['sub_activity_description'=>'Use of electricity','sub_activity_abbr' => 'UOE'],
            ['sub_activity_description'=>'Machinery maintenance','sub_activity_abbr' => 'MM'],
            ['sub_activity_description'=>'Material Handling (Unloading from trailer)','sub_activity_abbr' => 'MH('],
            ['sub_activity_description'=>'Material stacking','sub_activity_abbr' => 'MS'],
            ['sub_activity_description'=>'Cutting  & Bending of Rebars','sub_activity_abbr' => 'C&B'],
            ['sub_activity_description'=>'Rebar Fixing ','sub_activity_abbr' => 'RF'],
            ['sub_activity_description'=>'Lifting of Reinforcement by tower crane or passenger cum material lift ','sub_activity_abbr' => 'LOR'],
            ['sub_activity_description'=>'Scrap Disposal','sub_activity_abbr' => 'SD'],
            ['sub_activity_description'=>'Use of Cover Block','sub_activity_abbr' => 'UOC'],
            ['sub_activity_description'=>'Bar bending & Bar cutting operation','sub_activity_abbr' => 'BB&B'],
            ['sub_activity_description'=>'Machinery maintenance','sub_activity_abbr' => 'MM'],
            ['sub_activity_description'=>'Arc Welding work','sub_activity_abbr' => 'AWW'],
            ['sub_activity_description'=>'Gas cutting work','sub_activity_abbr' => 'GCW'],
            ['sub_activity_description'=>'Transportation of Assembled Columns, Rafters, Pedestals etc.','sub_activity_abbr' => 'TOA'],
            ['sub_activity_description'=>'Lifting , Positioning & Alignment of Rafter, Column etc. By Lifting Equipment like Hydra Crane and Chery Pecker','sub_activity_abbr' => 'L,P'],
            ['sub_activity_description'=>'Manual Material handling','sub_activity_abbr' => 'MMH'],
            ['sub_activity_description'=>'Formwork fixing','sub_activity_abbr' => 'FF'],
            ['sub_activity_description'=>'Concrete casting or pouring ','sub_activity_abbr' => 'CCO'],
            ['sub_activity_description'=>'Concrete pump operation','sub_activity_abbr' => 'CPO'],
            ['sub_activity_description'=>'General lights & Power tool operations','sub_activity_abbr' => 'Gl&'],
            ['sub_activity_description'=>'Concrete waste','sub_activity_abbr' => 'CW'],
            ['sub_activity_description'=>'Concrete pump operation','sub_activity_abbr' => 'CPO'],
            ['sub_activity_description'=>'By bucket','sub_activity_abbr' => 'BB'],
            ['sub_activity_description'=>'Use  of floater machine','sub_activity_abbr' => 'U O'],
            ['sub_activity_description'=>'Mobile Crane Operation for Tower crane erecting ','sub_activity_abbr' => 'MCO'],
            ['sub_activity_description'=>'Foundation of tower crane','sub_activity_abbr' => 'FOT'],
            ['sub_activity_description'=>'Tower crane Erecting ','sub_activity_abbr' => 'TCE'],
            ['sub_activity_description'=>'use of telescopic crane for tower crane erection ','sub_activity_abbr' => 'UOT'],
            ['sub_activity_description'=>'Tower Crane operation','sub_activity_abbr' => 'TCO'],
            ['sub_activity_description'=>'Tower crane  maintenance','sub_activity_abbr' => 'TC'],
            ['sub_activity_description'=>'Tower Crane operation for Boom placer erection & dismantling','sub_activity_abbr' => 'TCO'],
            ['sub_activity_description'=>'Electrical connections','sub_activity_abbr' => 'EC'],
            ['sub_activity_description'=>'Boom placer Jumping','sub_activity_abbr' => 'BPJ'],
            ['sub_activity_description'=>'Boom placer   maintenance','sub_activity_abbr' => 'BP'],
            ['sub_activity_description'=>'Erection & Height Extension  of passenger cum material lift','sub_activity_abbr' => 'E&H'],
            ['sub_activity_description'=>'Electrical connections','sub_activity_abbr' => 'EC'],
            ['sub_activity_description'=>'Passenger hoist operation','sub_activity_abbr' => 'PHO'],
            ['sub_activity_description'=>'Drilling holes in  MS Sections','sub_activity_abbr' => 'DHI'],
            ['sub_activity_description'=>'Gas Cutting ','sub_activity_abbr' => 'GC'],
            ['sub_activity_description'=>'Square tube cutting','sub_activity_abbr' => 'STC'],
            ['sub_activity_description'=>'Vehicle movement','sub_activity_abbr' => 'VM'],
            ['sub_activity_description'=>'Flammable Paint & thinner handling','sub_activity_abbr' => 'FP&'],
            ['sub_activity_description'=>'Material shifting by passenger hoist ','sub_activity_abbr' => 'MSB'],
            ['sub_activity_description'=>'Marble/ Stone & tile cutting operation','sub_activity_abbr' => 'MS&'],
            ['sub_activity_description'=>'Material shifting by Tower crane','sub_activity_abbr' => 'MSB'],
            ['sub_activity_description'=>'Scrap generation by pipe cutting & threading operation','sub_activity_abbr' => 'SGB'],
            ['sub_activity_description'=>'Manual shifting of conduit pipes, Electric panels, cable drums and brackets ','sub_activity_abbr' => 'MSO'],
            ['sub_activity_description'=>'Bus bar panel & electric cable fixing in electric shaft.','sub_activity_abbr' => 'BBP'],
            ['sub_activity_description'=>'Generation of electric and electronic waste ','sub_activity_abbr' => 'GOE'],
            ['sub_activity_description'=>'Block & plaster material','sub_activity_abbr' => 'B&P'],
            ['sub_activity_description'=>'Blocks & cement bag shifting','sub_activity_abbr' => 'B&C'],
            ['sub_activity_description'=>'Power tool operations','sub_activity_abbr' => 'PTO'],
            ['sub_activity_description'=>'Flammable Paint & thinner handling','sub_activity_abbr' => 'FP&'],
            ['sub_activity_description'=>'Material loading and unloading','sub_activity_abbr' => 'MLA'],
            ['sub_activity_description'=>'Mobilization of mobile crane ','sub_activity_abbr' => 'MOM'],
            ['sub_activity_description'=>'Dismantling of jib & operator cabin','sub_activity_abbr' => 'DOJ'],
            ['sub_activity_description'=>'Removal of masts','sub_activity_abbr' => 'ROM'],
            ['sub_activity_description'=>'cutting support bar by gas cutting equipment as required','sub_activity_abbr' => 'CSB'],
            ['sub_activity_description'=>'storage of dismantled material','sub_activity_abbr' => 'SOD'],
            ['sub_activity_description'=>'Shifting of dismantling crane from location to other site','sub_activity_abbr' => 'SOD'],
            ['sub_activity_description'=>'Disassembling of top moving pipe line and other parts by help of tower crane.','sub_activity_abbr' => 'DOT'],
            ['sub_activity_description'=>'Dismantling of pipe line from concrete pump to boom placer.','sub_activity_abbr' => 'DOP'],
            ['sub_activity_description'=>'cutting support bar by gas cutter as per requirement .','sub_activity_abbr' => 'CSB'],
            ['sub_activity_description'=>'storage of dismantling material.','sub_activity_abbr' => 'SOD'],
            ['sub_activity_description'=>'Transportation of materials','sub_activity_abbr' => 'TOM'],
            ['sub_activity_description'=>'Material storage & handling ','sub_activity_abbr' => 'Ms&'],
            ['sub_activity_description'=>'Use of electricity for running lighting and other activity ','sub_activity_abbr' => 'UOE'],
            ['sub_activity_description'=>'Storage and dispensing of diesel fuel for site transport vehicle.','sub_activity_abbr' => 'SAD'],
            ['sub_activity_description'=>'Hazardous material handling (chemicals, oils. etc.)','sub_activity_abbr' => 'HMH'],
            ['sub_activity_description'=>'Making of labour camp','sub_activity_abbr' => 'MOL'],
            ['sub_activity_description'=>'Cooking','sub_activity_abbr' => 'CG'],
            ['sub_activity_description'=>'Electrical connections','sub_activity_abbr' => 'EC'],
            ['sub_activity_description'=>'Housekeeping , cleaning and waste water generated from washing and welfare facilities.  ','sub_activity_abbr' => 'H,C'],
            ['sub_activity_description'=>'Travelling by vehicle to office','sub_activity_abbr' => 'TBV'],
            ['sub_activity_description'=>'Working in office','sub_activity_abbr' => 'WIO'],
            ['sub_activity_description'=>'Employees coming to and fro site and home','sub_activity_abbr' => 'ECT'],
            ['sub_activity_description'=>'Employees entering / exiting project site','sub_activity_abbr' => 'EE'],
            ['sub_activity_description'=>'Employees working on project site','sub_activity_abbr' => 'EWO'],
        ];
        SubActivity66::insert($data);
    }
}
