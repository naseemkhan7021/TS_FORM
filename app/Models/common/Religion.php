<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    use HasFactory;

    protected $primaryKey = 'religion_id';
    protected $table = 'religions';
    protected $fillable = [
        'religion_description','religion_abbr'
     ];

}
