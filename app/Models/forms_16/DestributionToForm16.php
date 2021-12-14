<?php

namespace App\Models\Forms_16;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestributionToForm16 extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'destribution_to_form16s_id'; 
    protected $table = 'destribution_to_form16s';
    protected $fillable = [
        'destribution_designation',
        'destribution_name',
        'destribution_signature',
        'destribution_acknowlage_dt',
        'destribution_remark',
    ];

    
}
