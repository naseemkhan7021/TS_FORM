<?php

namespace App\Models\forms_17;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class substandcondition extends Model
{
    use HasFactory;

    protected $primaryKey = 'substandcondition_id';
    protected $table = 'substandconditions';
    protected $fillable = [
        'substandcondition_description', 'substandcondition_abbr'
    ];


}
