<?php

namespace App\Models\forms_17;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class substandaction extends Model
{
    use HasFactory;

    protected $primaryKey = 'substandaction_id';
    protected $table = 'substandactions';
    protected $fillable = [
        'substandcondition_description', 'substandcondition_abbr'
    ];


}
