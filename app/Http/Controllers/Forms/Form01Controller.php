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
        return view('forms.forms_01.administrative_control_mitigative.index');
    }


    public function index_administrative_control_preventive()
    {
        return view('forms.forms_01.administrative_control_preventive.index');
    }


    public function index_engineering_control()
    {
        return view('forms.forms_01.engineering_control.index');
    }


    public function index_consequences_control()
    {
        return view('forms.forms_01.consequences_control.index');
    }


    public function index_duration_of_exposure()
    {
        return view('forms.forms_01.duration_of_exposure.index');
    }







}
