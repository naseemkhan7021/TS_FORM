<?php

namespace App\Models\forms_15;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NatureOfPotentialInjury extends Model
{
    use HasFactory;

    protected $primaryKey = 'nature_of_potential_injuries_id';
    protected $table = 'nature_of_potential_injuries';
    protected $fillable = [
        'nature_of_potential_injuries_description', 'nature_of_potential_injuries_abbr'
    ];

}
