<?php

namespace App\Models\forms_66;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity66 extends Model
{
    use HasFactory;
    protected $primaryKey = 'activity_id';
    protected $fillable = [
        'activity_description',
        'activity_abbr'
    ];


    public function sub_activity()
    {
        return $this->belongsTo(SubActivity66::class,'activity_id_fk','activity_id');
    }
}
