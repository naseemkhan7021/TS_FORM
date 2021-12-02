<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relationtype extends Model
{
    use HasFactory;

    protected $primaryKey = 'relationtype_id';
    protected $table = 'relationtypes';
    protected $fillable = [
        'relationtype_description','relationtype_abbr'
     ];

}
