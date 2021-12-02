<?php

namespace App\Models\forms_01;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cause extends Model
{
    use HasFactory;

    protected $primaryKey = 'causes_id';
    protected $table = 'causes';
    protected $fillable = [
        'causes_description','causes_abbr'
     ];

}
