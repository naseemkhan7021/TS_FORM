<?php

namespace App\Models\forms_15;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImdCorrection extends Model
{
    use HasFactory;

    protected $primaryKey = 'imd_corrections_id';
    protected $table = 'imd_corrections';
    protected $fillable = [
        'imd_corrections_description', 'imd_corrections_abbr'
    ];

}
