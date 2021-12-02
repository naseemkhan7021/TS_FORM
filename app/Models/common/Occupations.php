<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occupations extends Model
{
    use HasFactory;

    protected $primaryKey = 'occupation_id';
    protected $table = 'occupations';
    protected $fillable = [
        'occupation_description','occupation_abbr'
     ];

}
