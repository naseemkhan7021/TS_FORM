<?php

namespace App\Models\forms_01;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class risk_probability extends Model
{
    use HasFactory;

    protected $primaryKey = 'risk_probability_id';
    protected $table = 'risk_probabilities';
    protected $fillable = [
        'risk_probability_description',
        'risk_probability_abbr',
        'risk_probability_value',

     ];
}
