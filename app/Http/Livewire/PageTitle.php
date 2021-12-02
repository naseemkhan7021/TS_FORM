<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PageTitle extends Component
{
    public $sub_title;
    public $active_title;
    public $page_title;


    public function render()
    {
        return view('livewire.page-title');
    }
}
