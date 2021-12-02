<?php

namespace App\Models\forms_01;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_activity extends Model
{
    use HasFactory;

    protected $primaryKey = 'sub_activity_id';
    protected $table = 'sub_activities';
    protected $fillable = [
        'sub_activity_description',
        'sub_activity_abbr',
        'activity_id_fk',

     ];
}
