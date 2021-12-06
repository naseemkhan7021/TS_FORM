<?php

namespace App\Models\Form15;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NatureOfPotentialInjury extends Model
{
    use HasFactory;

    protected $primaryKey = 'ibc_id';
    protected $table = 'companies';
    protected $fillable = [
        'sbc_company_name', 'sbc_abbr','sbc_logo_small','sbc_logo_large','validupto_dt'
    ];
    
}