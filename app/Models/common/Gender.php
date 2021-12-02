<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;

    protected $primaryKey = 'gender_id';
    protected $table = 'genders';
    protected $fillable = [
        'gender_description','gender_abbr'
     ];

}
