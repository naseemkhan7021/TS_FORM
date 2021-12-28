<?php

namespace App\Models\forms_66;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnvironmentalImpact extends Model
{
    use HasFactory;
    protected $primaryKey = 'environmental_impact_id';
    protected $fillable = [
        'environmental_impact_description',
        'environmental_impact_abbr',
        'environmental_impact_detail',
        'environmental_impact_value',   
    ];


    public function sub_activity()
    {
        return $this->belongsTo(SubActivity66::class,'environmental_impact_id_fk','environmental_impact_id');
    }
}
