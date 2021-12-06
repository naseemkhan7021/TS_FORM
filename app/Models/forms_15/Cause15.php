<?php

namespace App\Models\forms_15;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cause15 extends Model
{
    use HasFactory;

    protected $primaryKey = 'cause15s_id';
    protected $table = 'cause15s';
    protected $fillable = [
        'cause15s_description', 'cause15s_abbr'
    ];

}
