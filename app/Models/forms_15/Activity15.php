<?php

namespace App\Models\Form15;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity15 extends Model
{
    use HasFactory;

    protected $primaryKey = 'activity15s_id';
    protected $table = 'activity15s';
    protected $fillable = [
        'activity15s_description', 'activity15s_abbr'
    ];

}
