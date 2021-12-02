<?php

namespace App\Http\Livewire;

use App\Models\crmsales\PrimaryMember;
use Livewire\Component;

class GetBookingDate extends Component
{

    public $iMemberID;
    public $dtDOBK;



    // public function mount($OneID)
    // {
    //     $this->iMemberID  = $OneID;


    // }



    public function render()
    {


        $primarymemberdata = PrimaryMember::where('primary_members.bactive','1')
            ->where('iMemberID' ,'==', $this->iMemberID )->get('*');

        return view('livewire.get-booking-date',[
            'primarymemberdata'=>$primarymemberdata
        ]);
    }
}
