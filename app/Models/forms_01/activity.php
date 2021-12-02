<?php

namespace App\Models\forms_01;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activity extends Model
{
    use HasFactory;

    protected $primaryKey = 'activity_id';
    protected $table = 'activities';
    protected $fillable = [
        'activity_description','activity_abbr'
     ];

}
