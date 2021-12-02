<?php

namespace App\Models\projcon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projectunits extends Model
{
    use HasFactory;

    protected $primaryKey = 'iID';
    protected $table = 'projectunits';
    protected $fillable = [
        'iProjectID_FK' , 'iProjectWingID_FK' , 'iUnitTypeID_FK' ,  'iProjectUnitID' , 'sManagementUnitID' , 'iCarpetArea_sqmt'  ,
        'iBuildUpFormula' , 'iBuildArea_sqmt' , 'iOpenArea' , 'iStampDutyArea' , 'iStampDutyArea2' , 'iTotalCarpetArea_sqft' ,
	    'iOtla_Area' , 	'iTotalArea_sqft' , 	'iMarketRate_sqmt' , 	'iMarketValue_sqmt' , 	'iAgreementValue' , 'iRate_sqft' ,
	    'iFloorRiseRate' ,	'iFloorRiseAmount' , 	'mFlatCost' , 	'mDevelopmentCharges' , 'mDevelopmentCharges_amt' , 'mParking' ,
	    'mClubHouse' ,	'mGST' ,	'mTotalFlatCost' , 	'mRegistration' , 	'mStampDuty' , 	'mStampDutyPer' , 	'mGrandTotal'
     ];



}
