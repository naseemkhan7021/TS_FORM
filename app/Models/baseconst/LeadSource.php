<?php

namespace App\Models\baseconst;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadSource extends Model
{
    use HasFactory;

    protected $primaryKey = 'source_id';
    protected $table = 'lead_sources';
    protected $fillable = [
        'source_description','source_abbr'
     ];

}
