<?php

namespace App\Models\forms_01;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class preventive_incident_control extends Model
{
    use HasFactory;

    protected $primaryKey = 'preventive_incident_control_id';
    protected $table = 'preventive_incident_controls';
    protected $fillable = [
        'preventive_incident_control_description',
        'preventive_incident_control_abbr',

     ];
}
