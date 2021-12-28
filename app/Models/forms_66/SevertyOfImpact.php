<?php

namespace App\Models\forms_66;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SevertyOfImpact extends Model
{
    use HasFactory;
    protected $primaryKey = 'severty_of_impact_id';
    protected $fillable = [
        'severty_of_impact_description',
        'severty_of_impact_abbr',
        'severty_of_impact_detail',
        'severty_of_impact_value',
    ];


    public function sub_activity()
    {
        return $this->belongsTo(SubActivity66::class,'severty_of_impact_id_fk','severty_of_impact_id');
    }
}
