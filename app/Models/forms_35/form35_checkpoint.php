<?php

namespace App\Models\forms_35;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form35_checkpoint extends Model
{
    use HasFactory;

    protected $primaryKey = 'form35_checkpoints_id';
    protected $table = 'form35_checkpoints';
    protected $fillable = [
        'form35_checkpoints_desc',
        'form35_checkpoints_abbr'
        ];

}
