<?php

namespace App\Models\forms_66;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Probability extends Model
{
    use HasFactory;
    protected $primaryKey = 'probability_id';
    protected $fillable = [
        'probability_description',
        'probability_abbr',
        'probability_detail',
        'probability_value',
    ];


    public function sub_activity()
    {
        return $this->belongsTo(SubActivity66::class,'probability_id_fk','probability_id');
    }
}
