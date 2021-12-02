<?php

namespace App\Models\forms_01;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class probable_consequence extends Model
{
    use HasFactory;

    protected $primaryKey = 'probable_consequence_id';
    protected $table = 'probable_consequences';
    protected $fillable = [
        'probable_consequence_description',
        'probable_consequence_abbr',
     ];
}
