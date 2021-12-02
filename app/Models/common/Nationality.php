<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    use HasFactory;

    protected $primaryKey = 'nationality_id';
    protected $table = 'nationalities';
    protected $fillable = [
        'nationality_description','nationality_abbr'
     ];

}
