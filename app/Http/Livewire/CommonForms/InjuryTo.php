<?php

namespace App\Http\Livewire\CommonForms;

use App\Models\common_forms\PotentialInjuryto;
use Livewire\Component;

class InjuryTo extends Component
{

    public function render()
    {
        $potentialinurydata  = PotentialInjuryto::all();

        return view('livewire.common-forms.injury-to', [
            'potentialinurydata' => $potentialinurydata ,
        ]);
    }
}
