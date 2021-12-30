<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Forms66Controller extends Controller
{


    // temp middleware
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function index_formdata66()
    {
        return view('forms.forms_66.formdata66.index');
    }
    public function index_activity66()
    {
        return view('forms.forms_66.activity.index');
    }


    public function index_subactivity66()
    {
        return view('forms.forms_66.subactivity.index');
    }

    public function index_durationofimpact66()
    {
        return view('forms.forms_66.durationofimpact.index');
    }
    public function index_environmentalimpact66()
    {
        return view('forms.forms_66.environmentalimpact.index');
    }

    public function index_organizationrequirement66()
    {
        return view('forms.forms_66.organizationrequirement.index');
    }

    public function index_scaleofimpact66()
    {
        return view('forms.forms_66.scaleofimpact.index');
    }

    public function index_severtyofimpact66()
    {
        return view('forms.forms_66.severtyofimpact.index');
    }

    public function index_probability66()
    {
        return view('forms.forms_66.probability.index');
    }
}
