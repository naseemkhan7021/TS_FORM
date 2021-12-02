<?php

namespace App\Models\forms_01;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class risk_consequence extends Model
{
    use HasFactory;

    protected $primaryKey = 'risk_consequence_id';
    protected $table = 'risk_consequences';
    protected $fillable = [
        'risk_consequence_description',
        'risk_consequence_abbr',
        'risk_consequence_value',

     ];
}
