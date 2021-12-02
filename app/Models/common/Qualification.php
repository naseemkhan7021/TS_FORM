<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;

    protected $primaryKey = 'qualification_id';
    protected $table = 'qualifications';
    protected $fillable = [
        'qualification_description','qualification_abbr'
     ];

}
