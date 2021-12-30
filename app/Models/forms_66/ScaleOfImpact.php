<?php

namespace App\Models\forms_66;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScaleOfImpact extends Model
{
    use HasFactory;
    protected $primaryKey = 'scale_of_impact_id';
    protected $fillable = [
        'scale_of_impact_description',
        'scale_of_impact_abbr',
        'scale_of_impact_detail',
        'scale_of_impact_value',
    ];


    public function sub_activity()
    {
        return $this->belongsTo(SubActivity66::class,'scale_of_impact_id_fk','scale_of_impact_id');
    }
}
