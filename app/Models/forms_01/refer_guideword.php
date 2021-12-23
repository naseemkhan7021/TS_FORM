<?php

namespace App\Models\forms_01;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class refer_guideword extends Model
{
    use HasFactory;

    protected $primaryKey = 'refer_guidewords_id';
    protected $table = 'refer_guidewords';
    protected $fillable = [
        'refer_guidewords_desc',
        'refer_guidewords_abbr',
     ];

}
