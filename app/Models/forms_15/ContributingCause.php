<?php

namespace App\Models\forms_15;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContributingCause extends Model
{
    use HasFactory;

    protected $primaryKey = 'contributing_causes_id';
    protected $table = 'contributing_causes';
    protected $fillable = [
        'contributing_causes_description', 'contributing_causes_abbr'
    ];

}
