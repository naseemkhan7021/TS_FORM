<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ImgViewModel extends Component
{

    // imgdata img data come from parant
    public $imgdata;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($imgdata)
    {
        //
        $this->imgdata = $imgdata;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        
        return view('components.img-view-model',[
            'data'=>'compponent'
        ]);
    }
}
