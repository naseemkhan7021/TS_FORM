<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\Forms\Form01Controller;
use App\Http\Controllers\RoutingController;

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
    return view('welcome');
});


Route::get('/genders',[CommonController::class,'index_gender'])->name('genders');
Route::get('/languages',[CommonController::class,'index_languages'])->name('languages');
Route::get('/nationality',[CommonController::class,'index_nationality'])->name('nationality');
Route::get('/designation',[CommonController::class,'index_designation'])->name('designation');
Route::get('/occupation',[CommonController::class,'index_occupation'])->name('occupation');
Route::get('/relationtype',[CommonController::class,'index_relationtype'])->name('relationtype');
Route::get('/addresstype',[CommonController::class,'index_addresstype'])->name('addresstype');
Route::get('/religion',[CommonController::class,'index_religion'])->name('religion');
Route::get('/qualification',[CommonController::class,'index_qualification'])->name('qualification');


Route::get('/salesunit',[CommonController::class,'index_salesunit'])->name('salesunit');
Route::get('/leadstatus',[CommonController::class,'index_leadstatus'])->name('leadstatus');
Route::get('/leadsource',[CommonController::class,'index_leadsource'])->name('leadsource');
Route::get('/paymentmode',[CommonController::class,'index_paymentmode'])->name('paymentmode');
Route::get('/propertystatus',[CommonController::class,'index_propertystatus'])->name('propertystatus');
Route::get('/channelpartner',[CommonController::class,'index_channelpartner'])->name('channelpartner');
Route::get('/paymenttemplate',[CommonController::class,'index_templatepayment'])->name('paymenttemplate');

Route::get('/projects',[CommonController::class,'index_projects'])->name('const_projects');
Route::get('/projectwings',[CommonController::class,'index_projectwings'])->name('projectwings');
Route::get('/projectunit',[CommonController::class,'index_projectunit'])->name('projectunit');


Route::get('/leads',[CommonController::class,'index_leads'])->name('leads');
Route::get('/leadfollow',[CommonController::class,'index_leadfollowup'])->name('leadfollow');
Route::get('/primarymember',[CommonController::class,'index_primarymember'])->name('primarymember');
Route::get('/secondarymember',[CommonController::class,'index_secondarymember'])->name('secondarymember');


// Forms Routes

Route::get('/form01_activity',[Form01Controller::class,'index_activity'])->name('form01_activity');
Route::get('/form01_subactivity',[Form01Controller::class,'index_subactivity'])->name('form01_subactivity');
Route::get('/form01_cause',[Form01Controller::class,'index_cause'])->name('form01_cause');
Route::get('/form01_subcause',[Form01Controller::class,'index_subcause'])->name('form01_subcause');



// dashboard_presales


Route::get('/dashboard_presales',[CommonController::class,'dashboard_presales'])->name('dashboard_presales');
Route::get('/dashboard_unitavailable',[CommonController::class,'dashboard_unitavailable'])->name('dashboard_unitavailable');
Route::get('/dashboard_management',[CommonController::class,'dashboard_management'])->name('dashboard_management');





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


