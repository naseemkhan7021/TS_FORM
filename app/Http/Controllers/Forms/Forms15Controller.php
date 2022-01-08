<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use App\Models\forms_15\formdata_15;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PDF;

class Forms15Controller extends Controller
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

    public function ganaratePDF()
    {
        # code...

        // dd($this->cid);
        // $data = formdata_15::find($this->cid);
        // Excel::download(new FormsFormData15($data), 'test.pdf');
        // Excel->download(new EXPFormsData15,'');
        // $pdf = app('dompdf.wrapper');
        // $pdf->loadView('view');


        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadView('exports.Forms.form15',['data'=>'this is data']);

        // // dd($pdf);
        // $pdf->save('test.pdf');
        // $pdf->stream();
        // return $pdf->download('test.pdf');

        // $pdf = PDF::loadView('exports.Forms.form15');
        
        // return $pdf->download('test.pdf');
    }


    // Sub Modules Used in the Main form forms_15


    public function index_activity15()
    {
        return view('forms.forms_15.activity15.index');
    }


    public function index_cause15()
    {
        return view('forms.forms_15.cause15.index');
    }

    public function index_contributingcause()
    {
        return view('forms.forms_15.contributingcause.index');
    }
    public function index_formdata15()
    {
        return view('forms.forms_15.formdata15.index');
    }
    public function index_imdaction()
    {
        return view('forms.forms_15.imdaction.index');
    }

    public function index_imdcorrection()
    {
        return view('forms.forms_15.imdcorrection.index');
    }

    public function index_natureofpotentialinjury()
    {
        return view('forms.forms_15.natureofpotentialinjury.index');
    }


    public function index_whyunsafeactcommitted()
    {
        return view('forms.forms_15.whyunsafeactcommitted.index');
    }
}
