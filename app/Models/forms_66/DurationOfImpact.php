<?php

namespace App\Models\forms_66;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DurationOfImpact extends Model
{
    use HasFactory;
    protected $primaryKey = 'duration_of_impact_id';
    protected $fillable = [
        'duration_of_impact_description',
        'duration_of_impact_abbr',
        'duration_of_impact_detail',
        'duration_of_impact_value',
    ];


    public function sub_activity()
    {
        return $this->belongsTo(SubActivity66::class,'duration_of_impact_id_fk','duration_of_impact_id');
    }
}
