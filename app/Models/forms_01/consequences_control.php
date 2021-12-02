<?php

namespace App\Models\forms_01;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consequences_control extends Model
{
    use HasFactory;
    protected $primaryKey = 'consequences_controls_id';
    protected $table = 'consequences_controls';
    protected $fillable = [
        'consequences_controls_description',
        'consequences_controls_abbr',
     ];
}
