<?php

namespace App\Models\forms_15;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImdAction extends Model
{
    use HasFactory;

    protected $primaryKey = 'imd_actions_id';
    protected $table = 'imd_actions';
    protected $fillable = [
        'imd_actions_description', 'imd_actions_abbr'
    ];

}
