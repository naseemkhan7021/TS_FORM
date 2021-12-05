<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Form01Controller extends Controller
{
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


    // Sub Modules Used in the Main form


    public function index_activity()
    {
        return view('forms.forms_01.activity.index');
    }


    public function index_subactivity()
    {
        return view('forms.forms_01.subactivity.index');
    }

    public function index_potentialhazard()
    {
        return view('forms.forms_01.potentialhazard.index');
    }
    public function index_preventiveincidentcontrol()
    {
        return view('forms.forms_01.preventiveincidentcontrol.index');
    }
    public function index_probable_consequence()
    {
        return view('forms.forms_01.probableconsequence.index');
    }

    public function index_cause()
    {
        return view('forms.forms_01.cause.index');
    }
   
    public function index_subcause()
    {
        return view('forms.forms_01.subcause.index');
    }


    public function index_administrative_control_mitigative()
    {
        return view('forms.forms_01.administrativecontrolmitigative.index');
    }


    public function index_administrative_control_preventive()
    {
        return view('forms.forms_01.administrativecontrolpreventive.index');
    }


    public function index_engineering_control()
    {
        return view('forms.forms_01.engineeringcontrol.index');
    }
    
    public function index_risk_probability()
    {
        # code...
        return view('forms.forms_01.riskprobability.index');
    }

    public function index_risk_consequence()
    {
        # code...
        return view('forms.forms_01.riskconsequence.index');
    }


    public function index_consequences_control()
    {
        return view('forms.forms_01.consequencescontrol.index');
    }
    


    public function index_duration_of_exposure()
    {
        return view('forms.forms_01.durationofexposure.index');
    }







}
