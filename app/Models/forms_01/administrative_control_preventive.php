<?php

namespace App\Models\forms_01;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class administrative_control_preventive extends Model
{
    use HasFactory;

    protected $primaryKey = 'administrative_control_preventive_id';
    protected $table = 'administrative_control_preventives';
    protected $fillable = [
        'administrative_control_preventive_description',
        'administrative_control_preventive_abbr',
        'administrative_control_preventive_value'
     ];
}
