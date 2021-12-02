<?php

namespace App\Models\baseconst;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadStatus extends Model
{
    use HasFactory;

    protected $primaryKey = 'leadstatus_id';
    protected $table = 'lead_statuses';
    protected $fillable = [
        'leadstatus_description','leadstatus_abbr'
     ];

}
