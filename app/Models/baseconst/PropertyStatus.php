<?php

namespace App\Models\baseconst;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyStatus extends Model
{
    use HasFactory;

    protected $primaryKey = 'propertystatus_id';
    protected $table = 'property_statuses';
    protected $fillable = [
        'propertystatus_description','propertystatus_abbr'
     ];

}
