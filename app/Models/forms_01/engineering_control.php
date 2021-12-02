<?php

namespace App\Models\forms_01;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class engineering_control extends Model
{
    use HasFactory;

    protected $primaryKey = 'engineering_control_id';
    protected $table = 'engineering_controls';
    protected $fillable = [
        'engineering_control_description',
        'engineering_control_abbr',
        'engineering_control_value'
     ];
}
 