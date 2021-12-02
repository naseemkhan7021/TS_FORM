<?php

namespace App\Models\baseconst;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConstructionStage extends Model
{
    use HasFactory;

    protected $primaryKey = 'construction_stages_id';
    protected $table = 'construction_stages';
    protected $fillable = [
        'construction_stages_description','construction_stages_abbr'
     ];

}
