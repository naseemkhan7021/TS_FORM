<?php

namespace Database\Seeders;

use App\Models\forms_22\topic_discussed;
use Illuminate\Database\Seeder;

class TopicDiscussSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    protected $topic_discusseds = [
        [ 'topic_discusseds_description' => 'General Safety & EHS Policy',  'topic_discusseds_abbr' => 'GS&EHSP' ],
        [ 'topic_discusseds_description' => 'Housekeeping & Cleaning',  'topic_discusseds_abbr' => 'H&C' ],
        [ 'topic_discusseds_description' => 'Working at Height ',  'topic_discusseds_abbr' => 'W@H' ],
        [ 'topic_discusseds_description' => 'Welding & Gas Cutting ',  'topic_discusseds_abbr' => 'W&GC' ],
        [ 'topic_discusseds_description' => 'Lifting Practices ',  'topic_discusseds_abbr' => 'LP' ],
        [ 'topic_discusseds_description' => 'Fire Prevention & Protection ',  'topic_discusseds_abbr' => 'FP&P' ],
        [ 'topic_discusseds_description' => 'Meaning of Signage & Posters',  'topic_discusseds_abbr' => 'MofS&P' ],
        [ 'topic_discusseds_description' => 'Personal Protective Equipment',  'topic_discusseds_abbr' => 'PPE' ],
        [ 'topic_discusseds_description' => 'Scaffolding & Ladders',  'topic_discusseds_abbr' => 'S&l' ],
        [ 'topic_discusseds_description' => 'Electrical Safety ',  'topic_discusseds_abbr' => 'ES' ],
        [ 'topic_discusseds_description' => 'First Aid & Accident Reporting ',  'topic_discusseds_abbr' => 'FA&AR' ],
        [ 'topic_discusseds_description' => 'Assembly Points  ',  'topic_discusseds_abbr' => 'AP' ],
        [ 'topic_discusseds_description' => 'Emergency Escape Routes  ',  'topic_discusseds_abbr' => 'EER' ],
        [ 'topic_discusseds_description' => 'General Overview of Site  ',  'topic_discusseds_abbr' => 'GOofS' ]
    ];


    public function run()
    {
        // topic_discussed::create([
        //     'topic_discusseds_description' => 'General Safety & EHS Policy', 'topic_discusseds_abbr' => 'OEWA'
        // ]);

        foreach($this->topic_discusseds as $td) {
            topic_discussed::create($td);
        }


    }
}
