<?php

namespace App\Models\baseconst;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salesunit extends Model
{
    use HasFactory;

    protected $primaryKey = 'salesunit_id';
    protected $table = 'salesunits';
    protected $fillable = [
        'salesunit_description','salesunit_abbr'
     ];

}
