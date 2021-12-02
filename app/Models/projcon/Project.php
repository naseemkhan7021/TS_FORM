<?php

namespace App\Models\projcon;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $primaryKey = 'ProjectID';
    protected $table = 'projects';
    protected $fillable = [
        'sProjectName','sLocation', 'sReraID', 'dtStart', 'iNoofWings', 'iNoofFloors', 'iShops', 'iOffice',
        'iFlatPerFloor' , 'mDevelopmentCostPerSqft', 'iSuperLoadingPercentage', 'iLoadingPercentage'
     ];

     public function setStartDateAttribute($value)
     {
         $this->attributes['dtStart'] = Carbon::createFromFormat('m/d/Y' , $value)
         ->format('Y-m-d');
     }




}


// https://github.com/flatpickr/flatpickr
