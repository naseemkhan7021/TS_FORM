<?php

namespace App\Models\projcon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projectwings extends Model
{
    use HasFactory;

    protected $primaryKey = 'iProjectWingID';
    protected $table = 'projectwings';
    protected $fillable = [
        'sWingDescription','sWingAbbr', 'iProjectID_FK' , 'iFloors' , 'iUnitsperfloor' , 'iShopsW' , 'iOfficeW'
     ];


}
