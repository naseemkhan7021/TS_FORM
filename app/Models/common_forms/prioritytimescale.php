<?php

namespace App\Models\common_forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prioritytimescale extends Model
{
    use HasFactory;
    protected $primaryKey = 'prioritytimescales_id';
    protected $fillable = [
        'prioritytimescales_desc','prioritytimescales_abbr','pt_value'
    ];
}
