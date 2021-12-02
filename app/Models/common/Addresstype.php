<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addresstype extends Model
{
    use HasFactory;

    protected $primaryKey = 'addresstype_id';
    protected $table = 'addresstypes';
    protected $fillable = [
        'addresstype_description','addresstype_abbr'
     ];

}
