<?php

namespace App\Models\forms_66;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubActivity66 extends Model
{
    use HasFactory;
    protected $primaryKey = 'sub_activity_id';
    protected $fillable = [
        'activity_id_fk',
        'sub_activity_description',
        'sub_activity_abbr'
    ];

}
