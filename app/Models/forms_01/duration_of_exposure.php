<?php

namespace App\Models\forms_01;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class duration_of_exposure extends Model
{
    use HasFactory;
    protected $primaryKey = 'duration_of_exposure_id';
    protected $table = 'duration_of_exposures';
    protected $fillable = [
        'duration_of_exposure_value',
        'duration_of_exposure_description',
        'duration_of_exposure_abbr',
    ];
}
