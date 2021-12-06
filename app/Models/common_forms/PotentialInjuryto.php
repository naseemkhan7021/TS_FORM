<?php

namespace App\Models\common_forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PotentialInjuryto extends Model
{
    use HasFactory;

    protected $primaryKey = 'potential_injurytos_id';
    protected $table = 'potential_injurytos';
    protected $fillable = [
        'potential_injurytos_description', 'potential_injurytos_abbr'
    ];

}
