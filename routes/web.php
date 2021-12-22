<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Forms\Form00Controller;
use App\Http\Controllers\Forms\Form01Controller;
use App\Http\Controllers\Forms\Forms15Controller;
use App\Http\Controllers\Forms\Forms16Controller;
use App\Http\Controllers\Forms\CommonformController;
use App\Http\Controllers\Forms\Forms17Controller;
use App\Http\Controllers\Forms\Forms22Controller;
use App\Models\common_forms\Company;



// use App\Http\Controllers\RoutingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $defaltLogo = Company::all();
    // dd($defaltLogo);
    return view('welcome',['defaltLogo'=>$defaltLogo[0]]);
});


Route::get('/genders', [CommonController::class, 'index_gender'])->name('genders');
Route::get('/languages', [CommonController::class, 'index_languages'])->name('languages');
Route::get('/nationality', [CommonController::class, 'index_nationality'])->name('nationality');
Route::get('/designation', [CommonController::class, 'index_designation'])->name('designation');
Route::get('/occupation', [CommonController::class, 'index_occupation'])->name('occupation');
Route::get('/relationtype', [CommonController::class, 'index_relationtype'])->name('relationtype');
Route::get('/addresstype', [CommonController::class, 'index_addresstype'])->name('addresstype');
Route::get('/religion', [CommonController::class, 'index_religion'])->name('religion');
Route::get('/qualification', [CommonController::class, 'index_qualification'])->name('qualification');



Route::get('/company', [CommonformController::class, 'index_company'])->name('index_company');
Route::get('/department', [CommonformController::class, 'index_department'])->name('index_department');
Route::get('/defaultdata', [CommonformController::class, 'index_defaultdata'])->name('index_defaultdata');
Route::get('/projects', [CommonformController::class, 'index_project'])->name('index_project');
Route::get('/documentserial', [CommonformController::class, 'index_documentserial'])->name('index_documentserial');
Route::get('/injuryto', [CommonformController::class, 'index_InjuryTo'])->name('index_InjuryTo');


// Route::get('/form01_subactivity', [Form01Controller::class, 'index_subactivity'])->name('form01_subactivity');
// Route::get('/form01_probable_consequence', [Form01Controller::class, 'index_probable_consequence'])->name('form01_probable_consequence');
// Route::get('/form01_cause', [Form01Controller::class, 'index_cause'])->name('form01_cause');
// Route::get('/form01_subcause', [Form01Controller::class, 'index_subcause'])->name('form01_subcause');




// Route::get('/salesunit', [CommonController::class, 'index_salesunit'])->name('salesunit');
// Route::get('/leadstatus', [CommonController::class, 'index_leadstatus'])->name('leadstatus');
// Route::get('/leadsource', [CommonController::class, 'index_leadsource'])->name('leadsource');
// Route::get('/paymentmode', [CommonController::class, 'index_paymentmode'])->name('paymentmode');
// Route::get('/propertystatus', [CommonController::class, 'index_propertystatus'])->name('propertystatus');
// Route::get('/channelpartner', [CommonController::class, 'index_channelpartner'])->name('channelpartner');
// Route::get('/paymenttemplate', [CommonController::class, 'index_templatepayment'])->name('paymenttemplate');

// Route::get('/projects', [CommonController::class, 'index_projects'])->name('const_projects');
// Route::get('/projectwings', [CommonController::class, 'index_projectwings'])->name('projectwings');
// Route::get('/projectunit', [CommonController::class, 'index_projectunit'])->name('projectunit');


// Route::get('/leads', [CommonController::class, 'index_leads'])->name('leads');
// Route::get('/leadfollow', [CommonController::class, 'index_leadfollowup'])->name('leadfollow');
// Route::get('/primarymember', [CommonController::class, 'index_primarymember'])->name('primarymember');
// Route::get('/secondarymember', [CommonController::class, 'index_secondarymember'])->name('secondarymember');


// Forms01 Routes

Route::get('/form00_data', [Form00Controller::class, 'index_formdata'])->name('form00_data');

