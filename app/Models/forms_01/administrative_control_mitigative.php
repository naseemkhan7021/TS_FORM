<?php

namespace App\Models\forms_01;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class administrative_control_mitigative extends Model
{
    use HasFactory;

    protected $primaryKey = 'administrative_control_mitigative_id';
    protected $table = 'administrative_control_mitigatives';
    protected $fillable = [
        'administrative_control_mitigative_description',
        'administrative_control_mitigative_abbr',
        'administrative_control_mitigative_value'
     ];

}
