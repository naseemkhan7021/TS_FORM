<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $primaryKey = 'language_id';
    protected $table = 'languages';
    protected $fillable = [
        'language_description','language_abbr'
     ];

}