Route::get('/form01_formdata01', [Form01Controller::class, 'index_formdata01'])->name('form01_formdata01');
Route::get('/form01_activity', [Form01Controller::class, 'index_activity'])->name('form01_activity');
Route::get('/form01_preventiveincidentcontrol', [Form01Controller::class, 'index_preventiveincidentcontrol'])->name('form01_preventiveincidentcontrol');
Route::get('/form01_potentialhazard', [Form01Controller::class, 'index_potentialhazard'])->name('form01_potentialhazard');
Route::get('/form01_subactivity', [Form01Controller::class, 'index_subactivity'])->name('form01_subactivity');
Route::get('/form01_probable_consequence', [Form01Controller::class, 'index_probable_consequence'])->name('form01_probable_consequence');
Route::get('/form01_cause', [Form01Controller::class, 'index_cause'])->name('form01_cause');
Route::get('/form01_subcause', [Form01Controller::class, 'index_subcause'])->name('form01_subcause');

Route::get('/form01_administrative_control_mitigative', [Form01Controller::class, 'index_administrative_control_mitigative'])->name('form01_administrative_control_mitigative');
Route::get('/form01_administrative_control_preventive', [Form01Controller::class, 'index_administrative_control_preventive'])->name('form01_administrative_control_preventive');
Route::get('/form01_engineering_control', [Form01Controller::class, 'index_engineering_control'])->name('form01_engineering_control');
Route::get('/form01_consequences_control', [Form01Controller::class, 'index_consequences_control'])->name('form01_consequences_control');
Route::get('/form01_duration_of_exposure', [Form01Controller::class, 'index_duration_of_exposure'])->name('form01_duration_of_exposure');
Route::get('/form01_risk_probability', [Form01Controller::class, 'index_risk_probability'])->name('form01_risk_probability');
Route::get('/form01_risk_consequence', [Form01Controller::class, 'index_risk_consequence'])->name('form01_risk_consequence');

// forms 15
Route::get('/form15_formdata15', [Forms15Controller::class, 'index_formdata15'])->name('form15_formdata15');
Route::get('/form15_activity15', [Forms15Controller::class, 'index_activity15'])->name('form15_activity15');
Route::get('/form15_cause15', [Forms15Controller::class, 'index_cause15'])->name('form15_cause15');
Route::get('/form15_contributingcause', [Forms15Controller::class, 'index_contributingcause'])->name('form15_contributingcause');
Route::get('/form15_imdaction', [Forms15Controller::class, 'index_imdaction'])->name('form15_imdaction');
Route::get('/form15_imdcorrection', [Forms15Controller::class, 'index_imdcorrection'])->name('form15_imdcorrection');
Route::get('/form15_natureofpotentialinjury', [Forms15Controller::class, 'index_natureofpotentialinjury'])->name('form15_natureofpotentialinjury');
Route::get('/form15_whyunsafeactcommitted', [Forms15Controller::class, 'index_whyunsafeactcommitted'])->name('form15_whyunsafeactcommitted');



// forms 16
Route::get('/form16_formdata16', [Forms16Controller::class, 'index_formdata16'])->name('form16_formdata16');

// forms 17
Route::get('/form17_formdata17', [Forms17Controller::class, 'index_formdata17'])->name('form17_formdata17');
Route::get('/form17_substandcondition', [Forms17Controller::class, 'index_substandcondition'])->name('form17_substandcondition');
Route::get('/form17_substandaction', [Forms17Controller::class, 'index_substandaction'])->name('form17_substandaction');
// forms 22

Route::get('/form22_header', [Forms22Controller::class, 'index_header'])->name('form22_header');
Route::get('/form22_participant', [Forms22Controller::class, 'index_participant'])->name('form22_participant');
Route::get('/form22_topicdiscussed', [Forms22Controller::class, 'index_topicdiscussed'])->name('form22_topicdiscussed');

// dashboard_presales
Route::get('/dashboard_presales', [CommonController::class, 'dashboard_presales'])->name('dashboard_presales');
Route::get('/dashboard_unitavailable', [CommonController::class, 'dashboard_unitavailable'])->name('dashboard_unitavailable');
Route::get('/dashboard_management', [CommonController::class, 'dashboard_management'])->name('dashboard_management');





Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::group(['middleware' => 'auth', 'prefix' => '/'], function () {
    Route::get('{first}/{second}/{third}', 'RoutingController@thirdLevel')->name('third');
    Route::get('{first}/{second}', 'RoutingController@secondLevel')->name('second');
    Route::get('{any}', 'RoutingController@root')->name('any');
});

// landing
// Route::get('', 'RoutingController@index')->name('index');
