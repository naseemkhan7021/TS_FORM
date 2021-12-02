<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;

    protected $primaryKey = 'designation_id';
    protected $table = 'designations';
    protected $fillable = [
        'designation_description','designation_abbr'
     ];

}
