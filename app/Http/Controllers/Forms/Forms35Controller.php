<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Forms35Controller extends Controller
{
    // temp middleware
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_checkpoints()
    {
        # code...
        return view('forms.Forms_35.checkpoint.index');
    }

    public function index_formdata35()
    {
        # code...
        return view('forms.Forms_35.formdata35.index');
    }

}
