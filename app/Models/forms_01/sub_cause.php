<?php

namespace App\Models\forms_01;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_cause extends Model
{
    use HasFactory;

    protected $primaryKey = 'sub_causes_id';
    protected $table = 'sub_causes';
    protected $fillable = [
        'sub_causes_description',
        'sub_causes_abbr',
        'sub_causes_fk',

     ];
}
