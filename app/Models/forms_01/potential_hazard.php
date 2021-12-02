<?php

namespace App\Models\forms_01;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class potential_hazard extends Model
{
    use HasFactory;

    protected $primaryKey = 'potential_hazard_id';
    protected $table = 'potential_hazards';
    protected $fillable = [
        'potential_hazard_description',
        'potential_hazard_abbr',
     ];
}
