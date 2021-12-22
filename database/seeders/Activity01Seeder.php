<?php

namespace Database\Seeders;

// use App\Models\forms_01\Activity01;

use App\Models\forms_01\activity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class Activity01Seeder extends Seeder
{



    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // activity::truncate();

        $add_data = [
            ['activity_description' => 'EXCAVATION  (Only if under TSCPL Scope)', 'activity_abbr' => 'ETN'],
            ['activity_description' => 'Murum Filling / Back Filling', 'activity_abbr' => 'MFBF'],
            ['activity_description' => 'Work Below Ground Floor For Foundation', 'activity_abbr' => 'WBGFFF'],
            ['activity_description' => 'Reinforcement Bar Shifting & Fixing', 'activity_abbr' => 'RBSF'],
            ['activity_description' => 'Reinforcement Bar Cutting', 'activity_abbr' => 'RBC'],
            ['activity_description' => 'Reinforcement Bar Bending', 'activity_abbr' => 'RBB'],
            ['activity_description' => 'Erection & Dismantling Of Batching Plant By Use Of Mobile Crane', 'activity_abbr' => 'EDOBPBUOMC'],
            ['activity_description' => 'Batching Plant Operation', 'activity_abbr' => 'BPO'],
            ['activity_description' => 'Transit Mixer', 'activity_abbr' => 'TM'],
            ['activity_description' => 'Concreting', 'activity_abbr' => 'C'],
            ['activity_description' => 'Cube Testing', 'activity_abbr' => 'CT'],
            ['activity_description' => 'Concreting With Concrete Pump', 'activity_abbr' => 'CWCP'],
            ['activity_description' => 'Conventional Shuttering', 'activity_abbr' => 'CS'],
            ['activity_description' => 'Conventional Deshuttering', 'activity_abbr' => 'CD'],
            ['activity_description' => 'Shuttering Activities', 'activity_abbr' => 'SA'],
            ['activity_description' => 'Deshuttering Activities', 'activity_abbr' => 'DA'],
            ['activity_description' => 'Cement Storage', 'activity_abbr' => 'CS'],
            ['activity_description' => 'General Store', 'activity_abbr' => 'GS'],
            ['activity_description' => 'Erection & Dismantling of Tower crane by use of Mobile crane', 'activity_abbr' => 'EDTM'],
            ['activity_description' => 'Structural Steel Erection', 'activity_abbr' => 'SSE'],
            ['activity_description' => 'Material Loading Unloading by Mini Crane', 'activity_abbr' => 'MLUMC'],
            ['activity_description' => 'Inspecting crane boom movement', 'activity_abbr' => 'I'],
            ['activity_description' => 'Finishing (Masonry / Plastering / Gypsum Plastering & Waterproofing)', 'activity_abbr' => 'FMPGPW'],
            ['activity_description' => 'Curing of plaster, brickwork, concrete etc.', 'activity_abbr' => 'C'],
            ['activity_description' => 'Scaffolding Erection & Dismantling', 'activity_abbr' => 'SED'],
            ['activity_description' => 'Hacking', 'activity_abbr' => 'H'],
            ['activity_description' => 'Screening of sand', 'activity_abbr' => 'S'],
            ['activity_description' => 'External plaster activity', 'activity_abbr' => 'E'],
            ['activity_description' => 'Housekeeping at site', 'activity_abbr' => 'H'],
            ['activity_description' => 'Floor Cleaning', 'activity_abbr' => 'FC'],
            ['activity_description' => 'Erection of debris chute', 'activity_abbr' => 'E'],
            ['activity_description' => 'Debris removal on Ground floor', 'activity_abbr' => 'DG'],
            ['activity_description' => 'Use of Passenger & Material Hoist / Lift', 'activity_abbr' => 'UPMHL'],
            ['activity_description' => 'Erection & Dismantling of Material & Passenger Hoist / Lift', 'activity_abbr' => 'EDMPHL'],
            ['activity_description' => 'Material loading / unloading by material hoist', 'activity_abbr' => 'M'],
            ['activity_description' => 'Use of lifting equipments', 'activity_abbr' => 'U'],
            ['activity_description' => 'Material Storage', 'activity_abbr' => 'MS'],
            ['activity_description' => 'Storage of hazardous substances & flammable material', 'activity_abbr' => 'S'],
            ['activity_description' => 'Storage of Pressurised & Empty compressed Gas Cylinders', 'activity_abbr' => 'SPEGC'],
            ['activity_description' => 'Electrical work', 'activity_abbr' => 'E'],
            ['activity_description' => 'Painting work', 'activity_abbr' => 'P'],
            ['activity_description' => 'Plumbing work', 'activity_abbr' => 'P'],
            ['activity_description' => 'Sleeve fixing', 'activity_abbr' => 'S'],
            ['activity_description' => 'Lifting & Shifting Of ISMB / ISMC Beams', 'activity_abbr' => 'LSOISMBISMCB'],
            ['activity_description' => 'Wall Grinding', 'activity_abbr' => 'WG'],
            ['activity_description' => 'Anchor Fastener Fixing', 'activity_abbr' => 'AFF'],
            ['activity_description' => 'Wall / Structure Breaking', 'activity_abbr' => 'WSB'],
            ['activity_description' => 'Finishing (Grindng / Cutting)', 'activity_abbr' => 'FGC'],
            ['activity_description' => 'Welding Operations', 'activity_abbr' => 'WO'],
            ['activity_description' => 'Gas Cutting Operations', 'activity_abbr' => 'GCO'],
            ['activity_description' => 'Living In Labour Camp', 'activity_abbr' => 'LILC'],
            ['activity_description' => 'Working In Office', 'activity_abbr' => 'WIO'],
            ['activity_description' => 'Silo Painting', 'activity_abbr' => 'SP'],
            ['activity_description' => 'Ascending & Descending On Tower Crane', 'activity_abbr' => 'ADOTC'],
            ['activity_description' => 'Security', 'activity_abbr' => 'S'],
            ['activity_description' => 'Concreting By Wheel Barrow', 'activity_abbr' => 'CBWB'],
            ['activity_description' => 'Walking On Floor And Climbing On Staircases', 'activity_abbr' => 'WOFACOS'],
            ['activity_description' => 'Erection Of 17 Ton Structured Beam Using Chain Pulley', 'activity_abbr' => 'EOTSBUCP'],
            ['activity_description' => 'Installation, Cleaning And Dismantling Of Horizontal & Vertical Safety Nets', 'activity_abbr' => 'ICADOHVSN'],
            ['activity_description' => 'Barricading & Lifeline Installation', 'activity_abbr' => 'BLI'],
            ['activity_description' => 'Marble / Kota Cutting By Stone Cutting Machine', 'activity_abbr' => 'MKCBSCM'],
            ['activity_description' => 'Erection Of Tower Crane By Use Of Mobile Crane', 'activity_abbr' => 'EOTCBUOMC'],
            ['activity_description' => 'Dismantling Of Tower Crane By Use Of Mobile Crane', 'activity_abbr' => 'DOTCBUOMC'],
            ['activity_description' => 'Tower Crane Operations', 'activity_abbr' => 'TCO'],
            ['activity_description' => 'Cross Beam', 'activity_abbr' => 'CB'],
            ['activity_description' => 'Rebar Threading', 'activity_abbr' => 'RT'],
            ['activity_description' => 'Rock Anchoring ', 'activity_abbr' => 'RA'],
            ['activity_description' => 'Concreting by Boom Placer ', 'activity_abbr' => 'CBP'],
            ['activity_description' => 'Vehicle Movement', 'activity_abbr' => 'VM'],
            ['activity_description' => 'Grinding for painting preparations', 'activity_abbr' => 'G'],
            ['activity_description' => 'Welding by MIG welding machine', 'activity_abbr' => 'WMIG'],
            ['activity_description' => 'Wall tie removing', 'activity_abbr' => 'W'],
            ['activity_description' => 'Tower crane Dismantling (Manually)', 'activity_abbr' => 'TDM'],
            ['activity_description' => 'Fixing of external platform for loading & unloading (Cantilever Platform)', 'activity_abbr' => 'FCP'],
            ['activity_description' => 'Climbing of Tower Crane ', 'activity_abbr' => 'CTC'],
            ['activity_description' => 'Erection of self-erecting mobile crane  ', 'activity_abbr' => 'E'],
            ['activity_description' => 'Rope Suspended Work Platform (RSWP) / Cradle / Gandola', 'activity_abbr' => 'RSWPRSWPCG'],
            ['activity_description' => 'Boulder Net Fixing', 'activity_abbr' => 'BNF'],
            ['activity_description' => 'Removal of Tower Crane mast', 'activity_abbr' => 'RTC'],
            ['activity_description' => 'Safety Screen', 'activity_abbr' => 'SS'],
            ['activity_description' => 'Cooking in Labour Camp', 'activity_abbr' => 'CLC'],
            ['activity_description' => 'Retaining Wall', 'activity_abbr' => 'RW'],
            ['activity_description' => 'Lift Shaft Duct closing', 'activity_abbr' => 'LSD'],
            ['activity_description' => 'Assembly, Erection, Jumping & Dismantling of PERI platforms', 'activity_abbr' => 'AEJDPERI'],
            ['activity_description' => 'Anti Mosquito Fogging ', 'activity_abbr' => 'AMF'],
            ['activity_description' => 'BR Platform', 'activity_abbr' => 'BRP'],
            ['activity_description' => 'Block cutting by Circular saw', 'activity_abbr' => 'BC'],
            ['activity_description' => 'PERI Shuttering & De-shuttering ', 'activity_abbr' => 'PERISD'],
            ['activity_description' => 'Installation of PERI working platform', 'activity_abbr' => 'IPERI'],
            ['activity_description' => 'Excavator Unloading, Work activities & Loading', 'activity_abbr' => 'EUWL'],
            ['activity_description' => 'Shifting of materials using material chute', 'activity_abbr' => 'S'],
            ['activity_description' => 'PERI shuttering and deshuttering (Skydeck)', 'activity_abbr' => 'PERIS'],
            ['activity_description' => 'Casted Wall / Structure Cutting', 'activity_abbr' => 'CWSC'],
            ['activity_description' => 'Concreting by mobile boom placer (truck mounted)', 'activity_abbr' => 'C'],
            ['activity_description' => 'Human Behaviour (To be considered for all activities involving human labour)', 'activity_abbr' => 'HBT'],
            ['activity_description' => 'Grouting activities', 'activity_abbr' => 'G'],
            ['activity_description' => 'Working on external face of tower / building', 'activity_abbr' => 'W'],
            ['activity_description' => 'Mode of Manual Material Handling', 'activity_abbr' => 'MMMH'],
            ['activity_description' => 'RCC framing strengthening work for resting or jumping of tower crane and placer boom', 'activity_abbr' => 'RCC'],
            ['activity_description' => 'Core Cutting', 'activity_abbr' => 'CC'],
            ['activity_description' => 'Grinding work on building exterior using full periphery working platform', 'activity_abbr' => 'G'],
            ['activity_description' => 'Employees coming in contact with Coronavirus COVID-19', 'activity_abbr' => 'ECCOVID'],

        ];
        //

        activity::insert($add_data);
    }
}
